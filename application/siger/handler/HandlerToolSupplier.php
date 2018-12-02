<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerToolSupplier
 * @title ToolSupplier
 * @url  http://server
 * @desc  ToolSupplier
 * @version 1.0
 * @readme /doc/md/HandlerToolSupplier.md
 */
class HandlerToolSupplier
{
    public $restMethodList = 'getList|GetDropDownList|GetDropDownList2|GetDropDownList3|GetToolSupplierDropDownList|GetToolTypes';

    /**
     * @title 刀具列表
     * @desc  刀具列表
     * @url ?_controller=Handler&_function=ToolSupplier&__function=getList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"28","projectid":"36","name":"\u5916\u5f84\u8f66\u5200","spec":"NA","brand":"\u5bcc\u8010\u514b","material":"\u786c\u8d28\u5408\u91d1","hardness":"NA","drawingcode":"RCMV1207BTS270011","supplier":"\u5bcc\u8010\u514b","suppliercode":"NA","supplierimg":"\/Upload\/image\/2018-09-25\/8320b3823c624d9ebb3c38f663ba3adc.jpg","unitprice":"120","description":"","status":"1","createtime":"1514357058","creatorid":"70","updatetime":"1537839439","changerid":"70"}],"total":"68"}
     */
    public function getList(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"28","projectid":"36","name":"\u5916\u5f84\u8f66\u5200","spec":"NA","brand":"\u5bcc\u8010\u514b","material":"\u786c\u8d28\u5408\u91d1","hardness":"NA","drawingcode":"RCMV1207BTS270011","supplier":"\u5bcc\u8010\u514b","suppliercode":"NA","supplierimg":"\/Upload\/image\/2018-09-25\/8320b3823c624d9ebb3c38f663ba3adc.jpg","unitprice":"120","description":"","status":"1","createtime":"1514357058","creatorid":"70","updatetime":"1537839439","changerid":"70"}],"total":"68"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 获取所有刀具、品牌、供应商
     * @desc  获取所有刀具、品牌、供应商
     * @url ?_controller=Handler&_function=ToolSupplier&__function=GetDropDownList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"success","data":{"names":["\u5916\u5f84\u8f66\u5200","\u5916\u5f84\u63d2\u6c9f\u5200","\u5185\u5f84\u8f66\u5200","\u94bb\u5934","\u5012\u89d2\u5200","\u5916\u5f84\u8f66\u52002","T04","T05","T06","T07","T08","T09","T10","T11","T12","T13","T14","T16","T17","T18","T19","T20","T21","T22","T23","T24","T27","T28","T29","T30","T31","T32","T33","T34","T35","T36","T37","T38","T39","T40","T41","T42","T43","T44","T45","\u5927\u6321\u8fb9\u9762&\u5927\u6321\u8fb9\u6cb9\u6c9f\u7c97\u8f66\u5200","\u4e0b\u6eda\u9053\u5200","\u5927\u6321\u8fb9\u9762&\u5927\u6321\u8fb9\u6cb9\u6c9f\u7cbe\u8f66\u5200","\u5200\u51771.2","\u6d4b\u8bd5\u5200\u5177"],"brands":["\u5bcc\u8010\u514b","\u77e9\u7814","\u4e09\u83f1","\u80af\u7eb3","\u6d77\u529b","\u682a\u6d32","SPK","\u682a\u5dde","","\u4f4f\u53cb","091201","asdfa"],"suppliers":["\u5bcc\u8010\u514b","\u77e9\u7814","\u4e09\u83f1","\u80af\u7eb3","\u6d77\u529b","\u682a\u6d32","\u4f9b\u5e94\u5546","SPK","\u682a\u5dde","","091201","asfas"]}}
     */
    public function GetDropDownList(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"success","data":{"names":["\u5916\u5f84\u8f66\u5200","\u5916\u5f84\u63d2\u6c9f\u5200","\u5185\u5f84\u8f66\u5200","\u94bb\u5934","\u5012\u89d2\u5200","\u5916\u5f84\u8f66\u52002","T04","T05","T06","T07","T08","T09","T10","T11","T12","T13","T14","T16","T17","T18","T19","T20","T21","T22","T23","T24","T27","T28","T29","T30","T31","T32","T33","T34","T35","T36","T37","T38","T39","T40","T41","T42","T43","T44","T45","\u5927\u6321\u8fb9\u9762&\u5927\u6321\u8fb9\u6cb9\u6c9f\u7c97\u8f66\u5200","\u4e0b\u6eda\u9053\u5200","\u5927\u6321\u8fb9\u9762&\u5927\u6321\u8fb9\u6cb9\u6c9f\u7cbe\u8f66\u5200","\u5200\u51771.2","\u6d4b\u8bd5\u5200\u5177"],"brands":["\u5bcc\u8010\u514b","\u77e9\u7814","\u4e09\u83f1","\u80af\u7eb3","\u6d77\u529b","\u682a\u6d32","SPK","\u682a\u5dde","","\u4f4f\u53cb","091201","asdfa"],"suppliers":["\u5bcc\u8010\u514b","\u77e9\u7814","\u4e09\u83f1","\u80af\u7eb3","\u6d77\u529b","\u682a\u6d32","\u4f9b\u5e94\u5546","SPK","\u682a\u5dde","","091201","asfas"]}}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 获取品牌、供应商
     * @desc  获取品牌、供应商
     * @url ?_controller=Handler&_function=ToolSupplier&__function=GetDropDownList2
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"success","data":{"names":[],"brands":["\u77e9\u7814"],"suppliers":["\u77e9\u7814"]}}
     */
    public function GetDropDownList2(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"success","data":{"names":[],"brands":["\u77e9\u7814"],"suppliers":["\u77e9\u7814"]}}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 获取供应商
     * @desc  获取供应商
     * @url ?_controller=Handler&_function=ToolSupplier&__function=GetDropDownList3
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"success","data":{"suppliers":["\u77e9\u7814"]}}
     */
    public function GetDropDownList3(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"success","data":{"suppliers":["\u77e9\u7814"]}}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 获取刀具类型
     * @desc  获取刀具类型
     * @url ?_controller=Handler&_function=ToolSupplier&__function=GetToolSupplierDropDownList
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"success","data":["\u5185\u5b54\u9557\u5200","\u5916\u5f84\u7cbe\u8f66-55\u5ea6","\u5916\u5f84\u5f00\u7c97","\u5916\u5f84\u5f00\u7c97-55\u5ea6","\u5916\u5f84\u7cbe\u8f66-35\u5ea6","\u5916\u5f84\u69fd\u5200","\u7aef\u9762\u69fd\u5200","\u5207\u65ad\u5200","\u87ba\u7eb9\u5200","\u5b9a\u70b9\u94bb","\u4e2d\u5fc3\u94bb","U\u94bb","\u94e3\u5200","\u94f0\u5200","T\u578b\u94e3\u5200","\u5408\u91d1\u6d82\u5c42\u94e3\u5200","\u5408\u91d1T\u578b\u94e3\u5200","\u5207\u69fd\u5200","\u952f\u9f7f\u94e3\u5200","\u767d\u94a2\u94e3\u5200","\u5408\u91d1\u7403\u5934\u94e3\u5200","\u6ce2\u5203\u94e3\u5200","\u8d70\u5fc3\u673a\u5207\u65ad","\u5916\u5f84\u7cbe\u8f66\u5200","\u5916\u5f84\u9884\u5207\u69fd\u5200","\u5916\u5f84\u5f00\u7c97\u5200","\u5916\u5f84\u7c97\u52a0\u5de5","\u5916\u5f84\u7cbe\u52a0\u5de5","\u94e3\u520013.14","\u5b9a\u70b9\u94bb4.0","2.0\u4e0d\u9508\u94a2\u9ebb\u82b1\u94bb","\u5408\u91d1\u94bb\u5934","\u5408\u91d1\u94e3\u5200","\u6210\u578b\u5200","\u4e1d\u9525","\u5916\u5f84\u7c97\u8f66\u5200","\u69fd\u5200","\u5916\u5706\u7cbe\u8f66\u5200"]}
     */
    public function GetToolSupplierDropDownList(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"success","data":["\u5185\u5b54\u9557\u5200","\u5916\u5f84\u7cbe\u8f66-55\u5ea6","\u5916\u5f84\u5f00\u7c97","\u5916\u5f84\u5f00\u7c97-55\u5ea6","\u5916\u5f84\u7cbe\u8f66-35\u5ea6","\u5916\u5f84\u69fd\u5200","\u7aef\u9762\u69fd\u5200","\u5207\u65ad\u5200","\u87ba\u7eb9\u5200","\u5b9a\u70b9\u94bb","\u4e2d\u5fc3\u94bb","U\u94bb","\u94e3\u5200","\u94f0\u5200","T\u578b\u94e3\u5200","\u5408\u91d1\u6d82\u5c42\u94e3\u5200","\u5408\u91d1T\u578b\u94e3\u5200","\u5207\u69fd\u5200","\u952f\u9f7f\u94e3\u5200","\u767d\u94a2\u94e3\u5200","\u5408\u91d1\u7403\u5934\u94e3\u5200","\u6ce2\u5203\u94e3\u5200","\u8d70\u5fc3\u673a\u5207\u65ad","\u5916\u5f84\u7cbe\u8f66\u5200","\u5916\u5f84\u9884\u5207\u69fd\u5200","\u5916\u5f84\u5f00\u7c97\u5200","\u5916\u5f84\u7c97\u52a0\u5de5","\u5916\u5f84\u7cbe\u52a0\u5de5","\u94e3\u520013.14","\u5b9a\u70b9\u94bb4.0","2.0\u4e0d\u9508\u94a2\u9ebb\u82b1\u94bb","\u5408\u91d1\u94bb\u5934","\u5408\u91d1\u94e3\u5200","\u6210\u578b\u5200","\u4e1d\u9525","\u5916\u5f84\u7c97\u8f66\u5200","\u69fd\u5200","\u5916\u5706\u7cbe\u8f66\u5200"]}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 根据产线层级获取刀具类型
     * @desc  根据产线层级获取刀具类型
     * @url ?_controller=Handler&_function=ToolSupplier&__function=GetToolTypes
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"success","data":["\u5916\u5f84\u5f00\u7c97","\u5916\u5f84\u7cbe\u8f66-55\u5ea6","\u5916\u5f84\u69fd\u5200","\u5b9a\u70b9\u94bb","\u5916\u5f84\u7cbe\u8f66-35\u5ea6","\u5185\u5b54\u9557\u5200","\u5207\u65ad\u5200","\u5916\u5f84\u7cbe\u8f66\u5200","\u5916\u5f84\u9884\u5207\u69fd\u5200","\u5408\u91d1\u7403\u5934\u94e3\u5200","\u5b9a\u70b9\u94bb4.0","\u94e3\u520013.14","2.0\u4e0d\u9508\u94a2\u9ebb\u82b1\u94bb","\u5916\u5f84\u5f00\u7c97\u5200","\u5916\u5f84\u7c97\u8f66\u5200","\u8d70\u5fc3\u673a\u5207\u65ad","U\u94bb","\u5408\u91d1\u94bb\u5934","\u5408\u91d1\u94e3\u5200","\u6210\u578b\u5200","\u4e1d\u9525","\u69fd\u5200","\u5916\u5706\u7cbe\u8f66\u5200"]}
     */
    public function GetToolTypes(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"success","data":["\u5916\u5f84\u5f00\u7c97","\u5916\u5f84\u7cbe\u8f66-55\u5ea6","\u5916\u5f84\u69fd\u5200","\u5b9a\u70b9\u94bb","\u5916\u5f84\u7cbe\u8f66-35\u5ea6","\u5185\u5b54\u9557\u5200","\u5207\u65ad\u5200","\u5916\u5f84\u7cbe\u8f66\u5200","\u5916\u5f84\u9884\u5207\u69fd\u5200","\u5408\u91d1\u7403\u5934\u94e3\u5200","\u5b9a\u70b9\u94bb4.0","\u94e3\u520013.14","2.0\u4e0d\u9508\u94a2\u9ebb\u82b1\u94bb","\u5916\u5f84\u5f00\u7c97\u5200","\u5916\u5f84\u7c97\u8f66\u5200","\u8d70\u5fc3\u673a\u5207\u65ad","U\u94bb","\u5408\u91d1\u94bb\u5934","\u5408\u91d1\u94e3\u5200","\u6210\u578b\u5200","\u4e1d\u9525","\u69fd\u5200","\u5916\u5706\u7cbe\u8f66\u5200"]}';
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
            'getList'=>[
                'data' => ['name' => 'data', 'type' => 'array', 'require' => 'true', 'default' => '', 'desc' => 'name(刀具名称)，brand(刀具品牌)，supplier(供应商)，start(价格起始)，end(价格结束)，toexcel(1导出)，page，pagesize', 'range' => '',],
            ],
            'GetDropDownList'=>[
        
            ],
            'GetDropDownList2'=>[
                'toolname' => ['name' => 'toolname', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => 'toolname(刀具名称)', 'range' => '',],
            ],
            'GetDropDownList3'=>[
                'toolname' => ['name' => 'toolname', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => 'toolname(刀具名称)', 'range' => '',],
                'brand' => ['name' => 'brand', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '品牌', 'range' => '',],
            ],
            'GetToolSupplierDropDownList'=>[
        
            ],
            'GetToolTypes'=>[
                'data' => ['name' => 'data', 'type' => 'array', 'require' => 'true', 'default' => '', 'desc' => 'sectionid(产线层级id)', 'range' => '',],
            ],

        ];

        return $rules;
    }


}