<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerCommon 
 * @title 设备信息维护
 * @url  http://61.177.28.246:8100/Config
 * @desc  设备信息维护
 * @version 1.0
 * @readme /doc/md/HandlerCompany.md
 */
class HandlerCommon
{

	public $restMethodList = 'dictSelectOptions';

 
    /**
     * @title 权限维护
     * @desc  权限维护
     * @url Company/Getcompanylist
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {}
     */
    public function dictSelectOptions(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"OK","data":[{"dkey":"1","dval":"\u8bbe\u5907\u7c7b\u578b\u4e00"},{"dkey":"3","dval":"\u8bbe\u5907\u7c7b\u578b\u4e09"},{"dkey":"2","dval":"\u8bbe\u5907\u7c7b\u578b\u4e8c"},{"dkey":"5","dval":"\u8bbe\u5907\u7c7b\u578b\u4e94"},{"dkey":"4","dval":"\u8bbe\u5907\u7c7b\u578b\u56db"}]}';
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