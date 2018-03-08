<?php
/**
 * Created by Phalms Module Generator.
 *
 * course module managemen
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-10
 * @time:   17:06:11
 * @license MIT
 */
namespace Modules\Course\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Course extends \Phalcon\Mvc\Model
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
	public $teacher_id;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $name;
	/**
	*
	* @var string
	* @Column(type='string',* length=='0',nullable=false)
	*
	*/
	public $description;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $picture;
	/**
	*
	* @var integer
	* @Column(type='integer',* length=='0',nullable=false)
	*
	*/
	public $level;
	

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
        $this->belongsTo('teacher_id','Modules\User\Models\Users', 'id', ['alias' => 'Teachers']);
    }
}