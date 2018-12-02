<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerCompany
 * @title 权限维护
 * @url  http://61.177.28.246:8100/Config
 * @desc  权限维护
 * @version 1.0
 * @readme /doc/md/HandlerCompany.md
 */
class HandlerUserPower
{

	public $restMethodList = 'getUserPowerList';

 
    /**
     * @title 权限维护
     * @desc  权限维护
     * @url Company/Getcompanylist
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"1","name":"\u4f01\u4e1a\u7ba1\u7406","description":"\u4f01\u4e1a\u5ba2\u6237\u7ba1\u7406","value":"company","status":"1","parent":"0","parentvalue":null},{"id":"2","name":"\u4f01\u4e1a\u5217\u8868","description":"\u4f01\u4e1a\u5217\u8868","value":"company:list","status":"1","parent":"1","parentvalue":"company"},{"id":"3","name":"\u9879\u76ee\u7ba1\u7406","description":"\u9879\u76ee\u7ba1\u7406","value":"project","status":"1","parent":"0","parentvalue":null},{"id":"4","name":"\u9879\u76ee\u5217\u8868(\u9879\u76ee\u7ba1\u7406)","description":"\u5217\u8868\u5c55\u793a","value":"project:list","status":"1","parent":"3","parentvalue":"project"},{"id":"5","name":"\u9879\u76ee\u8bbe\u7f6e","description":"\u9879\u76ee\u8bbe\u7f6e\uff08\u603b\u7b49\u7ea7\u8bbe\u7f6e\u548c\u7c7b\u578b\u8bbe\u7f6e\uff09","value":"project:setting","status":"1","parent":"3","parentvalue":"project"},{"id":"6","name":"\u9879\u76ee\u7b49\u7ea7\u914d\u7f6e","description":"\u57fa\u7840\u7b49\u7ea7\u914d\u7f6e","value":"project:level","status":"1","parent":"3","parentvalue":"project"},{"id":"7","name":"\u6743\u9650\u7ba1\u7406","description":"\u6743\u9650\u7ba1\u7406","value":"power","status":"1","parent":"0","parentvalue":null},{"id":"8","name":"\u89d2\u8272\u5217\u8868","description":"\u89d2\u8272\u5217\u8868","value":"power:rolelist","status":"1","parent":"7","parentvalue":"power"},{"id":"9","name":"\u6743\u9650\u7ef4\u62a4","description":"\u6743\u9650\u7ef4\u62a4","value":"power:setting","status":"1","parent":"7","parentvalue":"power"},{"id":"10","name":"\u7ba1\u7406\u5458\u5217\u8868","description":"\u7ba1\u7406\u5458\u5217\u8868","value":"power:adminlist","status":"1","parent":"7","parentvalue":"power"}],"total":"119","page":1,"pagesize":10}
     */
    public function getUserPowerList(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"1","name":"\u4f01\u4e1a\u7ba1\u7406","description":"\u4f01\u4e1a\u5ba2\u6237\u7ba1\u7406","value":"company","status":"1","parent":"0","parentvalue":null},{"id":"2","name":"\u4f01\u4e1a\u5217\u8868","description":"\u4f01\u4e1a\u5217\u8868","value":"company:list","status":"1","parent":"1","parentvalue":"company"},{"id":"3","name":"\u9879\u76ee\u7ba1\u7406","description":"\u9879\u76ee\u7ba1\u7406","value":"project","status":"1","parent":"0","parentvalue":null},{"id":"4","name":"\u9879\u76ee\u5217\u8868(\u9879\u76ee\u7ba1\u7406)","description":"\u5217\u8868\u5c55\u793a","value":"project:list","status":"1","parent":"3","parentvalue":"project"},{"id":"5","name":"\u9879\u76ee\u8bbe\u7f6e","description":"\u9879\u76ee\u8bbe\u7f6e\uff08\u603b\u7b49\u7ea7\u8bbe\u7f6e\u548c\u7c7b\u578b\u8bbe\u7f6e\uff09","value":"project:setting","status":"1","parent":"3","parentvalue":"project"},{"id":"6","name":"\u9879\u76ee\u7b49\u7ea7\u914d\u7f6e","description":"\u57fa\u7840\u7b49\u7ea7\u914d\u7f6e","value":"project:level","status":"1","parent":"3","parentvalue":"project"},{"id":"7","name":"\u6743\u9650\u7ba1\u7406","description":"\u6743\u9650\u7ba1\u7406","value":"power","status":"1","parent":"0","parentvalue":null},{"id":"8","name":"\u89d2\u8272\u5217\u8868","description":"\u89d2\u8272\u5217\u8868","value":"power:rolelist","status":"1","parent":"7","parentvalue":"power"},{"id":"9","name":"\u6743\u9650\u7ef4\u62a4","description":"\u6743\u9650\u7ef4\u62a4","value":"power:setting","status":"1","parent":"7","parentvalue":"power"},{"id":"10","name":"\u7ba1\u7406\u5458\u5217\u8868","description":"\u7ba1\u7406\u5458\u5217\u8868","value":"power:adminlist","status":"1","parent":"7","parentvalue":"power"}],"total":"119","page":1,"pagesize":10}';
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
                'getUserPowerList'=>[
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