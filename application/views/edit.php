<style type="text/css">
a:hover {
  text-decoration: none;
}
a#back_profile {
  color: #8590a6;
}
a#back_profile svg {
  fill: #8590a6;
}
a#back_profile:hover {
  color: gray;
}
a#back_profile:hover svg {
  fill: gray;
}
</style>
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
        <a id="back_profile" href="view">返回我的主页 <svg width="10" height="16" aria-hidden="true" style="height: 9px; width: 10px; -webkit-transform: rotate(-90deg); transform: rotate(-90deg); margin: 0 4px 0 8px;"><g><path d="M8.716.217L5.002 4 1.285.218C.99-.072.514-.072.22.218c-.294.29-.294.76 0 1.052l4.25 4.512c.292.29.77.29 1.063 0L9.78 1.27c.293-.29.293-.76 0-1.052-.295-.29-.77-.29-1.063 0z"></path></g></svg></a>
        
      </div>
    </div>
  </div>
  <form action="" method="post">
    <div class="col-md-12 panel panel-default">
      <div class="panel-body">
        <ul style="list-style: none;">
          <li>
            <div class="col-md-12" style="margin-bottom: 20px;">
              <div class="col-md-8" style="border-bottom: 1px solid #f6f6f6;">
                <h3><strong>基本信息</strong></h3>
              </div>
            </div>
          </li>
          <li>
            <div class="col-md-12" style="margin-bottom: 15px;">
              <div class="col-md-1">
                <b>用户名</b>
              </div>
              <div class="col-md-7">
                <span><?php echo $userInfo['user_basic_info']['User_Name'];?></span>
              </div>
            </div>
          </li>
          <li>
            <div class="col-md-12" style="margin-bottom: 15px;">
              <div class="col-md-1">
                <b>邮箱</b>
              </div>
              <div class="col-md-7">
                <span><?php echo $userInfo['user_basic_info']['Email'];?></span>
              </div>
            </div>
          </li>
          <li>
            <div class="col-md-12 usermeta-wrapper" style="margin-bottom: 15px;">
              <div class="col-md-1">
                <b>学校</b>
              </div>
              <div class="col-md-4">
                <span>
                  <?php
                  $usermeta_school = "";
                  if (isset($usermetaInfo['school'])) {
                    $usermeta_school = $usermetaInfo['school'];
                  } 
                  ?>
                  <input type="text" class="form-control" value="<?php echo $usermeta_school;?>" name="school">
                </span>
              </div>
            </div>
          </li>
          <li>
            <div class="col-md-12 usermeta-wrapper" style="margin-bottom: 15px;">
              <div class="col-md-1">
                <b>专业</b>
              </div>
              <div class="col-md-4">
                <span>
                  <?php
                  $usermeta_major = "";
                  if (isset($usermetaInfo['major'])) {
                    $usermeta_major = $usermetaInfo['major'];
                  } 
                  ?>
                  <input type="text" class="form-control" value="<?php echo $usermeta_major;?>" name="major">
                </span>
              </div>
            </div>
          </li>
          <li>
            <div class="col-md-12 usermeta-wrapper" style="margin-bottom: 15px;">
              <div class="col-md-1">
                <b>居住地</b>
              </div>
              <div class="col-md-4">
                <span>
                  <?php
                  $usermeta_country = "";
                  if (isset($userInfo['user_basic_info']['Country'])) {
                    $usermeta_country = $userInfo['user_basic_info']['Country'];
                  } 
                  ?>
                  <input type="text" class="form-control" value="<?php echo $usermeta_country;?>" name="country">
                </span>
              </div>
            </div>
          </li>
          <li>
            <div class="col-md-12 usermeta-wrapper" style="margin-bottom: 15px;">
              <div class="col-md-1">
                <b>行业</b>
              </div>
              <div class="col-md-4">
                <span>
                  <?php
                  $usermeta_occupation = "";
                  if (isset($usermetaInfo['occupation'])) {
                    $usermeta_occupation = $usermetaInfo['occupation'];
                  } 
                  ?>
                  <input type="text" class="form-control" value="<?php echo $usermeta_occupation;?>" name="occupation">
                </span>
              </div>
            </div>
          </li>
          <li>
            <div class="col-md-12 usermeta-wrapper" style="margin-bottom: 15px;">
              <div class="col-md-1">
                <b>个人简历</b>
              </div>
              <div class="col-md-5">
                <span>
                  <?php
                  $usermeta_description = "";
                  if (isset($usermetaInfo['description'])) {
                    $usermeta_description = $usermetaInfo['description'];
                  } 
                  ?>
                  <textarea  class="form-control" name="description" rows="5"><?php echo $usermeta_description;?></textarea>
                </span>
              </div>
            </div>
          </li>
          <li>
            <button type="submit" class="btn btn-primary" name="save">保存</button>
            <a class="btn btn-default" style="margin-left: 20px;" href="view">取消</a>
          </li>
        </ul>
      </div>
    </div>
  </form>
</div>