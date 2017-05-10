<?php
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
     * @Column(type="string", nullable=true)
     */
    public $updated;
}