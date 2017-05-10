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
	public $paijo;
	*
	*/
	/**
	*
	* @var string
	* @Column(type='string',nullable=false)
	public $paijet;
	*
	*/
	

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $updated;
}