<?php
/**
 * Created by Phalms Module Generator.
 *
 * announcements module
 *
 * @package phalms-module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-15
 * @time:   09:06:59
 * @license MIT
 */
namespace Modules\Announcements\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Announcements extends \Phalcon\Mvc\Model
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
	public $title;
	/**
	*
	* @var string
	* @Column(type='string',* length=='0',nullable=false)
	*
	*/
	public $content;
	/**
	*
	* @var integer
	* @Column(type='integer',* length=='1',nullable=false)
	*
	*/
	public $status;
	

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