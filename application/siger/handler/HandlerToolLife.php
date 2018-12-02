<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerToolLife
 * @title ToolLife
 * @url  http://server
 * @desc  ToolLife
 * @version 1.0
 * @readme /doc/md/HandlerToolLife.md
 */
class HandlerToolLife
{
    public $restMethodList = 'getmysqlInfos|getToolLifeList';

    /**
     * @title 监控换刀记录表
     * @desc  监控换刀记录表
     * @url ?_controller=Handler&_function=ToolLife&__function=getmysqlInfos
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":0,"msg":"\u6682\u65e0\u6570\u636e"}
     */
    public function getmysqlInfos(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":0,"msg":"\u6682\u65e0\u6570\u636e"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 剩余寿命列表
     * @desc  剩余寿命列表
     * @url ?_controller=Handler&_function=ToolLife&__function=getToolLifeList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"data":[{"id":"3570","machine_code":"jcc_6","machine_name":"jcc_6","spindle_name":"1","cutter_location_name":"1010","tool_name":"\u5207\u65ad\u5200","drawingcode":"SP300 NC3030","description":"","use_life":"2265","cyc_time":"435.979","ratedlife":"150","programno":"18","surplus_life":-2115,"percent":-1410,"surplus_type":"danger","surplus_font_color":"#555","cyc_time_str":"0"}],"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","params":{"ver":1,"companyid":"46","projectid":74,"data":[{"CutterLocationId":"1","SpindleId":"1","MachineCode":"185","ProgramInfo":[{"ProgramNo":"10","ProgramType":"1"}]},{"CutterLocationId":"505","SpindleId":"1","MachineCode":"184","ProgramInfo":[{"ProgramNo":"4069","ProgramType":"2"}]},{"CutterLocationId":"808","SpindleId":"1","MachineCode":"184","ProgramInfo":[{"ProgramNo":"4069","ProgramType":"2"}]}]}}
     */
    public function getToolLifeList(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"data":[{"id":"3570","machine_code":"jcc_6","machine_name":"jcc_6","spindle_name":"1","cutter_location_name":"1010","tool_name":"\u5207\u65ad\u5200","drawingcode":"SP300 NC3030","description":"","use_life":"2265","cyc_time":"435.979","ratedlife":"150","programno":"18","surplus_life":-2115,"percent":-1410,"surplus_type":"danger","surplus_font_color":"#555","cyc_time_str":"0"}],"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","params":{"ver":1,"companyid":"46","projectid":74,"data":[{"CutterLocationId":"1","SpindleId":"1","MachineCode":"185","ProgramInfo":[{"ProgramNo":"10","ProgramType":"1"}]},{"CutterLocationId":"505","SpindleId":"1","MachineCode":"184","ProgramInfo":[{"ProgramNo":"4069","ProgramType":"2"}]},{"CutterLocationId":"808","SpindleId":"1","MachineCode":"184","ProgramInfo":[{"ProgramNo":"4069","ProgramType":"2"}]}]}}';
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
            'getmysqlInfos'=>[
               
            ],
            'getToolLifeList'=>[
               'sectionid'=> ['name' => 'sectionid', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => 'sectionid', 'range' => '',]
            ],

        ];

        return $rules;
    }


}