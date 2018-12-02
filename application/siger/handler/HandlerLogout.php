<?php
namespace app\siger\handler;
use think\Session;
class HandlerLogout{
    public function index()
    {
	   $ret = '{"ret":1,"msg":""}';
       Session::clear();
       return json(json_decode($ret), 200);
    }   
}	
?>