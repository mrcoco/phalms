<?php
/**
 * Created by Phalms Module Generator.
 *
 * oh yess
 *
 * @package phalms module
 * @author  dwi agus
 * @link    htp://oye.oye
 * @date:   2017-05-12
 * @time:   13:05:49
 * @license MIT
 */
namespace Modules\Sekolahan\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Sekolahan extends \Phalcon\Mvc\Model
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
	* @Column(type='string',* length=='155',nullable=false)
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