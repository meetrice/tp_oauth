<?php

namespace app\demo\controller;


use DawnApi\facade\ApiController;
class Base extends ApiController
{

    //是否开启授权认证
    public    $apiAuth = true;

}