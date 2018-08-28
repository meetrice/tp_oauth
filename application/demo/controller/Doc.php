<?php


namespace app\demo\controller;

use think\Request;
use think\Config;
use app\apilib\BaseDoc;

class Doc extends BaseDoc
{


    public function index()
    {
		return     self::getApiDocList();
		return $this->index();

    }
	public static function getApiDocList()
    {
        //todo 可以写配置文件或数据
        $apiList = Config::get('api_doc');
		
        return $apiList;
    }


}

