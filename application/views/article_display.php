<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title><?php echo $CurrentArticle->title; ?></title>
</head>
<body>

<div id="container">
	<?php $data['activemenu'] = "article"; $this->load->view('partial/header.php', $data); ?>
	<div class="col-lg-8" style="margin: 80px 0px">
		<div class="col-md-12" style="padding-right: 20px">
			<h2><?php echo $CurrentArticle->title; ?></h2>
      <h4><?php echo $CurrentArticle->subtitle; ?></h4>
      <div>
          <?php foreach($CurrentArticle->tags as $tag) { ?>
          <a href="#"><span class="label <?php echo $tag->property; ?>"><?php echo $tag->name; ?></span></a>
          <? } ?>
      </div>
        <!-- Author -->
        <h5>
          作者： 
          <?php for($i=0; $i<count($CurrentArticle->authors) - 1; $i++){ ?>
          <a href="#"><?php echo ($CurrentArticle->authors)[i]->firstname. " ". ($CurrentArticle->authors)[i]->lastname; ?></a>, 
          <?php } ?> 
          <a href="#"><?php echo ($CurrentArticle->authors)[count($CurrentArticle->authors) - 1]->firstname. " ". ($CurrentArticle->authors)[count($CurrentArticle->authors) - 1]->lastname; ?></a>
        </h5>
        <hr>
        <!-- Date/Time -->
        <h5><span class="glyphicon glyphicon-time"></span> 发布于： <?php echo date('Y-m-d', strtotime($CurrentArticle->date)); ?>
        </h5>
        <hr>
        <!-- Preview Image -->
        <img class="img-responsive" src="http://placehold.it/900x300" alt="" />
        <hr>
        <!-- Post Content -->
        <p>
          <?php echo $CurrentArticle->content; ?>
        </p>
        <hr>
        <!-- Blog Comments -->
        <!-- Comments Form -->
        <div class="well">
            <h4>写下你的评论：</h4>
            <form role="form">
              <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">评论</button>
            </form>
        </div>
        <hr>
        <!-- Posted Comments -->
        <!-- Comment -->
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
          </a>
          <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
              <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>
        <!-- Comment -->
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
          </a>
          <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
              <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
              <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
              </a>
              <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                  <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>
            <!-- End Nested Comment -->
          </div>
        </div>
		</div>
	</div>
	<div class="col-lg-4" style="margin: 80px 0px">
		<div class="col-md-12">
			<div class="panel panel-default">
  				<div class="panel-heading">
    				<h3 class="panel-title">作者介绍</h3>
  				</div>
  				<div class="panel-body">
    				
  				</div>
			</div>
		</div>
    <div class="col-md-12" style="height:1px; background-color:Black; margin-top:15px; margin-bottom:15px;"></div>
    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">文章分类</h3>
          </div>
          <div class="panel-body">
            <div class="col-lg-6">
              <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
              </ul>
            </div>
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