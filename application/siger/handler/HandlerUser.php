<?php
namespace app\siger\handler;
/**
 * Class HandlerUser
 * @title 用户接口
 * @url  http://61.177.28.246:8100/Config
 * @desc  用户接口
 * @version 1.0
 * @readme 
 */
class HandlerUser
{
     public $restMethodList = 'getMenu|listUserInfo3|listUserInfo4';

    /**
     * @title 获取用户菜单列表
     * @desc  获取用户菜单列表
     * @url User/getMenu
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example  { "ret": 1, "msg": "获取成功", "data": [ { "name": "企业管理", "href": "", "target": "", "icon": "icon-flag", "permission":"company", "menus": [ { "name": "企业管理", "href": "..\/..\/?_controller=Console&_function=Company&__function=Lists", "target": "Company", "permission":"company:list" } ] }, { "name": "项目管理", "href": "", "target": "", "icon": "icon-checklist", "permission":"project", "menus": [ { "name": "项目管理", "href": "..\/..\/?_controller=Console&_function=Project&__function=Lists", "target": "Project", "permission":"project:list" }, { "name": "项目设置", "href": "..\/..\/?_controller=Console&_function=EnterpriseSetting&__function=AllLevel", "target": "EnterpriseSetting", "permission":"project:setting" }, { "name": "项目等级设置", "href": "..\/..\/?_controller=Console&_function=Enterprise&__function=Level", "target": "Enterprise Level", "permission":"project:level" } ] } ]  } 
     */
    public function getMenu(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '
{ "ret": 1, "msg": "获取成功", "data": [ { "name": "企业管理", "href": "", "target": "", "icon": "icon-flag", "permission":"company", "menus": [ { "name": "企业管理", "href": "..\/..\/?_controller=Console&_function=Company&__function=Lists", "target": "Company", "permission":"company:list" } ] }, { "name": "项目管理", "href": "", "target": "", "icon": "icon-checklist", "permission":"project", "menus": [ { "name": "项目管理", "href": "..\/..\/?_controller=Console&_function=Project&__function=Lists", "target": "Project", "permission":"project:list" }, { "name": "项目设置", "href": "..\/..\/?_controller=Console&_function=EnterpriseSetting&__function=AllLevel", "target": "EnterpriseSetting", "permission":"project:setting" }, { "name": "项目等级设置", "href": "..\/..\/?_controller=Console&_function=Enterprise&__function=Level", "target": "Enterprise Level", "permission":"project:level" } ] } ]  } ';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }

    /**
     * @title 项目管理 创建者下拉列表
     * @desc  项目管理 创建者下拉列表
     * @url User/listUserInfo3
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":{"0":{"id":39,"realname":"\u59da\u5efa\u56fd","nickname":"\u59da\u5efa\u56fd","roleid":126},"1":{"id":55,"realname":"\u552e\u524d\u5f20\u4e09","nickname":"\u552e\u524d\u5f20\u4e09","roleid":2},"2":{"id":59,"realname":"\u521a\u5f3a","nickname":"\u6d4b\u8bd5\u552e\u524d","roleid":2},"3":{"id":63,"realname":"beta","nickname":"beta","roleid":7},"6":{"id":66,"realname":"\u5bcc\u58eb\u548c\u6d4b\u8bd5","nickname":"\u5bcc\u58eb\u548c\u9879\u76eeAdmin","roleid":104},"7":{"id":68,"realname":"sanyou","nickname":"\u4e09\u53cb\u8d85\u7ea7\u7ba1\u7406\u5458","roleid":86},"8":{"id":70,"realname":"fjw","nickname":"FJW","roleid":94},"10":{"id":133,"realname":"\u76fe\u5b89","nickname":"\u76fe\u5b89\u96c6\u56e2\u8d85\u7ea7\u7ba1\u7406\u5458","roleid":104},"11":{"id":134,"realname":"\u6f14\u793aadmin","nickname":"\u6f14\u793aDemo","roleid":86},"12":{"id":151,"realname":"\u4f59\u4e16\u9601","nickname":"\u4f59\u4e16\u9601","roleid":1},"13":{"id":154,"realname":"ycjs","nickname":"\u6c38\u521b\u8d85\u7ea7\u7ba1\u7406\u5458","roleid":94},"14":{"id":156,"realname":"fesher","nickname":"\u83f2\u820d\u5c14\u8d85\u7ea7\u7ba1\u7406\u5458","roleid":106},"15":{"id":181,"realname":"aa","nickname":"\u6606\u5c71\u516d\u4e30\u8d85\u7ea7\u7ba1\u7406\u5458","roleid":86},"16":{"id":199,"realname":"mica","nickname":"\u5bc6\u5361\u7279\u8bfa\u7ba1\u7406\u5458","roleid":123},"17":{"id":545,"realname":"111111","nickname":"111111","roleid":414},"18":{"id":557,"realname":"\u6d4b\u8bd5\u4e2d\u5fc3","nickname":"\u6d4b\u8bd5\u4e2d\u5fc3","roleid":415},"19":{"id":1349,"realname":"\u4e07\u79d1\u56fd\u9645","nickname":"\u4e07\u79d1\u56fd\u9645","roleid":479},"20":{"id":1378,"realname":"\u7389\u5efa","nickname":"\u7389\u5efa","roleid":2},"21":{"id":1379,"realname":"1","nickname":"1","roleid":3}}}
     */
    public function listUserInfo3(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":{"0":{"id":39,"realname":"\u59da\u5efa\u56fd","nickname":"\u59da\u5efa\u56fd","roleid":126},"1":{"id":55,"realname":"\u552e\u524d\u5f20\u4e09","nickname":"\u552e\u524d\u5f20\u4e09","roleid":2},"2":{"id":59,"realname":"\u521a\u5f3a","nickname":"\u6d4b\u8bd5\u552e\u524d","roleid":2},"3":{"id":63,"realname":"beta","nickname":"beta","roleid":7},"6":{"id":66,"realname":"\u5bcc\u58eb\u548c\u6d4b\u8bd5","nickname":"\u5bcc\u58eb\u548c\u9879\u76eeAdmin","roleid":104},"7":{"id":68,"realname":"sanyou","nickname":"\u4e09\u53cb\u8d85\u7ea7\u7ba1\u7406\u5458","roleid":86},"8":{"id":70,"realname":"fjw","nickname":"FJW","roleid":94},"10":{"id":133,"realname":"\u76fe\u5b89","nickname":"\u76fe\u5b89\u96c6\u56e2\u8d85\u7ea7\u7ba1\u7406\u5458","roleid":104},"11":{"id":134,"realname":"\u6f14\u793aadmin","nickname":"\u6f14\u793aDemo","roleid":86},"12":{"id":151,"realname":"\u4f59\u4e16\u9601","nickname":"\u4f59\u4e16\u9601","roleid":1},"13":{"id":154,"realname":"ycjs","nickname":"\u6c38\u521b\u8d85\u7ea7\u7ba1\u7406\u5458","roleid":94},"14":{"id":156,"realname":"fesher","nickname":"\u83f2\u820d\u5c14\u8d85\u7ea7\u7ba1\u7406\u5458","roleid":106},"15":{"id":181,"realname":"aa","nickname":"\u6606\u5c71\u516d\u4e30\u8d85\u7ea7\u7ba1\u7406\u5458","roleid":86},"16":{"id":199,"realname":"mica","nickname":"\u5bc6\u5361\u7279\u8bfa\u7ba1\u7406\u5458","roleid":123},"17":{"id":545,"realname":"111111","nickname":"111111","roleid":414},"18":{"id":557,"realname":"\u6d4b\u8bd5\u4e2d\u5fc3","nickname":"\u6d4b\u8bd5\u4e2d\u5fc3","roleid":415},"19":{"id":1349,"realname":"\u4e07\u79d1\u56fd\u9645","nickname":"\u4e07\u79d1\u56fd\u9645","roleid":479},"20":{"id":1378,"realname":"\u7389\u5efa","nickname":"\u7389\u5efa","roleid":2},"21":{"id":1379,"realname":"1","nickname":"1","roleid":3}}}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }

    /**
     * @title 项目管理 -> 项目管理员 下拉列表
     * @desc  项目管理 -> 项目管理员 下拉列表
     * @url User/listUserInfo4
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {}
     */
    public function listUserInfo4(Request $request)
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
                'getMenu'=>[
                    'token' => ['name' => 'token', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'token', 'range' => '',],
      
                ],
                'listUserInfo3'=>[
                    'token' => ['name' => 'token', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'token', 'range' => '',],
      
                ],
                'listUserInfo4'=>[
                    'token' => ['name' => 'token', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'token', 'range' => '',],
      
                ]
        ];
      
        return $rules;
    }
}
