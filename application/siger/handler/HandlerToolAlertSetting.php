<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerToolAlertSetting
 * @title HandlerToolAlertSetting
 * @url  http://server
 * @desc  HandlerToolAlertSetting
 * @version 1.0
 * @readme /doc/md/HandlerToolAlertSetting.md
 */
class HandlerToolAlertSetting
{
    public $restMethodList = 'setCutterLocationAlarmSetting|getCutterLocationAlarmSetting';

    /**
     * @title 配置默认报警规则
     * @desc  配置默认报警规则
     * @url ?_controller=Handler&_function=ToolAlertSetting&__function=setCutterLocationAlarmSetting
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u914d\u7f6e\u6210\u529f"}
     */
    public function setCutterLocationAlarmSetting(Request $request)
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
     * @title 报警条件列表
     * @desc  报警条件列表
     * @url ?_controller=Handler&_function=ToolAlertSetting&__function=getCutterLocationAlarmSetting
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"id":"1061","cutter_location_name":"101","programno":"2490","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"}],"total":"25"}
     */
    public function getCutterLocationAlarmSetting(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"id":"1061","cutter_location_name":"101","programno":"2490","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"},{"id":"1026","cutter_location_name":"101","programno":"2660","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"},{"id":"1816","cutter_location_name":"1111","programno":"1","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"},{"id":"1074","cutter_location_name":"1111","programno":"2490","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"},{"id":"2960","cutter_location_name":"1111","programno":"2663","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"},{"id":"2742","cutter_location_name":"1111","programno":"2852","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"},{"id":"2744","cutter_location_name":"1112","programno":"2852","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"},{"id":"2963","cutter_location_name":"5","programno":"2663","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"},{"id":"2747","cutter_location_name":"500","programno":"2852","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"},{"id":"1072","cutter_location_name":"909","programno":"2490","spindle_name":"1","machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","alert_condition_num":"8","content":"1,2,3,4,9,10,11,12","createtime":"2018-11-26 17:05:29"}],"total":"25"}';
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
            'setCutterLocationAlarmSetting'=>[

            ],
            'getCutterLocationAlarmSetting'=>[
                'data'=>['name' => 'data', 'type' => 'array', 'require' => 'true', 'default' => '', 'desc' => 'sectionid(产线层级id),page,pagesize', 'range' => '',],
            ],

        ];

        return $rules;
    }


}