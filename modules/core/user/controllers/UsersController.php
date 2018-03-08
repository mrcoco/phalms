<?php
namespace Modules\User\Controllers;
use Modules\Frontend\Controllers\ControllerBase;
use \Phalcon\Tag;
use Modules\User\Forms\ChangePasswordForm;
use Modules\User\Models\Users;
use Modules\User\Models\PasswordChanges;

/**
 * Phalms\Controllers\UsersController
 * CRUD to manage users
 */
class UsersController extends ControllerBase
{

    public function initialize()
    {
        $this->view->setTemplateBefore('private');
        $this->view->wysiwyg = 'summernote';
    }

    /**
     * Default action, shows the search form
     */
    public function indexAction()
    {
        $this->assets
            ->collection('footer')
            ->setTargetPath("themes/admin/assets/js/combined-user.js")
            ->setTargetUri("themes/admin/assets/js/combined-user.js")
            ->join(true)
            ->addJs($this->config->modules->core."user/views/js/js.js")
            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }

    public function listAction()
    {
        $this->view->disable();
        $arProp = array();
        $current = intval($this->request->getPost('current'));
        $rowCount = intval($this->request->getPost('rowCount'));
        $searchPhrase = $this->request->getPost('searchPhrase');
        $sort = $this->request->getPost('sort');
        if ($searchPhrase != '') {
            $arProp['conditions'] = "name LIKE ?1 OR email LIKE ?1";
            $arProp['bind'] = array(
                1 => "%".$searchPhrase."%"
            );
        }
        $qryTotal = Users::find($arProp);
        $rowCount = $rowCount < 0 ? $qryTotal->count() : $rowCount;
        $arProp['order'] = "name ASC";
        $arProp['limit'] = $rowCount;
        $arProp['offset'] = (($current*$rowCount)-$rowCount);
        if($sort){
            foreach ($sort as $k => $v) {
                $arProp['order'] = $k.' '.$v;
            }
        }
        $qry = Users::find($arProp);
        $arQry = array();
        $no =1;
        foreach ($qry as $item){
            $arQry[] = array(
                'no'        => $no,
                'id'        => $item->id,
                'name'      => $item->name,
		        'email'     => $item->email,
                'banned'    => $item->banned,
                'suspended' => $item->suspended,
                'profilesId' => $item->profilesId,
                'profile'   => $item->profile->name,
		        'active'    => $item->active,
            );
            $no++;
        }
        //$arQry = $qry->toArray();
        $data = array(
            'current'   => $current,
            'rowCount'  => $qry->count(),
            'rows'      => $arQry,
            'total'     => $qryTotal->count(),
            'filter'    => $arProp
        );
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($data);
        return $response->send();
    }

    /**
     * Creates a User
     */
    public function createAction()
    {
        $this->view->disable();
        if ($this->request->isPost()) {

            $user = new Users([
                'name'          => $this->request->getPost('name', 'striptags'),
                'profilesId'    => $this->request->getPost('profile', 'int'),
                'email'         => $this->request->getPost('email', 'email'),
                'password'      => $this->security->hash($this->request->getPost('password'))
            ]);
            $msg ="";
            if (!$user->save()) {
                
                $alert = "error";
                foreach($user->getMessages() as $message)
                {
                    $msg .= $message ." ";
                }
            } else {
                $alert = "sukses";
                $msg .= "User was created successfully";
            }
        }
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("name"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();        
    }

    public function getAction()
    {
        $this->view->disable();
        $user = Users::findFirstById($this->request->getQuery('id'));
        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent($user->toArray());
        return $response->send();
    }

    /**
     * Saves the user from the 'edit' action
     */
    public function editAction()
    {
        $this->view->disable();
        $id     = $this->request->getPost('hidden_id');    
        $user   = Users::findFirstById($id);
        $msg    = "";
        if (!$user) {
            $alert = "sukses";
            $msg .= "User was not found";
        }

        if ($this->request->isPost()) {

            $user->assign([
                'name' => $this->request->getPost('name', 'striptags'),
                'profilesId' => $this->request->getPost('profile', 'int'),
                'email' => $this->request->getPost('email', 'email'),
                'banned' => $this->request->getPost('banned'),
                'suspended' => $this->request->getPost('suspended'),
                'active' => $this->request->getPost('active')
            ]);
            
            if (!$user->save()) {
                $alert = "error";
                foreach($user->getMessages() as $message)
                {
                    $msg .= $message ." ";
                }
            } else {
                $alert = "sukses";
                $msg .= "User was updated successfully";
            }
        }

        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $this->request->getPost("name"),'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    /**
     * Deletes a User
     *
     * @param int $id
     */
    public function deleteAction($id)
    {
        $this->view->disable();
        $user = Users::findFirstById($id);
        $msg = "";
        if (!$user) {
            $alert  = "error";
            $msg .= "User was not found";
        }

        if (!$user->delete()) {
            $alert  = "error";
            foreach($user->getMessages() as $message)
            {
                $msg .= $message ." ";
            }
        } else {
            $alert  = "sukses";
            $msg .= "User was deleted";
        }

        $response = new \Phalcon\Http\Response();
        $response->setContentType('application/json', 'UTF-8');
        $response->setJsonContent(array('_id' => $id,'alert' => $alert, 'msg' => $msg ));
        return $response->send();
    }

    /**
     * Users must use this action to change its password
     */
    public function changePasswordAction()
    {
        $form = new ChangePasswordForm();

        if ($this->request->isPost()) {

            if (!$form->isValid($this->request->getPost())) {

                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
            } else {

                $user = $this->auth->getUser();

                $user->password = $this->security->hash($this->request->getPost('password'));
                $user->mustChangePassword = 'N';

                $passwordChange = new PasswordChanges();
                $passwordChange->user = $user;
                $passwordChange->ipAddress = $this->request->getClientAddress();
                $passwordChange->userAgent = $this->request->getUserAgent();

                if (!$passwordChange->save()) {
                    $this->flash->error($passwordChange->getMessages());
                } else {

                    $this->flash->success('Your password was successfully changed');

                    Tag::resetInput();
                }
            }
        }

        $this->view->form = $form;
    }
}
