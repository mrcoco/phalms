<?php
/**
 * Created by Phalms Module Generator.
 *
 * mencoba
 *
 * @package 
 * @author  
 * @link    
 * @date:   2018-03-06
 * @time:   17:03:44
 * @license MIT
 */
namespace Modules\Mencoba\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Mencoba extends \Phalcon\Mvc\Model
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
	public $mencoba;
	/**
	*
	* @var string
	* @Column(type='string',* length=='0',nullable=false)
	*
	*/
	public $membuat;
	

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