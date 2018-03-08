<?php
/**
 * Created by Phalms Module Generator.
 *
 * zfl webconfig
 *
 * @package zfl
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-08
 * @time:   11:06:32
 * @license MIT
 */
namespace Modules\Webconfig\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Webconfig extends \Phalcon\Mvc\Model
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
	* @Column(type='string',* length=='125',nullable=false)
	*
	*/
	public $name;
	/**
	*
	* @var string
	* @Column(type='string',* length=='0',nullable=false)
	*
	*/
	public $content;
	

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