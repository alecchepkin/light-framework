<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: oc
 * Date: 17.12.17
 * Time: 2:57
 */

namespace App\Component;


abstract class App
{
    abstract public function handle(Request $request): Response;

}