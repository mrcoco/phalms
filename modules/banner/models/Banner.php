<?php
namespace Modules\Banner\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;

class Banner extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $order;

    /**
     *
     * @var string
     * @Column(type="string", length=555, nullable=false)
     */
    public $file;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $description;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $description1;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $link;
    /**
     *
     * @var integer
     * @Column(type="integer", length=5, nullable=false)
     */
    public $publish;
    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $create_user;
    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=yes)
     */
    public $update_user;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $created;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $updated;

    public function initialize()
    {
        $this->belongsTo('create_user', 'Modules\User\Models\Users', 'id', ['alias' => 'CreateUsers']);
        $this->belongsTo('update_user', 'Modules\User\Models\Users', 'id', ['alias' => 'UpdateUsers']);
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

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'banner';
    }

}
