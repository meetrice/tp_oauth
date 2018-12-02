<?php
namespace app\siger\handler;
use think\Request;
use think\Db;


/**
 * Class HandlerToolChangeManagementDev
 * @title ToolChangeManagementDev
 * @url  http://server
 * @desc  ToolChangeManagementDev
 * @version 1.0
 * @readme /doc/md/HandlerToolChangeManagementDev.md
 */
class HandlerToolChangeManagementDev
{
    public $restMethodList = 'getChangeRecordList';

    /**
     * @title 获取更换人员
     * @desc  获取更换人员
     * @url ?_controller=Handler&_function=ToolChangeManagementDev&__function=getChangeRecordList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"data":[{"change_username":"\u4e5d\u90a6\u7ba1\u7406\u5458","id":"2063","equip_code":"z_1","equip_name":"z_1","tool_name":"\u5185\u5b54\u9557\u5200","tool_drawno":"CCMT09T304 US735","tool_no":"1","rating_life":"3000","residual_life":"0","true_residual_life":"2497","change_user":"0","change_time":"2018-11-15 13:22:15","comment":"","status":"1","projectid":"74","mainaxis":"1","supplier":"","machine_id":"187","change_reason":"BR","url_path":"","is_use":"1","programno":"398","usage":null,"type":"1"}],"total":"26","test":{"sectionid":"0","page":"1","pagesize":"10","toolid":"","drawingcode":"","change_reason":"","change_user":""}}
     */

    public function getChangeRecordList($request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '
{"ret":1,"data":[{"change_username":"\u4e5d\u90a6\u7ba1\u7406\u5458","id":"2063","equip_code":"z_1","equip_name":"z_1","tool_name":"\u5185\u5b54\u9557\u5200","tool_drawno":"CCMT09T304 US735","tool_no":"1","rating_life":"3000","residual_life":"0","true_residual_life":"2497","change_user":"0","change_time":"2018-11-15 13:22:15","comment":"","status":"1","projectid":"74","mainaxis":"1","supplier":"","machine_id":"187","change_reason":"BR","url_path":"","is_use":"1","programno":"398","usage":null,"type":"1"}],"total":"26","test":{"sectionid":"0","page":"1","pagesize":"10","toolid":"","drawingcode":"","change_reason":"","change_user":""}}';
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
            'getChangeRecordList'=>[
               'data'=> ['name' => 'data', 'type' => 'array', 'require' => 'true', 'default' => '', 'desc' => 'sectionid,toolid(刀具类型),drawingcode(刀具图纸号),change_reason(更换原因),change_user(更换人员),page,pagesize', 'range' => '',],
            ],
            

        ];

        return $rules;
    }

}
