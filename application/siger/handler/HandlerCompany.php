<?php
namespace app\siger\handler;
use think\Request;
use think\Db;

/**
 * Class HandlerCompany
 * @title 企业管理
 * @url  http://61.177.28.246:8100/Config
 * @desc  企业管理接口
 * @version 1.0
 * @readme
 */
class HandlerCompany
{

	public $restMethodList = 'Getcompanylist|GetCompany|getIndustryFirstLists|getIndustrySecondLists|AddCompany|GetCompanyItem|EditCompany|DeleteCompany';

 
    /**
     * @title 获取列表
     * @desc  获取列表
     * @url Company/Getcompanylist
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example { "ret": 1, "msg": "获取成功", "data": [ { "id": "25", "chinesename": "富士和", "chinesepinyin": "FJW", "country": "", "province": "江苏省", "city": "南京市", "county": "玄武区", "detailaddress": "华灵路12号", "fatherid": "0", "brandid": "0", "industry_first": "1", "industry_second": "1", "industry_third": "0", "lat": "100.0000000000", "lon": "999.9999999999", "telephone": "18312345623", "website": "www.fjw.com", "email": "admin@fjw.com.cn", "type": "0", "litpic": "http://d62.ichuk.com/Upload/image/20171217/4a0531d47d37ed8de96ab32dbe6d0b7d.png", "description": "刹车盘", "status": "1", "mid": "0", "companycode": "xxxb35234543vxzzc", "identification": "未认证", "contact": "", "create_time": "2018-01-25 17:28:08", "industry": "农、林、牧、渔业-农业" }, { "id": "41", "chinesename": "测试联系人", "chinesepinyin": "CSLXR", "country": "", "province": "北京市", "city": "市辖区", "county": "东城区", "detailaddress": "国际金融大厦111号", "fatherid": "0", "brandid": "0", "industry_first": "0", "industry_second": "0", "industry_third": "0", "lat": "0.0000000000", "lon": "0.0000000000", "telephone": "18772727272", "website": "212", "email": "test@qq.com", "type": "0", "litpic": "", "description": "34356", "status": "1", "mid": "0", "companycode": "212", "identification": "已认证", "contact": "宋健安", "create_time": "2018-05-23 10:10:11", "industry": "无所属" } ], "total": "2", "page": 1, "pagesize": 10 } 
     */
    public function Getcompanylist(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '
{"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"25","chinesename":"\u5bcc\u58eb\u548c","chinesepinyin":"FJW","country":"","province":"\u6c5f\u82cf\u7701","city":"\u5357\u4eac\u5e02","county":"\u7384\u6b66\u533a","detailaddress":"\u534e\u7075\u8def12\u53f7","fatherid":"0","brandid":"0","industry_first":"1","industry_second":"1","industry_third":"0","lat":"100.0000000000","lon":"999.9999999999","telephone":"18312345623","website":"www.fjw.com","email":"admin@fjw.com.cn","type":"0","litpic":"http:\/\/d62.ichuk.com\/Upload\/image\/20171217\/4a0531d47d37ed8de96ab32dbe6d0b7d.png","description":"\u5239\u8f66\u76d8","status":"1","mid":"0","companycode":"xxxb35234543vxzzc","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08","industry":"\u519c\u3001\u6797\u3001\u7267\u3001\u6e14\u4e1a-\u519c\u4e1a"},{"id":"27","chinesename":"\u4e09\u53cb\u673a\u68b0","chinesepinyin":"Sanyou","country":"","province":"\u91cd\u5e86\u5e02","city":"\u53bf","county":"\u74a7\u5c71\u53bf","detailaddress":"\u91cd\u5e86\u4e09\u53cb\u673a\u68b0\u516c\u53f8","fatherid":"0","brandid":"0","industry_first":"16","industry_second":"181","industry_third":"0","lat":"12.0000000000","lon":"12.0000000000","telephone":"13567234532","website":"www.sanyou.com","email":"admin@sanyou.com","type":"0","litpic":"http:\/\/d62.ichuk.com\/Upload\/image\/20171217\/f9918ca0e38f7b7f2bdd218c3d1d0802.png","description":"\u4e09\u53cb","status":"1","mid":"0","companycode":"XX","identification":"\u672a\u8ba4\u8bc1","contact":"21212","create_time":"2018-01-30 14:55:27","industry":"\u6559\u80b2-\u6559\u80b2"},{"id":"29","chinesename":"\u7fa4\u51ef\u5229\u7cbe\u5de5","chinesepinyin":"Qunkaili","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u864e\u4e18\u533a","detailaddress":"\u6728\u6e0e\u9547\u91d1\u957f\u8def100\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"12","industry_third":"0","lat":"12.0000000000","lon":"12.0000000000","telephone":"121","website":"http:\/\/www.qunkaili.com\/","email":"admin@.qunkaili.com","type":"0","litpic":"http:\/\/d62.ichuk.com\/Upload\/image\/20171217\/b1e772fd416ce8d5be1a5969d65045df.png","description":"12","status":"1","mid":"0","companycode":"12","identification":"\u672a\u8ba4\u8bc1","contact":"asdaaaa","create_time":"2018-02-03 18:47:07","industry":"\u5236\u9020\u4e1a-\u519c\u526f\u98df\u54c1\u52a0\u5de5\u4e1a"},{"id":"32","chinesename":"\u76fe\u5b89\u96c6\u56e2","chinesepinyin":"DUNAN","country":"","province":"\u6d59\u6c5f\u7701","city":"\u7ecd\u5174\u5e02","county":"\u8bf8\u66a8\u5e02","detailaddress":"\u676d\u5dde\u6ee8\u6c5f","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"123","website":"http:\/\/www.chinadunan.com","email":"admin@chinadunan.com","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-03\/68638b7ebece6badfc274041926e17d1.png","description":"chinadunan.com","status":"1","mid":"0","companycode":"DA","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08","industry":"\u5236\u9020\u4e1a-\u755c\u7267\u4e1a"},{"id":"33","chinesename":"\u897f\u683c\u6570\u636e","chinesepinyin":"Siger Data","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u521b\u610f\u4ea7\u4e1a\u56ed","fatherid":"0","brandid":"0","industry_first":"10","industry_second":"125","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18362665274","website":"www.siger-data.com","email":"test2@qq.com","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-04\/b7668891d71649055bd20c637a582f33.png","description":"Siger Data","status":"1","mid":"0","companycode":"Siger Data","identification":"\u672a\u8ba4\u8bc1","contact":"a","create_time":"2018-05-07 10:35:27","industry":"\u91d1\u878d\u4e1a-\u94f6\u884c\u4e1a"},{"id":"35","chinesename":"\u6606\u5c71\u516d\u4e30\u673a\u68b0\u5de5\u4e1a\u6709\u9650\u516c\u53f8","chinesepinyin":"liufeng","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u6606\u5c71\u5e02","detailaddress":"\u5f85\u5b9a","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"19999999999","website":"1","email":"1","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-05\/1b4c1ac13cc551db22d77b10f4bbb8f0.jpg","description":"1","status":"1","mid":"0","companycode":"1","identification":"\u5df2\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08","industry":"\u5236\u9020\u4e1a-\u755c\u7267\u4e1a"},{"id":"36","chinesename":"\u82cf\u5dde\u5e02\u6c38\u521b\u91d1\u5c5e\u79d1\u6280\u6709\u9650\u516c\u53f8","chinesepinyin":"YCJS","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u82cf\u5dde\u5e02\u5434\u4e2d\u533a\u80e5\u53e3\u9547\u6d66\u5e84\u5927\u90533699\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18913505093","website":"http:\/\/www.sz-dsbj.com\/","email":"maggie@sz-dsbj.com","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-07\/add78360929f9a29a795cd8514b83b82.jpg","description":"\u7cbe\u5bc6\u52a0\u5de5","status":"1","mid":"0","companycode":"91320500703719732P","identification":"\u5df2\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08","industry":"\u5236\u9020\u4e1a-\u755c\u7267\u4e1a"},{"id":"37","chinesename":"\u83f2\u820d\u5c14\u822a\u7a7a\u90e8\u4ef6\uff08\u9547\u6c5f\uff09\u6709\u9650\u516c\u53f8","chinesepinyin":"Fesher","country":"","province":"\u6c5f\u82cf\u7701","city":"\u9547\u6c5f\u5e02","county":"\u4eac\u53e3\u533a","detailaddress":"\u5927\u6e2f\u65b0\u533a\u570c\u5c71\u8def88\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"NA","website":"http:\/\/www.fesher.net\/","email":"NA","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-09\/b373ab9b35cf416e7c4c6ba4e86eceb1.png","description":"\u822a\u7a7a","status":"1","mid":"0","companycode":"NA","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08","industry":"\u5236\u9020\u4e1a-\u755c\u7267\u4e1a"},{"id":"39","chinesename":"\u82cf\u5dde\u5bc6\u5361\u7279\u8bfa\u7cbe\u5bc6\u673a\u68b0\u6709\u9650\u516c\u53f8","chinesepinyin":"Mica Technology(Suzhou)Co.,Ltd.","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u65b0\u6cfd\u8def80\u53f7","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"","website":"","email":"","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08","industry":"\u65e0\u6240\u5c5e"},{"id":"41","chinesename":"\u6d4b\u8bd5\u8054\u7cfb\u4eba","chinesepinyin":"CSLXR","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u4e1c\u57ce\u533a","detailaddress":"\u56fd\u9645\u91d1\u878d\u5927\u53a6111\u53f7","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18772727272","website":"212","email":"test@qq.com","type":"0","litpic":"","description":"34356","status":"1","mid":"0","companycode":"212","identification":"\u5df2\u8ba4\u8bc1","contact":"\u5b8b\u5065\u5b89","create_time":"2018-05-23 10:10:11","industry":"\u65e0\u6240\u5c5e"}],"total":"28","page":1,"pagesize":10}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }

    /**
     * @title 行业类别一级
     * @desc  行业类别一级
     * @url Company/getIndustryFirstLists
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"OK","data":[{"id":1,"name":"\u519c\u3001\u6797\u3001\u7267\u3001\u6e14\u4e1a"},{"id":2,"name":"\u91c7\u77ff\u4e1a"},{"id":3,"name":"\u5236\u9020\u4e1a"},{"id":4,"name":"\u7535\u529b\u3001\u71c3\u6c14\u53ca\u6c34\u7684\u751f\u4ea7\u548c\u4f9b\u5e94"},{"id":5,"name":"\u5efa\u7b51\u4e1a"},{"id":6,"name":"\u4ea4\u901a\u8fd0\u8f93\u3001\u4ed3\u50a8\u548c\u90ae\u653f"},{"id":7,"name":"\u4fe1\u606f\u4f20\u8f93\u3001\u8ba1\u7b97\u673a\u670d\u52a1\u548c\u8f6f\u4ef6\u4e1a"},{"id":8,"name":"\u6279\u53d1\u548c\u96f6\u552e"},{"id":9,"name":"\u4f4f\u5bbf\u548c\u9910\u996e\u4e1a"},{"id":10,"name":"\u91d1\u878d\u4e1a"},{"id":11,"name":"\u623f\u5730\u4ea7\u4e1a"},{"id":12,"name":"\u79df\u8d41\u548c\u5546\u52a1\u670d\u52a1"},{"id":13,"name":"\u79d1\u5b66\u7814\u7a76\u3001\u6280\u672f\u670d\u52a1\u548c\u5730\u8d28\u52d8\u67e5"},{"id":14,"name":"\u6c34\u5229\u3001\u73af\u5883\u548c\u516c\u5171\u8bbe\u65bd\u7ba1\u7406"},{"id":15,"name":"\u5c45\u6c11\u670d\u52a1\u548c\u5176\u4ed6\u670d\u52a1"},{"id":16,"name":"\u6559\u80b2"},{"id":17,"name":"\u536b\u751f\u3001\u793e\u4f1a\u4fdd\u969c\u548c\u793e\u4f1a\u798f\u5229"},{"id":18,"name":"\u6587\u5316\u3001\u4f53\u80b2\u548c\u5a31\u4e50\u4e1a"},{"id":19,"name":"\u516c\u5171\u7ba1\u7406\u548c\u793e\u4f1a\u7ec4\u7ec7"},{"id":20,"name":"\u56fd\u9645\u7ec4\u7ec7"}]} 
     */
    public function getIndustryFirstLists(Request $request)
    {

    }
    /**
     * @title 行业类别二级
     * @desc  行业类别二级
     * @url ?/Company/getIndustryFirstLists
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"OK","data":[{"id":1,"name":"\u519c\u4e1a"},{"id":2,"name":"\u6797\u4e1a"},{"id":3,"name":"\u755c\u7267\u4e1a"},{"id":4,"name":"\u6e14\u4e1a"},{"id":5,"name":"\u519c\u3001\u6797\u3001\u7267\u3001\u6e14\u670d\u52a1"}]} 
     */
    public function getIndustrySecondLists(Request $request)
    {

    }



    /**
     * @title 项目管理 获取公司下拉列表
     * @desc  项目管理 获取公司下拉列表
     * @url Company/GetCompany
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"25","chinesename":"\u5bcc\u58eb\u548c","chinesepinyin":"FJW","country":"","province":"\u6c5f\u82cf\u7701","city":"\u5357\u4eac\u5e02","county":"\u7384\u6b66\u533a","detailaddress":"\u534e\u7075\u8def12\u53f7","fatherid":"0","brandid":"0","industry_first":"1","industry_second":"1","industry_third":"0","lat":"100.0000000000","lon":"999.9999999999","telephone":"18312345623","website":"www.fjw.com","email":"admin@fjw.com.cn","type":"0","litpic":"http:\/\/d62.ichuk.com\/Upload\/image\/20171217\/4a0531d47d37ed8de96ab32dbe6d0b7d.png","description":"\u5239\u8f66\u76d8","status":"1","mid":"0","companycode":"xxxb35234543vxzzc","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"27","chinesename":"\u4e09\u53cb\u673a\u68b0","chinesepinyin":"Sanyou","country":"","province":"\u91cd\u5e86\u5e02","city":"\u53bf","county":"\u74a7\u5c71\u53bf","detailaddress":"\u91cd\u5e86\u4e09\u53cb\u673a\u68b0\u516c\u53f8","fatherid":"0","brandid":"0","industry_first":"16","industry_second":"181","industry_third":"0","lat":"12.0000000000","lon":"12.0000000000","telephone":"13567234532","website":"www.sanyou.com","email":"admin@sanyou.com","type":"0","litpic":"http:\/\/d62.ichuk.com\/Upload\/image\/20171217\/f9918ca0e38f7b7f2bdd218c3d1d0802.png","description":"\u4e09\u53cb","status":"1","mid":"0","companycode":"XX","identification":"\u672a\u8ba4\u8bc1","contact":"21212","create_time":"2018-01-30 14:55:27"},{"id":"29","chinesename":"\u7fa4\u51ef\u5229\u7cbe\u5de5","chinesepinyin":"Qunkaili","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u864e\u4e18\u533a","detailaddress":"\u6728\u6e0e\u9547\u91d1\u957f\u8def100\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"12","industry_third":"0","lat":"12.0000000000","lon":"12.0000000000","telephone":"121","website":"http:\/\/www.qunkaili.com\/","email":"admin@.qunkaili.com","type":"0","litpic":"http:\/\/d62.ichuk.com\/Upload\/image\/20171217\/b1e772fd416ce8d5be1a5969d65045df.png","description":"12","status":"1","mid":"0","companycode":"12","identification":"\u672a\u8ba4\u8bc1","contact":"asdaaaa","create_time":"2018-02-03 18:47:07"},{"id":"32","chinesename":"\u76fe\u5b89\u96c6\u56e2","chinesepinyin":"DUNAN","country":"","province":"\u6d59\u6c5f\u7701","city":"\u7ecd\u5174\u5e02","county":"\u8bf8\u66a8\u5e02","detailaddress":"\u676d\u5dde\u6ee8\u6c5f","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"123","website":"http:\/\/www.chinadunan.com","email":"admin@chinadunan.com","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-03\/68638b7ebece6badfc274041926e17d1.png","description":"chinadunan.com","status":"1","mid":"0","companycode":"DA","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"33","chinesename":"\u897f\u683c\u6570\u636e","chinesepinyin":"Siger Data","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u521b\u610f\u4ea7\u4e1a\u56ed","fatherid":"0","brandid":"0","industry_first":"10","industry_second":"125","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18362665274","website":"www.siger-data.com","email":"test2@qq.com","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-04\/b7668891d71649055bd20c637a582f33.png","description":"Siger Data","status":"1","mid":"0","companycode":"Siger Data","identification":"\u672a\u8ba4\u8bc1","contact":"a","create_time":"2018-05-07 10:35:27"},{"id":"35","chinesename":"\u6606\u5c71\u516d\u4e30\u673a\u68b0\u5de5\u4e1a\u6709\u9650\u516c\u53f8","chinesepinyin":"liufeng","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u6606\u5c71\u5e02","detailaddress":"\u5f85\u5b9a","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"19999999999","website":"1","email":"1","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-05\/1b4c1ac13cc551db22d77b10f4bbb8f0.jpg","description":"1","status":"1","mid":"0","companycode":"1","identification":"\u5df2\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"36","chinesename":"\u82cf\u5dde\u5e02\u6c38\u521b\u91d1\u5c5e\u79d1\u6280\u6709\u9650\u516c\u53f8","chinesepinyin":"YCJS","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u82cf\u5dde\u5e02\u5434\u4e2d\u533a\u80e5\u53e3\u9547\u6d66\u5e84\u5927\u90533699\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18913505093","website":"http:\/\/www.sz-dsbj.com\/","email":"maggie@sz-dsbj.com","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-07\/add78360929f9a29a795cd8514b83b82.jpg","description":"\u7cbe\u5bc6\u52a0\u5de5","status":"1","mid":"0","companycode":"91320500703719732P","identification":"\u5df2\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"37","chinesename":"\u83f2\u820d\u5c14\u822a\u7a7a\u90e8\u4ef6\uff08\u9547\u6c5f\uff09\u6709\u9650\u516c\u53f8","chinesepinyin":"Fesher","country":"","province":"\u6c5f\u82cf\u7701","city":"\u9547\u6c5f\u5e02","county":"\u4eac\u53e3\u533a","detailaddress":"\u5927\u6e2f\u65b0\u533a\u570c\u5c71\u8def88\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"NA","website":"http:\/\/www.fesher.net\/","email":"NA","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-09\/b373ab9b35cf416e7c4c6ba4e86eceb1.png","description":"\u822a\u7a7a","status":"1","mid":"0","companycode":"NA","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"39","chinesename":"\u82cf\u5dde\u5bc6\u5361\u7279\u8bfa\u7cbe\u5bc6\u673a\u68b0\u6709\u9650\u516c\u53f8","chinesepinyin":"Mica Technology(Suzhou)Co.,Ltd.","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u65b0\u6cfd\u8def80\u53f7","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"","website":"","email":"","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"41","chinesename":"\u6d4b\u8bd5\u8054\u7cfb\u4eba","chinesepinyin":"CSLXR","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u4e1c\u57ce\u533a","detailaddress":"\u56fd\u9645\u91d1\u878d\u5927\u53a6111\u53f7","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18772727272","website":"212","email":"test@qq.com","type":"0","litpic":"","description":"34356","status":"1","mid":"0","companycode":"212","identification":"\u5df2\u8ba4\u8bc1","contact":"\u5b8b\u5065\u5b89","create_time":"2018-05-23 10:10:11"},{"id":"42","chinesename":"test","chinesepinyin":"","country":"","province":"\u5929\u6d25\u5e02","city":"\u5e02\u8f96\u533a","county":"\u548c\u5e73\u533a","detailaddress":"fsfgfsvdf","fatherid":"0","brandid":"0","industry_first":"7","industry_second":"94","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"1221212121","website":"","email":"cascd@123.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u5f20\u4e09","create_time":"2018-01-26 19:18:12"},{"id":"43","chinesename":"\u5c71\u59c6\u8d85\u5e02","chinesepinyin":"","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u77f3\u666f\u5c71\u533a","detailaddress":"\u7684\u6cd5\u5b9a","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"123321456","website":"","email":"sss","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u8d75\u5927\u5b9d","create_time":"0000-00-00 00:00:00"},{"id":"44","chinesename":"sdfs","chinesepinyin":"","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u671d\u9633\u533a","detailaddress":"sdfsdf","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"","website":"","email":"","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"0000-00-00 00:00:00"},{"id":"45","chinesename":"sdaf","chinesepinyin":"sadf","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u897f\u57ce\u533a","detailaddress":"sadf","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"asdf","website":"","email":"sdfsdf","type":"0","litpic":"http:\/\/cloud.siger-data.com\/Upload\/image\/2018-03-09\/630559af36196d9d4c6001b919f5c369.jpg","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"sadf","create_time":"0000-00-00 00:00:00"},{"id":"46","chinesename":"\u4e5d\u90a6\u673a\u7535","chinesepinyin":"","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u6606\u5c71\u5e02","detailaddress":"\u6606\u5c71","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"12","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"XXX","website":"","email":"XXX","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u5f20","create_time":"2018-03-09 16:20:59"},{"id":"47","chinesename":"\u6d4b\u8bd50320","chinesepinyin":"","country":"","province":"\u6c5f\u82cf\u7701","city":"\u5357\u4eac\u5e02","county":"\u7384\u6b66\u533a","detailaddress":"AAAAA","fatherid":"0","brandid":"0","industry_first":"2","industry_second":"7","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"123121313","website":"","email":"21212@1212","type":"0","litpic":"http:\/\/cloud.siger-data.com\/Upload\/image\/2018-03-21\/9fa7188fd2573c29a6588aeb844bda10.jpg","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u5f20\u4e09","create_time":"0000-00-00 00:00:00"},{"id":"48","chinesename":"\u5929\u5408\u6c7d\u8f66","chinesepinyin":"TRW","country":"","province":"\u4e0a\u6d77\u5e02","city":"\u5e02\u8f96\u533a","county":"\u6d66\u4e1c\u65b0\u533a","detailaddress":"\u767e\u5b89\u516c\u8def188\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"65","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"111","website":"","email":"111","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u5efa\u9f99","create_time":"0000-00-00 00:00:00"},{"id":"49","chinesename":"\u6a61\u6280\u516c\u53f8","chinesepinyin":"xiangjigongsi","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u59d1\u82cf\u533a","detailaddress":"\u5434\u6c5f","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"12345678908","website":"","email":"test@qq.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u8d1f\u8d23\u4eba","create_time":"0000-00-00 00:00:00"},{"id":"50","chinesename":"\u4e2d\u94c1\u5b9d\u6865","chinesepinyin":"ZTBQ","country":"","province":"\u6c5f\u82cf\u7701","city":"\u5357\u4eac\u5e02","county":"\u7384\u6b66\u533a","detailaddress":"\u4ed9\u65b0\u4e2d\u8def6\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"62","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"13851713659","website":"","email":"654750473@qq.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u90dd\u7ecf\u7406","create_time":"0000-00-00 00:00:00"},{"id":"51","chinesename":"\u4e30\u7530\u6606\u5c71","chinesepinyin":"\u4e30\u7530\u6606\u5c71","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u864e\u4e18\u533a","detailaddress":"\u4e30\u7530\u6606\u5c71","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"12345678907","website":"","email":"121111@qq.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u4e30\u7530\u6606\u5c71","create_time":"2018-04-21 20:15:31"},{"id":"52","chinesename":"\u5965\u7279\u51ef\u59c6","chinesepinyin":"\u5965\u7279\u51ef\u59c6","country":"","province":"\u6c5f\u82cf\u7701","city":"\u65e0\u9521\u5e02","county":"\u60e0\u5c71\u533a","detailaddress":"\u5965\u7279\u51ef\u59c6","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"111111","website":"","email":"11111","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"1111","create_time":"0000-00-00 00:00:00"},{"id":"54","chinesename":"yingwenmingzi","chinesepinyin":"11","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u897f\u57ce\u533a","detailaddress":"1","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"1","website":"","email":"1","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"1","create_time":"0000-00-00 00:00:00"},{"id":"57","chinesename":"\u631a\u4f18\u673a\u5668\u4eba","chinesepinyin":"zyjqr","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u4e1c\u57ce\u533a","detailaddress":"\u631a\u4f18\u673a\u5668\u4eba","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"30","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"13000000000","website":"","email":"123@123.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"13000000000","create_time":"2018-05-25 19:47:53"},{"id":"58","chinesename":"fdfasd","chinesepinyin":"asdfasdf","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u4e1c\u57ce\u533a","detailaddress":"asdfasdf","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"15012345678","website":"","email":"3123131@qq.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"23123","create_time":"2018-05-18 10:05:15"},{"id":"59","chinesename":"\u8363\u817e","chinesepinyin":"rongteng","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u59d1\u82cf\u533a","detailaddress":"\u8363\u817e","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18623344556","website":"","email":"51243314@qq.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u8363\u817e","create_time":"0000-00-00 00:00:00"},{"id":"62","chinesename":"\u6e29\u5dde\u6d77\u7279\u514b","chinesepinyin":"","country":"","province":"\u6d59\u6c5f\u7701","city":"\u6e29\u5dde\u5e02","county":"\u9e7f\u57ce\u533a","detailaddress":"\u6d77\u7279\u514b","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"13587438115","website":"","email":"123@qq.con","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u6d77\u7279\u514b","create_time":"0000-00-00 00:00:00"},{"id":"63","chinesename":"\u4e07\u79d1","chinesepinyin":"\u4e07\u79d1","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u82cf\u5dde\u5de5\u4e1a\u56ed\u533a","fatherid":"0","brandid":"0","industry_first":"5","industry_second":"74","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"15250648123","website":"www.wanke.com","email":"qwerty@qq.com","type":"0","litpic":"http:\/\/dev.siger-data.com\/Upload\/image\/2018-07-02\/2d8fbcf8147b219a9f3a8b763c5f108a.jpg","description":"\u4e07\u79d1\u623f\u5730\u4ea7","status":"1","mid":"0","companycode":"0010010001","identification":"\u5df2\u8ba4\u8bc1","contact":"\u4e07\u79d1","create_time":"1530241975"},{"id":"66","chinesename":"\u5947\u9686\u7535\u5b50\u5236\u9020(\u5b81\u6ce2)\u6709\u9650\u516c\u53f8","chinesepinyin":"","country":"","province":"\u6d59\u6c5f\u7701","city":"\u5b81\u6ce2\u5e02","county":"","detailaddress":"\u6d59\u6c5f\u7701 \u5b81\u6ce2\u5e02 \u4e1c\u8f89\u8def189\u53f7","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18868655993","website":"","email":"luke.guo@kitron.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u90ed\u82b3\u660e","create_time":"1531911910"}],"total":"28","page":1,"pagesize":10000} 
     */
    public function GetCompany(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"25","chinesename":"\u5bcc\u58eb\u548c","chinesepinyin":"FJW","country":"","province":"\u6c5f\u82cf\u7701","city":"\u5357\u4eac\u5e02","county":"\u7384\u6b66\u533a","detailaddress":"\u534e\u7075\u8def12\u53f7","fatherid":"0","brandid":"0","industry_first":"1","industry_second":"1","industry_third":"0","lat":"100.0000000000","lon":"999.9999999999","telephone":"18312345623","website":"www.fjw.com","email":"admin@fjw.com.cn","type":"0","litpic":"http:\/\/d62.ichuk.com\/Upload\/image\/20171217\/4a0531d47d37ed8de96ab32dbe6d0b7d.png","description":"\u5239\u8f66\u76d8","status":"1","mid":"0","companycode":"xxxb35234543vxzzc","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"27","chinesename":"\u4e09\u53cb\u673a\u68b0","chinesepinyin":"Sanyou","country":"","province":"\u91cd\u5e86\u5e02","city":"\u53bf","county":"\u74a7\u5c71\u53bf","detailaddress":"\u91cd\u5e86\u4e09\u53cb\u673a\u68b0\u516c\u53f8","fatherid":"0","brandid":"0","industry_first":"16","industry_second":"181","industry_third":"0","lat":"12.0000000000","lon":"12.0000000000","telephone":"13567234532","website":"www.sanyou.com","email":"admin@sanyou.com","type":"0","litpic":"http:\/\/d62.ichuk.com\/Upload\/image\/20171217\/f9918ca0e38f7b7f2bdd218c3d1d0802.png","description":"\u4e09\u53cb","status":"1","mid":"0","companycode":"XX","identification":"\u672a\u8ba4\u8bc1","contact":"21212","create_time":"2018-01-30 14:55:27"},{"id":"29","chinesename":"\u7fa4\u51ef\u5229\u7cbe\u5de5","chinesepinyin":"Qunkaili","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u864e\u4e18\u533a","detailaddress":"\u6728\u6e0e\u9547\u91d1\u957f\u8def100\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"12","industry_third":"0","lat":"12.0000000000","lon":"12.0000000000","telephone":"121","website":"http:\/\/www.qunkaili.com\/","email":"admin@.qunkaili.com","type":"0","litpic":"http:\/\/d62.ichuk.com\/Upload\/image\/20171217\/b1e772fd416ce8d5be1a5969d65045df.png","description":"12","status":"1","mid":"0","companycode":"12","identification":"\u672a\u8ba4\u8bc1","contact":"asdaaaa","create_time":"2018-02-03 18:47:07"},{"id":"32","chinesename":"\u76fe\u5b89\u96c6\u56e2","chinesepinyin":"DUNAN","country":"","province":"\u6d59\u6c5f\u7701","city":"\u7ecd\u5174\u5e02","county":"\u8bf8\u66a8\u5e02","detailaddress":"\u676d\u5dde\u6ee8\u6c5f","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"123","website":"http:\/\/www.chinadunan.com","email":"admin@chinadunan.com","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-03\/68638b7ebece6badfc274041926e17d1.png","description":"chinadunan.com","status":"1","mid":"0","companycode":"DA","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"33","chinesename":"\u897f\u683c\u6570\u636e","chinesepinyin":"Siger Data","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u521b\u610f\u4ea7\u4e1a\u56ed","fatherid":"0","brandid":"0","industry_first":"10","industry_second":"125","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18362665274","website":"www.siger-data.com","email":"test2@qq.com","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-04\/b7668891d71649055bd20c637a582f33.png","description":"Siger Data","status":"1","mid":"0","companycode":"Siger Data","identification":"\u672a\u8ba4\u8bc1","contact":"a","create_time":"2018-05-07 10:35:27"},{"id":"35","chinesename":"\u6606\u5c71\u516d\u4e30\u673a\u68b0\u5de5\u4e1a\u6709\u9650\u516c\u53f8","chinesepinyin":"liufeng","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u6606\u5c71\u5e02","detailaddress":"\u5f85\u5b9a","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"19999999999","website":"1","email":"1","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-05\/1b4c1ac13cc551db22d77b10f4bbb8f0.jpg","description":"1","status":"1","mid":"0","companycode":"1","identification":"\u5df2\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"36","chinesename":"\u82cf\u5dde\u5e02\u6c38\u521b\u91d1\u5c5e\u79d1\u6280\u6709\u9650\u516c\u53f8","chinesepinyin":"YCJS","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u82cf\u5dde\u5e02\u5434\u4e2d\u533a\u80e5\u53e3\u9547\u6d66\u5e84\u5927\u90533699\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18913505093","website":"http:\/\/www.sz-dsbj.com\/","email":"maggie@sz-dsbj.com","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-07\/add78360929f9a29a795cd8514b83b82.jpg","description":"\u7cbe\u5bc6\u52a0\u5de5","status":"1","mid":"0","companycode":"91320500703719732P","identification":"\u5df2\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"37","chinesename":"\u83f2\u820d\u5c14\u822a\u7a7a\u90e8\u4ef6\uff08\u9547\u6c5f\uff09\u6709\u9650\u516c\u53f8","chinesepinyin":"Fesher","country":"","province":"\u6c5f\u82cf\u7701","city":"\u9547\u6c5f\u5e02","county":"\u4eac\u53e3\u533a","detailaddress":"\u5927\u6e2f\u65b0\u533a\u570c\u5c71\u8def88\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"3","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"NA","website":"http:\/\/www.fesher.net\/","email":"NA","type":"0","litpic":"http:\/\/fjw.siger-data.com\/Upload\/image\/2018-01-09\/b373ab9b35cf416e7c4c6ba4e86eceb1.png","description":"\u822a\u7a7a","status":"1","mid":"0","companycode":"NA","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"39","chinesename":"\u82cf\u5dde\u5bc6\u5361\u7279\u8bfa\u7cbe\u5bc6\u673a\u68b0\u6709\u9650\u516c\u53f8","chinesepinyin":"Mica Technology(Suzhou)Co.,Ltd.","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u65b0\u6cfd\u8def80\u53f7","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"","website":"","email":"","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"2018-01-25 17:28:08"},{"id":"41","chinesename":"\u6d4b\u8bd5\u8054\u7cfb\u4eba","chinesepinyin":"CSLXR","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u4e1c\u57ce\u533a","detailaddress":"\u56fd\u9645\u91d1\u878d\u5927\u53a6111\u53f7","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18772727272","website":"212","email":"test@qq.com","type":"0","litpic":"","description":"34356","status":"1","mid":"0","companycode":"212","identification":"\u5df2\u8ba4\u8bc1","contact":"\u5b8b\u5065\u5b89","create_time":"2018-05-23 10:10:11"},{"id":"42","chinesename":"test","chinesepinyin":"","country":"","province":"\u5929\u6d25\u5e02","city":"\u5e02\u8f96\u533a","county":"\u548c\u5e73\u533a","detailaddress":"fsfgfsvdf","fatherid":"0","brandid":"0","industry_first":"7","industry_second":"94","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"1221212121","website":"","email":"cascd@123.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u5f20\u4e09","create_time":"2018-01-26 19:18:12"},{"id":"43","chinesename":"\u5c71\u59c6\u8d85\u5e02","chinesepinyin":"","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u77f3\u666f\u5c71\u533a","detailaddress":"\u7684\u6cd5\u5b9a","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"123321456","website":"","email":"sss","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u8d75\u5927\u5b9d","create_time":"0000-00-00 00:00:00"},{"id":"44","chinesename":"sdfs","chinesepinyin":"","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u671d\u9633\u533a","detailaddress":"sdfsdf","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"","website":"","email":"","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"","create_time":"0000-00-00 00:00:00"},{"id":"45","chinesename":"sdaf","chinesepinyin":"sadf","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u897f\u57ce\u533a","detailaddress":"sadf","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"asdf","website":"","email":"sdfsdf","type":"0","litpic":"http:\/\/cloud.siger-data.com\/Upload\/image\/2018-03-09\/630559af36196d9d4c6001b919f5c369.jpg","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"sadf","create_time":"0000-00-00 00:00:00"},{"id":"46","chinesename":"\u4e5d\u90a6\u673a\u7535","chinesepinyin":"","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u6606\u5c71\u5e02","detailaddress":"\u6606\u5c71","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"12","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"XXX","website":"","email":"XXX","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u5f20","create_time":"2018-03-09 16:20:59"},{"id":"47","chinesename":"\u6d4b\u8bd50320","chinesepinyin":"","country":"","province":"\u6c5f\u82cf\u7701","city":"\u5357\u4eac\u5e02","county":"\u7384\u6b66\u533a","detailaddress":"AAAAA","fatherid":"0","brandid":"0","industry_first":"2","industry_second":"7","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"123121313","website":"","email":"21212@1212","type":"0","litpic":"http:\/\/cloud.siger-data.com\/Upload\/image\/2018-03-21\/9fa7188fd2573c29a6588aeb844bda10.jpg","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u5f20\u4e09","create_time":"0000-00-00 00:00:00"},{"id":"48","chinesename":"\u5929\u5408\u6c7d\u8f66","chinesepinyin":"TRW","country":"","province":"\u4e0a\u6d77\u5e02","city":"\u5e02\u8f96\u533a","county":"\u6d66\u4e1c\u65b0\u533a","detailaddress":"\u767e\u5b89\u516c\u8def188\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"65","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"111","website":"","email":"111","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u5efa\u9f99","create_time":"0000-00-00 00:00:00"},{"id":"49","chinesename":"\u6a61\u6280\u516c\u53f8","chinesepinyin":"xiangjigongsi","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u59d1\u82cf\u533a","detailaddress":"\u5434\u6c5f","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"12345678908","website":"","email":"test@qq.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u8d1f\u8d23\u4eba","create_time":"0000-00-00 00:00:00"},{"id":"50","chinesename":"\u4e2d\u94c1\u5b9d\u6865","chinesepinyin":"ZTBQ","country":"","province":"\u6c5f\u82cf\u7701","city":"\u5357\u4eac\u5e02","county":"\u7384\u6b66\u533a","detailaddress":"\u4ed9\u65b0\u4e2d\u8def6\u53f7","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"62","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"13851713659","website":"","email":"654750473@qq.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u90dd\u7ecf\u7406","create_time":"0000-00-00 00:00:00"},{"id":"51","chinesename":"\u4e30\u7530\u6606\u5c71","chinesepinyin":"\u4e30\u7530\u6606\u5c71","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u864e\u4e18\u533a","detailaddress":"\u4e30\u7530\u6606\u5c71","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"12345678907","website":"","email":"121111@qq.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u4e30\u7530\u6606\u5c71","create_time":"2018-04-21 20:15:31"},{"id":"52","chinesename":"\u5965\u7279\u51ef\u59c6","chinesepinyin":"\u5965\u7279\u51ef\u59c6","country":"","province":"\u6c5f\u82cf\u7701","city":"\u65e0\u9521\u5e02","county":"\u60e0\u5c71\u533a","detailaddress":"\u5965\u7279\u51ef\u59c6","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"111111","website":"","email":"11111","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"1111","create_time":"0000-00-00 00:00:00"},{"id":"54","chinesename":"yingwenmingzi","chinesepinyin":"11","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u897f\u57ce\u533a","detailaddress":"1","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"1","website":"","email":"1","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"1","create_time":"0000-00-00 00:00:00"},{"id":"57","chinesename":"\u631a\u4f18\u673a\u5668\u4eba","chinesepinyin":"zyjqr","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u4e1c\u57ce\u533a","detailaddress":"\u631a\u4f18\u673a\u5668\u4eba","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"30","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"13000000000","website":"","email":"123@123.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"13000000000","create_time":"2018-05-25 19:47:53"},{"id":"58","chinesename":"fdfasd","chinesepinyin":"asdfasdf","country":"","province":"\u5317\u4eac\u5e02","city":"\u5e02\u8f96\u533a","county":"\u4e1c\u57ce\u533a","detailaddress":"asdfasdf","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"15012345678","website":"","email":"3123131@qq.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"23123","create_time":"2018-05-18 10:05:15"},{"id":"59","chinesename":"\u8363\u817e","chinesepinyin":"rongteng","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u59d1\u82cf\u533a","detailaddress":"\u8363\u817e","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18623344556","website":"","email":"51243314@qq.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u8363\u817e","create_time":"0000-00-00 00:00:00"},{"id":"62","chinesename":"\u6e29\u5dde\u6d77\u7279\u514b","chinesepinyin":"","country":"","province":"\u6d59\u6c5f\u7701","city":"\u6e29\u5dde\u5e02","county":"\u9e7f\u57ce\u533a","detailaddress":"\u6d77\u7279\u514b","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"13587438115","website":"","email":"123@qq.con","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u6d77\u7279\u514b","create_time":"0000-00-00 00:00:00"},{"id":"63","chinesename":"\u4e07\u79d1","chinesepinyin":"\u4e07\u79d1","country":"","province":"\u6c5f\u82cf\u7701","city":"\u82cf\u5dde\u5e02","county":"\u5434\u4e2d\u533a","detailaddress":"\u82cf\u5dde\u5de5\u4e1a\u56ed\u533a","fatherid":"0","brandid":"0","industry_first":"5","industry_second":"74","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"15250648123","website":"www.wanke.com","email":"qwerty@qq.com","type":"0","litpic":"http:\/\/dev.siger-data.com\/Upload\/image\/2018-07-02\/2d8fbcf8147b219a9f3a8b763c5f108a.jpg","description":"\u4e07\u79d1\u623f\u5730\u4ea7","status":"1","mid":"0","companycode":"0010010001","identification":"\u5df2\u8ba4\u8bc1","contact":"\u4e07\u79d1","create_time":"1530241975"},{"id":"66","chinesename":"\u5947\u9686\u7535\u5b50\u5236\u9020(\u5b81\u6ce2)\u6709\u9650\u516c\u53f8","chinesepinyin":"","country":"","province":"\u6d59\u6c5f\u7701","city":"\u5b81\u6ce2\u5e02","county":"","detailaddress":"\u6d59\u6c5f\u7701 \u5b81\u6ce2\u5e02 \u4e1c\u8f89\u8def189\u53f7","fatherid":"0","brandid":"0","industry_first":"0","industry_second":"0","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"18868655993","website":"","email":"luke.guo@kitron.com","type":"0","litpic":"","description":"","status":"1","mid":"0","companycode":"","identification":"\u672a\u8ba4\u8bc1","contact":"\u90ed\u82b3\u660e","create_time":"1531911910"}],"total":"28","page":1,"pagesize":10000}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }

    /**
     * @title 添加企业
     * @desc  添加企业
     * @url Company/AddCompany
     * @method POST
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {}
     */
    public function AddCompany(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }
     /**
     * @title 获得企业详情
     * @desc  获得企业详情
     * @url Company/GetCompanyItem
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {"ret":1,"msg":"\u83b7\u53d6\u6210\u529f","data":[{"id":"69","chinesename":"asadf","chinesepinyin":"asdfaa","country":"","province":"\u5929\u6d25\u5e02","city":"\u53bf","county":"\u5b81\u6cb3\u53bf","detailaddress":"asdf","fatherid":"0","brandid":"0","industry_first":"3","industry_second":"12","industry_third":"0","lat":"0.0000000000","lon":"0.0000000000","telephone":"15312083732","website":"","email":"meetrice@qq.com","type":"0","litpic":"","description":"qweqwe","status":"1","mid":"0","companycode":"wqewqe","identification":"\u5df2\u8ba4\u8bc1","contact":"sadf","create_time":"1544062405"}],"total":"1","page":1,"pagesize":10}
     */
    public function GetCompanyItem(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{}';
            $code = 200;
        } else {
            $ret  = '';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }
 /**
     * @title 修改企业
     * @desc  修改企业
     * @url Company/EditCompany
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @return array data 数据
     * @example {}
     */
    public function EditCompany(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
    }


    /**
     * @title 删除企业
     * @desc  删除企业
     * @url Company/DeleteCompany
     * @method PUT
     * @param \think\Request $request
     * @return string msg 错误信息
     * @return int ret 错误号
     * @example {}
     */
    public function DeleteCompany(Request $request)
    {


        $token = $request->post('token');
        if ($token == session('token')) {
            $ret = '{}';
            $code = 200;
        } else {
            $ret  = '{"ret":0,"msg":"\u5bc6\u7801\u4e0d\u5339\u914d"}';
            $code = 403;
        }

        return json(json_decode($ret), $code);
    
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
                    // 'time'=> ['name' => 'time', 'type' => 'int', 'require' => 'true', 'default' => '', 'desc' => '时间戳', 'range' => '',]
                ],
                'Getcompanylist'=>[
                    'chinesename' => ['name' => 'chinesename', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '名称', 'range' => '',],
                    'province' => ['name' => 'province', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '省份', 'range' => '',],
                    'city' => ['name' => 'city', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '城市', 'range' => '',],
                    'county' => ['name' => 'county', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '国家', 'range' => '',],
                    'industry_first' => ['name' => 'industry_first', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '', 'range' => '',],
                    'industry_second' => ['name' => 'industry_second', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '', 'range' => '',],
                    'page' => ['name' => 'page', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '页数', 'range' => '',],
                    'pagesize' => ['name' => 'pagesize', 'type' => 'int', 'require' => 'false', 'default' => '', 'desc' => '每页条数', 'range' => '',],
                ],
                'GetCompany'=>[

                ],
                'getIndustryFirstLists'=>[

                ],
                'getIndustrySecondLists'=>[
                    'id' => ['name' => 'id', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                ],
                'AddCompany'=>[
                    'base[chinesename]' => ['name' => 'base[chinesename]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '中文名称', 'range' => '',],
                    'base[chinesepinyin]' => ['name' => 'base[chinesepinyin]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '中文拼音', 'range' => '',],
                    'base[province]' => ['name' => 'base[province]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '区域省', 'range' => '',],
                    'base[city]' => ['name' => 'base[city]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '区域市', 'range' => '',],
                    'base[county]' => ['name' => 'base[county]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '区域区', 'range' => '',],
                    'base[detailaddress]' => ['name' => 'base[detailaddress]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '详细地址', 'range' => '',],
                    'base[telephone]' => ['name' => 'base[telephone]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '电话', 'range' => '',],
                    'base[website]' => ['name' => 'base[website]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '网址', 'range' => '',],
                    'base[contact]' => ['name' => 'base[contact]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '联系人', 'range' => '',],
                    'base[email]' => ['name' => 'base[email]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'email', 'range' => '',],
                    'base[industry_first]' => ['name' => 'base[industry_first]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '行业类别', 'range' => '',],
                    'base[industry_second]' => ['name' => 'base[industry_second]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '行业类别二级', 'range' => '',],
                    'base[litpic]' => ['name' => 'base[litpic]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'LOGO', 'range' => '',],
                    'base[description]' => ['name' => 'base[description]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '描述', 'range' => '',],
                    'base[companycode]' => ['name' => 'base[companycode]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '营业执照', 'range' => '',],
                    'base[identification]' => ['name' => 'base[identification]#', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '是否认证', 'range' => '',],


                ],
                'GetCompanyItem'=>[
                    'id' => ['name' => 'id', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                ],
                
                'EditCompany'=>[
                     'id' => ['name' => 'id', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                    'base[chinesename]' => ['name' => 'base[chinesename]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '中文名称', 'range' => '',],
                    'base[chinesepinyin]' => ['name' => 'base[chinesepinyin]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '中文拼音', 'range' => '',],
                    'base[province]' => ['name' => 'base[province]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '区域省', 'range' => '',],
                    'base[city]' => ['name' => 'base[city]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '区域市', 'range' => '',],
                    'base[county]' => ['name' => 'base[county]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '区域区', 'range' => '',],
                    'base[detailaddress]' => ['name' => 'base[detailaddress]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '详细地址', 'range' => '',],
                    'base[telephone]' => ['name' => 'base[telephone]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '电话', 'range' => '',],
                    'base[website]' => ['name' => 'base[website]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '网址', 'range' => '',],
                    'base[contact]' => ['name' => 'base[contact]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '联系人', 'range' => '',],
                    'base[email]' => ['name' => 'base[email]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'email', 'range' => '',],
                    'base[industry_first]' => ['name' => 'base[industry_first]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '行业类别', 'range' => '',],
                    'base[industry_second]' => ['name' => 'base[industry_second]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '行业类别二级', 'range' => '',],
                    'base[litpic]' => ['name' => 'base[litpic]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'LOGO', 'range' => '',],
                    'base[description]' => ['name' => 'base[description]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '描述', 'range' => '',],
                    'base[companycode]' => ['name' => 'base[companycode]', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '营业执照', 'range' => '',],
                    'base[identification]' => ['name' => 'base[identification]#', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => '是否认证', 'range' => '',],


                ],
               'DeleteCompany'=>[
                    'id' => ['name' => 'id', 'type' => 'string', 'require' => 'false', 'default' => '', 'desc' => 'id', 'range' => '',],
                ],
        ];
      
        return $rules;
    }


}