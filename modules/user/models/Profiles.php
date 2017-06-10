<?php
namespace Modules\User\Models;

use \Phalcon\Mvc\Model;

/**
 * Modules\User\Models\Profiles
 * All the profile levels in the application. Used in conjenction with ACL lists
 */
class Profiles extends Model
{

    /**
     * ID
     * @var integer
     */
    public $id;

    /**
     * Name
     * @var string
     */
    public $name;

    /**
     * Define relationships to Users and Permissions
     */
    public function initialize()
    {
        $this->hasMany('id', 'Modules\User\Models\Users', 'profilesId', ['alias' => 'users']);

        $this->hasMany('id', 'Modules\User\Models\Permissions', 'profilesId', ['alias' => 'permissions']);
    }
}
