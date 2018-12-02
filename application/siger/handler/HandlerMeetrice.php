<?php
namespace app\siger\handler;

class HandlerMeetrice
{

    public function getData($request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '
{"ret":1,"msg":"\u83b7\u53d6\u6570\u636e\u6210\u529f","page":1,"pagesize":10,"total":74,"data":[{"id":"107","t1":"NC\u8f66\u5e8a","t2":"N\/A","description":"NC\u8f66\u5e8a","parentid":"0","nums":8},{"id":"110","t1":"M\/C\u4e2d\u5fc3\u673a","t2":"N\/A","description":"M\/C\u4e2d\u5fc3\u673a","parentid":"0","nums":1},{"id":"112","t1":"\u5e73\u8861\u673a","t2":"N\/A","description":"\u5e73\u8861\u673a","parentid":"0","nums":1},{"id":"175","t1":"\u6d4b\u8bd5\u673a","t2":"N\/A","description":"\u5e73\u8861\u6d4b\u8bd5","parentid":"0","nums":0},{"id":"176","t1":"\u7535\u8111\u91cf\u5177","t2":"N\/A","description":"\u91cf\u5177","parentid":"0","nums":0},{"id":"249","t1":"\u6d4b\u8bd5\u673a\u578b","t2":"N\/A","description":"\u662f\u5927\u65f6\u4ee3\u53d1\u751f","parentid":"0","nums":0},{"id":"250","t1":"\u6492\u6253\u53d1\u65af\u8482\u82ac","t2":"N\/A","description":"\u6309\u65f6\u53d1\u65af\u8482\u82ac","parentid":"0","nums":0},{"id":"251","t1":"\u71c3\u6c14\u70ed\u60c5\u4e3av","t2":"N\/A","description":"\u71c3\u6c14\u70ed\u60c5\u4e3avADa","parentid":"0","nums":0},{"id":"270","t1":"\u7236\u7ea7\u8bbe\u5907\u7c7b\u578b","t2":"N\/A","description":"\u7236\u7ea7","parentid":"0","nums":0},{"id":"283","t1":"\u4ea7\u54c1A","t2":"N\/A","description":"\u6d4b\u8bd52","parentid":"0","nums":0}]}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }
    public function getMenu($request)
    {

        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '
{"ret":1,"msg":"获取数据成功","page":1,"pagesize":10,"total":74,"data":[{"id":"107","t1":"NC车床","t2":"N\/A","description":"NC车床","parentid":"0","nums":8},{"id":"110","t1":"M\/C中心机","t2":"N\/A","description":"M\/C中心机","parentid":"0","nums":1},{"id":"112","t1":"平衡机","t2":"N\/A","description":"平衡机","parentid":"0","nums":1},{"id":"175","t1":"测试机","t2":"N\/A","description":"平衡测试","parentid":"0","nums":0},{"id":"176","t1":"电脑量具","t2":"N\/A","description":"量具","parentid":"0","nums":0},{"id":"249","t1":"测试机型","t2":"N\/A","description":"是大时代发生","parentid":"0","nums":0},{"id":"250","t1":"撒打发斯蒂芬","t2":"N\/A","description":"按时发斯蒂芬","parentid":"0","nums":0},{"id":"251","t1":"燃气热情为v","t2":"N\/A","description":"燃气热情为vADa","parentid":"0","nums":0},{"id":"270","t1":"父级设备类型","t2":"N\/A","description":"父级","parentid":"0","nums":0},{"id":"283","t1":"产品A","t2":"N\/A","description":"测试2","parentid":"0","nums":0}]}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    }
}
