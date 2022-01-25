

<?php 

$getContact = getAddressInfo();
?>
<section id="contact">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>CONTACT <span>US</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="text-center">
      <div class="col-md-6 col-sm-6 contact-sec-1">
        <h4>CONTACT IN<span>FO</span></h4>
        <ul class="contact-form">
          <li><i class="fa fa-map-marker"></i>
            <h6><strong>Address:</strong> <?= $getContact['address'] ?></h6>
          </li>
          <li><i class="fa fa-envelope"></i>
            <h6><strong>Mail Us:</strong> <a href="#"><?= $getContact['mail_address'] ?></a></h6>
          </li>
          <li><i class="fa fa-phone"></i>
            <h6><strong>Phone:</strong> <?= $getContact['contact_phone'] ?>0 </h6>
          </li>
          <li><i class="fa fa-wechat"></i>
            <h6><strong>Website:</strong> <a href="<?= $getContact['website'] ?>"><?= $getContact['website'] ?></a> </h6>
          </li>
        </ul>
      </div>
      <div class="col-md-6 col-sm-6">
      
         <form id="maincontactform" method="POST"">
          <div class="row  wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name">
                
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Address">
                
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Subject">
            
          </div>
          <div class="form-group">
            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message"></textarea>
            
          </div>
          <button type="submit" id="btnSend" class="btn-send col-md-12 col-sm-12 col-xs-12">Send Now</button>
        </form>
        <span id="msg"></span>
      </div>
    </div>
  </div>
</section>