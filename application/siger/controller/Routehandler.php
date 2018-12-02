<?php
namespace app\siger\controller;

use think\Controller;

class Routehandler extends Controller
{

    public function route()
    {

        header("Access-Control-Allow-Origin: http://siger.rc3cr.com"); // 允许a.com发起的跨域请求
        header('Access-Control-Allow-Methods:OPTIONS, GET, POST');
        header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With');
        header('Access-Control-Allow-Credentials: true');

        $controller_base   = input('_controller');
        $controller_suffix = input('_function');
        $function          = input('__function', 'index');

        $FunctionClass = $controller_base . $controller_suffix;

        $obj     = 'app\siger\handler\\' . $FunctionClass;
        $class   = new \ReflectionClass($obj);
        $handler = $class->newInstanceArgs();

        return $handler->$function($this->request);
    }

}
