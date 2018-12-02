<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerBlank 
 * @title #标题#
 * @url  http://61.177.28.246:8100/Config
 * @desc  #标题#
 * @version 1.0
 * @readme 
 */
class HandlerBlank
{

	public $restMethodList = 'getAction';

 
    /**
     * @title 权限维护
     * @desc  权限维护
     * @url Blank/getAction
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {}
     */
    public function getAction(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{}';
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
                'getAction'=>[
                    
                ]
                
        ];
      
        return $rules;
    }


}