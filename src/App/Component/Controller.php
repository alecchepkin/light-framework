<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: oc
 * Date: 17.12.17
 * Time: 3:01
 */

namespace App\Component;


use PHPUnit\Runner\Exception;

abstract class Controller
{
    protected $layout = 'layout';

    protected function render($view, array $parameters = [])
    {
        return $this->renderTemplate($this->getTemplate($view), $parameters);
    }

    private function getTemplate($view)
    {
        $templateFile = __DIR__ . '/../Resources/views/' . $this->controllerName() . '/' . $view . '.php';
        if (file_exists($templateFile)) {
            return file_get_contents($templateFile);
        }
        throw new Exception(sprintf('view %s does not exists', $templateFile));
    }


    private function getLayout()
    {
        $file = __DIR__ . '/../Resources/views/' . $this->layout . '.php';
        if (file_exists($file)) {
            return file_get_contents($file);
        }
        throw new Exception(sprintf('view %s does not exists', $file));
    }

    private function controllerName()
    {
        $class = get_class($this);
        $str = substr($class, strripos($class, '\\') + 1);
        return substr($str, 0, stripos($str, 'Controller'));
    }

    private function renderTemplate($template, array $parameters)
    {
        $keys = array_map(function ($k) {
            return '{{' . $k . '}}';
        }, array_keys($parameters));

        $content = str_replace($keys, $parameters, $template);
//        var_dump($this->getLayout());die;
        $content = str_replace('{{content}}', $content, $this->getLayout());
        return new Response($content);

    }
}