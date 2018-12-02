<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerToolControlLine
 * @title ToolControlLine
 * @url  http://server
 * @desc  ToolControlLine
 * @version 1.0
 * @readme /doc/md/HandlerToolControlLine.md
 */
class HandlerToolControlLine
{
    public $restMethodList = 'autoStudySwitch|getToolStudyList|getToolUnStudyList|getOutlineStudyList|getOutlineUnStudyList';

    /**
     * @title 自动学习开关
     * @desc  自动学习开关
     * @url ?_controller=Handler&_function=ToolControlLine&__function=autoStudySwitch
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f"}
     */
    public function autoStudySwitch(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 已手动学习控制线列表
     * @desc  已手动学习控制线列表
     * @url ?_controller=Handler&_function=ToolControlLine&__function=getToolStudyList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"id":"20","spindle_id":"230","spindle_name":"1","program_no":"398","start_time":"2018-11-07 04:00:49","end_time":"2018-11-07 08:00:49","machine_id":"187","machine_name":"z_1","machine_code":"z_1","auto_study":"0"}],"total":"3"}
     */
    public function getToolStudyList(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"id":"20","spindle_id":"230","spindle_name":"1","program_no":"398","start_time":"2018-11-07 04:00:49","end_time":"2018-11-07 08:00:49","machine_id":"187","machine_name":"z_1","machine_code":"z_1","auto_study":"0"},{"id":"18","spindle_id":"232","spindle_name":"1","program_no":"511","start_time":"2018-09-18 08:00:23","end_time":"2018-09-18 10:00:23","machine_id":"188","machine_name":"z_2","machine_code":"z_2","auto_study":"1"},{"id":"19","spindle_id":"233","spindle_name":"2","program_no":"511","start_time":"2018-09-18 05:00:17","end_time":"2018-09-18 09:00:17","machine_id":"188","machine_name":"z_2","machine_code":"z_2","auto_study":"1"}],"total":"3"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 未手动学习控制线列表
     * @desc  未手动学习控制线列表
     * @url ?_controller=Handler&_function=ToolControlLine&__function=getToolUnStudyList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"programno":"10","auto_study":"1","id":"225","spindle_name":"1","machine_id":"185","machine_name":"jcc_5","machine_code":"jcc_5"}],"total":"13"}
     */
    public function getToolUnStudyList(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"programno":"10","auto_study":"1","id":"225","spindle_name":"1","machine_id":"185","machine_name":"jcc_5","machine_code":"jcc_5"},{"programno":"276","auto_study":"1","id":"227","spindle_name":"1","machine_id":"186","machine_name":"jcc_6","machine_code":"jcc_6"},{"programno":"506","auto_study":"1","id":"230","spindle_name":"1","machine_id":"187","machine_name":"z_1","machine_code":"z_1"},{"programno":"1001","auto_study":"1","id":"230","spindle_name":"1","machine_id":"187","machine_name":"z_1","machine_code":"z_1"},{"programno":"9012","auto_study":"1","id":"230","spindle_name":"1","machine_id":"187","machine_name":"z_1","machine_code":"z_1"},{"programno":"1001","auto_study":"1","id":"231","spindle_name":"2","machine_id":"187","machine_name":"z_1","machine_code":"z_1"},{"programno":"506","auto_study":"1","id":"231","spindle_name":"2","machine_id":"187","machine_name":"z_1","machine_code":"z_1"},{"programno":"398","auto_study":"1","id":"231","spindle_name":"2","machine_id":"187","machine_name":"z_1","machine_code":"z_1"},{"programno":"1351","auto_study":"1","id":"232","spindle_name":"1","machine_id":"188","machine_name":"z_2","machine_code":"z_2"},{"programno":"44","auto_study":"1","id":"232","spindle_name":"1","machine_id":"188","machine_name":"z_2","machine_code":"z_2"}],"total":"13"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }


    /**
     * @title 已学习极值轮廓线列表
     * @desc  已学习极值轮廓线列表
     * @url ?_controller=Handler&_function=ToolControlLine&__function=getOutlineStudyList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"id":"31","machine_id":"188","spindle_name":"1","cutter_location_name":"2","start_time":"2018-09-18 12:00:52","end_time":"2018-09-18 13:00:52","program_no":"511","machine_name":"z_2","machine_code":"z_2"}],"total":"1"}
     */
    public function getOutlineStudyList(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"id":"31","machine_id":"188","spindle_name":"1","cutter_location_name":"2","start_time":"2018-09-18 12:00:52","end_time":"2018-09-18 13:00:52","program_no":"511","machine_name":"z_2","machine_code":"z_2"}],"total":"1"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }
    
    /**
     * @title 未学习极值轮廓线列表
     * @desc  未学习极值轮廓线列表
     * @url ?_controller=Handler&_function=ToolControlLine&__function=getOutlineUnStudyList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"programno":"10","cutter_location_name":"1","id":"3402","spindle_name":"1","machine_id":"185","machine_name":"jcc_5","machine_code":"jcc_5"}],"total":"45"}
     */
    public function getOutlineUnStudyList(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"programno":"10","cutter_location_name":"1","id":"3402","spindle_name":"1","machine_id":"185","machine_name":"jcc_5","machine_code":"jcc_5"},{"programno":"10","cutter_location_name":"22","id":"3404","spindle_name":"1","machine_id":"185","machine_name":"jcc_5","machine_code":"jcc_5"},{"programno":"10","cutter_location_name":"3","id":"3403","spindle_name":"1","machine_id":"185","machine_name":"jcc_5","machine_code":"jcc_5"},{"programno":"276","cutter_location_name":"1","id":"3401","spindle_name":"1","machine_id":"186","machine_name":"jcc_6","machine_code":"jcc_6"},{"programno":"276","cutter_location_name":"10","id":"3399","spindle_name":"1","machine_id":"186","machine_name":"jcc_6","machine_code":"jcc_6"},{"programno":"276","cutter_location_name":"11","id":"3398","spindle_name":"1","machine_id":"186","machine_name":"jcc_6","machine_code":"jcc_6"},{"programno":"276","cutter_location_name":"12","id":"3397","spindle_name":"1","machine_id":"186","machine_name":"jcc_6","machine_code":"jcc_6"},{"programno":"276","cutter_location_name":"2","id":"3400","spindle_name":"1","machine_id":"186","machine_name":"jcc_6","machine_code":"jcc_6"},{"programno":"1001","cutter_location_name":"1","id":"3408","spindle_name":"1","machine_id":"187","machine_name":"z_1","machine_code":"z_1"},{"programno":"398","cutter_location_name":"1","id":"3421","spindle_name":"1","machine_id":"187","machine_name":"z_1","machine_code":"z_1"}],"total":"45"}';
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
            'autoStudySwitch'=>[
                'machine_id' => ['name' => 'machine_id', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '设备id', 'range' => '',],
                'spindle_name' => ['name' => 'spindle_name', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '主轴名称', 'range' => '',],
                'program_no' => ['name' => 'program_no', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '程序号', 'range' => '',],
                'check_status' => ['name' => 'check_status', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '开1，关0', 'range' => '',],
            ],
            'getToolStudyList'=>[
                'sectionid' => ['name' => 'sectionid', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '产线层级id', 'range' => '',],
                'page' => ['name' => 'page', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '', 'range' => '',],
                'pagesize' => ['name' => 'pagesize', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '', 'range' => '',],
            ],
            'getToolUnStudyList'=>[
                'sectionid' => ['name' => 'sectionid', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '产线层级id', 'range' => '',],
                'page' => ['name' => 'page', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '', 'range' => '',],
                'pagesize' => ['name' => 'pagesize', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '', 'range' => '',],
            ],
            'getOutlineStudyList'=>[
                'sectionid' => ['name' => 'sectionid', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '产线层级id', 'range' => '',],
                'page' => ['name' => 'page', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '', 'range' => '',],
                'pagesize' => ['name' => 'pagesize', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '', 'range' => '',],
            ],
            'getOutlineUnStudyList'=>[
                'sectionid' => ['name' => 'sectionid', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '产线层级id', 'range' => '',],
                'page' => ['name' => 'page', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '', 'range' => '',],
                'pagesize' => ['name' => 'pagesize', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '', 'range' => '',],
            ],
            

        ];

        return $rules;
    }


}