<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerProjectLevel 
 * @title 项目等级设置
 * @url  http://61.177.28.246:8100/Config
 * @desc  项目等级设置
 * @version 1.0
 * @readme 
 */
class HandlerProjectLevel
{

	public $restMethodList = 'getProjectLevelLists|getProjectListsWithout|getMainLevelLists|getMachineCheckLists|addCustomLevel|getCustomLevelById|updateCustomLevel|deleteCustomLevel';

 
    /**
     * @title 得到上级备件类型列表 [项目管理 - 项目等级设置]
     * @desc  得到上级备件类型列表 [项目管理 - 项目等级设置]
     * @url ProjectLevel/getProjectLevelLists
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example { "ret": 1, "msg": "获取成功", "data": [ { "id": "25", "title": "上级备件类型"} ], "total": "1", "page": 1, "pagesize": 10 } 
     */
    public function getProjectLevelLists(Request $request)
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
     * @title 请从主级别中选择需要的级别 [添加项目层级表单中的多选]
     * @desc  请从主级别中选择需要的级别 [添加项目层级表单中的多选]
     * @url ProjectLevel/getMainLevelLists
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6570\u636e\u6210\u529f","data":[{"id":18,"title":"\u96c6\u56e2"},{"id":19,"title":"\u4e8b\u4e1a\u90e8"},{"id":20,"title":"\u516c\u53f8"},{"id":23,"title":"\u4ef7\u503c\u6d41"},{"id":24,"title":"\u751f\u4ea7\u7ebf"},{"id":25,"title":"\u8f66\u95f4"},{"id":26,"title":"\u5355\u5143"},{"id":30,"title":"\u5de5\u4f4d"}]}
     */
    public function getMainLevelLists(Request $request)
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
     * @title 选择需要设置级别的项目 [添加项目层级表单中的下拉]
     * @desc  选择需要设置级别的项目 [添加项目层级表单中的下拉]
     * @url ProjectLevel/getProjectListsWithout
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6570\u636e\u6210\u529f","data":[{"id":61,"title":"\u4e09\u53cb\u6d4b\u8bd5\u9879\u76ee"},{"id":63,"title":"\u6dfb\u52a0\u590f\u76ee"},{"id":65,"title":"123123"},{"id":83,"title":"\u4e2d\u94c1\u5b9d\u6865\u8bbe\u5907\u667a\u80fd\u7ef4\u62a4\u7ba1\u7406"},{"id":96,"title":"etafaaaa"},{"id":107,"title":"\u6d4b\u8bd5\u9879\u76ee2"}]}
     */
    public function getProjectListsWithout(Request $request)
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
     * @title getMachineCheckLists[添加项目层级表单中使用,作用未明]
     * @desc  getMachineCheckLists[添加项目层级表单中使用,作用未明]
     * @url MachineCheck/getMachineCheckLists
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":0,"msg":"Data not found"}
     */
    public function getMachineCheckLists(Request $request)
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
     * @title 添加项目层级
     * @desc  添加项目层级,其中levelarr为数组
     * @url ProjectLevel/addCustomLevel
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function addCustomLevel(Request $request)
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
     * @title 获得项目等级详情[项目等级设置 - 修改]
     * @desc  获得项目等级详情[项目等级设置 - 修改]
     * @url ProjectLevel/getCustomLevelById
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"OK","data":{"id":294,"title":"\u6d4b\u8bd5\u9879\u76ee\u96c6\u56e2","description":"","projectid":19,"parentid":0,"cout":0}}
     */
    public function getCustomLevelById(Request $request)
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
     * @title 修改项目层级
     * @desc  修改项目层级
     * @url ProjectLevel/updateCustomLevel
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function updateCustomLevel(Request $request)
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
     * @title  清空选中项目层级
     * @desc   清空选中项目层级
     * @url ProjectLevel/deleteCustomLevel
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function deleteCustomLevel(Request $request)
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
                'getProjectLevelLists'=>[
                    'id' => ['name' => 'id', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '项目id', 'range' => '',],
                    
                ],
                'getMainLevelLists'=>[

                    
                ],
                'getProjectListsWithout'=>[

                    
                ],
                'getMachineCheckLists'=>[

                    
                ],                
                'getCustomLevelById'=>[

                 'id' => ['name' => 'id', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                ],                  
                'deleteCustomLevel'=>[

                 'id' => ['name' => 'id', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                ],              
                'updateCustomLevel'=>[

                 'id' => ['name' => 'id', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                 'base[title]' => ['name' => 'base[title]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '级别名称', 'range' => '',],
                ],
                'addCustomLevel'=>[
                    'base[projectid]' => ['name' => 'base[projectid]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '项目id', 'range' => '',],
                    'base[levelarr][0][title]' => ['name' => 'base[levelarr][0][title]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '级别名称', 'range' => '',],
                    'base[levelarr][0][levelid]' => ['name' => 'base[levelarr][0][levelid]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '级别id', 'range' => '',],

                    
                ]
                
        ];
      
        return $rules;
    }


}