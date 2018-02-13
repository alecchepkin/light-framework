<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: oc
 * Date: 17.12.17
 * Time: 2:45
 */

namespace App\Component;


class WebApp
{
    /**
     * @var Request
     */
    protected $request;

    const Default = 'default';

    const Index = 'index';

    public function handle(Request $request): Response
    {
        $this->request = $request;
        return $this->getResponse();
    }

    public static function url($route)
    {
        return '/?route=' . $route;
    }

    protected function getResponse()
    {
        if (!$controller = $this->getController()) {
            return $this->error404();
        }
        return $this->runAction($controller);
    }

    protected function getController($name = null):?Controller
    {
        if (!$name) {
            $name = $this->request->controller();
        }
        if ($name) {
            $class = 'App\Controller\\' . ucfirst(strtolower($name)) . 'Controller';
            if (class_exists($class)) {
                return new $class;
            }
        }
        return null;
    }

    protected function runAction(Controller $controller, $action = null): Response
    {
        if (!$action) {
            $action = $this->request->action();
        }
        $method = strtolower($action) . 'Action';
        if (method_exists($controller, $method)) {
            return $controller->$method();
        }
        return $this->error404();
    }

    protected function error404()
    {
        return $this->runAction($this->getController(self::Default), 'error404');
    }


}