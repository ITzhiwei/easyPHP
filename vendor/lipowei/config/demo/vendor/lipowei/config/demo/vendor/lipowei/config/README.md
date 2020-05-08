# Config 实现读取任意配置目录下的配置 
## use lipowei\configClass\Config;
## 方式1： $config = new Config; $sqlPwd = $config['sqlPwd'];  
## 方式2： $sqlPwd = Config::pull('sqlPwd');
## 方式1与方式2都是读取默认目录下的app.php文件配置
## 默认配置目录为vendor的同级目录config
实现读取配置目录下的文件中返回的数组，支持多级获取,如app.mysql.user为读取app.php文件中的mysql中的user  
如果需要调用非app.php的配置文件，如database.php中的pwd则使用Config::pull('database.pwd');  
如果需要设置其他目录为配置目录则：Config::$path = '自定义配置目录'；然后继续调用方式1或方式2  
  
配置文件的格式：
如app.php:  
return array(  
	'pwd'=>'mypwd',  
	'mysql'=>array(  
		'user'=>'root',  
		'password'=>'password'  
	)  
);
