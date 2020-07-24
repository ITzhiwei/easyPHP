<?php

    include "vendor/autoload.php";
    use tcwei\configClass\Config;
 
    echo "<meta charset='utf-8'/>";
    echo '<h1>默认目录 config 下的配置</h1>';
    //读取默认目录config下的app.php的配置数据
    echo '<h3>默认配置文件 app.php 下的配置</h3>';
    $config = new Config; 
    $data = $config['username'];
    var_dump($data);

    $data = $config['*'];
    var_dump($data);
     
    $data = $config['pwd'];
    var_dump($data);
     
    //注意：多级读取必须带上配置文件前缀 如app
    $data = $config['app.happy.0'];
    var_dump($data);
     
    $data = $config['app.happy.1'];
    var_dump($data);
    
    echo '<h3>配置文件 app2.php 下的配置</h3>';
    //读取默认目录下的app2.php
    $data = $config['app2.username'];
    var_dump($data);
    
    echo '<br/><hr/>';
    echo '<h1>目录 config2 下的配置</h1>';
    echo '<h3>默认配置文件 app.php 下的配置</h3>';
    //设置配置文件的目录
    Config::$path = 'config2';
    
    
    $data = $config['username'];
    var_dump($data);
    
    $data = $config['pwd'];
    var_dump($data);
    
   
?>