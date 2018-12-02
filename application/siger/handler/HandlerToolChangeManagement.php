<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerToolChangeManagement
 * @title ToolChangeManagement
 * @url  http://server
 * @desc  ToolChangeManagement
 * @version 1.0
 * @readme /doc/md/HandlerToolChangeManagement.md
 */
class HandlerToolChangeManagement
{
    public $restMethodList = 'ToolChangeUserNameList';

    /**
     * @title 获取更换人员
     * @desc  获取更换人员
     * @url ?_controller=Handler&_function=ToolChangeManagement&__function=ToolChangeUserNameList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"change_user_name":"\u4e5d\u90a6\u7ba1\u7406\u5458","change_user_work_code":"0"}]}
     */
    public function ToolChangeUserNameList(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"change_user_name":"\u4e5d\u90a6\u7ba1\u7406\u5458","change_user_work_code":"0"}]}';
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
            'ToolChangeUserNameList'=>[
               
            ],
            

        ];

        return $rules;
    }


}