<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: oc
 * Date: 17.12.17
 * Time: 2:55
 */

namespace App\Component;


class Response
{
    protected $content;

    /**
     * Response constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }


    public function send()
    {
        echo $this->content;
    }
}