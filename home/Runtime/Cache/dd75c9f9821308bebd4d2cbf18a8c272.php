<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Resume Plan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Le styles -->
  <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
  <link href="__PUBLIC__/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="__PUBLIC__/css/index.css" rel="stylesheet">
  <link href="__PUBLIC__/css/navigation.css" rel="stylesheet">

  <style type="text/css">
  body {
    padding-top: 10px;
    padding-bottom: 40px;
  }
  </style>


  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <![endif]-->

    </head>

    <body>

      <div class="container">

<!--顶部导航开始-->
     <div id="navigation">
      <h3 class="muted">
        <a href="__APP__"><img src="__PUBLIC__/img/logo.png"></a>
      </h3>
          <ul class="nav nav-pills pull-left nav-top">
            <li class="active"><a href="__APP__">首页</a></li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
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
        <div id="main">
          <div style="margin:auto;">
            <img src="__PUBLIC__/img/banner.png">
          </div>
          <div style="margin:auto; padding-top:20px;">
            <div class="resume_palette" >
            <a href="__APP__/index/choose"><img class="press" src="__PUBLIC__/img/unpress.png"></a>
            <div class="dot1">
            <img src="__PUBLIC__/img/动画大致预览比较粗糙.gif">
          </div>


    
          </div>
        </div>

      </div> <!-- /container -->

      <div class="footer" style="background:#efefef; min-height:200px;">
        <div class="container">
          <div class="row" style="margin-top:20px;">
            <div class="span4">
              <img src="__PUBLIC__/img/sec_banner_red.png">
            </div>
            <div class="span4">
              <img src="__PUBLIC__/img/sec_banner_blue.png">
            </div>
            <div class="span4">
              <img src="__PUBLIC__/img/sec_banner_green.png">
            </div>
          </div>

          <hr>

          <div style="min-height:50px;">
            <img src="__PUBLIC__/img/wechat_logo.png">
            <img src="__PUBLIC__/img/sina_logo.png">
          </div>

        </div>
      </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
      <script>
  $('.resume_palette img.press').mouseover(function  () {
    this.src="__PUBLIC__/img/pressdown.png";
  })
    $('.resume_palette img.press').mouseout(function  () {
    this.src="__PUBLIC__/img/unpress.png";
  })
    $(".dot1").popover();
  </script>

  </body>
  </html>