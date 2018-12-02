<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerPositionEquipment 
 * @title 路由设置
 * @url  http://61.177.28.246:8100/Config
 * @desc  路由设置
 * @version 1.0
 * @readme /doc/md/HandlerCompany.md
 */
class HandlerPositionEquipment
{

	public $restMethodList = 'getSelectOptionsCustom';

 
    /**
     * @title 出站维护
     * @desc  出站维护
     * @url Company/Getcompanylist
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {}
     */
    public function getSelectOptionsCustom(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"OK","data":[{"id":"1","station":"OP10 \u7c97\u8f66"},{"id":"2","station":"OP20 \u7c97\u8f66"},{"id":"3","station":"OP30 \u534a\u7cbe\u8f66"},{"id":"4","station":"OP40 \u94bb\u5b54"},{"id":"5","station":"OP50 \u7cbe\u8f66"},{"id":"6","station":"OP60 \u5e73\u8861"},{"id":"7","station":"OP70 \u7535\u6da1\u6d41"},{"id":"8","station":"OP80 \u56fa\u6709\u503c"},{"id":"9","station":"OP90 \u7535\u8111\u91cf\u5177"},{"id":"10","station":"OP100 \u523b\u5b57"},{"id":"11","station":"OP50 \u7cbe\u8f66"},{"id":"12","station":"OP10 \u52a0\u5de5"},{"id":"13","station":"OP110\u6d4b\u8bd5"}]}';
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