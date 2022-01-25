<?php 

$getClient = getActiveBrands();
if(mysqli_num_rows($getClient) > 0){

?>
<div id="client">
  <div class="container">
    <div id="client-slider" class="owl-carousel">
      <?php foreach($getClient as $client){ ?>
      <div class="item client-logo"> <a href="#"><img src="./admin/uploads/brands/<?= $client['brand_logo'] ?>" class="img-responsive" alt=""/></a> </div>

      <?php } ?>
    </div>
  </div>
</div>

<?php } else { echo ""; } ?>