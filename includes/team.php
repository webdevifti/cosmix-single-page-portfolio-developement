<?php

$getActiveMembers = getActiveTeamMember();
if(mysqli_num_rows($getActiveMembers) > 0){

?>
<section id="team">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>OUR TE<span>AM</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="row">
      <?php foreach($getActiveMembers as $active_member){ ?>
      <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec wow slideInUp" data-wow-duration="1s" data-wow-delay=".1s">
        <div class="team-sec">
          <div class="team-img"> <img src="./admin/uploads/teams/<?= $active_member['photo'] ?>" class="img-responsive" alt="">
            <div class="team-desc">
              <h5><?= $active_member['name'] ?></h5>
              <p><?= $active_member['designation'] ?></p>
              <p><?= $active_member['bio'] ?></p>
              <ul class="team-social-icon">
                <?php 
                  $getSocials = getSocialByMemberId($active_member['id']);
                  foreach($getSocials as $social){
                ?>
                <li><a href="<?= $social['social_url']; ?>" data-toggle="tooltip" data-placement="top" title="<?= $social['social_name'] ?>"><i class="fa fa-<?= $social['social_name']; ?>"></i></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php }else echo ""; ?>