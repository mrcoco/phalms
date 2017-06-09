<?php
/**
 * Created by Phalms Module Generator.
 *
 * email send
 *
 * @package 
 * @author  dwiagus
 * @link    http://cempakaweb.com
 * @date:   2017-05-30
 * @time:   09:05:13
 * @license MIT
 */
namespace Modules\Massmail\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Massmail extends \Phalcon\Mvc\Model
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
	public $email;
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