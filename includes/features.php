<?php
$getfeature = getFeatureData();
if(mysqli_num_rows($getfeature) > 0){

?>
<section id="features">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>AWESOME FEATUR<span>ES</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <?php

      $checkUl = getFeatureTabClass();
      if(mysqli_num_rows($checkUl)){ ?>
        <ul class="nav nav-tabs" role="tablist">
          <?php foreach($checkUl as $key=>$d){ 
              $active = $key;
            ?>
          <li role="presentation" class="<?php if($active == 0) echo 'active'; ?>"><a href="#id_<?= $d['id']; ?>" role="tab" data-toggle="tab"><i class="<?= $d['feature_tab_icons']; ?>"></i></a></li>
          <?php } ?>
        </ul>
    <?php } else { echo " "; } ?>

  
    <div class="tab-content">
      <?php foreach($getfeature as $key=>$feature){ $activeTab = $key; ?>
      <div role="tabpanel" class="tab-pane fade <?php if($activeTab == 0) echo 'in active'; ?> feat-sec" id="id_<?= $feature['id']; ?>">
        <div class="col-md-6 tab">
          <h5><?= $feature['feature_category']; ?></h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">
            <?= $feature['feature_description']; ?>
          </p>
        </div>
        <div class="col-md-6 tab-img"><img src="./admin/uploads/features/<?= $feature['feature_image'] ?>" class="img-responsive" alt=""></div>
      </div>
      <?php } ?> 
      <!-- <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-2">
        <div class="col-md-6 tab">
          <h5>Graphic Design</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing<br>
          </p>
          <p class="feat-sec-1">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound </p>
        </div>
        <div class="col-md-6 tab-img"><img src="site_assets/images/Features/02.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-3">
        <div class="col-md-6 tab">
          <h5>Web Development</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing<br>
          </p>
          <p class="feat-sec-1">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound </p>
        </div>
        <div class="col-md-6 tab-img"><img src="site_assets/images/Features/03.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-4">
        <div class="col-md-6 tab">
          <h5>Responsive Design</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing<br>
          </p>
          <p class="feat-sec-1">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound </p>
        </div>
        <div class="col-md-6 tab-img"><img src="site_assets/images/Features/04.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-5">
        <div class="col-md-6 tab">
          <h5>Creative Gallery</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing<br>
          </p>
          <p class="feat-sec-1">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound </p>
        </div>
        <div class="col-md-6 tab-img"><img src="site_assets/images/Features/05.jpg" class="img-responsive" alt=""></div>
      </div> -->
    </div>
  </div>
</section>

<?php }else { echo ""; } ?>