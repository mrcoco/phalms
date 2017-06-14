<?php
/**
 * Created by Phalms Module Generator.
 *
 * Student module 
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-14
 * @time:   14:06:05
 * @license MIT
 */
namespace Modules\Student\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Student extends \Phalcon\Mvc\Model
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
	public $user_id;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $nis;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $nisn;
	/**
	*
	* @var integer
	* @Column(type='integer',* length=='255',nullable=false)
	*
	*/
	public $religion;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $birthplace;
	/**
	*
	* @var string
	* @Column(type='string',* length=='0',nullable=false)
	*
	*/
	public $birthday;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $phone;
	/**
	*
	* @var string
	* @Column(type='string',* length=='0',nullable=false)
	*
	*/
	public $address;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $parrent;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $guardian;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $parrent_phone;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $picture;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $cover;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $bio;
	

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