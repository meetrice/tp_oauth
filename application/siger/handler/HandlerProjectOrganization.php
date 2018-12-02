<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerProjectOrganization 
 * @title 人员部门管理 班次设置
 * @url  http://61.177.28.246:8100/Config
 * @desc  人员部门管理 班次设置
 * @version 1.0
 * @readme /doc/md/HandlerCompany.md
 */
class HandlerProjectOrganization
{

	public $restMethodList = 'getProjectUserTypeBtn';

 
    /**
     * @title 部门下拉列表
     * @desc  部门下拉列表
     * @url Company/Getcompanylist
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"OK","data":[{"id":52,"title":"\u751f\u4ea7\u90e8\u95e8","type":1},{"id":53,"title":"\u7ef4\u4fee\u90e8\u95e8","type":2},{"id":54,"title":"A\u578b\u4ea4\u53c9\u5e26\u4f9b\u5e94\u5546","type":1},{"id":55,"title":"\u4fdd\u5168\u90e8\u95e8","type":4},{"id":60,"title":"\u6d4b\u8bd5\u90e8\u95e8","type":4},{"id":61,"title":"\u6d4b\u8bd5\u90e8\u95e82","type":4},{"id":64,"title":"\u6d4b\u8bd5\u90e8\u95e8444","type":4},{"id":66,"title":"\u6d4b\u8bd5\u90e8\u95e8777","type":4},{"id":85,"title":"cece","type":4},{"id":86,"title":"cscscc","type":4},{"id":87,"title":"cscscscscsc","type":4},{"id":88,"title":"qwqwqwqw","type":4},{"id":89,"title":"20","type":4},{"id":90,"title":"\u5de5\u827a\u90e8\u95e8","type":3}]}
     */
    public function getProjectUserTypeBtn(Request $request)
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
                'getProjectUserTypeBtn'=>[
                    
                ]
                
        ];
      
        return $rules;
    }


}