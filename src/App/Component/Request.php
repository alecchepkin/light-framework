<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: oc
 * Date: 17.12.17
 * Time: 2:51
 */

namespace App\Component;


class Request
{
    protected $controller;
    protected $action;
    protected $parameter1;
    protected $parameter2;
    protected $parameter3;

    public static function createFromGlobals(): Request
    {
        $self = new self();
        $self->setDefaults();
        $self->splitUrl();
        return $self;
    }

    private function setDefaults()
    {
        if (!isset($_GET['route'])) {
            $_GET['route'] = 'default/index';
        }
    }

    /**
     * Get and split the URL
     */
    private function splitUrl()
    {
        if (isset($_GET['route'])) {
            $route = rtrim($_GET['route'], '/');
            $route = filter_var($route, FILTER_SANITIZE_URL);
            $route = explode('/', $route);
            $this->controller = (isset($route[0]) ? $route[0] : null);
            $this->action = (isset($route[1]) ? $route[1] : null);
            $this->parameter1 = (isset($route[2]) ? $route[2] : null);
            $this->parameter2 = (isset($route[3]) ? $route[3] : null);
            $this->parameter3 = (isset($route[4]) ? $route[4] : null);
        }
    }

    /**
     * @return mixed
     */
    public function controller()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function action()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function parameter1()
    {
        return $this->parameter1;
    }

    /**
     * @return mixed
     */
    public function parameter2()
    {
        return $this->parameter2;
    }

    /**
     * @return mixed
     */
    public function parameter3()
    {
        return $this->parameter3;
    }


}