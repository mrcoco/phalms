<?php
/**
 * Created by Phalms Module Generator.
 *
 * menu manager
 *
 * @package phalms module
 * @author  dwiagus
 * @link    http://cempakaweb.com
 * @date:   2017-05-12
 * @time:   15:05:53
 * @license MIT
 */
namespace Modules\Menu\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Menu extends \Phalcon\Mvc\Model
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
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $name;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $url;
	/**
	*
	* @var integer
	* @Column(type='integer',* length=='11',nullable=false)
	*
	*/
	public $parrent;
	/**
	*
	* @var integer
	* @Column(type='integer',* length=='11',nullable=false)
	*
	*/
	public $sort;
	

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