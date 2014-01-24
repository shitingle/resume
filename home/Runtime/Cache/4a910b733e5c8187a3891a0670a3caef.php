<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>choose</title>
		<meta name="author" content="Jiateng" />
		<!-- Date: 2013-12-13 -->
		<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
		<link href="__PUBLIC__/css/bootstrap-responsive.min.css" rel="stylesheet">
		  <link href="__PUBLIC__/css/navigation.css" rel="stylesheet">
		   <link href="__PUBLIC__/css/choose.css" rel="stylesheet">
		<style type="text/css">
			body {
				padding-top: 10px;
				padding-bottom: 40px;
			}
		</style>
	</head>
	<body style="background: #efefef">
		<div class="container">
			<!--顶部导航开始-->
     <div id="navigation">
      <h3 class="muted">
        <a href="__APP__"><img src="__PUBLIC__/img/logo.png"></a>
      </h3>
          <ul class="nav nav-pills pull-left nav-top">
            <li ><a href="__APP__">首页</a></li>

        <li class="dropdown">
          <a class="dropdown-toggle active" data-toggle="dropdown" href="#">
            简历制作<span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">系统制作</a></li>
            <li><a href="#">高级定制</a></li>
          </ul>
        </li>
        <li><a href="#">简历印刷</a></li>
         <li><a href="#">案例</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            招聘信息<span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">简历周刊</a></li>
          </ul>
        </li>
          <li><a href="#">联系我们</a></li>
          
          </ul>

      <ul class="nav nav-pills pull-right user_bar">
        
            <li>
              <a href="#">注册</a>
            </li>
            <li class="active" style="background:">
              <a href="#">登录</a>
            </li>
          </ul>

  <div class="clear"></div>

        <hr>
      </div>
<!--顶部导航结束-->

		<div style="text-align: center">
			<div style="margin:auto; margin-top: 50px">
				<img src="__PUBLIC__/img/youare.png">
			</div>
			<div style="margin:auto; margin-top: 10px">
				<img src="__PUBLIC__/img/选择符合您身份的选项，我们为您提供最精准的服务。.png">
			</div>

		<div class="show-choice">
			<div class="student choose">
			<a href="__APP__/resume/templet?category=student"><img src="__PUBLIC__/img/student.png"></a>
			<h1>在校生</h1>
			</div>

			<div class="graduate choose">
				<a href="__APP__/resume/templet?category=student"><img src="__PUBLIC__/img/graduate.png"></a>
				<h1>应届生</h1>
			</div>
			<div class="office choose">
				<a href="__APP__/resume/templet?category=student"><img src="__PUBLIC__/img/office.png"></a>
				<h1>在职白领</h1>
			</div>
		</div>
		<div class="clear"></div>

		</div>
		

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/choose.js"></script>
	</body>
</html>