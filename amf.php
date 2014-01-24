<?php
//初使化，进行加载。

define('THINK_PATH','./ThinkPHP/');

define('APP_PATH','./amf/');

define('APP_NAME','amf');
define('MODE_NAME', 'amf');         //开启Amf模式

require THINK_PATH.'ThinkPHP.php';


App::run();

?>