

		<nav class="navbar navbar-default navbar-fixed-top">
  			<div class="container-fluid">
    			<div class="navbar-header" style="margin-right: 30px">
      				<img src="<?php echo base_url();?>pic/homepage_logo.png"></img>
    			</div>
    			<ul class="nav navbar-nav">
      				<li <?php if($activemenu == "home") { ?>class="active" <?php } ?>><a href="#">首页</a></li>
              <li <?php if($activemenu == "article") { ?>class="active" <?php } ?>><a href="#">文章</a></li>
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