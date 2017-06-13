<?php
/**
 * Created by Phalms Module Generator.
 *
 * ClassRoom User Module
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    
 * @date:   2017-06-13
 * @time:   11:06:05
 * @license MIT
 */
namespace Modules\Classroomuser\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Classroomuser extends \Phalcon\Mvc\Model
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
	* @var integer
	* @Column(type='integer',* length=='11',nullable=false)
	*
	*/
	public $classroom_id;
	/**
	*
	* @var integer
	* @Column(type='integer',* length=='11',nullable=false)
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