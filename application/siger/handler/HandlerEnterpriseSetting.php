<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerEnterpriseSetting 
 * @title 项目设置 总等级设置 标签页
 * @url  http://61.177.28.246:8100/Config
 * @desc  项目设置 总等级设置 标签页
 * @version 1.0
 * @readme 
 */
class HandlerEnterpriseSetting
{

	public $restMethodList = 'getAllLevel';

 
    /**
     * @title 项目设置 总等级设置 标签页  获得所有等级列表
     * @desc  项目设置 总等级设置 标签页  获得所有等级列表
     * @url EnterpriseSetting/getAllLevel
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"列表成功","data":[{"id":"1","title":"西门子机床001","description":"PLC000001"}],"total":"1"}
     */
    public function getAllLevel(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"列表成功","data":[{"id":"1","title":"西门子机床001","description":"PLC000001"}],"total":"1"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
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
                'getAllLevel'=>[
                    'page' => ['name' => 'page', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '页数', 'range' => '',],
                    'pageSize' => ['name' => 'pageSize', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '每页条数', 'range' => '',],
                ]
                
        ];
      
        return $rules;
    }


}