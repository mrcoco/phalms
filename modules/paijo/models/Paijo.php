<?php
namespace Modules\Paijo\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Paijo extends \Phalcon\Mvc\Model
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
	public $nama;
	*
	*/
	/**
	*
	* @var string
	* @Column(type='string',nullable=false)
	public $kelas;
	*
	*/
	/**
	*
	* @var string
	* @Column(type='string',nullable=false)
	public $jabaya;
	*
	*/
	

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $updated;
}