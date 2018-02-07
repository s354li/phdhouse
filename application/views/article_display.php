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
	<title>Testing</title>
</head>
<body>

<div id="container">
	<?php $data['activemenu'] = "article"; $this->load->view('partial/header.php', $data); ?>
	<div class="col-lg-8" style="margin: 80px 0px">
		<div class="col-md-12">
			
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