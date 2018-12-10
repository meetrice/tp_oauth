<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerLevel 
 * @title 总等级设置
 * @url  http://61.177.28.246:8100/Config
 * @desc  总等级设置
 * @version 1.0
 * @readme 
 */
class HandlerLevel
{

	public $restMethodList = 'getAllLevel|getLevel|getIdLevel|addLevel|updateLevel|deleteLevel';

    /**
     * @title 项目设置 总等级设置 标签页  获得所有等级列表
     * @desc  项目设置 总等级设置 标签页  获得所有等级列表
     * @url Level/getAllLevel
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"列表成功","data":[{"id":"1","title":"西门子机床001","description":"PLC000001"}],"total":"1"}
     */
    public function getAllLevel(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"列表成功","data":[{"id":"1","title":"西门子机床001","description":"PLC000001"}],"total":"1"}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }
 
    /**
     * @title 总等级设置  获得父级下拉列表
     * @desc  总等级设置  获得父级下拉列表
     * @url Level/getLevel
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6570\u636e\u6210\u529f","page":0,"pagesize":0,"total":8,"data":[{"id":18,"title":"\u96c6\u56e2","description":""},{"id":19,"title":"\u4e8b\u4e1a\u90e8","description":""},{"id":20,"title":"\u516c\u53f8","description":""},{"id":23,"title":"\u4ef7\u503c\u6d41","description":""},{"id":24,"title":"\u751f\u4ea7\u7ebf","description":""},{"id":25,"title":"\u8f66\u95f4","description":""},{"id":26,"title":"\u5355\u5143","description":""},{"id":30,"title":"\u5de5\u4f4d","description":""}]}
     */
    public function getLevel(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6570\u636e\u6210\u529f","page":0,"pagesize":0,"total":8,"data":[{"id":18,"title":"\u96c6\u56e2","description":""},{"id":19,"title":"\u4e8b\u4e1a\u90e8","description":""},{"id":20,"title":"\u516c\u53f8","description":""},{"id":23,"title":"\u4ef7\u503c\u6d41","description":""},{"id":24,"title":"\u751f\u4ea7\u7ebf","description":""},{"id":25,"title":"\u8f66\u95f4","description":""},{"id":26,"title":"\u5355\u5143","description":""},{"id":30,"title":"\u5de5\u4f4d","description":""}]}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }

        /**
     * @title 修改获得详情
     * @desc  修改获得详情
     * @url Level/getIdLevel
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6570\u636e\u6210\u529f","data":{"id":23,"title":"\u4ef7\u503c\u6d41","description":"","parentid":20}}
     */
    public function getIdLevel(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6570\u636e\u6210\u529f","data":{"id":23,"title":"\u4ef7\u503c\u6d41","description":"","parentid":20}}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }
    /**
     * @title 添加总等级设置
     * @desc  添加总等级设置
     * @url Level/addLevel
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号

     * @example {}
     */
    public function addLevel(Request $request)
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
     * @title 修改总等级设置
     * @desc  修改总等级设置
     * @url Level/addLevel
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号

     * @example {}
     */
    public function updateLevel(Request $request)
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
     * @title 删除总等级
     * @desc  删除总等级
     * @url Level/deleteLevel
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function deleteLevel(Request $request)
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
                'getAllLevel'=>[
                    'page' => ['name' => 'page', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '页数', 'range' => '',],
                    'pageSize' => ['name' => 'pageSize', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '每页条数', 'range' => '',],
                ],
                'getLevel'=>[
                    
                ],
                'getIdLevel'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                    
                ],
                'addLevel'=>[
                    'base[parentid]' => ['name' => 'base[parentid]', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '选择父级', 'range' => '',],
                    'base[title]' => ['name' => 'base[title]', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '级别名称', 'range' => '',],
                    'base[description]' => ['name' => 'base[description]', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '级别描述', 'range' => '',],
                    
                ],
                'updateLevel'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                     'base[parentid]' => ['name' => 'base[parentid]', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '选择父级', 'range' => '',],
                    'base[title]' => ['name' => 'base[title]', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '级别名称', 'range' => '',],
                    'base[description]' => ['name' => 'base[description]', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '级别描述', 'range' => '',],
                ],
                'deleteLevel'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                    
                ],
                
        ];
      
        return $rules;
    }


}
