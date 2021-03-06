<?php 

include "../autoload.php";
define ("ROOT_PATH", __DIR__.'/..');
define ("APPLICATION_PATH", __DIR__.'/../modules/Application/src/Application');


use acl\Zerophp\Router;
use acl\Zerophp\Config;
use acl\Zerophp\Dispatch;
use acl\Zerophp\View;

$config = Config::readConfig(__DIR__.'/../configs/application.config.php');
$router = Router::readRouter(explode("/",$_SERVER['REQUEST_URI'])[1]);
$request = Router::parseUrl($_SERVER['REQUEST_URI'], $router);
$reponse = Dispatch::dispatch($request);
echo View::renderLayout($reponse['layout'], $reponse['content']);;

