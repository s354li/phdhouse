<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title><?php echo $page_title.' - PhDSciNet';?></title>
</head>
<body>
  <div id="container">
		<nav class="navbar navbar-default navbar-fixed-top">
  			<div class="container-fluid">
    			<div class="navbar-header" style="margin-right: 30px">
      				<img src="<?php echo base_url();?>pic/homepage_logo.png"></img>
    			</div>
    			<ul class="nav navbar-nav">
      				<li <?php if($activemenu == "home") { ?>class="active" <?php } ?>><a href="<?php echo site_url('home/index') ?>">首页</a></li>
              <li <?php if($activemenu == "article") { ?>class="active" <?php } ?>><a href="<?php echo site_url('home/displayarticle/1') ?>">文章</a></li>
      				<li <?php if($activemenu == "topic") { ?>class="active" <?php } ?>><a href="#">话题</a></li>
      				<li <?php if($activemenu == "news") { ?>class="active" <?php } ?>><a href="#">协会新闻</a></li>
      				<li <?php if($activemenu == "aboutus") { ?>class="active" <?php } ?>><a href="#">关于我们</a></li>
    			</ul>
    			<form class="navbar-form navbar-left" action="/action_page.php">
  					<div class="input-group">
    					<input type="text" class="form-control" placeholder="搜索...">
    					<div class="input-group-btn">
      						<button class="btn btn-default" type="submit">
        						<i class="glyphicon glyphicon-search"></i>
      						</button>
    					</div>
  					</div>
				</form>
    			<ul class="nav navbar-nav navbar-right">
    				<li><a href="#"><span class="glyphicon glyphicon-bell"></span> 通知</a></li>
    				<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> 私信</a></li>
      			<li><a href="#"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
      			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
    			</ul>
  			</div>
		</nav>