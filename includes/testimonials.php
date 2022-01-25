<?php 

$get_active_testimonials = getActiveTestimonials();
if(mysqli_num_rows($get_active_testimonials) > 0){
  $getTestimonialBg = getActiveTestimonialsBg();
?>
<section id="testimonials" style="background-image:url('./admin/uploads/bg/<?= $getTestimonialBg['f_image']; ?>');height:450px;text-align:center;" class="parallex">
  <div class="container">
    <div class="quote"> <i class="fa fa-quote-left"></i> </div>
    <div class="clearfix"></div>
    <div class="slider-text">
      <div id="owl-testi" class="owl-carousel owl-theme">
          <?php 
            foreach($get_active_testimonials as $active_testimonial){
          ?>
          <div  class="col-md-10 col-md-offset-1"> 
            <img src="./admin/uploads/testimonials/<?= $active_testimonial['reviewer_photo']; ?>" class="img-circle" alt="">
            <h5><?= $active_testimonial['review']; ?></h5>
            <h6><?= $active_testimonial['reviewer_name']; ?></h6>
            <p><?= $active_testimonial['reviewer_designation']; ?></p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php }else{ echo " "; } ?>