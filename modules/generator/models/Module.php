<?php
namespace Modules\Generator\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Module extends \Phalcon\Mvc\Model
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
	
	public $slug;
/**
	*
	* @var int
	* @Column(type="int", length=10, nullable=false)
	*/
	
	public $version;
/**
	*
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $menu;
/**
	*
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $description;
/**
	*
	* @var tinyint
	* @Column(type="tinyint", length=10, nullable=false)
	*/
	
	public $enabled;

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