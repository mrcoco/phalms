<?php
namespace Modules\Service\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Service extends \Phalcon\Mvc\Model
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
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $thumb;
/**
	*
	* @var varchar
	* @Column(type="varchar", length=10, nullable=false)
	*/
	
	public $content;
/**
	*
	* @var int
	* @Column(type="int", length=10, nullable=false)
	*/
	
	public $pageId;
/**
	*
	* @var int
	* @Column(type="int", length=10, nullable=false)
	*/
	
	public $status;


    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $created;
	public function initialize()
    {
		$this->belongsTo('pageId', 'Modules\Cms\Models\Page', 'id', ['alias' => 'Pages']);
	}
}