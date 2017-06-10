<?php
/**
 * Created by Phalms Module Generator.
 *
 * Classroom modules
 *
 * @package Phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-09
 * @time:   09:06:40
 * @license MIT
 */
namespace Modules\Classroom\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Classroom extends \Phalcon\Mvc\Model
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
	public $school_id;
	/**
	*
	* @var integer
	* @Column(type='integer',* length=='11',nullable=false)
	*
	*/
	public $subject_id;
	/**
	*
	* @var integer
	* @Column(type='integer',* length=='11',nullable=false)
	*
	*/
	public $major_id;
	/**
	*
	* @var integer
	* @Column(type='integer',* length=='11',nullable=false)
	*
	*/
	public $teacher_id;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $grade;
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
        $this->belongsTo('grade','Modules\Grade\Models\Grade', 'id', ['alias' => 'Grades']);
        $this->belongsTo('teacher_id','Modules\User\Models\Users', 'id', ['alias' => 'Teachers']);
        $this->belongsTo('major_id','Modules\Majors\Models\Majors', 'id', ['alias' => 'Majors']);
        $this->belongsTo('subject_id','Modules\Subject\Models\Subject', 'id', ['alias' => 'Subjects']);
        $this->belongsTo('school_id','Modules\School\Models\School', 'id', ['alias' => 'Schools']);
        $this->belongsTo('school_id','Modules\Grade\Models\Grade', 'id', ['alias' => 'grades']);
    }
}