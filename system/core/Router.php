<?php
namespace system\core;

class Router
{
    public static $routers = [];
    public static $route = [''];

    /**
     * @param $route
     */
    public static function add($route)
    {
        foreach ($route as $key=>$value){
            self::$routers[$key] = $value;
        }
    }

    /**
     * the coincidence method
     * @param $url - URL
     * @return bool
     */
    public static function checkRoute($url)
    {
        $url = self::removeQueryString($url);
        foreach (self::$routers as $k=>$val)
        {
            if(preg_match("#$k#i", $url, $matches))
            {
                $route = $val;

                foreach ($matches as $key => $match)
                {
                    if(is_string($key))
                    {
                        $route[$key] = $match;
                    }
                }
                $route['controller'] = self::uSTR($route['controller']);
                if(!isset($route['action']))
                {
                    $route['action'] = 'index';
                }
                if(!isset($route['prefix']))
                {
                    $route['prefix'] = '';
                }
                self::$route = $route;

                return true;
            }
        }
        return false;
    }

    /** URL way
     * @param $path
     */
    public static function dispatch($path)
    {
        if(self::checkRoute($path))
        {
            $controller = '\app\controllers\\'. self::$route['prefix'] . self::$route['controller'].'Controller';

            if (class_exists($controller))
            {
                $obj = new $controller(self::$route);
                $action = self::lSrt(self::$route['action'] . 'Action');

                if(method_exists($obj, $action))
                {
                    $obj->$action();
                    $obj->getView();
                }else{
                    http_response_code(404);
                    include '404.php';
                }
            }else{
                http_response_code(404);
                include '404.php';
            }
        }else{
            http_response_code(404);
            include '404.php';
        }
    }

    /** transfer to a large letter
     * @param $str
     * @return string|string[]
     *возвращаем строку*/
    private static function uSTR($str){
        //page-index
        $str = str_replace('-', ' ', $str);//page-index//что, на что,где
        $str = ucwords($str);//Page Index ккаждое слово с большой буквы
        $str = str_replace(' ', '', $str);//PageIndex //что, на что,где
        //pr($str);//Contact
        return $str;
    }

    /**
     * @param $str  $route['action']
     * @return string transfer to a small letter
     */
    private static function  lSrt($str){

        return lcfirst(self::uSTR($str));
    }

    /**delete $_GET
     * @param $url
     * @return mixed|string
     */
    private static function removeQueryString($url){
        if($url != ''){
            $params = explode('&', $url);
            if(strpos($params[0], '=') ===false){
                return  $params[0];
            }else{
                return '';
            }
        }
        return $url;
    }

}