<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rental Mobil Barokah</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/user/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <?php $this->load->view('element/header'); ?>

    <?php 
      if(!empty($content)){
        echo $content;
      }
    ?>

    <footer class="site-footer border-top">
      <div class="container">
          <div class="col-md-12">
            <center>
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </center>
          </div>
      </div>
    </footer>
  </div>

  <script src="<?php echo base_url() ?>assets/user/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/user/js/jquery-ui.js"></script>
  <script src="<?php echo base_url() ?>assets/user/js/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/user/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/user/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>assets/user/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url() ?>assets/user/js/aos.js"></script>

  <script src="<?php echo base_url() ?>assets/user/js/main.js"></script>
    
  </body>
</html>
