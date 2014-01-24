<?php
//初使化，进行加载。

define('THINK_PATH','./ThinkPHP/');

define('APP_PATH','./home/');

define('APP_NAME','home');


require THINK_PATH.'ThinkPHP.php';


App::run();

?>