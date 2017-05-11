<?php
/**
 * Created by Phalms Module Generator.
 *
 * {description}
 *
 * @package {package}
 * @author  {author}
 * @link    {website}
 * @date:   {date}
 * @time:   {time}
 * @license {copyright}
 */
namespace Modules\{module_name}\Models;
use \Phalcon\Mvc\Model\Behavior\Timestampable;
class {model_name} extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $id;

    {model_fields}

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