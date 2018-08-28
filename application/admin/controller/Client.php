<?php

namespace app\admin\controller;


use service\HttpService;
use think\Controller;
use think\Db;


  
class Client extends Controller
{
    public $table = 'Abcd';


    
    public function index()
    {
        $post_data = array(
        'client_id' => '20882088',
        'client_secret' => 'nGk5R2wrnZqQ02bed29rjzax1QWRIu1O',
        );

        $url='http://oauth.rc3cr.com/demo/auth/accessToken.html';
        $res = HttpService::post($url, $post_data);
        if (!$res)  return json(['error'=>1,'msg'=>'授权错误']);
        $retobj = json_decode($res);
        $access_token = $retobj->access_token;

        $dataurl = 'http://oauth.rc3cr.com/demo/user/get.html?page='.$this->request->get('page').'&access_token=' . $access_token;
        $result = HttpService::post($dataurl);
        return json(json_decode($result));
    }


    public function read()
    {
        $post_data = array(
        'client_id' => '20882088',
        'client_secret' => 'nGk5R2wrnZqQ02bed29rjzax1QWRIu1O',
        );

        $url='http://oauth.rc3cr.com/demo/auth/accessToken.html';
        $res = HttpService::post($url, $post_data);
        if (!$res)  return json(['error'=>1,'msg'=>'授权错误']);
        $retobj = json_decode($res);
        $access_token = $retobj->access_token;

        $dataurl = 'http://oauth.rc3cr.com/demo/user/get.html?id='.$this->request->get('id').'&access_token=' . $access_token;
        $result = HttpService::post($dataurl);
        return json(json_decode($result));
    }

    public function save()
    {
        $post_data = array(
        'client_id' => '20882088',
        'client_secret' => 'nGk5R2wrnZqQ02bed29rjzax1QWRIu1O',
        );

        $url='http://oauth.rc3cr.com/demo/auth/accessToken.html';
        $res = HttpService::post($url, $post_data);
        if (!$res)  return json(['error'=>1,'msg'=>'授权错误']);
        $retobj = json_decode($res);
        $access_token = $retobj->access_token;

        $dataurl = 'http://oauth.rc3cr.com/demo/user/post.html?access_token=' . $access_token;
        $params = array(
        'content' => 'aaaa',
        'testradaaio' => 'bbb',
        );
        $result = HttpService::post($dataurl, $params);
        return json(json_decode($result));
    }
    public function update()
    {
        $post_data = array(
        'client_id' => '20882088',
        'client_secret' => 'nGk5R2wrnZqQ02bed29rjzax1QWRIu1O',
        );

        $url='http://oauth.rc3cr.com/demo/auth/accessToken.html';
        $res = HttpService::post($url, $post_data);
        if (!$res)  return json(['error'=>1,'msg'=>'授权错误']);
        $retobj = json_decode($res);
        $access_token = $retobj->access_token;

        $dataurl = 'http://oauth.rc3cr.com/demo/user/post.html?access_token=' . $access_token;
        $params = array(
        'id' => '2',
        'content' => 'aaaa',
        'testradaaio' => 'bbb',
        );

        $result = HttpService::post($dataurl, $params);
        return json(json_decode($result));
    }

    public function delete()
    {
        $post_data = array(
        'client_id' => '20882088',
        'client_secret' => 'nGk5R2wrnZqQ02bed29rjzax1QWRIu1O',
        );

        $url='http://oauth.rc3cr.com/demo/auth/accessToken.html';
        $res = HttpService::post($url, $post_data);
        if (!$res)  return json(['error'=>1,'msg'=>'授权错误']);
        $retobj = json_decode($res);
        $access_token = $retobj->access_token;

        $dataurl = 'http://oauth.rc3cr.com/demo/user/delete.html?id=5&access_token=' . $access_token;
        $result = HttpService::post($dataurl);
        return json(json_decode($result));
    }
}
