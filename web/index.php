<?php
use App\Component\WebApp;
use App\Component\Request;

include_once __DIR__.'/../bootstrap.php';
$app = new WebApp();
$request = Request::createFromGlobals();
$response = $app->handle($request);
$response->send();
