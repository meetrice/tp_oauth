<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerAlertSetting
 * @title HandlerAlertSetting
 * @url  http://server
 * @desc  HandlerAlertSetting
 * @version 1.0
 * @readme /doc/md/HandlerAlertSetting.md
 */
class HandlerAlertSetting
{
    public $restMethodList = 'sendemail|getemailinfos|setemailinfos|getCommunicationList';

    /**
     * @title 测试邮件发送
     * @desc  测试邮件发送
     * @url ?_controller=Handler&_function=AlertSetting&__function=sendemail
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u914d\u7f6e\u6210\u529f"}
     */
    public function sendemail(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u914d\u7f6e\u6210\u529f"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u914d\u7f6e\u5931\u8d25"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 配置邮箱页面
     * @desc  配置邮箱页面
     * @url ?_controller=Handler&_function=AlertSetting&__function=getemailinfos
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u914d\u7f6e\u6210\u529f"}
     */
    public function getemailinfos(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u914d\u7f6e\u6210\u529f"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u914d\u7f6e\u5931\u8d25"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 保存邮件设置
     * @desc  保存邮件设置
     * @url ?_controller=Handler&_function=AlertSetting&__function=setemailinfos
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u914d\u7f6e\u6210\u529f"}
     */
    public function setemailinfos(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u914d\u7f6e\u6210\u529f"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u914d\u7f6e\u5931\u8d25"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 报警通讯设置列表
     * @desc  报警通讯设置列表
     * @url ?_controller=Handler&_function=AlertSetting&__function=getCommunicationList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"data":[{"title":"OP20 \u7c97\u8f66","code":"FM-M4-MA-11-02-0845","project_id":"36","id":"8","equip_code":"FM-M4-MA-11-02-0845","equip_name":"OP20 \u7c97\u8f66","main_axle":null,"tool_name":null,"tool_drawno":null,"tool_no":null,"work_code":"","message_type":"40","projectid":"36","comment":"","status":"1","work_name":""}],"total":"12","test":{"sectionid":"0","page":"1","pagesize":"10"}}
     */
    public function getCommunicationList(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"data":[{"title":"OP20 \u7c97\u8f66","code":"FM-M4-MA-11-02-0845","project_id":"36","id":"8","equip_code":"FM-M4-MA-11-02-0845","equip_name":"OP20 \u7c97\u8f66","main_axle":null,"tool_name":null,"tool_drawno":null,"tool_no":null,"work_code":"","message_type":"40","projectid":"36","comment":"","status":"1","work_name":""}],"total":"12","test":{"sectionid":"0","page":"1","pagesize":"10"}}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u914d\u7f6e\u5931\u8d25"}';
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
            'sendemail'=>[
                'first_email'=>['name' => 'first_email', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '发件邮箱', 'range' => '',],
                'first_host'=>['name' => 'first_host', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '发件邮箱服务器地址', 'range' => '',],
                'first_password'=>['name' => 'first_password', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '发件邮箱授权码', 'range' => '',],
                'second_email'=>['name' => 'second_email', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '收件邮箱', 'range' => '',],
            ],
            'getemailinfos'=>[
                
            ],
            'setemailinfos'=>[
                'first_email'=>['name' => 'first_email', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '发件邮箱', 'range' => '',],
                'first_host'=>['name' => 'first_host', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '发件邮箱服务器地址', 'range' => '',],
                'first_password'=>['name' => 'first_password', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '发件邮箱授权码', 'range' => '',],
                'second_email'=>['name' => 'second_email', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '收件邮箱', 'range' => '',],
            ],
            'getCommunicationList'=>[
                'data'=>['name' => 'data', 'type' => 'array', 'require' => 'true', 'default' => '', 'desc' => 'sectionid(产线层级id),page,pagesize', 'range' => '',],
            ],

        ];

        return $rules;
    }

}
