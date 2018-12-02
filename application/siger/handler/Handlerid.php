<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class Handlerid 
 * @title 基本设置
 * @url  http://61.177.28.246:8100/Config
 * @desc  基本设置
 * @version 1.0
 * @readme /doc/md/HandlerCompany.md
 */
class Handlerid
{

	public $restMethodList = 'getSelectOptions';

 
    /**
     * @title 工位对应设备
     * @desc  工位对应设备
     * @url Company/Getcompanylist
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {}
     */
    public function getSelectOptions(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"OK","data":[{"id":12,"Station":"OP10 \u52a0\u5de5"},{"id":1,"Station":"OP10 \u7c97\u8f66"},{"id":10,"Station":"OP100 \u523b\u5b57"},{"id":13,"Station":"OP110\u6d4b\u8bd5"},{"id":2,"Station":"OP20 \u7c97\u8f66"},{"id":3,"Station":"OP30 \u534a\u7cbe\u8f66"},{"id":4,"Station":"OP40 \u94bb\u5b54"},{"id":5,"Station":"OP50 \u7cbe\u8f66"},{"id":11,"Station":"OP50 \u7cbe\u8f66"},{"id":6,"Station":"OP60 \u5e73\u8861"},{"id":7,"Station":"OP70 \u7535\u6da1\u6d41"},{"id":8,"Station":"OP80 \u56fa\u6709\u503c"},{"id":9,"Station":"OP90 \u7535\u8111\u91cf\u5177"}]}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }

        public function getSelectOptions(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"OK","data":[{"id":12,"Position":"OP10 \u52a0\u5de5"},{"id":1,"Position":"OP10 \u7c97\u8f66"},{"id":10,"Position":"OP100 \u523b\u5b57"},{"id":13,"Position":"OP110\u6d4b\u8bd5"},{"id":2,"Position":"OP20 \u7c97\u8f66"},{"id":3,"Position":"OP30 \u534a\u7cbe\u8f66"},{"id":4,"Position":"OP40 \u94bb\u5b54"},{"id":5,"Position":"OP50 \u7cbe\u8f66"},{"id":11,"Position":"OP50 \u7cbe\u8f66"},{"id":6,"Position":"OP60 \u5e73\u8861"},{"id":7,"Position":"OP70 \u7535\u6da1\u6d41"},{"id":8,"Position":"OP80 \u56fa\u6709\u503c"},{"id":9,"Position":"OP90 \u7535\u8111\u91cf\u5177"}]}';
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