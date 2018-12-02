<?php

namespace app\siger\controller;


use app\demo\auth\BasicAuth;
use app\demo\auth\OauthAuth;
use think\Request;

class Auth
{
    public function accessToken()
    {
		
        $request = Request::instance();

        $OauthAuth = new OauthAuth();
      return $OauthAuth->accessToken($request);
    }

}