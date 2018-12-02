# tp_oauth 
bbbb
基于thinkphp5.0.10,dawn-api进行优化和改造的一栈式oauth2.0 rest基础框架.
thinkphp5.0针对部署做了优化.
项目包含所有依赖,请不要随意升级依赖.

# 实际演示路径:

oauth2.0 授权接口
http://oauth.rc3cr.com/demo/auth/accessToken.html

1.支持rest分页,客户端示例:
http://oauth.rc3cr.com/admin/client/index.html?page=1

2.支持详情,客户端示例:
http://oauth.rc3cr.com/admin/client/read.html?id=6

3.支持新增,客户端示例:
http://oauth.rc3cr.com/admin/admin/client/save.html

4.支持修改,客户端示例:
http://oauth.rc3cr.com/admin/admin/client/update.html

5.支持删除,客户端示例:
http://oauth.rc3cr.com/admin/admin/client/delete.html

自动生成文档路径:
http://oauth.rc3cr.com/demo/doc/apiList.html

支持包含markdown文件,md文件路径:
/doc

# Thinkphp5接入步骤

* 安装dawn-api等依赖
* 在application\extra下载添加api.php
```php
return [
    'api_auth' => true,  //是否开启授权认证
    'auth_class' => \app\demo\auth\OauthAuth::class, //授权认证类
    'api_debug'=>false,//是否开启调试
];
```
* 设置client_id与secret,文件路径:demo\auth\OauthAuth.php
* 编写接口 ,示例 app\demo\controller\User
* 编写客户端,php客户端示例:app\admin\controller\Client



