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

	 <!-- 配置文件 -->
	<script type="text/javascript" src="<?=base_url().'UEditor/'?>ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?=base_url().'UEditor/'?>ueditor.all.js"></script>
	<title>首页</title>
</head>
<body>

<div id="container">
	<?php $data['activemenu'] = "article"; $this->load->view('partial/header.php', $data); ?>
	<form enctype="multipart/form-data" method="post" name='article'>
		<div class="col-lg-8" style="margin: 80px 0px">
		
			<div class="form-group">
				<label for="article_title">Article Title</label>
				<input name="Title" type="text" class="form-control" id="article_title" aria-describedby="title_help"  placeholder="Enter Article Title">
				<small id="title_help" class="form-text text-muted">请输入文章标题</small>
			</div>
			<div class="form-group">
				<label for="article_subtitle">Article SubTitle</label>
				<input name="SubTitle" type="text" class="form-control" id="article_subtitle" aria-describedby="subtitle_help"  placeholder="Enter Article SubTitle">
				<small id="subtitle_help" class="form-text text-muted">请输入文章子标题</small>
			</div>
			<div class="form-group">
				<label for="article_content">Article Content</label>
				<script name="Content"  id="article_content" aria-describedby="content_help"  placeholder="Enter Article Content"></script>
				<small id="content_help" class="form-text text-muted">请输入文章内容</small>
			</div>
			<input name="Main_Figure" type="file" id='Main_Figure' style="height:0;width:0;">
			<button class="btn btn-primary post" >发布</button>
			<button class="btn btn-primary">保存到草稿</button>
		</div>
		<div class="col-lg-4" style="margin: 80px 0px">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<style>
							.add-figure{
								float:right;cursor:pointer;
							}
							.add-figure:hover{
								color:blue;
							}
						</style>
						<h3 class="panel-title">Main Figure<span class='add-figure'>add</span></h3>
					</div>
					<div class="panel-body">
						<img style="width:200px;" class='main-figure' />
						<div class="form-group">
							<label for="figure_title">Figure Title</label>
							<input name="Title2" type="text" class="form-control" id="figure_title" aria-describedby="figure_title_help"  placeholder="Enter Figure Title">
							<small id="figure_title_help" class="form-text text-muted">请输入Figure标题</small>
						</div>
						<div class="form-group">
							<label for="figure_content">Figure Content</label>
							<input name="Content2" type="text" class="form-control" id="figure_content" aria-describedby="figure_content_help"  placeholder="Enter Figure Content">
							<small id="figure_content_help" class="form-text text-muted">请输入Figure内容</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12" style="height:1px; background-color:Black; margin-top:15px; margin-bottom:15px;"></div>
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Article Tag</h3>
					</div>
					<div class="panel-body">
						<style>
							.panel-body button{
								margin:5px;
							}
							.panel-body button:focus{
								outline:none;
							}
							.panel-body button.active{
								background-color:#337ab7;
								color:#fff;
							}
						</style>
						<?php
							foreach($all_tags as $key=>$value)
								echo "<button id={$value['TagID']} type='button' class='btn btn-dark tag-btn'>{$value['TagName']}</button>";
						?>
						<script>
							$('.tag-btn').click(function(){$(this).toggleClass('active')});
						</script>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php $this->load->view('partial/footer.php'); ?>
</div>
<script>
	function getTags(){
		var result = [];
		$('button.tag-btn.active').each((index,item)=>{
			result.push(item.id);
		})
		return result;
	}
	var ue = UE.getEditor('article_content');
	$('#Main_Figure').change((e)=>{
		var form = document.forms.namedItem("article");
		var formData = new FormData(form);
		var main_figure = formData.get('Main_Figure');
		var reader = new FileReader();
		reader.readAsDataURL(main_figure);
		reader.onload = function(e){
       		$('img.main-figure').attr('src',reader.result);
    	}
	})
	$('.add-figure').click(()=>{
		$('#Main_Figure').click()
	});
	$('form button.post').click(function(e){
		try{
			var form = document.forms.namedItem("article");
			var formData = new FormData(form);
			var it = formData.keys();
			while(key = it.next()){
				if(key['done'])
					break;
				if(formData.get([key['value']])==''|formData.get([key['value']])==undefined)
					throw '请输入'+key['value'];
			}

			if(formData.get('Content')==''|formData.get('Content')==undefined)
					throw '请输入Content';
			getTags().map((item)=>{
				formData.append('tags[]',item);
			})
			if(formData.get('tags[]')==undefined)
				throw '请选择tags';
			$.ajax({
				url:'<?=site_url('article/post_handler')?>',
				type: 'POST',
				data:formData,
				processData: false,
				contentType: false,
				dataType:'json'
			}).done((e)=>{
				console.log(e);
				e.code==0?alert('操作成功'):alert(e.msg);
			}).fail(e=>{
				console.log(e);
				alert('服务器异常');
			});
			return false;
		}
		catch(e){
			console.log(e);
			alert(e);
			return false;
		}
	});
</script>
</body>
</html>