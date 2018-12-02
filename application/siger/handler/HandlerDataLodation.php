<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerDataLodation
 * @title 企业管理 获取地区 下拉列表
 * @url  http://61.177.28.246:8100/Config
 * @desc  企业管理 获取地区 下拉列表
 * @version 1.0
 * @readme 
 */
class HandlerDataLodation
{

	public $restMethodList = 'GetLocation';

 
    /**
     * @title 获取地区
     * @desc  获取地区
     * @url DataLodation/GetLocation
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"1","name":"\u5317\u4eac\u5e02","code":"11","status":"1"},{"id":"2","name":"\u5929\u6d25\u5e02","code":"12","status":"1"},{"id":"3","name":"\u6cb3\u5317\u7701","code":"13","status":"1"},{"id":"4","name":"\u5c71\u897f\u7701","code":"14","status":"1"},{"id":"5","name":"\u5185\u8499\u53e4\u81ea\u6cbb\u533a","code":"15","status":"1"},{"id":"6","name":"\u8fbd\u5b81\u7701","code":"21","status":"1"},{"id":"7","name":"\u5409\u6797\u7701","code":"22","status":"1"},{"id":"8","name":"\u9ed1\u9f99\u6c5f\u7701","code":"23","status":"1"},{"id":"9","name":"\u4e0a\u6d77\u5e02","code":"31","status":"1"},{"id":"10","name":"\u6c5f\u82cf\u7701","code":"32","status":"1"},{"id":"11","name":"\u6d59\u6c5f\u7701","code":"33","status":"1"},{"id":"12","name":"\u5b89\u5fbd\u7701","code":"34","status":"1"},{"id":"13","name":"\u798f\u5efa\u7701","code":"35","status":"1"},{"id":"14","name":"\u6c5f\u897f\u7701","code":"36","status":"1"},{"id":"15","name":"\u5c71\u4e1c\u7701","code":"37","status":"1"},{"id":"16","name":"\u6cb3\u5357\u7701","code":"41","status":"1"},{"id":"17","name":"\u6e56\u5317\u7701","code":"42","status":"1"},{"id":"18","name":"\u6e56\u5357\u7701","code":"43","status":"1"},{"id":"19","name":"\u5e7f\u4e1c\u7701","code":"44","status":"1"},{"id":"20","name":"\u5e7f\u897f\u58ee\u65cf\u81ea\u6cbb\u533a","code":"45","status":"1"},{"id":"21","name":"\u6d77\u5357\u7701","code":"46","status":"1"},{"id":"22","name":"\u91cd\u5e86\u5e02","code":"50","status":"1"},{"id":"23","name":"\u56db\u5ddd\u7701","code":"51","status":"1"},{"id":"24","name":"\u8d35\u5dde\u7701","code":"52","status":"1"},{"id":"25","name":"\u4e91\u5357\u7701","code":"53","status":"1"},{"id":"26","name":"\u897f\u85cf\u81ea\u6cbb\u533a","code":"54","status":"1"},{"id":"27","name":"\u9655\u897f\u7701","code":"61","status":"1"},{"id":"28","name":"\u7518\u8083\u7701","code":"62","status":"1"},{"id":"29","name":"\u9752\u6d77\u7701","code":"63","status":"1"},{"id":"30","name":"\u5b81\u590f\u56de\u65cf\u81ea\u6cbb\u533a","code":"64","status":"1"},{"id":"31","name":"\u65b0\u7586\u7ef4\u543e\u5c14\u81ea\u6cbb\u533a","code":"65","status":"1"},{"id":"32","name":"\u53f0\u6e7e\u7701","code":"66","status":"1"},{"id":"33","name":"\u9999\u6e2f","code":"71","status":"1"},{"id":"34","name":"\u6fb3\u95e8","code":"72","status":"1"}],"total":"34","page":1,"pagesize":100} 
     */
    public function GetLocation(Request $request)
    {

    }



    /**
     * 参数规则
     * @name 字段名称
     * @type 类型
     * @require 是否必须
     * @default 默认值
     * @desc 说明
     * @range 范围
     * @return array
     */
    public static function getRules()
    {
        $rules = [
                //共用参数
                'all'=>[
                    // 'time'=> ['name' => 'time', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '时间戳', 'range' => '',]
                ],
                'GetLocation'=>[
                    'type' => ['name' => 'type', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '类别', 'range' => '',],
                    'wherekeyvalue[status]' => ['name' => 'wherekeyvalue[status]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '状态', 'range' => '',],
                    'wherekeyvalue[province_code]' => ['name' => 'wherekeyvalue[province_code]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '省份', 'range' => '',],
                    'wherekeyvalue[city_code]' => ['name' => 'wherekeyvalue[city_code]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '市', 'range' => '',],
                    'page' => ['name' => 'page', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '页数', 'range' => '',],
                    'pagesize' => ['name' => 'pagesize', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '每页条数', 'range' => '',],
                ]
        ];
      
        return $rules;
    }


}