<?php
session_start();

require_once '../system/core/function.php';

use system\core\Router;
$qStr = $_SERVER['QUERY_STRING'];

define("ROOT", dirname(__DIR__));
define("LAYOUT", 'index');
define("TELEFON1", 'тел. +375 (29) 657-45-57');
define("TELEFON2", 'тел. +375 (33) 359-12-90');
define("INSTAGRAM", 'evseenkosofia');
define("INSTA", 'https://instagram.com/evseenkosofia?igshid=mpbvxey4qztq');
define("CONTACT", 'https://vk.com/decorator7');
define("TITLE", 'СТУДИЯ ДЕКОРА " СОФЕЯ "');


spl_autoload_register(function ($class){
    $class = ROOT .'/'. str_replace('\\','/', $class) . '.php';
    if(file_exists($class)){
        include $class;
    }
});

Router::add(['^news/view/(?P<id>[0-9]+)/?$' =>['controller'=>'News', 'action'=>'view']]);

Router::add(['^news/viewdatail/(?P<id>[0-9]+)/?$' =>['controller'=>'News', 'action'=>'viewdatail']]);

Router::add(['^news/view/(?P<id>[0-9]+)/?$' =>['controller'=>'Portfolio', 'action'=>'textures']]);

Router::add(['^Texture/one/(?P<id>[0-9]+)/?$' =>['controller'=>'Texture', 'action'=>'one']]);
Router::add(['^Texture/second/(?P<id>[0-9]+)/?$' =>['controller'=>'Texture', 'action'=>'second']]);
Router::add(['^Texture/tree/(?P<id>[0-9]+)/?$' =>['controller'=>'Texture', 'action'=>'tree']]);
Router::add(['^Texture/four/(?P<id>[0-9]+)/?$' =>['controller'=>'Texture', 'action'=>'four']]);

Router::add(['^admin$'=> ['controller' => 'Main', 'action' => 'index', 'prefix' =>'admin\\']]);
Router::add(['^admin/(?P<controller>[a-z0-9-]+)/?(?P<action>[a-z0-9-]+)?$'=>['prefix' => 'admin\\']]);

Router::add(['^$'=>['controller'=>'Main', 'action'=>'index']]);
Router::add(['^(?P<controller>[a-z0-9-]+)/?(?P<action>[a-z0-9-]+)?$'=>[]]);

Router::dispatch($qStr);
