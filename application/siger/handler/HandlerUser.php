<?php
namespace app\siger\handler;
use think\Request;
use think\Db;
/**
 * Class HandlerUser
 * @title 管理员管理 & 用户接口
 * @url  http://61.177.28.246:8100/Config
 * @desc  用户接口
 * @version 1.0
 * @readme 
 */

class HandlerUser
{


     public $restMethodList = 'getMenu|listUserInfo3|listUserInfo4|getUserList|AddUser2|getUser2|editUser2';

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
     * @title 管理员列表 [权限管理 管理员列表]
     * @desc  管理员列表 [权限管理 管理员列表]
     * @url User/getUserList
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"39","userid":"","nickname":"\u59da\u5efa\u56fd","face":"http:\/\/cloud.siger-data.com\/Upload\/image\/2018-02-04\/87f61b5198d455e7ce32c13712974463.jpg","sex":"0","email":"66@qq.com","email_status":"1","mobile":"13012345678","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"\u59da\u5efa\u56fd","power":"","demo":"0","graduate":"","roleid":"126","refresh_time":"","token":"","rolename":"\u8d85\u7ea7\u7ba1\u7406\u5458\u6743\u9650"}],"total":"22","page":1,"pagesize":10}
     */
    public function getUserList(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"39","userid":"","nickname":"\u59da\u5efa\u56fd","face":"http:\/\/cloud.siger-data.com\/Upload\/image\/2018-02-04\/87f61b5198d455e7ce32c13712974463.jpg","sex":"0","email":"66@qq.com","email_status":"1","mobile":"13012345678","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"\u59da\u5efa\u56fd","power":"","demo":"0","graduate":"","roleid":"126","refresh_time":"","token":"","rolename":"\u8d85\u7ea7\u7ba1\u7406\u5458\u6743\u9650"},{"id":"55","userid":"","nickname":"\u552e\u524d\u5f20\u4e09","face":"","sex":"0","email":"shouqian@siger.com","email_status":"1","mobile":"13333333333","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"","power":"","demo":"0","graduate":"","roleid":"2","refresh_time":"","token":"","rolename":"\u552e\u524d"},{"id":"59","userid":"","nickname":"\u6d4b\u8bd5\u552e\u524d","face":"","sex":"0","email":"jack@ichuk.com","email_status":"1","mobile":"13338691800","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"\u521a\u5f3a","power":"","demo":"0","graduate":"","roleid":"2","refresh_time":"","token":"","rolename":"\u552e\u524d"},{"id":"63","userid":"","nickname":"beta","face":"","sex":"0","email":"13382504196@189.cn","email_status":"1","mobile":"18589027217","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"","power":"","demo":"0","graduate":"","roleid":"7","refresh_time":"","token":"","rolename":"\u5de5\u7a0b\u5e08"},{"id":"64","userid":"","nickname":"\u6d4b\u8bd5","face":"","sex":"0","email":"13333333339","email_status":"1","mobile":"13333333339","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"","power":"","demo":"0","graduate":"","roleid":"4","refresh_time":"","token":"","rolename":"\u5ba2\u6237\u8d85\u7ea7\u7ba1\u7406\u5458"},{"id":"65","userid":"","nickname":"\u6d4b\u8bd52","face":"","sex":"0","email":"13333333339","email_status":"1","mobile":"13333333339","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"","power":"","demo":"0","graduate":"","roleid":"4","refresh_time":"","token":"","rolename":"\u5ba2\u6237\u8d85\u7ea7\u7ba1\u7406\u5458"},{"id":"66","userid":"","nickname":"\u5bcc\u58eb\u548c\u9879\u76eeAdmin","face":"","sex":"0","email":"13612345678","email_status":"1","mobile":"13612345678","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"\u5bcc\u58eb\u548c\u6d4b\u8bd5","power":"","demo":"0","graduate":"","roleid":"104","refresh_time":"","token":"","rolename":"\u6743\u9650\u6d4b\u8bd5"},{"id":"68","userid":"","nickname":"\u4e09\u53cb\u8d85\u7ea7\u7ba1\u7406\u5458","face":"","sex":"0","email":"13412345678","email_status":"1","mobile":"13412345678","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"sanyou","power":"","demo":"0","graduate":"","roleid":"86","refresh_time":"","token":"","rolename":"\u9879\u76ee22"},{"id":"70","userid":"","nickname":"FJW","face":"http:\/\/172.8.10.70\/Upload\/image\/2018-09-17\/78a0b5c6e0346cecb6e273d2d6b82fc2.jpg","sex":"0","email":"","email_status":"1","mobile":"12345678909","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"fjw","power":"","demo":"0","graduate":"","roleid":"94","refresh_time":"","token":"","rolename":"\u5168\u90e8\u6a21\u5757"},{"id":"92","userid":"","nickname":"\u4e2d\u8f66\u8d85\u7ea7\u7ba1\u7406\u5458","face":"","sex":"0","email":"ZC","email_status":"1","mobile":"18362665200","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"","power":"","demo":"0","graduate":"","roleid":"4","refresh_time":"","token":"","rolename":"\u5ba2\u6237\u8d85\u7ea7\u7ba1\u7406\u5458"}],"total":"23","page":1,"pagesize":10}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }

        /**
     * @title 添加管理员
     * @desc  添加管理员
     * @url User/AddUser2
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function AddUser2(Request $request)
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
     * @title 获得管理员详情
     * @desc  获得管理员详情
     * @url User/getUser2
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"1398","userid":"","nickname":"aaaaa","face":"","sex":"0","email":"meetrice@qq.com","email_status":"1","mobile":"15312084732","mobile_status":"1","status":"1","jointime":"0","joinip":"","lastlogintime":"0","type":"2","zan":"0","fans":"0","follow":"0","taste":"","avoid_certain_food":"","message":"","score":"0","balance":"0","birthday":"0","realname":"","power":"","demo":"0","graduate":"","roleid":"508","refresh_time":"","token":""}],"total":"1","page":1,"pagesize":1}
     */
    public function getUser2(Request $request)
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
     * @title 修改管理员 保存
     * @desc  修改管理员保存
     * @url User/editUser2
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function editUser2(Request $request)
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
      
                ],'getUser2'=>[
                    'id' => ['name' => 'id', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
      
                ],
                'listUserInfo4'=>[
                    'token' => ['name' => 'token', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'token', 'range' => '',],
      
                ],
                'getUserList'=>[
                    'page' => ['name' => 'page', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'page', 'range' => '',],
                    'pagesize' => ['name' => 'pagesize', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'pagesize', 'range' => '',],
      
                ],
                'AddUser2'=>[
                    'userid' => ['name' => 'userid', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '', 'range' => '',],
                    'nickname' => ['name' => 'nickname', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '昵称', 'range' => '',],
                    'roleid' => ['name' => 'roleid', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '用户角色', 'range' => '',],
                    'mobile' => ['name' => 'mobile', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '手机', 'range' => '',],
                    'email' => ['name' => 'email','type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '邮箱', 'range' => '',],
                    'password' => ['name' => 'password', 'type' => 'string', 'require' => 'false', 'default' => '', '密码' => 'pagesize', 'range' => '',],
      
                ],
                'editUser2'=>[
                    'userid' => ['name' => 'userid', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '', 'range' => '',],
                    'nickname' => ['name' => 'nickname', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '昵称', 'range' => '',],
                    'roleid' => ['name' => 'roleid', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '用户角色', 'range' => '',],
                    'mobile' => ['name' => 'mobile', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '手机', 'range' => '',],
                 
                   
      
                ]
        ];
      
        return $rules;
    }
}
