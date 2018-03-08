<?php
/**
 * Created by PhpStorm.
 * User: kepegawaian
 * Date: 4/25/2017
 * Time: 11:19 PM
 */

namespace Modules\Frontend\Models;


class Subscribe extends \Phalcon\Mvc\Model
{
    public $id;

    /**
     *
     * @var varchar
     * @Column(type="varchar", length=10, nullable=false)
     */

    public $status;
    /**
     *
     * @var varchar
     * @Column(type="varchar", length=10, nullable=false)
     */

    public $email;

    public function getSource()
    {
        return 'mailinglist';
    }
}