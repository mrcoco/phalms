<?php
namespace Modules\Modules\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Modules extends \Phalcon\Mvc\Model
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
	* @Column(type='string',nullable=false)
	*
	*/
	public $module_name;
	
	/**
	*
	* @var string
	* @Column(type='string',nullable=false)
	*
	*/
	public $description;
	
	/**
	*
	* @var integer
	* @Column(type='integer',nullable=false)
	*
	*/
	public $publish;

	/**
	*
	* @var integer
	* @Column(type='integer',nullable=false)
	*
	*/
	public $is_core;
	
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
}