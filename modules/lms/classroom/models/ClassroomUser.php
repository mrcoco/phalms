<?php 

/**
* 
*/
namespace Modules\Classroom\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;

class ClassroomUser extends \Phalcon\Mvc\Model
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
	public $classroom_id;


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
        $this->belongsTo('user_id','Modules\User\Models\Users', 'id', ['alias' => 'Users']);
        $this->belongsTo('classroom_id','Modules\Classroom\Models\Classroom', 'id', ['alias' => 'Classroom']);
    }
}