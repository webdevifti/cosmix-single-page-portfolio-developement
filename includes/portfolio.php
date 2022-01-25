<?php

if(mysqli_num_rows(getActivePortfolio()) > 0){

?>
<section id="portfolio">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>AWESOME PORTFO<span>lio</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="text-center">
      <ul class="portfolio-filter">
        <li><a class="active" href="#" data-filter="*">All Works</a></li>
        <?php 
          $getPortfolioCategories = getActivePortfolioCategories();
          foreach($getPortfolioCategories as $p){
        ?>
        <li><a href="#" data-filter=".<?= strtolower($p['portfolio_category']); ?>"><?= ucwords($p['portfolio_category']) ?></a></li>
        <?php } ?>

      </ul>
      <!--/#portfolio-filter-->
    </div>
    <div class="portfolio-items">
        <?php 
          $getp = getActivePortfolio();
          foreach($getp as $portfolio){
        
        ?>
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item <?= strtolower($portfolio['portfolio_category']) ?>">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="./admin/uploads/portfolio/<?= $portfolio['portfolio_image'] ?>" alt="">
          <div class="portfolio-info"> <a class="preview" href="./admin/uploads/portfolio/<?= $portfolio['portfolio_image'] ?>" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6><?= $portfolio['title'] ?></h6>
            <p><?= $portfolio['short_desc']; ?></p>
          </div>
        </div>
      </div>
      <?php } ?>
      <!--/.portfolio-item-->
      <!-- <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item corporate portfolio">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="site_assets/images/Portfolio/02.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="site_assets/images/Portfolio/02.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-2</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item creative">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="site_assets/images/Portfolio/03.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="site_assets/images/Portfolio/03.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-3</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item corporate">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="site_assets/images/Portfolio/04.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="site_assets/images/Portfolio/04.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-4</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item creative portfolio">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="site_assets/images/Portfolio/05.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="site_assets/images/Portfolio/05.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-5</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item corporate">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="site_assets/images/Portfolio/06.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="site_assets/images/Portfolio/06.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-6</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>

<?php } else { echo ""; }?>