<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerProjectUser 
 * @title 获得当前用户 显示于全局右上角
 * @url  http://61.177.28.246:8100/Config
 * @desc  获得当前用户 显示于全局右上角
 * @version 1.0
 * @readme 
 */
class HandlerProjectUser
{

	public $restMethodList = 'getCurrentUserInfo';

 
    /**
     * @title 获得当前用户 显示于全局右上角
     * @desc  获得当前用户 显示于全局右上角
     * @url ProjectUser/getCurrentUserInfo
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"OK","data":{"mid":39,"name":"\u59da\u5efa\u56fd","work_code":"1001","sex":"\u7537","sectionid":52,"usergroupid":"58","mobile":"13012345678","work_email":"66@qq.com","fixed_line":"11111","sectiontitle":"\u751f\u4ea7\u90e8\u95e8","usergrouptitle":"\u751f\u4ea7\u5458\u5de5","face":"http:\/\/cloud.siger-data.com\/Upload\/image\/2018-02-04\/87f61b5198d455e7ce32c13712974463.jpg"}}
     */
    public function getCurrentUserInfo(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"OK","data":{"mid":39,"name":"\u59da\u5efa\u56fd","work_code":"1001","sex":"\u7537","sectionid":52,"usergroupid":"58","mobile":"13012345678","work_email":"66@qq.com","fixed_line":"11111","sectiontitle":"\u751f\u4ea7\u90e8\u95e8","usergrouptitle":"\u751f\u4ea7\u5458\u5de5","face":"http:\/\/cloud.siger-data.com\/Upload\/image\/2018-02-04\/87f61b5198d455e7ce32c13712974463.jpg"}}';
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
                'getCurrentUserInfo'=>[
                    
                ]
                
        ];
      
        return $rules;
    }


}