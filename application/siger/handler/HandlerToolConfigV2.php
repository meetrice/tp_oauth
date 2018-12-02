<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerToolConfigV2
 * @title ToolConfigV2
 * @url  http://server
 * @desc  ToolConfigV2
 * @version 1.0
 * @readme /doc/md/HandlerToolConfigV2.md
 */
class HandlerToolConfigV2
{
    public $restMethodList = 'getProgramListByCutterLocationConfig|getToolConfigInfo|getOriginalToolConfigInfo';

    /**
     * @title 已配置刀具程序号
     * @desc  已配置刀具程序号
     * @url ?_controller=Handler&_function=ToolConfigV2&__function=getProgramListByCutterLocationConfig
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"programno":"1"},{"programno":"2490"},{"programno":"2660"},{"programno":"2663"},{"programno":"2852"},{"programno":"87"}]}
     */
    public function getProgramListByCutterLocationConfig(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u64cd\u4f5c\u6210\u529f","data":[{"programno":"1"},{"programno":"2490"},{"programno":"2660"},{"programno":"2663"},{"programno":"2852"},{"programno":"87"}]}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 已配置刀具列表
     * @desc  已配置刀具列表
     * @url ?_controller=Handler&_function=ToolConfigV2&__function=getToolConfigInfo
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"total":"31","data":[{"id":"1818","numbers":1,"machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","spindle_name":"2","cutter_location_name":"900","programno":"1","is_identical_collection":"1","cutter_location_alias":null,"is_processing_program":"\u662f","ratedlife":"100","tool_id":"28","tool_name":"\u5916\u5f84\u8f66\u5200","drawingcode":"RCMV1207BTS270011","product_id":"94","product_name":"17\u5bf8\u524d","product_code":"P001","spec":"NA"}],"ret":1,"msg":"\u83b7\u53d6\u6210\u529f"}
     */
    public function getToolConfigInfo(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"total":"31","data":[{"id":"1818","numbers":1,"machine_id":"95","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","spindle_name":"2","cutter_location_name":"900","programno":"1","is_identical_collection":"1","cutter_location_alias":null,"is_processing_program":"\u662f","ratedlife":"100","tool_id":"28","tool_name":"\u5916\u5f84\u8f66\u5200","drawingcode":"RCMV1207BTS270011","product_id":"94","product_name":"17\u5bf8\u524d","product_code":"P001","spec":"NA"}],"ret":1,"msg":"\u83b7\u53d6\u6210\u529f"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 未配置刀具列表
     * @desc  未配置刀具列表
     * @url ?_controller=Handler&_function=ToolConfigV2&__function=getOriginalToolConfigInfo
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6570\u636e\u6210\u529f","totalCount":"149","data":[{"id":"1839","cutter_location_name":"9","programno":"1","spindle_name":"1","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","numbers":1}]}
     */
    public function getOriginalToolConfigInfo(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6570\u636e\u6210\u529f","totalCount":"149","data":[{"id":"1839","cutter_location_name":"9","programno":"1","spindle_name":"1","machine_name":"OP50 \u8bbe\u5907","machine_code":"FJW007","numbers":1}]}';
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
            'getProgramListByCutterLocationConfig'=>[
                'sectionid' => ['name' => 'sectionid', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '产线层级id', 'range' => '',],
                'type' => ['name' => 'type', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '1已配置2未配置', 'range' => '',],
            ],
            'getToolConfigInfo'=>[
                'sectionid' => ['name' => 'sectionid', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '产线层级id', 'range' => '',],
                'program_no' => ['name' => 'program_no', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '程序号', 'range' => '',],
                'page' => ['name' => 'page', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => 'page', 'range' => '',],
                'pagesize' => ['name' => 'pagesize', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => 'pagesize', 'range' => '',],
            ],
            'getOriginalToolConfigInfo'=>[
                'sectionid' => ['name' => 'sectionid', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '产线层级id', 'range' => '',],
                'program_no' => ['name' => 'program_no', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '程序号', 'range' => '',],
                'page' => ['name' => 'page', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => 'page', 'range' => '',],
                'pagesize' => ['name' => 'pagesize', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => 'pagesize', 'range' => '',],
            ],
            
            

        ];

        return $rules;
    }
}