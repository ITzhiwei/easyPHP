# Config 实现读取任意配置目录下的配置  
# 安装
composer require lipowei/config
# 用法
```
use lipowei\configClass\Config;
//方式一：
$config = new Config;
$sqlUser = $config['database.username'];//获取数据库配置文件中的 username
$sqlAll = $config['database.*'];//获取数据库配置文件中的全部信息

//方式二：
$sqlUser = Config::pull('database.username');
$sqlAll = Config::pull('database.*');
```
# 配置文件所在目录
* 默认配置目录为 vendor 的同级目录 config，如果修改配置目录，可以使用 Config::$path = 'you dir'

# 其他说明
* 支持多级获取，例如： Config::pull('a.b.c');
* 可以不加前缀，例如： Config::pull('webName') 会自动转为 Config::pull('app.webName')
* 有demo，demo所在：vendor/lipowei/config/demo 


