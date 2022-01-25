<footer id="footer">
  <div class="bg-sec">
    <div class="container">
      <h2>LOOKING FORWARD TO <strong>HEARING </strong>FROM YOU!</h2>
    </div>
  </div>
</footer>
<?php 
 $links = getActiveSocialLink();
 if(mysqli_num_rows($links) > 0){
?>
<footer id="footer-down">
  <h2>Follow Us On</h2>
  <ul class="social-icon">
    <?php 
      foreach($links as $link){
    ?>
    <li class="<?= strtolower($link['social_name']); ?> hvr-pulse"><a href="#"><i class="fa fa-<?= ($link['social_name'] == 'facebook'? strtolower($link['social_name']).'-f':strtolower($link['social_name'])) ?>"></i></a></li>
    <?php } ?>
  </ul>
  <p> &copy; Copyright 2021 - <?= date('Y');?> Cosmix - developed By : <a href="https://webdevifti.com" target="_blank">webdevifti</a> </p>
</footer>
 <?php } ?>
<!--Jquery-->
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/jquery.min.js' ?>"></script>
<!--Boostrap-Jquery-->
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/bootstrap.js' ?>"></script>
<!--Preetyphoto-Jquery-->
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/jquery.prettyPhoto.js' ?>"></script>
<!--NiceScroll-Jquery-->
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/jquery.nicescroll.js' ?>"></script>
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/waypoints.min.js' ?>"></script>
<!--Isotopes-->
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/jquery.isotope.js' ?>"></script>
<!--Wow-Jquery-->
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/wow.js' ?>"></script>
<!--Count-Jquey-->
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/jquery.countTo.js' ?>"></script>
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/jquery.inview.min.js' ?>"></script>
<!--Owl-Crousels-Jqury-->
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/owl.carousel.js' ?>"></script>
<!--Main-Scripts-->
<script type="text/javascript" src="<?php echo SITE_ASSETS.'js/script.js' ?>"></script>

<script>
  
$('#maincontactform').on('submit',function(e){
  e.preventDefault();
  $('#btnSend').html('Sending...');
  $('#btnSend').attr('disabled', true);
  $.ajax({
    url: './includes/contact_submit.php',
    type: 'post',
    data: $('#maincontactform').serialize(),
    success:function(result){
      $('#msg').html(result);
      $('#btnSend').html('Send');
      $('#btnSend').attr('disabled', false);
      $('#maincontactform')[0].reset();
    }
  });

});

</script>
</body>
</html>