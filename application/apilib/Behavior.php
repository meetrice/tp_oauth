<?php


namespace app\apilib;


use think\Log;

class Behavior
{
    public function apiEnd(&$param)
    {
        Log::write('apiEnd', json_encode($param));
    }

}