<?php
namespace app\siger\controller;

class HandlerLogin{
    public  function index()
    {
	    $test = '{"ret":1,"msg":"\u767b\u5f55\u6210\u529f"}';
        return json(json_decode($test), 200);
    }
}