<?php


namespace app\demo\controller;


use think\Request;
use think\Db;
/**
 * Class User
 * @title 用户接口
 * @url  http://oauth.rc3cr.com/demo/user/index.html
 * @desc  用户信息相关接口
 * @version 1.0
 * @readme /doc/md/user.md
 */
class User extends Base
{
    //是否开启授权认证
    public $apiAuth = true;
    //附加方法
    protected $extraActionList = ['sendCode'];
    //跳过鉴权的方法
    protected $skipAuthActionList = ['sendCode'];
	public $restMethodList = 'get|post|delete';
    public $table = 'Abcd';

    /**
     * @title 发送CODE
     * @readme /doc/md/method.md
     */
    public function sendCode()
    {
        //send message
        return $this->sendSuccess(['code'=>123]);

    }

    /**
     * @title 获取列表
     * @desc  获取列表
     * @readme /doc/md/method.md
     * @param \think\Request $request
     * @return string message 错误信息
     * @return int errCode 错误号
     */
    public function get(Request $request)
    {
        $id = $request->get('id');
        if (isset($id)&&!empty($id)) {
            $abcd=Db::name($this->table)->where('id',$id)->find();
            return json($abcd, 200);
        }else{
            $data=Db::name('Abcd')->paginate(10, false, ['query' => $request->get()]);
            return json($data, 200);
        }

    }
    /**
     * @title 创建用户
     * @param Request $request
     * @return string name 名字
     * @return string id  id
     * @return object user  用户信息
     * @readme /doc/md/method.md
     * @param  \think\Request $request
     */
    public function post(Request $request)
    {
        $data = $request->post();
        if (isset($data['id'])) {
             return Db::name($this->table)->update($data);
        }else{
             return Db::name($this->table)->insert($data);
        }
       
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return object user  用户信息
     * @title 删除用户
     * @return \think\Response
     */
    public function delete($id)
    {
        $data = ['id'=>$id];
        return Db::name($this->table)->delete($data);
    }



    public function authenticate(Request $request)
    {
        return true;
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
                    'time'=> ['name' => 'time', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '时间戳', 'range' => '',]
                ],

                'get'=>[
                    'id' => ['name' => 'id', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '用户id', 'range' => '',]
                ],
                'post'=>[
                    'username' => ['name' => 'username', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '用户名', 'range' => '',],
                    'age' => ['name' => 'age', 'type' => 'int', 'require' => 'true', 'default' => '18', 'desc' => '年龄', 'range' => '0-200',],
                ],
                'delete'=>[
                    'username' => ['name' => 'username', 'type' => 'string', 'require' => 'true', 'default' => '', 'desc' => '用户名', 'range' => '',],
                    'age' => ['name' => 'age', 'type' => 'int', 'require' => 'true', 'default' => '18', 'desc' => '年龄', 'range' => '0-200',],
                ]
        ];
      
        return $rules;
    }


}