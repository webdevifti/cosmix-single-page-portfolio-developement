<?php 
    
    $getData = getAboutSection();
    if($getData > 0){
    ?>
<section id="about">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>ABOUT <span>US</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 ab-sec">
        <div class="col-md-6">
          <h3 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms"><?= $getData['about_heading'] ?></h3>
          <p><?= $getData['about_desc'] ?> </p>
        </div>
        <div class="col-md-6 ab-sec-img wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <?php if($getData['about_feature_image']) { ?>  
            <img src="./admin/uploads/about/<?= $getData['about_feature_image']; ?>" alt="">
          <?php } ?>
         </div>
      </div>
    </div>
    
  </div>
</section>
<?php } else { echo ""; } ?>