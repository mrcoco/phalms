<?php

/**
* 
*/
namespace Modules\Course\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;

class ModuleUser extends \Phalcon\Mvc\Model
{
	
	/**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $id;

    /**
	*
	* @var string
	* @Column(type='string',* length=='11',nullable=false)
	*
	*/
	public $module_id;


    /**
	*
	* @var string
	* @Column(type='string',* length=='11',nullable=false)
	*
	*/
	public $user_id;
	
	/**
     *
     * @var string
     * @Column(type="string", nullable=false)
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
}