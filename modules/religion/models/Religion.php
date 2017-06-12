<?php
/**
 * Created by Phalms Module Generator.
 *
 * Religion module
 *
 * @package phalms
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-12
 * @time:   12:06:11
 * @license MIT
 */
namespace Modules\Religion\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Religion extends \Phalcon\Mvc\Model
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