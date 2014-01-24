<?php
$arr1= array(
		'APP_DEBUG' => true,
		'APP_AMF_ACTIONS' =>'Index,Test' //注册模型

);
$arr2=include 'config.inc.php';
return array_merge($arr1,$arr2);
?>