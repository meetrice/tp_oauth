<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerProject 
 * @title 项目管理
 * @url  http://61.177.28.246:8100/Config
 * @desc  项目管理
 * @version 1.0
 * @readme 
 */
class HandlerProject
{

	public $restMethodList = 'getLists|GetProjectItem';

 
    /**
     * @title 项目管理 获得主分页列表
     * @desc  项目管理  获得主分页列表 需接口改造 原ConsoleProject 76行 118行
     * @url Project/getLists
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"列表成功","data":[{"0":"0","id":"1","title":"项目名称","typename":"项目类型","description":"项目描述","companyname":"企业","creatname":"创建者","responsiblename":"负责人管理员名称","mobile":"登陆账号","salename":"销售负责销售","initialquotation":"初步报价","finaloffer":"最终报价"}],"total":"1"}
     */
    public function getLists(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }

        /**
     * @title 项目管理 修改根据ID获得项目详情
     * @desc  项目管理 修改根据ID获得项目详情
     * @url Project/GetProjectItem
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"title":"\u5929\u5408\u6c7d\u8f66\u5200\u5177\u667a\u80fd\u7ba1\u7406","description":"","initialquotation":"0","finaloffer":"0","dutymid":"504","companyid":"48","creatname":"\u59da\u5efa\u56fd","responsibleid":"504","managename":"\u5929\u5408\u7ba1\u7406\u5458","managemobile":"trwtooling","saleid":"39","typeid":"48"}],"total":"1"}
     */
    public function GetProjectItem(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"title":"\u5929\u5408\u6c7d\u8f66\u5200\u5177\u667a\u80fd\u7ba1\u7406","description":"","initialquotation":"0","finaloffer":"0","dutymid":"504","companyid":"48","creatname":"\u59da\u5efa\u56fd","responsibleid":"504","managename":"\u5929\u5408\u7ba1\u7406\u5458","managemobile":"trwtooling","saleid":"39","typeid":"48"}],"total":"1"}';
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
                'getLists'=>[
                    'page' => ['name' => 'page', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '页数', 'range' => '',],
                    'pageSize' => ['name' => 'pageSize', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '每页条数', 'range' => '',],
                ],
                'GetProjectItem'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '项目id', 'range' => '',],
                ]
                
        ];
      
        return $rules;
    }


}