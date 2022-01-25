<?php 
      
    $get_banners = getActiveSlider();
    if(mysqli_num_rows($get_banners) > 0){
      
      
        
  ?>
<section id="slider">
  <div id="home-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php
      
      foreach($get_banners as $key=>$banner){
        $activeSlider = $key;
        $imagePath = 'admin/uploads/banners/'.$banner['banner_image'];
      ?>
      <div class="item <?php if($activeSlider == 0) echo 'active'; ?>" style="background-image:url(<?= $imagePath; ?>)">
        <div class="carousel-caption container">
          <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12">
              <h1><?= $banner['banner_subheading']; ?></h1>
              <h2><?= $banner['banner_heading']; ?></h2>
              <p><?= $banner['banner_desc'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <a class="home-carousel-left" href="#home-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="home-carousel-right" href="#home-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a> </div>
  </div>
  <!--/#home-carousel-->
</section>

<?php } else echo ""; ?>