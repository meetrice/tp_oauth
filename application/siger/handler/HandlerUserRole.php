<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerUserRole
 * @title 角色列表
 * @url  http://61.177.28.246:8100/Config
 * @desc  角色列表
 * @version 1.0
 * @readme 
 */
class HandlerUserRole
{

	public $restMethodList = 'getUserRoleList|addUserRole|getUserRole|editUserRole|deleteUserRole|getProjectTypeRoleMaintenanceList|setProjectTypeRoleMaintenance|getUserRoleMaintenanceList|setUserRoleMaintenance';

 
    /**
     * @title 角色列表
     * @desc  角色列表
     * @url UserRole/getUserRoleList
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
     * @title 添加角色
     * @desc  添加角色
     * @url UserRole/addUserRole
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {}
     */
    public function addUserRole(Request $request)
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
     * @title 获得角色详情
     * @desc  获得角色详情
     * @url UserRole/getUserRole
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"1","name":"\u8d85\u7ea7\u7ba1\u7406\u5458","description":"\u8d85\u7ea7\u7ba1\u7406\u5458","status":"1","type":"1","userlevel":"0"}],"total":"1","page":1,"pagesize":1}
     */
    public function getUserRole(Request $request)
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
     * @title 修改角色
     * @desc  修改角色
     * @url UserRole/editUserRole
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function editUserRole(Request $request)
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
     * @title 删除角色
     * @desc  删除角色
     * @url UserRole/deleteUserRole
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {}
     */
    public function deleteUserRole(Request $request)
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
     * @title 设置项目分类权限 - 获得权限树  [项目管理 - 项目设置 - 项目类型设置 -设置权限]
     * @desc  设置项目分类权限 - 获得权限树    [项目管理 - 项目设置 - 项目类型设置 -设置权限]
     * @url UserRole/getProjectTypeRoleMaintenanceList
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"1","name":"\u4f01\u4e1a\u7ba1\u7406","description":"\u4f01\u4e1a\u5ba2\u6237\u7ba1\u7406","value":"company","status":"1","parent":"0","parentvalue":"","checked":"0"},{"id":"2","name":"\u4f01\u4e1a\u5217\u8868","description":"\u4f01\u4e1a\u5217\u8868","value":"company:list","status":"1","parent":"1","parentvalue":"","checked":"0"},{"id":"3","name":"\u9879\u76ee\u7ba1\u7406","description":"\u9879\u76ee\u7ba1\u7406","value":"project","status":"1","parent":"0","parentvalue":"","checked":"0"},{"id":"4","name":"\u9879\u76ee\u5217\u8868(\u9879\u76ee\u7ba1\u7406)","description":"\u5217\u8868\u5c55\u793a","value":"project:list","status":"1","parent":"3","parentvalue":"","checked":"0"}]}
     */
    public function getProjectTypeRoleMaintenanceList(Request $request)
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
     * @title 设置权限保存    [项目管理 - 项目设置 - 项目类型设置 -设置权限]
     * @desc  设置权限保存    [项目管理 - 项目设置 - 项目类型设置 -设置权限]
     * @url UserRole/setProjectTypeRoleMaintenance
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function setProjectTypeRoleMaintenance(Request $request)
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
     * @title 设置角色权限 - 获得权限树
     * @desc  设置角色权限 - 获得权限树
     * @url Company/getUserRoleMaintenanceList
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"1","name":"\u4f01\u4e1a\u7ba1\u7406","description":"\u4f01\u4e1a\u5ba2\u6237\u7ba1\u7406","value":"company","status":"1","parent":"0","parentvalue":"","checked":"0"},{"id":"2","name":"\u4f01\u4e1a\u5217\u8868","description":"\u4f01\u4e1a\u5217\u8868","value":"company:list","status":"1","parent":"1","parentvalue":"","checked":"0"},{"id":"3","name":"\u9879\u76ee\u7ba1\u7406","description":"\u9879\u76ee\u7ba1\u7406","value":"project","status":"1","parent":"0","parentvalue":"","checked":"0"},{"id":"4","name":"\u9879\u76ee\u5217\u8868(\u9879\u76ee\u7ba1\u7406)","description":"\u5217\u8868\u5c55\u793a","value":"project:list","status":"1","parent":"3","parentvalue":"","checked":"0"}]}
     */
    public function getUserRoleMaintenanceList(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"1","name":"\u4f01\u4e1a\u7ba1\u7406","description":"\u4f01\u4e1a\u5ba2\u6237\u7ba1\u7406","value":"company","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"2","name":"\u4f01\u4e1a\u5217\u8868","description":"\u4f01\u4e1a\u5217\u8868","value":"company:list","status":"1","parent":"1","parentvalue":"","checked":"1"},{"id":"3","name":"\u9879\u76ee\u7ba1\u7406","description":"\u9879\u76ee\u7ba1\u7406","value":"project","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"4","name":"\u9879\u76ee\u5217\u8868(\u9879\u76ee\u7ba1\u7406)","description":"\u5217\u8868\u5c55\u793a","value":"project:list","status":"1","parent":"3","parentvalue":"","checked":"1"},{"id":"5","name":"\u9879\u76ee\u8bbe\u7f6e","description":"\u9879\u76ee\u8bbe\u7f6e\uff08\u603b\u7b49\u7ea7\u8bbe\u7f6e\u548c\u7c7b\u578b\u8bbe\u7f6e\uff09","value":"project:setting","status":"1","parent":"3","parentvalue":"","checked":"1"},{"id":"6","name":"\u9879\u76ee\u7b49\u7ea7\u914d\u7f6e","description":"\u57fa\u7840\u7b49\u7ea7\u914d\u7f6e","value":"project:level","status":"1","parent":"3","parentvalue":"","checked":"1"},{"id":"7","name":"\u6743\u9650\u7ba1\u7406","description":"\u6743\u9650\u7ba1\u7406","value":"power","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"8","name":"\u89d2\u8272\u5217\u8868","description":"\u89d2\u8272\u5217\u8868","value":"power:rolelist","status":"1","parent":"7","parentvalue":"","checked":"1"},{"id":"9","name":"\u6743\u9650\u7ef4\u62a4","description":"\u6743\u9650\u7ef4\u62a4","value":"power:setting","status":"1","parent":"7","parentvalue":"","checked":"1"},{"id":"10","name":"\u7ba1\u7406\u5458\u5217\u8868","description":"\u7ba1\u7406\u5458\u5217\u8868","value":"power:adminlist","status":"1","parent":"7","parentvalue":"","checked":"1"},{"id":"11","name":"\u4eba\u5458\u90e8\u95e8\u7ba1\u7406","description":"\u8bbe\u7f6e\u4eba\u5458\u3001\u90e8\u95e8\u3001\u5c97\u4f4d\u3001\u73ed\u6b21","value":"staff","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"12","name":"\u4eba\u5458\u4fe1\u606f\u8bbe\u7f6e","description":"\u4eba\u5458\u589e\u5220\u3001\u67e5\u770b","value":"staff:staffinfo","status":"1","parent":"11","parentvalue":"","checked":"1"},{"id":"13","name":"\u90e8\u95e8\u5c97\u4f4d\u8bbe\u7f6e","description":"\u7ef4\u62a4\u90e8\u95e8\u5c97\u4f4d\u4fe1\u606f","value":"staff:department","status":"1","parent":"11","parentvalue":"","checked":"1"},{"id":"14","name":"\u73ed\u6b21\u8bbe\u7f6e","description":"\u8bbe\u7f6e\u5404\u8f6e\u73ed\u90e8\u95e8\u73ed\u6b21","value":"staff:shift","status":"1","parent":"11","parentvalue":"","checked":"1"},{"id":"15","name":"\u4ea7\u7ebf\u5c42\u7ea7\u7ba1\u7406","description":"\u5b9a\u4e49\u4ea7\u7ebf\u5c42\u7ea7\u53ca\u5bf9\u5e94\u5458\u5de5","value":"productionline","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"16","name":"\u4ea7\u7ebf\u4eba\u5458\u8bbe\u7f6e","description":"\u8bbe\u7f6e\u4ea7\u7ebf\u4e0e\u4eba\u5458\u5173\u7cfb","value":"productionline:relatedstaff","status":"1","parent":"15","parentvalue":"","checked":"1"},{"id":"17","name":"\u4ea7\u7ebf\u7ed3\u6784\u8bbe\u7f6e","description":"\u8bbe\u7f6e\u4ea7\u7ebf\u5c42\u7ea7\u7ed3\u6784","value":"productionline:structure","status":"1","parent":"15","parentvalue":"","checked":"1"},{"id":"18","name":"\u8bbe\u5907\u4fe1\u606f\u7ba1\u7406","description":"\u5173\u8054\u4ea7\u7ebf\u8bbe\u5907\u3001\u8bbe\u7f6e\u8bbe\u5907\u7c7b\u578b\u3001\u8bbe\u5907\u6761\u7801\u6253\u5370","value":"equipmentinfo","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"19","name":"\u8bbe\u5907\u53f0\u8d26","description":"\u5bf9\u5e94\u4ea7\u7ebf\u5c42\u7ea7\u7ed3\u6784\u6dfb\u52a0\u8bbe\u5907","value":"equipmentinfo:list","status":"1","parent":"18","parentvalue":"","checked":"1"},{"id":"20","name":"\u8bbe\u5907\u7c7b\u578b\u8bbe\u7f6e","description":"\u7ef4\u62a4\u8bbe\u5907\u7c7b\u578b","value":"equipmentinfo:type","status":"1","parent":"18","parentvalue":"","checked":"1"},{"id":"22","name":"TPM","description":"\u5e94\u6025\u7ef4\u4fee\u548c\u8ba1\u5212\u7ef4\u62a4","value":"tpm","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"23","name":"\u8bbe\u5907\u5e94\u6025\u7ef4\u4fee","description":"\u5e94\u6025\u7ef4\u4fee\u6a21\u5757","value":"tpm:emergencymaintenance","status":"1","parent":"22","parentvalue":"","checked":"1"},{"id":"24","name":"\u5e94\u6025\u7ef4\u4fee\u72b6\u6001","description":"\u5e94\u6025\u7ef4\u4fee\u72b6\u6001\u5b9e\u65f6\u67e5\u770b","value":"tpm:emergencymaintenance:status","status":"1","parent":"23","parentvalue":"","checked":"1"},{"id":"25","name":"\u8bbe\u5907\u7ef4\u4fee\u5217\u8868","description":"\u67e5\u8be2\u7ef4\u62a4\u5386\u53f2\u7ef4\u4fee\u5de5\u5355","value":"tpm:emergencymaintenance:list","status":"1","parent":"23","parentvalue":"","checked":"1"},{"id":"27","name":"\u5e38\u89c1\u6545\u969c\u8bbe\u7f6e","description":"\u8bbe\u7f6e\u3001\u7ef4\u62a4\u8bbe\u5907\u7c7b\u578b\u5e38\u89c1\u6545\u969c","value":"tpm:emergencymaintenance:commonfault","status":"1","parent":"23","parentvalue":"","checked":"1"},{"id":"28","name":"\u7ef4\u4fee\u5f02\u5e38\u4e0a\u62a5\u8bbe\u7f6e","description":"\u8bbe\u7f6e\u5f02\u5e38\u4e0a\u62a5\u5c42\u7ea7\u3001\u65f6\u95f4","value":"tpm:emergencymaintenance:highlight","status":"1","parent":"23","parentvalue":"","checked":"1"},{"id":"29","name":"\u8bbe\u5907\u8ba1\u5212\u7ef4\u62a4","description":"\u8bbe\u5907\u8ba1\u5212\u7ef4\u62a4\u76f8\u5173","value":"tpm:scheduledmaintenance","status":"1","parent":"22","parentvalue":"","checked":"1"},{"id":"30","name":"\u8ba1\u5212\u7ef4\u62a4\u72b6\u6001","description":"\u8ba1\u5212\u7ef4\u62a4\u72b6\u6001\u5c55\u793a","value":"tpm:scheduledmaintenance:status","status":"1","parent":"29","parentvalue":"","checked":"1"},{"id":"31","name":"\u8ba1\u5212\u7ef4\u62a4\u5217\u8868","description":"\u67e5\u8be2\u3001\u8bbe\u7f6e\u8bbe\u5907\u8ba1\u5212\u7ef4\u62a4\u9879\u70b9","value":"tpm:scheduledmaintenance:list","status":"1","parent":"29","parentvalue":"","checked":"1"},{"id":"32","name":"\u8ba1\u5212\u7ef4\u62a4\u5b89\u6392","description":"\u4e34\u65f6\u8c03\u6574\u8ba1\u5212\u7ef4\u62a4\u5b89\u6392","value":"tpm:scheduledmaintenance:adjust","status":"1","parent":"29","parentvalue":"","checked":"1"},{"id":"34","name":"\u7ef4\u62a4\u5f02\u5e38\u4e0a\u62a5\u8bbe\u7f6e","description":"\u8ba1\u5212\u7ef4\u62a4\u7684\u5f02\u5e38\u4e0a\u62a5\u8bbe\u5b9a","value":"tpm:scheduledmaintenance:highlight","status":"1","parent":"29","parentvalue":"","checked":"1"},{"id":"36","name":"\u5907\u4ef6\u7ba1\u7406","description":"\u5907\u4ef6\u76f8\u5173\uff0c\u51fa\u5165\u5e93\uff0c\u5217\u8868","value":"sparepart","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"37","name":"\u5907\u4ef6\u5217\u8868","description":"\u67e5\u8be2\u3001\u9886\u7528\u3001\u5165\u5e93\u5907\u4ef6\u7d22\u5f15\uff0c\u7c7b\u578b\u8bbe\u7f6e","value":"sparepart:storagemanagement","status":"1","parent":"36","parentvalue":"","checked":"1"},{"id":"38","name":"\u5907\u4ef6\u5217\u8868","description":"\u6309\u7167\u5907\u4ef6\u7d22\u5f15","value":"sparepart:storagemanagement:search","status":"1","parent":"37","parentvalue":"","checked":"1"},{"id":"40","name":"\u5907\u4ef6\u51fa\u5165\u5e93\u8bb0\u5f55","description":"\u51fa\u5165\u5e93\u8bb0\u5f55","value":"sparepart:storagemanagement:record","status":"1","parent":"37","parentvalue":"","checked":"1"},{"id":"41","name":"\u5907\u4ef6\u7c7b\u578b\u7ba1\u7406","description":"\u8bbe\u7f6e\u3001\u7ef4\u62a4\u5907\u4ef6\u7c7b\u578b","value":"sparepart:storagemanagement:type","status":"1","parent":"37","parentvalue":"","checked":"1"},{"id":"43","name":"\u8bbe\u5907\u8d44\u4ea7\u76d8\u70b9","description":"\u8bbe\u7f6e\u3001\u76d8\u70b9\u8bbe\u5907\u72b6\u6001","value":"stocktaking","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"44","name":"\u8bbe\u5907\u53f0\u8d26\u72b6\u6001","description":"\u67e5\u8be2\u3001\u4fee\u6539\u8bbe\u5907\u72b6\u6001","value":"stocktaking:equipmentstatus","status":"1","parent":"43","parentvalue":"","checked":"1"},{"id":"45","name":"\u76d8\u70b9\u8ba1\u5212\u8bbe\u7f6e","description":"\u8bbe\u7f6e\u76d8\u70b9\u8ba1\u5212","value":"stocktaking:plan","status":"1","parent":"43","parentvalue":"","checked":"1"},{"id":"46","name":"\u76d8\u70b9\u8bb0\u5f55\u67e5\u8be2","description":"\u67e5\u8be2\u5386\u53f2\u76d8\u70b9\u8bb0\u5f55","value":"stocktaking:record","status":"1","parent":"43","parentvalue":"","checked":"1"},{"id":"47","name":"\u5200\u5177\u7ba1\u7406","description":"\u5200\u5177\u8d1f\u8f7d\u76d1\u63a7\u6a21\u5757","value":"tooling","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"48","name":"\u8d1f\u8f7d\u5b9e\u65f6\u76d1\u63a7","description":"\u5200\u5177\u8d1f\u8f7d\u5b9e\u65f6\u76d1\u63a7","value":"tooling:onlinemonitor","status":"1","parent":"47","parentvalue":"","checked":"1"},{"id":"49","name":"\u8d1f\u8f7d\u5b9e\u65f6\u76d1\u63a7","description":"\u9009\u62e9\u76d1\u63a7\u5bf9\u8c61\uff0c\u67e5\u770b\u5200\u5177\u8d1f\u8f7d","value":"tooling:onlinemonitor:status","status":"1","parent":"48","parentvalue":"","checked":"1"},{"id":"50","name":"\u76d1\u63a7\u5bf9\u8c61\u8bbe\u7f6e","description":"\u9009\u62e9\u3001\u8bbe\u7f6e\u76d1\u63a7\u5bf9\u8c61","value":"tooling:onlinemonitor:setting","status":"1","parent":"48","parentvalue":"","checked":"1"},{"id":"52","name":"\u5200\u5177\u5bff\u547d\u7ba1\u7406","description":"\u5200\u5177\u5bff\u547d\u3001\u66f4\u6362\u3001\u53c2\u6570\u8bbe\u5b9a","value":"tooling:change","status":"1","parent":"47","parentvalue":"","checked":"1"},{"id":"53","name":"\u5269\u4f59\u5bff\u547d\u7ba1\u7406","description":"\u5200\u5177\u5269\u4f59\u5bff\u547d\u5c55\u793a","value":"tooling:change:residuallife","status":"1","parent":"52","parentvalue":"","checked":"1"},{"id":"54","name":"\u5200\u5177\u66f4\u6362\u8bb0\u5f55","description":"\u5200\u5177\u66f4\u6362\u7ba1\u7406","value":"tooling:change:management","status":"1","parent":"52","parentvalue":"","checked":"1"},{"id":"57","name":"\u62a5\u8b66\u8bbe\u7f6e","description":"\u8d1f\u8f7d\u63a7\u5236\u7ebf\u62a5\u8b66\u8bbe\u7f6e","value":"tooling:alarmsetting","status":"1","parent":"47","parentvalue":"","checked":"1"},{"id":"58","name":"\u62a5\u8b66\u6761\u4ef6\u8bbe\u7f6e","description":"\u8bbe\u7f6e\u62a5\u8b66\u89e6\u53d1\u6761\u4ef6","value":"tooling:alarmsetting:condition","status":"1","parent":"57","parentvalue":"","checked":"1"},{"id":"59","name":"\u62a5\u8b66\u901a\u8baf\u8bbe\u7f6e","description":"\u5b9a\u4e49\u62a5\u8b66\u7684\u901a\u8baf\u65b9\u5f0f","value":"tooling:alarmsetting:inform","status":"1","parent":"57","parentvalue":"","checked":"1"},{"id":"60","name":"\u63a7\u5236\u7ebf\u81ea\u5b66\u4e60","description":"\u62a5\u8b66\u63a7\u5236\u7ebf\u5b66\u4e60","value":"tooling:controllimitlearning","status":"1","parent":"47","parentvalue":"","checked":"1"},{"id":"62","name":"\u751f\u4ea7\u7ba1\u7406","description":"\u6570\u5b57\u5316\u5de5\u5382\u6a21\u5757","value":"mfg","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"63","name":"\u8bbe\u5907\u8fd0\u884c\u72b6\u6001\u5217\u8868","description":"\u67e5\u770b\u8bbe\u5907\u5f53\u524d\u8fd0\u884c\u72b6\u6001","value":"mfg:status:machinestatus","status":"1","parent":"121","parentvalue":"","checked":"1"},{"id":"64","name":"\u751f\u4ea7\u53c2\u6570\u76d1\u63a7","description":"\u76d1\u63a7\u751f\u4ea7\u72b6\u6001\u3001\u8bbe\u5907\u5f02\u5e38","value":"mfg:parametermonitor","status":"1","parent":"62","parentvalue":"","checked":"1"},{"id":"65","name":"\u53c2\u6570\u72b6\u6001\u9884\u89c8","description":"\u8bbe\u5907\u53c2\u6570\u3001\u8fd0\u884c\u72b6\u6001","value":"mfg:parametermonitor:status","status":"1","parent":"64","parentvalue":"","checked":"1"},{"id":"66","name":"\u53c2\u6570\u5f02\u5e38\u5217\u8868","description":"\u5f02\u5e38\u8bbe\u5907\u53c2\u6570\u6c47\u603b","value":"mfg:parametermonitor:abnormalsummary","status":"1","parent":"64","parentvalue":"","checked":"1"},{"id":"67","name":"\u53c2\u6570\u5f02\u5e38\u7edf\u8ba1","description":"\u53c2\u6570\u5f02\u5e38\u62a5\u8868\u3001\u7edf\u8ba1","value":"mfg:parametermonitor:abnormalstatistic","status":"1","parent":"64","parentvalue":"","checked":"1"},{"id":"68","name":"\u751f\u4ea7\u6548\u7387\u5206\u6790","description":"\u72b6\u6001\u5b9e\u65f6\u67e5\u770b\u3001\u62a5\u8868\u5bfc\u51fa","value":"mfg:efficiencyanalysis","status":"1","parent":"62","parentvalue":"","checked":"1"},{"id":"69","name":"\u751f\u4ea7\u6548\u7387\u67e5\u770b","description":"\u751f\u4ea7\u5b9e\u65f6\u72b6\u6001\u67e5\u770b","value":"mfg:efficiencyanalysis:status","status":"1","parent":"68","parentvalue":"","checked":"1"},{"id":"71","name":"\u8bbe\u5907\u5207\u7247\u5206\u6790","description":"\u8fd0\u884c\u5207\u7247\u56fe\u5206\u6790","value":"mfg:slicinganalysis","status":"1","parent":"62","parentvalue":"","checked":"1"},{"id":"72","name":"\u8bbe\u5907\u62a5\u8b66\u5206\u6790","description":"\u6545\u969c\u7edf\u8ba1\u3001\u4ee3\u7801\u7ba1\u7406","value":"mfg:machinealarm","status":"1","parent":"62","parentvalue":"","checked":"1"},{"id":"74","name":"\u7edf\u8ba1\u5206\u6790(TPM)","description":"\u7edf\u8ba1\u5206\u6790","value":"tpm:statistical","status":"1","parent":"22","parentvalue":"","checked":"1"},{"id":"75","name":"\u7ef4\u62a4\u7ed3\u679c\u5206\u6790","description":"\u8ba1\u5212\u7ef4\u62a4\u7ed3\u679c\u5206\u6790","value":"tpm:statistical:planresult","status":"1","parent":"74","parentvalue":"","checked":"1"},{"id":"76","name":"\u7ef4\u62a4\u51c6\u65f6\u7387\u5206\u6790","description":"\u8ba1\u5212\u7ef4\u62a4\u51c6\u65f6\u7387\u5206\u6790","value":"tpm:statistical:punctuality","status":"1","parent":"74","parentvalue":"","checked":"1"},{"id":"84","name":"\u6545\u969c\u9891\u6b21\u5206\u6790","description":"\u5206\u6790\u5e94\u6025\u7ef4\u4fee\u62a5\u8b66\u9891\u6b21","value":"tpm:statistical:emergencyfrequency","status":"1","parent":"74","parentvalue":"","checked":"1"},{"id":"85","name":"\u5de5\u5355\u6570\u636e\u7edf\u8ba1","description":"\u7edf\u8ba1\u5e94\u6025\u7ef4\u4fee\u5de5\u5355\u6570\u636e","value":"tpm:statistical:emergencyorder","status":"1","parent":"74","parentvalue":"","checked":"1"},{"id":"86","name":"\u7ef4\u4fee\u6307\u6807\u8d8b\u52bf","description":"\u5e94\u6025\u7ef4\u4fee\u6307\u6807\u8d8b\u52bf\u5206\u6790","value":"tpm:statistical:emergencykpi","status":"1","parent":"74","parentvalue":"","checked":"1"},{"id":"87","name":"\u7ef4\u4fee\u6709\u6548\u6027\u8bc4\u4ef7","description":"\u5e94\u6025\u7ef4\u4fee\u6709\u6548\u6027\u5206\u6790","value":"tpm:statistical:emergencyeffectiveness","status":"1","parent":"74","parentvalue":"","checked":"1"},{"id":"88","name":"\u7ef4\u62a4\u6709\u6548\u6027\u5206\u6790","description":"\u8ba1\u5212\u7ef4\u62a4\u6709\u6548\u6027\u5206\u6790","value":"tpm:statistical:scheduledeffectiveness","status":"1","parent":"74","parentvalue":"","checked":"1"},{"id":"92","name":"\u7edf\u8ba1\u5206\u6790(\u5200\u5177)","description":"\u5206\u6790\u5200\u5177\u5bff\u547d","value":"tooling:change:statistical","status":"1","parent":"52","parentvalue":"","checked":"1"},{"id":"93","name":"\u8bbe\u5907\u62a5\u8b66\u8bb0\u5f55","description":"\u5200\u5177\u8d1f\u8f7d\u5f02\u5e38\u62a5\u8b66\u8bb0\u5f55\u65e5\u5fd7","value":"tooling:alarmsetting:alarmrecord","status":"1","parent":"57","parentvalue":"","checked":"1"},{"id":"94","name":"\u53c2\u6570\u5f02\u5e38\u8bbe\u7f6e","description":"\u8bbe\u7f6e\u53c2\u6570\u5f02\u5e38\u62a5\u8b66\u6761\u4ef6","value":"mfg:parametermonitor:alarmsetting","status":"1","parent":"64","parentvalue":"","checked":"1"},{"id":"96","name":"\u4ea7\u91cf\u7edf\u8ba1\u5206\u6790","description":"\u4ea7\u91cf\u7edf\u8ba1\u5206\u6790","value":"mfg:yieldanalysis","status":"1","parent":"62","parentvalue":"","checked":"1"},{"id":"99","name":"\u8bbe\u5907\u4ea7\u91cf\u7edf\u8ba1","description":"\u5386\u53f2\u4ea7\u91cf\u7edf\u8ba1","value":"mfg:yieldanalysis:historicaloutput","status":"1","parent":"96","parentvalue":"","checked":"1"},{"id":"100","name":"\u62a5\u8b66\u6570\u636e\u5206\u6790","description":"\u6545\u969c\u7edf\u8ba1","value":"mfg:machinealarm:faultstatistics","status":"1","parent":"72","parentvalue":"","checked":"1"},{"id":"101","name":"\u62a5\u8b66\u8bb0\u5f55\u67e5\u8be2","description":"\u6545\u969c\u5217\u8868","value":"mfg:machinealarm:faultlist","status":"1","parent":"72","parentvalue":"","checked":"1"},{"id":"102","name":"\u62a5\u8b66\u4ee3\u7801\u7ba1\u7406","description":"\u6545\u969c\u4ee3\u7801\u7ba1\u7406","value":"mfg:machinealarm:faultcode","status":"1","parent":"72","parentvalue":"","checked":"1"},{"id":"103","name":"\u603b\u7b49\u7ea7\u8bbe\u7f6e","description":"\u8bbe\u7f6e\u9879\u76ee\u7684\u603b\u7684\u7b49\u7ea7","value":"project:setting:alllevel","status":"1","parent":"5","parentvalue":"","checked":"1"},{"id":"104","name":"\u9879\u76ee\u7c7b\u578b\u8bbe\u7f6e","description":"\u8bbe\u7f6e\u9879\u76ee\u7684\u7c7b\u578b","value":"project:setting:type","status":"1","parent":"5","parentvalue":"","checked":"1"},{"id":"105","name":"\u6309\u76d8\u70b9\u8ba1\u5212","description":"\u6309\u7167\u76d8\u70b9\u8ba1\u5212\u67e5\u8be2\u76d8\u70b9\u8bb0\u5f55","value":"stocktaking:record:byplan","status":"1","parent":"46","parentvalue":"","checked":"1"},{"id":"106","name":"\u6309\u4ea7\u7ebf\u533a\u57df","description":"\u6309\u7167\u4ea7\u7ebf\u533a\u57df\u67e5\u8be2\u76d8\u70b9\u8bb0\u5f55","value":"stocktaking:record:byarea","status":"1","parent":"46","parentvalue":"","checked":"1"},{"id":"107","name":"\u8ffd\u6eaf","description":"\u8ffd\u6eaf","value":"acc","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"108","name":"\u8ffd\u6eaf\u67e5\u8be2","description":"\u8ffd\u6eaf\u67e5\u8be2","value":"acc:search","status":"1","parent":"107","parentvalue":"","checked":"1"},{"id":"109","name":"DNC","description":"DNC","value":"dnc","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"110","name":"DNC\u7a0b\u5e8f\u72b6\u6001\u9884\u89c8","description":"DNC\u7a0b\u5e8f\u72b6\u6001\u9884\u89c8","value":"dnc:statuspreview","status":"1","parent":"109","parentvalue":"","checked":"1"},{"id":"111","name":"DNC\u7a0b\u5e8f\u7ba1\u7406","description":"DNC\u7a0b\u5e8f\u7ba1\u7406","value":"dnc:programupload","status":"1","parent":"109","parentvalue":"","checked":"1"},{"id":"112","name":"DNC\u7a0b\u5e8f\u5bf9\u6bd4","description":"DNC\u7a0b\u5e8f\u5bf9\u6bd4","value":"dnc:compareprogram","status":"1","parent":"109","parentvalue":"","checked":"1"},{"id":"113","name":"DNC\u7edf\u8ba1\u9875\u9762","description":"DNC\u7edf\u8ba1\u9875\u9762","value":"dnc:compareprogram:historytotal","status":"1","parent":"112","parentvalue":"","checked":"1"},{"id":"114","name":"DNC\u7a0b\u5e8f\u4e0b\u8f7d","description":"DNC\u7a0b\u5e8f\u4e0b\u8f7d","value":"dnc:programupload:programdownload","status":"1","parent":"111","parentvalue":"","checked":"1"},{"id":"115","name":"DNC\u7a0b\u5e8f\u5220\u9664","description":"DNC\u7a0b\u5e8f\u5220\u9664","value":"dnc:programupload:programdelete","status":"1","parent":"111","parentvalue":"","checked":"1"},{"id":"116","name":"\u7a0b\u5e8f\u4e0b\u8f7d(NC\u7aef)","description":"\u7a0b\u5e8f\u4e0b\u8f7d(NC\u7aef)","value":"dnc:programupload:programdownloadnc","status":"1","parent":"111","parentvalue":"","checked":"1"},{"id":"120","name":"\u4e3b\u8981\u5de5\u827a\u6d41\u7a0b","description":"\u5de5\u827a\u4fe1\u606f\u5f55\u5165","value":"mfg:craftInfo","status":"1","parent":"62","parentvalue":"","checked":"1"},{"id":"121","name":"\u8bbe\u5907\u8fd0\u884c\u72b6\u6001","description":"\u8bbe\u5907\u8fd0\u884c\u72b6\u6001","value":"mfg:status","status":"1","parent":"62","parentvalue":"","checked":"1"},{"id":"122","name":"\u62a5\u8b66\u72b6\u6001\u4e00\u89c8","description":"\u62a5\u8b66\u72b6\u6001\u4e00\u89c8","value":"mfg:machinealarm:warningstatusshow","status":"1","parent":"72","parentvalue":"","checked":"1"},{"id":"125","name":"OEE\u6307\u6807\u5206\u6790","description":"OEE\u6307\u6807\u5206\u6790","value":"mfg:efficiencyanalysis:productoee","status":"1","parent":"68","parentvalue":"","checked":"1"},{"id":"126","name":"\u751f\u4ea7\u8ba1\u5212\u8ffd\u8e2a","description":"\u751f\u4ea7\u8ba1\u5212\u8ffd\u8e2a","value":"mfg:production","status":"1","parent":"62","parentvalue":"","checked":"1"},{"id":"127","name":"\u751f\u4ea7\u8ba1\u5212\u5b89\u6392","description":"\u751f\u4ea7\u8ba1\u5212\u5b89\u6392","value":"mfg:production:productplan","status":"1","parent":"126","parentvalue":"","checked":"1"},{"id":"128","name":"\u751f\u4ea7\u6267\u884c\u62a5\u5de5","description":"\u751f\u4ea7\u6267\u884c\u62a5\u5de5","value":"mfg:production:productreport","status":"1","parent":"126","parentvalue":"","checked":"1"},{"id":"129","name":"\u751f\u4ea7\u8ba1\u5212\u6267\u884c\u5206\u6790","description":"\u751f\u4ea7\u8ba1\u5212\u6267\u884c\u5206\u6790","value":"mfg:production:productplananalysis","status":"1","parent":"126","parentvalue":"","checked":"1"},{"id":"130","name":"\u751f\u4ea7\u62a5\u5de5\u5206\u6790","description":"\u751f\u4ea7\u62a5\u5de5\u5206\u6790","value":"mfg:production:productreportalysis","status":"1","parent":"126","parentvalue":"","checked":"1"},{"id":"131","name":"\u751f\u4ea7\u72b6\u6001\u5c55\u793a","description":"\u751f\u4ea7\u72b6\u6001\u5c55\u793a","value":"mfg:producestatus","status":"1","parent":"62","parentvalue":"","checked":"1"},{"id":"132","name":"\u8f6e\u64ad\u72b6\u6001\u5c55\u793a","description":"\u4ea7\u7ebf\u8fd0\u884c\u72b6\u60012","value":"mfg:producestatus:dashboard2","status":"1","parent":"131","parentvalue":"","checked":"1"},{"id":"133","name":"\u5207\u7247\u6570\u636e\u5206\u6790","description":"\u5207\u7247\u6570\u636e\u5206\u6790","value":"mfg:slicinganalysis:sectiondataanalysis","status":"1","parent":"71","parentvalue":"","checked":"1"},{"id":"134","name":"\u751f\u4ea7\u6d41\u7a0b\u6f14\u793a","description":"\u751f\u4ea7\u6d41\u7a0b\u6f14\u793a","value":"mfg:demonstrate","status":"1","parent":"62","parentvalue":"","checked":"1"},{"id":"135","name":"\u631a\u4f18\u5c55\u793a\u89c6\u9891","description":"\u631a\u4f18\u5c55\u793a\u89c6\u9891","value":"mfg:demonstrate:zyvideo","status":"1","parent":"134","parentvalue":"","checked":"1"},{"id":"136","name":"\u6781\u503c\u8f6e\u5ed3\u7ebf\u5b66\u4e60","description":"\u6781\u503c\u8f6e\u5ed3\u7ebf\u5b66\u4e60","value":"tooling:controllimitlearning:alertsettingdev","status":"1","parent":"60","parentvalue":"","checked":"1"},{"id":"137","name":"\u4ea7\u54c1\u4fe1\u606f\u7ba1\u7406","description":"\u4ea7\u54c1\u4fe1\u606f\u7ba1\u7406","value":"product","status":"1","parent":"0","parentvalue":"","checked":"1"},{"id":"138","name":"\u4ea7\u54c1\u4fe1\u606f\u5217\u8868","description":"\u4ea7\u54c1\u4fe1\u606f\u5217\u8868","value":"product:productlist","status":"1","parent":"137","parentvalue":"","checked":"1"},{"id":"139","name":"\u4ea7\u54c1\u5217\u8868","description":"\u4ea7\u54c1\u5217\u8868\u9875\u9762","value":"product:productlist:productlistview","status":"1","parent":"138","parentvalue":"","checked":"1"},{"id":"140","name":"\u63a7\u5236\u7ebf\u5b66\u4e60","description":"\u63a7\u5236\u7ebf\u5b66\u4e60","value":"tooling:controllimitlearning:study","status":"1","parent":"60","parentvalue":"","checked":"1"},{"id":"141","name":"\u5200\u5177\u76d1\u63a7\u4eea\u8868\u76d8","description":"\u5200\u5177\u5bff\u547d\u67e5\u770b","value":"tooling:toollifeview","status":"1","parent":"47","parentvalue":"","checked":"1"},{"id":"142","name":"\u5200\u5177\u76d1\u63a7\u4eea\u8868\u76d8","description":"\u5200\u5177\u5b9e\u65f6\u5bff\u547d\u67e5\u770b\u9875\u9762","value":"tooling:toollifeview:toollifeviewdev","status":"1","parent":"141","parentvalue":"","checked":"1"},{"id":"143","name":"\u5200\u5177\u5200\u4f4d\u914d\u7f6e","description":"\u5200\u5177\u5200\u4f4d\u914d\u7f6e","value":"tooling:toolconfig","status":"1","parent":"47","parentvalue":"","checked":"1"},{"id":"144","name":"\u5200\u5177\u4fe1\u606f\u914d\u7f6e","description":"\u5200\u5177\u4fe1\u606f\u914d\u7f6e","value":"tooling:toolconfig:toolparametersettingviewdev2","status":"1","parent":"143","parentvalue":"","checked":"1"},{"id":"145","name":"\u5200\u5177\u4fe1\u606f\u7ba1\u7406","description":"\u5200\u5177\u4fe1\u606f\u7ba1\u7406","value":"tooling:toolconfig:ToolSupplier","status":"1","parent":"143","parentvalue":"","checked":"1"},{"id":"146","name":"\u8f6e\u64ad\u72b6\u6001\u8bbe\u7f6e","description":"dashboard1","value":"mfg:producestatus:dashboard1","status":"1","parent":"131","parentvalue":"","checked":"1"},{"id":"147","name":"\u5386\u53f2\u53d8\u66f4\u5bf9\u6bd4","description":"\u5386\u53f2\u53d8\u66f4\u5bf9\u6bd4","value":"dnc:compareprogram:historycompare","status":"1","parent":"112","parentvalue":"","checked":"0"},{"id":"148","name":"\u8d1f\u8f7d\u5386\u53f2\u8bb0\u5f55","description":"\u67e5\u770b\u5386\u53f2\u8d1f\u8f7d\u8d8b\u52bf\u56fe","value":"tooling:onlinemonitor:history","status":"1","parent":"48","parentvalue":"","checked":"0"},{"id":"149","name":"\u8bbe\u5907\u62a5\u8b66\u7edf\u8ba1","description":"\u8bbe\u5907\u62a5\u8b66\u7edf\u8ba1","value":"tooling:alarmsetting:alarmstatistics","status":"1","parent":"57","parentvalue":"","checked":"0"}]}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }

    /**
     * @title 设置角色权限 保存
     * @desc  设置角色权限 保存
     * @url Company/setUserRoleMaintenance
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function setUserRoleMaintenance(Request $request)
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
                'getUserRoleList'=>[

                ],     
                'getUserRole'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                ],             
                'deleteUserRole'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                ],
                'getProjectTypeRoleMaintenanceList'=>[
                    'roleid' => ['name' => 'roleid', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '角色id', 'range' => '',],
                ],'getUserRoleMaintenanceList'=>[
                    'roleid' => ['name' => 'roleid', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '角色id', 'range' => '',],
                ],
                'setProjectTypeRoleMaintenance'=>[
                    'roleid' => ['name' => 'roleid', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '角色id', 'range' => '',],
                    'permissions[]' => ['name' => 'permissions[]', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '权限数组', 'range' => '',],
                ],
                'setUserRoleMaintenance'=>[
                    'roleid' => ['name' => 'roleid', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '角色id', 'range' => '',],
                    'permissions[]' => ['name' => 'permissions[]', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '权限数组', 'range' => '',],
                ],
                'addUserRole'=>[
                    'name' => ['name' => 'name', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '名称', 'range' => '',],
                    'description' => ['name' => 'description', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '描述', 'range' => '',],
                ],
                'editUserRole'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                    'name' => ['name' => 'name', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '名称', 'range' => '',],
                    'description' => ['name' => 'description', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '描述', 'range' => '',],
                ]
                
        ];
      
        return $rules;
    }


}