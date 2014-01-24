<?php
//初使化，进行加载。

define('THINK_PATH','./ThinkPHP/');

define('APP_PATH','./admin/');

define('APP_NAME','admin');


require THINK_PATH.'ThinkPHP.php';


App::run();

?>