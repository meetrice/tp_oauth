<?php

namespace app\apilib;


use think\exception\HttpResponseException;
use think\Hook;
use think\Request;

class BaseRest extends Common
{

    //是否权限验证
    public $apiAuth = false;

    //业务错误码的映射表
    public $errMap = [
        0 => 'success',//没有错误

        1001 => '参数错误',
        9999 => '自定义错误'//让程序给出的自定义错误
    ];

    public function __construct()
    {

        //判断是否开启权限验证
        $this->apiAuth = (config('api_auth')) ? $this->apiAuth : false;

        //前置钩子
        $request = Request::instance();
        Hook::listen('api_begin', $request);
        //  重写 rest 类
        // 资源类型检测
        $ext = $request->ext();
        if ('' == $ext) {
            // 自动检测资源类型
            $this->type = $request->type();
        } elseif (!preg_match('/\(' . $this->restTypeList . '\)$/i', $ext)) {
            // 资源类型非法 则用默认资源类型访问
            $this->type = $this->restDefaultType;
        } else {
            $this->type = $ext;
        }
        //设置响应类型
        $this->setRestType($request);
        //权限验证
        if ($this->apiAuth) $this->auth($request);
        // 请求方式检测
        $this->method = strtolower($request->method());
    }

    /**
     * 具体执行
     * @param Request $request
     * @return mixed
     */
    public function init(Request $request)
    {
        // 判断接口是否允许该方式接口
        if (false === stripos($this->restMethodList, $this->method)) {
            $this->setResponseArr(403, 'not method!');
            return $this->notMethod();
        }
        $action = $this->method . 'Response';
        return $this->$action($request);
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
        return [
            'all' => [
                //全部
            ],
            'get' => [

            ],
            'post' => [

            ],
            'put' => [

            ],
            'delete' => [

            ],
            'patch' => [

            ],
            'head' => [

            ],
            'options' => [

            ],
        ];

    }

    /**
     * 验证
     * @param Request $request
     * @return bool
     */
    public function auth(Request $request)
    {
        $BaseAuth = new BaseAuth();
        if ($BaseAuth->auth($request) == false) {
            $this->errCode = $BaseAuth->error;
            throw new HttpResponseException($this->setResponseArr($this->errCode, 'authentication Failed')->response('', '', 403));
        } else {
            return true;
        }
    }


    public function __destruct()
    {
        $request = Request::instance();
        Hook::listen('api_end', $request);
    }

    // |====================================
    // |具体响应子类重写
    // |====================================

    /**
     * @title GET的响应
     * @desc GET的描述
     * @readme /doc/md/method.md
     * @param Request $request
     * @return string message 错误信息
     * @return int errCode 错误号
     */
    public function getResponse(Request $request)
    {
        return $this->setResponseArr(0, 'Default  GET Response!')->response('', '', 403);
    }

    /**
     * @title POST的响应
     * @desc POST的描述
     * @readme /doc/md/method.md
     * @param Request $request
     * @return string message 错误信息
     * @return int errCode 错误号
     */
    public function postResponse(Request $request)
    {
        return $this->setResponseArr(0, 'Default  POST Response!')->response('', '', 403);
    }

    /**
     * @title PUT的响应
     * @desc PUT的描述
     * @readme /doc/md/method.md
     * @param Request $request
     * @return string message 错误信息
     * @return int errCode 错误号
     */
    public function putResponse(Request $request)
    {
        return $this->setResponseArr(0, 'Default  PUT Response!')->response('', '', 403);
    }

    /**
     * @title DELETE的响应
     * @desc DELETE的描述
     * @readme /doc/md/method.md
     * @param Request $request
     * @return string message 错误信息
     * @return int errCode 错误号
     */
    public function deleteResponse(Request $request)
    {
        return $this->setResponseArr(0, 'Default  DELETE Response!')->response('', '', 403);
    }

    /**
     * @title PATCH的响应
     * @desc PATCH的描述
     * @readme /doc/md/method.md
     * @param Request $request
     * @return string message 错误信息
     * @return int errCode 错误号
     */
    public function patchResponse(Request $request)
    {
        return $this->setResponseArr(0, 'Default  PATH Response!')->response('', '', 403);
    }

    /**
     * @title HEAD的响应
     * @desc HEAD的描述
     * @readme /doc/md/method.md
     * @param Request $request
     * @return string message 错误信息
     * @return int errCode 错误号
     */
    public function headResponse(Request $request)
    {
        return $this->setResponseArr(0, 'Default  HEAD Response!')->response('', '', 403);
    }

    /**
     * @title OPTIONS的响应
     * @desc OPTIONS的描述
     * @readme /doc/md/method.md
     * @param Request $request
     * @return string message 错误信息
     * @return int errCode 错误号
     */
    public function optionsResponse(Request $request)
    {
        return $this->setResponseArr(0, 'Default  OPTIONS Response!')->response('', '', 403);
    }


}