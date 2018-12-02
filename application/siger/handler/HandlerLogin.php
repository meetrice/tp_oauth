<?php
namespace app\siger\handler;

class HandlerLogin
{
    public function index($request)
    {

        $email    = $request->post('email');
        $password = $request->post('password');

        if ($email == 'admin' && $password == 'admin') {
            $token = self::settoken();
            session('token', $token);
            $ret = '{"ret":1,"msg":"登录成功","token":"' . $token . '"}';

        } else {
            $ret = '{"ret":0,"msg":"登录失败"}';
        }
        return json(json_decode($ret), 200);
    }
    public static function settoken()
    {
        $str = md5(uniqid(md5(microtime(true)), true)); //生成一个不会重复的字符串
        $str = sha1($str); //加密
        return $str;
    }
}
