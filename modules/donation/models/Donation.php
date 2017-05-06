<?php
namespace Modules\Donation\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Donation extends \Phalcon\Mvc\Model
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
	
	public $name;
/**
	*
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $email;
/**
	*
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $address;
/**
	*
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $bank_name;
/**
	*
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $bank_account;
/**
	*
	* @var int
	* @Column(type="int", length=10, nullable=false)
	*/

    public $bank_dest;
    /**
     *
     * @var int
     * @Column(type="int", length=10, nullable=false)
     */
    public $phone;
    /**
     *
     * @var int
     * @Column(type="int", length=10, nullable=false)
     */
	
	public $confirmation;
/**
	*
	* @var decimal
	* @Column(type="decimal", length=10, nullable=false)
	*/
	
	public $donation;

    public $program_id;

    public $approve;


    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $created;

    public function initialize()
    {
        $this->belongsTo('program_id', 'Modules\Program\Models\Program', 'id', ['alias' => 'Program']);
        $this->addBehavior(
            new Timestampable(
                [
                    "beforeCreate" => [
                        "field"  => "created",
                        "format" => "Y-m-d H:i:s",
                    ]
                ]
            )
        );
    }
}