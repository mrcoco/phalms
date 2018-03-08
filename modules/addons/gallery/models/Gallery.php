<?php
/**
 * Created by PhpStorm.
 * User: DwiAgus
 * Date: 11/1/2016
 * Time: 09:57 AM
 */

namespace Modules\Gallery\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;

class Gallery extends \Phalcon\Mvc\Model
{
    public $id;
    public $title;
    public $path;
    public $description;
    public $create_user;
    public $update_user;
    public $created;
    public $updated;

    public function initialize()
    {
        $this->belongsTo('create_user', 'Modules\User\Models\Users', 'id', ['alias' => 'CreateUsers']);
        $this->belongsTo('update_user', 'Modules\User\Models\Users', 'id', ['alias' => 'UpdateUsers']);
        $this->hasMany('id', 'Modules\Gallery\Models\Gallery', 'gallery_id', ['alias' => 'Image']);
        $this->addBehavior(
            new Timestampable(
                [
                    "beforeCreate" => [
                        "field"  => "created",
                        "format" => "Y-m-d H:i:s",
                    ],
                    "beforeUpdate" => [
                        "field"  => "updated",
                        "format" => "Y-m-d H:i:s",
                    ],
                ]
            )
        );
    }

    public function getSource()
    {
        return 'gallery';
    }
}