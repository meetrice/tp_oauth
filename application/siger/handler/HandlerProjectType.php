<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerProjectType 
 * @title 项目类型
 * @url  http://61.177.28.246:8100/Config
 * @desc  项目类型
 * @version 1.0
 * @readme 
 */
class HandlerProjectType
{

	public $restMethodList = 'getProjectTypeLists|GetProjectType|GetProjectType2|addProjectType|getProjectTypeInfoOne|editProjectType|deleteProjectType';

     /**
     * @title 获得项目类型列表 [项目管理 - 项目设置 -项目类型设置]
     * @desc  获得项目类型列表 [项目管理 - 项目设置 -项目类型设置]
     * @url Project/getProjectTypeLists
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"列表成功","data":[{"id":"1","name":"项目类型名称","description":"项目类型描述","flag":"标签"}],"total":"1" ,"page": 1,"pagesize": 200}
     */
    public function getProjectTypeLists(Request $request)
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
     * @title [项目管理 -> 项目类型 下拉列表]
     * @desc  [项目管理 -> 项目类型 下拉列表]
     * @url ProjectType/GetProjectType
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"21","name":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406-\u5e9f\u5f03","description":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406","roleid":"86","flag":"v,b","icon":"http:\/\/cloud.siger-data.com\/Upload\/image\/2018-01-24\/ad28acf9ef289ce850f098ed845d823e.png","status":"1"},{"id":"31","name":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406","description":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406-43\u9879\u6743\u9650","roleid":"87","flag":"TPM","icon":"","status":"1"},{"id":"32","name":"\u6570\u5b57\u5316\u5de5\u5382","description":"\u5355\u72ec\u6570\u5b57\u5316\u5de5\u5382-22\u9879\u6743\u9650","roleid":"91","flag":"DWS","icon":"","status":"1"},{"id":"33","name":"\u5200\u5177\u7ba1\u7406","description":"\u5355\u72ec\u5200\u5177\u667a\u80fd\u7ba1\u7406-27\u9879\u6743\u9650","roleid":"92","flag":"Tooling","icon":"","status":"1"},{"id":"34","name":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406+\u6570\u5b57\u5316\u5de5\u5382","description":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406+\u6570\u5b57\u5316\u5de5\u5382-54\u9879\u6743\u9650","roleid":"93","flag":"TPM,DWS","icon":"","status":"1"},{"id":"35","name":"\u5168\u90e8\u6a21\u5757","description":"\u5168\u90e8\u6a21\u5757","roleid":"94","flag":"All","icon":"","status":"1"},{"id":"36","name":"\u6743\u9650\u6d4b\u8bd5","description":"\u6d4b\u8bd5-22333","roleid":"104","flag":"test","icon":"","status":"1"},{"id":"37","name":"\u9547\u6c5f\u83f2\u820d\u5c14","description":"\u83f2\u820d\u5c14\u4e13\u7528","roleid":"106","flag":"fesher","icon":"","status":"1"},{"id":"41","name":"\u5bc6\u5361\u4e13\u7528","description":"\u53ea\u9700\u8981\u6570\u5b57\u5316\u5de5\u5382","roleid":"123","flag":"cnc","icon":"","status":"1"},{"id":"43","name":"\u8d85\u7ea7\u7ba1\u7406\u5458\u6743\u9650","description":"\u8d85\u7ea7\u7ba1\u7406\u5458\u6743\u9650","roleid":"126","flag":"1","icon":"","status":"1"},{"id":"44","name":"\u6f14\u793a\u8d26\u6237","description":"\u6f14\u793a","roleid":"127","flag":"aq","icon":"","status":"1"},{"id":"45","name":"\u4e5d\u90a6\u7528","description":"\u4e5d\u90a6\u7528","roleid":"128","flag":"jb","icon":"","status":"1"},{"id":"47","name":"\u6d4b\u8bd5\u7c7b\u578b0320","description":"asas","roleid":"136","flag":"11111","icon":"","status":"1"},{"id":"48","name":"\u5929\u5408\u6c7d\u8f66","description":"\u5929\u5408\u6c7d\u8f66","roleid":"148","flag":"TRW","icon":"","status":"1"},{"id":"49","name":"\u53ea\u8981CNC","description":"\u53ea\u8981CNC","roleid":"150","flag":"\u53ea\u8981CNC","icon":"","status":"1"},{"id":"50","name":"\u4e2d\u94c1\u5b9d\u6865\u9879\u76ee","description":"TPM","roleid":"151","flag":"TPM","icon":"","status":"1"},{"id":"51","name":"\u5965\u7279\u51ef\u59c6","description":"\u5965\u7279\u51ef\u59c6","roleid":"408","flag":"1","icon":"","status":"1"},{"id":"52","name":"\u6d4b\u8bd50427","description":"\u6d4b\u8bd50427","roleid":"410","flag":"a","icon":"","status":"1"},{"id":"53","name":"0428\u6d4b\u8bd5\u4e13\u7528","description":"\u7528\u4e8e\u6d4b\u8bd5","roleid":"416","flag":"\u6807\u7b7e,dsjkh","icon":"","status":"1"},{"id":"58","name":"fd","description":"f","roleid":"432","flag":"d","icon":"","status":"1"},{"id":"59","name":"\u8363\u817e","description":"\u8363\u817e","roleid":"433","flag":"\u8363\u817e","icon":"","status":"1"},{"id":"60","name":"\u9879\u76ee\u7c7b\u578b\u9009\u62e9","description":"\u9879\u76ee\u7c7b\u578b\u63cf\u8ff0","roleid":"435","flag":"1","icon":"","status":"1"},{"id":"61","name":"\u631a\u4f18\u9879\u76ee","description":"\u631a\u4f18\u631a\u4f18","roleid":"446","flag":"\u631a\u4f18","icon":"","status":"1"},{"id":"65","name":"\u6d77\u7279\u514b","description":"\u6e29\u5dde\u6d77\u7279\u514b","roleid":"475","flag":"","icon":"","status":"1"},{"id":"66","name":"\u4e07\u79d1","description":"\u4e07\u79d1\u56fd\u9645\uff0c\u8fd9\u662f\u4e00\u4e2a\u623f\u5730\u4ea7\u516c\u53f8","roleid":"477","flag":"\u623f\u5730\u4ea7\uff0c\u56fd\u9645","icon":"","status":"1"}],"total":"25","page":1,"pagesize":200}
     */
    public function GetProjectType(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"21","name":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406-\u5e9f\u5f03","description":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406","roleid":"86","flag":"v,b","icon":"http:\/\/cloud.siger-data.com\/Upload\/image\/2018-01-24\/ad28acf9ef289ce850f098ed845d823e.png","status":"1"},{"id":"31","name":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406","description":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406-43\u9879\u6743\u9650","roleid":"87","flag":"TPM","icon":"","status":"1"},{"id":"32","name":"\u6570\u5b57\u5316\u5de5\u5382","description":"\u5355\u72ec\u6570\u5b57\u5316\u5de5\u5382-22\u9879\u6743\u9650","roleid":"91","flag":"DWS","icon":"","status":"1"},{"id":"33","name":"\u5200\u5177\u7ba1\u7406","description":"\u5355\u72ec\u5200\u5177\u667a\u80fd\u7ba1\u7406-27\u9879\u6743\u9650","roleid":"92","flag":"Tooling","icon":"","status":"1"},{"id":"34","name":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406+\u6570\u5b57\u5316\u5de5\u5382","description":"\u8bbe\u5907\u7ef4\u62a4\u7ba1\u7406+\u6570\u5b57\u5316\u5de5\u5382-54\u9879\u6743\u9650","roleid":"93","flag":"TPM,DWS","icon":"","status":"1"},{"id":"35","name":"\u5168\u90e8\u6a21\u5757","description":"\u5168\u90e8\u6a21\u5757","roleid":"94","flag":"All","icon":"","status":"1"},{"id":"36","name":"\u6743\u9650\u6d4b\u8bd5","description":"\u6d4b\u8bd5-22333","roleid":"104","flag":"test","icon":"","status":"1"},{"id":"37","name":"\u9547\u6c5f\u83f2\u820d\u5c14","description":"\u83f2\u820d\u5c14\u4e13\u7528","roleid":"106","flag":"fesher","icon":"","status":"1"},{"id":"41","name":"\u5bc6\u5361\u4e13\u7528","description":"\u53ea\u9700\u8981\u6570\u5b57\u5316\u5de5\u5382","roleid":"123","flag":"cnc","icon":"","status":"1"},{"id":"43","name":"\u8d85\u7ea7\u7ba1\u7406\u5458\u6743\u9650","description":"\u8d85\u7ea7\u7ba1\u7406\u5458\u6743\u9650","roleid":"126","flag":"1","icon":"","status":"1"},{"id":"44","name":"\u6f14\u793a\u8d26\u6237","description":"\u6f14\u793a","roleid":"127","flag":"aq","icon":"","status":"1"},{"id":"45","name":"\u4e5d\u90a6\u7528","description":"\u4e5d\u90a6\u7528","roleid":"128","flag":"jb","icon":"","status":"1"},{"id":"47","name":"\u6d4b\u8bd5\u7c7b\u578b0320","description":"asas","roleid":"136","flag":"11111","icon":"","status":"1"},{"id":"48","name":"\u5929\u5408\u6c7d\u8f66","description":"\u5929\u5408\u6c7d\u8f66","roleid":"148","flag":"TRW","icon":"","status":"1"},{"id":"49","name":"\u53ea\u8981CNC","description":"\u53ea\u8981CNC","roleid":"150","flag":"\u53ea\u8981CNC","icon":"","status":"1"},{"id":"50","name":"\u4e2d\u94c1\u5b9d\u6865\u9879\u76ee","description":"TPM","roleid":"151","flag":"TPM","icon":"","status":"1"},{"id":"51","name":"\u5965\u7279\u51ef\u59c6","description":"\u5965\u7279\u51ef\u59c6","roleid":"408","flag":"1","icon":"","status":"1"},{"id":"52","name":"\u6d4b\u8bd50427","description":"\u6d4b\u8bd50427","roleid":"410","flag":"a","icon":"","status":"1"},{"id":"53","name":"0428\u6d4b\u8bd5\u4e13\u7528","description":"\u7528\u4e8e\u6d4b\u8bd5","roleid":"416","flag":"\u6807\u7b7e,dsjkh","icon":"","status":"1"},{"id":"58","name":"fd","description":"f","roleid":"432","flag":"d","icon":"","status":"1"},{"id":"59","name":"\u8363\u817e","description":"\u8363\u817e","roleid":"433","flag":"\u8363\u817e","icon":"","status":"1"},{"id":"60","name":"\u9879\u76ee\u7c7b\u578b\u9009\u62e9","description":"\u9879\u76ee\u7c7b\u578b\u63cf\u8ff0","roleid":"435","flag":"1","icon":"","status":"1"},{"id":"61","name":"\u631a\u4f18\u9879\u76ee","description":"\u631a\u4f18\u631a\u4f18","roleid":"446","flag":"\u631a\u4f18","icon":"","status":"1"},{"id":"65","name":"\u6d77\u7279\u514b","description":"\u6e29\u5dde\u6d77\u7279\u514b","roleid":"475","flag":"","icon":"","status":"1"},{"id":"66","name":"\u4e07\u79d1","description":"\u4e07\u79d1\u56fd\u9645\uff0c\u8fd9\u662f\u4e00\u4e2a\u623f\u5730\u4ea7\u516c\u53f8","roleid":"477","flag":"\u623f\u5730\u4ea7\uff0c\u56fd\u9645","icon":"","status":"1"}],"total":"25","page":1,"pagesize":200}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }

        /**
     * @title [项目管理 -> 添加页面-> 项目类型下拉列表]
     * @desc  [项目管理 -> 添加页面-> 项目类型下拉列表]
     * @url ProjectType/GetProjectType2
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {}
     */
    public function GetProjectType2(Request $request)
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
     * @title 添加项目类型[项目管理 - 项目设置 -项目类型设置]
     * @desc  添加项目类型[项目管理 - 项目设置 -项目类型设置]
     * @url ProjectType/addProjectType
     * @method POST
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function addProjectType(Request $request)
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
     * @title 获得项目类型详情[项目管理 - 项目设置 -项目类型设置]
     * @desc  获得项目类型详情[项目管理 - 项目设置 -项目类型设置]
     * @url ProjectType/getProjectTypeInfoOne
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":{"id":70,"name":"aabbb","description":"aaaa","roleid":"506","flag":"bbb","icon":"","status":1}}
     */
    public function getProjectTypeInfoOne(Request $request)
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
     * @title 修改项目类型[项目管理 - 项目设置 -项目类型设置]
     * @desc  修改项目类型[项目管理 - 项目设置 -项目类型设置]
     * @url ProjectType/editProjectType
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function editProjectType(Request $request)
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
     * @title 删除项目类型[项目管理 - 项目设置 -项目类型设置]
     * @desc  删除项目类型[项目管理 - 项目设置 -项目类型设置]
     * @url ProjectType/deleteProjectType
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function deleteProjectType(Request $request)
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
                'GetProjectType'=>[
                    
                ],
                'GetProjectType2'=>[
                    
                ],
                'getProjectTypeLists'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '项目id', 'range' => '',],
                ],               
                 'getProjectTypeInfoOne'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '项目类型id', 'range' => '',],
                ],                 
                'deleteProjectType'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '项目类型id', 'range' => '',],
                ],
                'addProjectType'=>[
                    'name' => ['name' => 'name', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '项目类型名称', 'range' => '',],
                    'description' => ['name' => 'description', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '项目类型描述', 'range' => '',],
                    'flag' => ['name' => 'flag', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '标签', 'range' => '',],
                ],             
                'editProjectType'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => 'ID', 'range' => '',],
                    'name' => ['name' => 'name', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '项目类型名称', 'range' => '',],
                    'description' => ['name' => 'description', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '项目类型描述', 'range' => '',],
                    'flag' => ['name' => 'flag', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '标签', 'range' => '',],
                ],
                
        ];
      
        return $rules;
    }


}