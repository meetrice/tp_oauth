<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerCompany
 * @title 角色列表
 * @url  http://61.177.28.246:8100/Config
 * @desc  角色列表
 * @version 1.0
 * @readme /doc/md/HandlerCompany.md
 */
class HandlerUserRole
{

	public $restMethodList = 'getUserRoleList';

 
    /**
     * @title 角色列表
     * @desc  角色列表
     * @url Company/Getcompanylist
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"1","name":"\u8d85\u7ea7\u7ba1\u7406\u5458","description":"\u8d85\u7ea7\u7ba1\u7406\u5458","status":"1","type":"1","userlevel":"0"},{"id":"2","name":"\u552e\u524d","description":"\u552e\u524d\u4eba\u5458","status":"1","type":"1","userlevel":"0"},{"id":"3","name":"\u552e\u540e","description":"\u552e\u540e","status":"1","type":"1","userlevel":"0"},{"id":"4","name":"\u5ba2\u6237\u8d85\u7ea7\u7ba1\u7406\u5458","description":"\u5ba2\u6237\u8d85\u7ea7\u7ba1\u7406\u5458","status":"1","type":"1","userlevel":"1"},{"id":"7","name":"\u5de5\u7a0b\u5e08","description":"\u5de5\u7a0b\u5e08","status":"1","type":"1","userlevel":"0"},{"id":"65","name":"TPM\u8d85\u7ea7\u7ba1\u7406\u5458","description":"TPM\u6a21\u5757\u5355\u72ec\u7528","status":"1","type":"1","userlevel":"0"},{"id":"66","name":"\u6570\u5b57\u5316\u5de5\u5382\u8d85\u7ea7\u7ba1\u7406\u5458","description":"\u6570\u5b57\u5316\u5de5\u5382\u5355\u72ec\u7528","status":"1","type":"1","userlevel":"0"},{"id":"415","name":"\u8fd0\u7ef4\u5de5\u7a0b\u5e08","description":"\u8fd0\u7ef4","status":"1","type":"1","userlevel":"0"},{"id":"436","name":"\u8d28\u91cf\u5de5\u7a0b\u5e08","description":"\u7ef4\u62a4\u8d28\u91cf","status":"1","type":"1","userlevel":"0"},{"id":"479","name":"QA","description":"\u8d28\u91cf\u4fdd\u8bc1\u4eba\u54582","status":"1","type":"1","userlevel":"0"}],"total":"10","page":1,"pagesize":10}
     */
    public function getUserRoleList(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"1","name":"\u8d85\u7ea7\u7ba1\u7406\u5458","description":"\u8d85\u7ea7\u7ba1\u7406\u5458","status":"1","type":"1","userlevel":"0"},{"id":"2","name":"\u552e\u524d","description":"\u552e\u524d\u4eba\u5458","status":"1","type":"1","userlevel":"0"},{"id":"3","name":"\u552e\u540e","description":"\u552e\u540e","status":"1","type":"1","userlevel":"0"},{"id":"4","name":"\u5ba2\u6237\u8d85\u7ea7\u7ba1\u7406\u5458","description":"\u5ba2\u6237\u8d85\u7ea7\u7ba1\u7406\u5458","status":"1","type":"1","userlevel":"1"},{"id":"7","name":"\u5de5\u7a0b\u5e08","description":"\u5de5\u7a0b\u5e08","status":"1","type":"1","userlevel":"0"},{"id":"65","name":"TPM\u8d85\u7ea7\u7ba1\u7406\u5458","description":"TPM\u6a21\u5757\u5355\u72ec\u7528","status":"1","type":"1","userlevel":"0"},{"id":"66","name":"\u6570\u5b57\u5316\u5de5\u5382\u8d85\u7ea7\u7ba1\u7406\u5458","description":"\u6570\u5b57\u5316\u5de5\u5382\u5355\u72ec\u7528","status":"1","type":"1","userlevel":"0"},{"id":"415","name":"\u8fd0\u7ef4\u5de5\u7a0b\u5e08","description":"\u8fd0\u7ef4","status":"1","type":"1","userlevel":"0"},{"id":"436","name":"\u8d28\u91cf\u5de5\u7a0b\u5e08","description":"\u7ef4\u62a4\u8d28\u91cf","status":"1","type":"1","userlevel":"0"},{"id":"479","name":"QA","description":"\u8d28\u91cf\u4fdd\u8bc1\u4eba\u54582","status":"1","type":"1","userlevel":"0"}],"total":"10","page":1,"pagesize":10}';
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
                'getUserRoleList'=>[
                    'chinesename' => ['name' => 'chinesename', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '名称', 'range' => '',],
                    'province' => ['name' => 'province', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '省份', 'range' => '',],
                    'city' => ['name' => 'city', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '城市', 'range' => '',],
                    'county' => ['name' => 'county', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '国家', 'range' => '',],
                    'industry_first' => ['name' => 'industry_first', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '', 'range' => '',],
                    'industry_second' => ['name' => 'industry_second', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '', 'range' => '',],
                    'page' => ['name' => 'page', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '页数', 'range' => '',],
                    'pagesize' => ['name' => 'pagesize', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '每页条数', 'range' => '',],
                ]
                
        ];
      
        return $rules;
    }


}