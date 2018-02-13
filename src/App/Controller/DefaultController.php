<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: oc
 * Date: 17.12.17
 * Time: 3:00
 */

namespace App\Controller;


use App\Component\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('index');
    }

    public function aboutAction()
    {
        return $this->render('about');
    }
    public function contactAction()
    {
        return $this->render('contact');
    }

    public function error404Action()
    {
        return $this->render('404');
    }
}