<?php 


$get_services = getActiveServie();
if(mysqli_num_rows($get_services) > 0){

?>
<section id="service">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>OUR SERVI<span>CE</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="row">
      <div class="features-sec">
        <?php 
        
          foreach($get_services as $service){
        ?>
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="<?= $service['icon']; ?>"></i> </div>
            <div class="media-body">
              <h5 class="media-heading"><?= $service['title']; ?></h5>
              <p><?= $service['description']; ?></p>
            </div>
          </div>
        </div>
        <?php } ?>
        <!-- <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-cubes"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">UI Design</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-pie-chart"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">Marketing</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-bar-chart"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">SEO Services</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-language"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">Android App</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-bullseye"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">Clean Code</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div> -->
      </div>
    </div>
    <?php 
     $getExp = getActiveExp();
      if(mysqli_num_rows($getExp) > 0){      
    ?>
    <div class="experience">
      <div class="col-sm-6 col-xs-12">
        <div class="our-skills wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
          <?php foreach($getExp as $experience){ ?>
          <div class="single-skill wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
            <p class="lead"><?= $experience['exp_title']; ?></p>
            <div class="progress">
              <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="<?= $experience['exp_ratio']; ?>" style="width: <?= $experience['exp_ratio']; ?>%;"> <?= $experience['exp_ratio']; ?>% </div>
            </div>
          </div>
          <?php } ?>
          
        </div>
      </div>
      <?php 
      $get_section_feature_image = getSectionFeatireImage('experience');
      $fetch = mysqli_fetch_assoc($get_section_feature_image);
      ?>
      <div class="col-sm-6  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms"> 
        <?php if($fetch['f_image']){ ?>
          <img src="./admin/uploads/experience/<?= $fetch['f_image']; ?>" class="img-responsive" alt="">
        <?php } ?>
       </div>
    </div>
    <?php } ?>
  </div>
</section>

<?php }else { echo ""; } ?>