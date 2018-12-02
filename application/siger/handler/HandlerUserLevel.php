<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerUserLevel
 * @title UserLevel
 * @url  http://server
 * @desc  UserLevel
 * @version 1.0
 * @readme /doc/md/HandlerUserLevel.md
 */
class HandlerUserLevel
{
    public $restMethodList = 'getCurrentUserProjectLevel|getLevelById|getLevelChildrenById';

    /**
     * @title 获取最高层级
     * @desc  获取最高层级
     * @url ?_controller=Handler&_function=UserLevel&__function=getCurrentUserProjectLevel
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"OK","data":[{"id":316,"title":"\u516c\u53f8","levelid":20},{"id":317,"title":"\u5de5\u4f4d","levelid":30}]}
     */
    public function getCurrentUserProjectLevel(Request $request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"OK","data":[{"id":316,"title":"\u516c\u53f8","levelid":20},{"id":317,"title":"\u5de5\u4f4d","levelid":30}]}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }

    /**
     * @title 获取第一层级
     * @desc  获取第一层级
     * @url ?_controller=Handler&_function=UserLevel&__function=getLevelById
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"OK","data":[{"id":568,"title":"\u4e5d\u90a6\u673a\u7535","levelid":316}]}
     */
    public function getLevelById($request)
    {
        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"OK","data":[{"id":568,"title":"\u4e5d\u90a6\u673a\u7535","levelid":316}]}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }
        return json(json_decode($ret), $code);
    }

    /**
     * @title 获取第二层级
     * @desc  获取第二层级
     * @url ?_controller=Handler&_function=UserLevel&__function=getLevelChildrenById
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"OK","data":[{"id":569,"title":"jcc_1","levelid":317,"isStation":true},{"id":570,"title":"z_1","levelid":317,"isStation":true}]}
     */
    public function getLevelChildrenById($request)
    {
        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"OK","data":[{"id":569,"title":"jcc_1","levelid":317,"isStation":true},{"id":570,"title":"z_1","levelid":317,"isStation":true}]}';
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
            'getCurrentUserProjectLevel'=>[

            ],
            'getLevelById'=>[
                'id' => ['name' => 'id', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => 'id', 'range' => '',],
            ],
            'getLevelChildrenById'=>[
                'id' => ['name' => 'id', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => 'id', 'range' => '',],
            ],

        ];

        return $rules;
    }


}