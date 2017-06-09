<?php
/**
 * Created by Phalms Module Generator.
 *
 * school name for multi school system
 *
 * @package lms
 * @author  dwiagus
 * @link    http://cempakaweb.com
 * @date:   2017-06-09
 * @time:   08:06:46
 * @license MIT
 */
namespace Modules\School\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class School extends \Phalcon\Mvc\Model
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
	* @Column(type='string',* length=='225',nullable=false)
	*
	*/
	public $name;
	/**
	*
	* @var string
	* @Column(type='string',* length=='0',nullable=true)
	*
	*/
	public $descriptions;
	

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