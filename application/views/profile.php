<div class="col-lg-12" style="margin: 80px 0px">
  <div class="col-md-12 panel panel-default">
    <div class="panel-body">
      <div class="col-md-2">
        <img src="<?php if (empty($userInfo['user_basic_info']['Photo'])) {echo 'https://scontent.fybz2-2.fna.fbcdn.net/v/t1.0-1/c47.0.160.160/p160x160/10354686_10150004552801856_220367501106153455_n.jpg?oh=3496c7c2b1069b9ff46c891612656ad7&oe=5B466A49';} else {echo $userInfo['user_basic_info']['Photo'];} ?>" class="img-thumbnail">
      </div>
      <div class="col-md-8">
        <h2 style="display: inline-block;"><?php echo $userInfo['user_basic_info']['First_Name'].' '.$userInfo['user_basic_info']['Last_Name']; ?></h2> 
        <span>(<?php echo $userInfo['user_basic_info']['Level'];?>)</span>
      </div>
      <div class="col-md-2">
        <a href="edit" type="button" class="btn btn-primary">编辑个人资料</a>
      </div>
    </div>
  </div>
    <div class="col-md-12 panel panel-default">
      <div class="panel-body">
        <?php if (empty($_GET)) {?>
          <div class="col-md-8">
            <div class="col-md-12">
              <h2>我的文章</h2>
              <?php 
              foreach ($userArticles as $article) { 
                template_article($article);
              } ?>
            </div>
            <div class="col-md-12">
              <h2>我的收藏</h2>
              <?php 
              foreach ($userCollectedArticles as $article) { 
                template_article($article);
              } ?>
            </div>
            <div class="col-md-12">
              <h2>我的喜欢</h2>
              <?php 
              foreach ($userLikedArticles as $article) { 
                template_article($article);
              } ?>
            </div>
          </div>
        <?php } 
        else if ($_GET['show']=='following') { ?>
          <div class="col-md-8">
            <div class="col-md-12">
              <h2>我的关注</h2>
                <?php 
                foreach ($userInfo['user_followings'] as $user) { 
                  template_user($user);
                } ?>
            </div>
            
          </div>
        <?php }
        else if ($_GET['show']=='follower') { ?>
          <div class="col-md-8">
            <div class="col-md-12">
              <h2>我的粉丝</h2>
                <?php 
                foreach ($userInfo['user_followers'] as $user) { 
                  template_user($user);
                } ?>
            </div>
            
          </div>
        <?php } ?>
        <div class="col-md-4">
          <div class="col-md-12 panel panel-default" style="font-size: 20px;">
            <a href="view?show=following">
              <div class="col-md-6 panel-body text-center" style="border-right: 1px solid #ebebeb;">
                <h3><p style="color: #8590a6;">关注</p>
                <strong><?php echo count($userInfo['user_followings']); ?></strong></h3>
              </div>
            </a>
            <a href="view?show=follower">
              <div class="col-md-6 panel-body text-center">
                <h3><p style="color: #8590a6;">粉丝</p>
                <strong><?php echo count($userInfo['user_followers']); ?></strong></h3>
              </div>
            </a>
          </div>
          <div class="col-md-12 panel panel-default">
            <h2>我的想法</h2>
          </div>
        </div>
      </div>
    </div>
</div>

<?php 
function template_article($article) {
  ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <div>
        <div>
          <?php foreach($article->tags as $tag) { ?>
          <a href="#"><span class="label <?php echo $tag->property; ?>"><?php echo $tag->name; ?></span></a>
          <?php } ?>
        </div>
        <div>
          <div>
            <div class="col-md-12">
                <div class="col-sm-9">
                  <h4><strong><a href="index.php/home/displayarticle/<?php echo $article->id; ?>"><?php echo $article->title; ?></a></strong></h4>
                </div>
                <div class="col-sm-9">
                  <h5><a href="#"><?php echo $article->subtitle; ?></a></h5>
                </div>
            </div>
            <div class="col-md-12">
                <div class="pull-left col-sm-4">
                  <a href="#" class="thumbnail">
                      <img src="<?php echo base_url()?>pic/articles/article1.png" alt="<?php echo $article->title; ?>">
                  </a>
                </div>
                <div class="col-md-8">      
                  <div>
                      <?php echo substr($article->content, 0, 500)."..."; ?>
                  </div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="col-sm-12">
                  <p></p>
                  <p>
                      <i class="icon-user"></i> 作者：
                      <?php for($i=0; $i<count($article->authors) - 1; $i++){ ?>
                      <a href="#"><?php echo $article->authors[$i]->firstname. " ". $article->authors[$i]->lastname; ?></a>, 
                      <?php } ?> 
                      <a href="#"><?php echo $article->authors[count($article->authors) - 1]->firstname. " ". $article->authors[count($article->authors) - 1]->lastname; ?></a>
                    | <i class="icon-calendar"></i> 日期：<?php echo date('Y-m-d', strtotime($article->date)); ?>
                    | <i class="icon-comment"></i> <a href="#"><span class="glyphicon glyphicon-comment"></span>  <?php echo $article->commentnum; ?>  评论</a>
                    | <i class="icon-share"></i> <a href="#"><span class="glyphicon glyphicon-share"></span>  <?php echo $article->sharenum; ?>  收藏</a>
                    | <i class="icon-share"></i> <a href="#"><span class="glyphicon glyphicon-thumbs-up"></span>  <?php echo $article->likenum; ?>  赞</a>
                  </p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<?php
function template_user($user) {
  // print_r($user);
  ?>
  <div class="col-md-12" style="padding: 15px 0; border-top: 1px solid #f6f6f6;">
    <img src="<?php if (empty($user['Photo'])) {echo 'https://scontent.fybz2-2.fna.fbcdn.net/v/t1.0-1/c47.0.160.160/p160x160/10354686_10150004552801856_220367501106153455_n.jpg?oh=3496c7c2b1069b9ff46c891612656ad7&oe=5B466A49';} else {echo $user['Photo'];} ?>" style="width: 60px; height: 60px; display: inline-block; float: left;">
    <div style="display: inline-block; margin-left: 30px;">
      <strong><?php echo $user['First_Name'].' '.$user['Last_Name']; ?></strong>
      <span>(<?php echo $user['Level'];?>)</span>
    </div>
  </div>
  <?php
}
?>