<?php
/**
 * Created by Phalms Module Generator.
 *
 * Submissions Module
 *
 * @package phalms module
 * @author  Dwi Agus
 * @link    http://cempakaweb.com
 * @date:   2017-06-10
 * @time:   17:06:27
 * @license MIT
 */
namespace Modules\Submissions\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class Submissions extends \Phalcon\Mvc\Model
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
	public $assignment_id;
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
	public $tittle;
	/**
	*
	* @var string
	* @Column(type='string',* length=='255',nullable=false)
	*
	*/
	public $file;
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
	* @Column(type='string',* length=='0',nullable=false)
	*
	*/
	public $chance;
	

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