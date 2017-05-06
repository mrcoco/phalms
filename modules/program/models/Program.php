<?php
namespace Modules\Program\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Program extends \Phalcon\Mvc\Model
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
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $title;
/**
	*
	* @var text
	* @Column(type="text", length=10, nullable=false)
	*/

    public $slug;
    /**
     *
     * @var text
     * @Column(type="text", length=10, nullable=false)
     */
	
	public $content;
/**
	*
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $image;
/**
	*
	* @var int
	* @Column(type="int", length=10, nullable=false)
	*/
	
	public $category;
/**
	*
	* @var date
	* @Column(type="date", length=10, nullable=false)
	*/
	
	public $start_date;
/**
	*
	* @var date
	* @Column(type="date", length=10, nullable=false)
	*/
	
	public $end_date;
/**
	*
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $benefit;
/**
	*
	* @var decimal
	* @Column(type="decimal", length=10, nullable=false)
	*/
	
	public $requirement;
/**
	*
	* @var int
	* @Column(type="int", length=10, nullable=false)
	*/
	
	public $status;
/**
	*
	* @var int
	* @Column(type="int", length=10, nullable=false)
	*/
	
	public $create_user;
/**
	*
	* @var datetime
	* @Column(type="datetime", length=10, nullable=false)
	*/
	
	public $created;


    /**
     *
     * @var datetime
     * @Column(type="datetime", length=10, nullable=true)
     */
    public $updated;

    public function initialize()
    {
        $this->belongsTo('create_user', 'Modules\User\Models\Users', 'id', ['alias' => 'Users']);
        $this->belongsTo('category', 'Modules\Program\Models\Category', 'id', ['alias' => 'Categories']);
        $this->belongsTo('location', 'Modules\Program\Models\Location', 'id', ['alias' => 'Locations']);
        $this->hasMany('id', 'Modules\Donation\Models\Donation', 'program_id', ['alias' => 'Donation']);
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