<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>首页</title>
</head>
<body>

<div id="container">
	<?php $data['activemenu'] = "home"; $this->load->view('partial/header.php', $data); ?>
	<div class="col-lg-8" style="margin: 80px 0px">
		<div class="col-md-12">
			<div class="panel panel-default">
  				<div class="panel-body">
  					<div>
							<a class="btn btn-primary" href="<?=site_url('article/post')?>" role="button">发布文章</a>
    					<button type="button" class="btn btn-primary">分享想法</button>
    					<button type="button" class="btn btn-primary pull-right">我的草稿</button>
    				</div>
    			</div>
    		</div>
        <?php foreach($ArticleInfo as $row)
              {  
        ?>
              
    		<div class="panel panel-default">
    			<div class="panel-body">
    				<div>
    					<div>
                <?php foreach($row->tags as $tag) { ?>
    						<a href="#"><span class="label <?php echo $tag->property; ?>"><?php echo $tag->name; ?></span></a>
                <? } ?>
						  </div>
						  <div>
                <div>
   								<div class="col-md-12">
      								<div class="col-sm-9">
        								<h4><strong><a href="index.php/home/displayarticle/<?php echo $row->id; ?>"><?php echo $row->title; ?></a></strong></h4>
                      </div>
                      <div class="col-sm-9">
                        <h5><a href="#"><?php echo $row->subtitle; ?></a></h5>
                      </div>
    							</div>
 								  <div class="col-md-12">
      								<div class="pull-left col-sm-4">
        								<a href="#" class="thumbnail">
            								<img src="<?php echo base_url()?>pic/articles/article1.png" alt="<?php echo $row->title; ?>">
        								</a>
      								</div>
      								<div class="col-md-8">      
        								<div>
          									<?php echo substr($row->content, 0, 500)."..."; ?>
        								</div>

      								</div>
    							</div>
    							<div class="col-md-12">
      								<div class="col-sm-12">
       									<p></p>
        								<p>
          									<i class="icon-user"></i> 作者：
                            <?php for($i=0; $i<count($row->authors) - 1; $i++){ ?>
                            <a href="#"><?php echo ($row->authors)[i]->firstname." ". ($row->authors)[i]->lastname; ?></a>, 
                            <?php } ?> 
                            <a href="#"><?php echo ($row->authors)[count($row->authors) - 1]->firstname. " ". ($row->authors)[count($row->authors) - 1]->lastname; ?></a>
								          | <i class="icon-calendar"></i> 日期：<?php echo date('Y-m-d', strtotime($row->date)); ?>
        								  | <i class="icon-comment"></i> <a href="#"><span class="glyphicon glyphicon-comment"></span>  <?php echo $row->commentnum; ?>  评论</a>
        								  | <i class="icon-share"></i> <a href="#"><span class="glyphicon glyphicon-share"></span>  <?php echo $row->sharenum; ?>  收藏</a>
                          | <i class="icon-share"></i> <a href="#"><span class="glyphicon glyphicon-thumbs-up"></span>  <?php echo $row->likenum; ?>  赞</a>
        								</p>
									    </div>
    							</div>
  							</div>
						  </div>
    				</div>
  				</div>
			</div>
      <?php } ?>
      <div>
        <button type="button" class="btn btn-default" onclick="LoadAllArticles()">Load All Articles</button>
      </div>
		</div>
	</div>
	<div class="col-lg-4" style="margin: 80px 0px">
		<div class="col-md-12">
			<div class="panel panel-default">
  				<div class="panel-heading">
    				<h3 class="panel-title">目录</h3>
  				</div>
  				<div class="panel-body">
    				<div class="list-group">
              <?php foreach($ArticleInfo as $row) { ?>
              <a href="#" class="list-group-item"><?php echo $row->title; ?></a>
              <?php } ?>
            </div>
  				</div>
			</div>
		</div>
    <div class="col-md-12" style="height:1px; background-color:Black; margin-top:15px; margin-bottom:15px;"></div>
    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">其他功能</h3>
          </div>
          <div class="panel-body">
            其他功能
          </div>
      </div>
    </div>
		<div class="col-md-12" style="height:1px; background-color:Black; margin-top:15px; margin-bottom:15px;"></div>
		<div class="col-md-12">
			<div class="panel panel-default">
  				<div class="panel-body">
    				声明
  				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('partial/footer.php'); ?>
</div>

</body>
</html>