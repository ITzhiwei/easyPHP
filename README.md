# weiPHP 框架
# 命令安装
* git clone https://github.com/ITzhiwei/lipowei.git weiPHP
* cd weiPHP
* git clone https://github.com/ITzhiwei/wei.git  
```
可以多域名共同使用，路由配置文件内可设置域名的指定目录。urlEntranceData参数中设置；
如使用多域名模式，若每个域名对应的数据库不一样，本框架的DB库可配置不同域名使用不同的数据库，config/lipoweiDb.php有案例
也可以一个域名设置多个目录，如前端一个，后台一个，API接口一个。assignEntranceData参数中设置
apache 开箱即用，将域名指向 public/index.php 即可
nginx 配置：
 server{
        listen 80;
        listen [::]:80;
        server_name www.youurl.com;
        location /{
                root /www/html/weiPHP/public;
                index index.php;
                if (!-e $request_filename) {
                        rewrite  ^(.*)$  /index.php?$1  last;
                }
        }
        location ~ \.php$ {
                root /www/html/weiPHP/public;
                index index.php index.html index.htm;
                fastcgi_pass    127.0.0.1:9000;
                fastcgi_index   index.php;
                fastcgi_param   SCRIPT_FILENAME  $document_root$fastcgi_script_name;
                include         fastcgi_params;
        }
    } 
```
# 访问入口
程序唯一入口：public/index.php  
# 路由（配置文件：config/route.php）
自动路由 + 可配置伪静态 + 自定义路由设置  
# 项目入口(配置文件也是 config/route.php )
项目默认一级目录入口：application，可以根据多个域名配置多个一级目录入口；也可以自定义一级目录入口
```
//路径映射；第一个键名不可更改，只能是index，其他键名和键值都可以任意修改；
'door' => [
          'index'=>__DIR__.'/../application/',
          'application2'=>__DIR__.'/../application2/',
          'app3'=>__DIR__.'/../app3/',
          ],
//域名指定一级目录入口，不同的域名对应不同的入口；不同的项目共享资源环境
'urlEntranceData' => [
    //所有域名默认入口是 index； 对应的是 door 中的 index 所映射的目录入口
    //指定入口，从 door 中映射路径，可以设为 door 中存在的任意一个键名
    'www.wei.com'=>'application2'
 ]，
 /*
  * 自定义一级目录入口，使一个域名拥有多个入口；
  * 若使用自定义入口，url的路由参数是4个，如非自定义是 index/user/info/id/1 自定义是 selectApp2/index/user/info/id/1
  * 第一个值是布尔值，为false时表示只针对某些域名，为 true 时表示所有域名都生效
  * 第2个值是入口（从 door 中映射目录）
  * 第3个值是数组，当第一个值是 false 才有效，表示哪些域名启用这额外的项目
  */，
 'assignEntranceData'    => [
        //解释如：selectApp2：当遇到 www.xxx.com/selectApp2(或www.xxx.comselectApp2/) 的url时触发检测
        'selectApp2'=>[false, 'application2', ['www.wei.com', 'www.weib.com', 'www.weic.com']],
        //所有域名在遇到 www.url.com/app3/ 开头的url时，会直接选定 app3 入口
        'lipowei'=>[true, 'app3']
  ]
```
# 钩子
* 前置钩子  
位置：控制器请求方法执行前执行       
全局前置钩子（创建项目目录下 hook  包含 hookBefore.php）  
一级目录前置钩子（在对应的一级目录内创建 hook 包含 hookBefore.php）  
二级目录前置钩子（在对应的二级目录内创建 hook 包含 hookBefore.php）  
* 后置钩子  
位置：返回数据给用户前的位置  
可设置全局后置钩子（创建项目目录下 hook 包含 hookAfter.php）  
一级目录后置钩子（在对应的一级目录内创建 hook 包含 hookAfter.php）  
二级目录后置钩子（在对应的二级目录内创建 hook 包含 hookAfter.php）  
* 结束后钩子  
位置：用户获取请求数据后在后台执行的钩子  
````
$this->fucArr[] = function() use ($phoneArr){
                        //用户请求结束后，服务器继续执行一般小耗时的任务，进行极致优化；大耗时的任务不合适即时占用fpm进程执行
                        ...
                  }
````
# 工厂自助管理类
自助单例管理类，可设置别名重新实例化  
在获取类时，使用 wei\Factory::get($className) 可进行注入并自动单例管理，可用别名new新的类如::get($className , 'two')   
# 控制器基类
json 统一返回功能  
数据转换功能方法  
指定特殊字段自动转化  
view文件调用  
用户请求结束后在服务器继续执行相关代码（在子控制器类中把相关代码以匿名函数方式放进 $this->fucArr 即可）
````
$this->fucArr[] = function() use ($phoneArr){
                        //用户请求结束后，服务器继续执行耗时的任务
                        ...
                  }
````
# 配置类
安装 composer require lipowei/config   
可获取 vendor 同级目录下 config 目录任意配置文件的参数   
# Db 操作库
安装 composer require lipowei/db  
支持分布式、读写分离等模式  
全面预处理、自动添加反引号  
mysql 错误日志记录、不同域名可设置不同的链接参数    
# php 错误日志记录
与 mysql 错误分别记录不同的 log 文件
# 示例目录
* app3 一级目录入口，默认只需要一个一级目录入口
* application 一级目录入口，默认只需要一个一级目录入口
* application2 一级目录入口，默认只需要一个一级目录入口
* config 项目配置
* extend 自定义类库
* hook 全局钩子，里面写的代码全局执行，可写中间件；一级目录内也有一级目录钩子
* public 该目录内的 index.php 是整个程序唯一访问入口
* vendor composer包
* wei 框架核心
