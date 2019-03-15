<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
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
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.html" class="js-logo-clone">Car Rent "Barokah"</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-left" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="active"><a href="#">Home</a></li>
            <li class="has-children">
              <a href="#">Kategori Mobil</a>
              <ul class="dropdown">
                <li><a href="#">SUV</a></li>
                <li><a href="#">SEDAN</a></li>
                <li><a href="#">SUPER CAR</a></li>
              </ul>
            </li>
            <li><a href="#">Contact Us</a></li>
            <?php if (!empty($this->session->userdata('id_pelanggan'))) { ?>
            <li style="right: 10em; position: absolute;"><a href="<?php echo base_url() ?>index.php/User/logout">Logout</a></li>
            <?php 
          } else { ?>
            <li style="right: 10em; position: absolute;"><a href="<?php echo base_url() ?>index.php/User">Login</a></li>
            <?php 
          } ?>
          </ul>
        </div>
      </nav>
    </header>

    <br>
    <br>
    <h2 align="center">Nikmati Perjalanan Anda Bersama "Car Rent Barokah"</h2>
    <br>
    <h4 align="center">Kepuasan Anda Prioritas Kami</h3>
    <br>
    <div class="site-blocks-cover" style="background-image: url(<?php echo base_url() ?>assets/user/images/Mobil0.jpg);" data-aos="fade" >
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Mobil Terbaru</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>assets/user/images/Mobil1.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Mobil Alphard</a></h3>
                    <p class="mb-0">AG 7882 RI</p>
                    <p class="text-primary font-weight-bold">Rp 1.000.000 per hari</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>assets/user/images/Mobil3.jpg" alt="Image placeholder" class="img-fluid" >
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Suzuki Ertiga</a></h3>
                    <p class="mb-0">N 1322 RE</p>
                    <p class="text-primary font-weight-bold">Rp 350.000 per hari</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>assets/user/images/Mobil8.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Daihatsu Xenia</a></h3>
                    <p class="mb-0"></p>N 4654 KA</p>
                    <p class="text-primary font-weight-bold">Rp 250.000 per hari</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>assets/user/images/Mobil15.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Mitsubishi Xpander</a></h3>
                    <p class="mb-0">N 1307 GE</p>
                    <p class="text-primary font-weight-bold">Rp 300.000 per hari</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>assets/user/images/Mobil10.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Mini Bus</a></h3>
                    <p class="mb-0">N 7781 NA</p>
                    <p class="text-primary font-weight-bold">Rp 300.000 per hari</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>BANYAK DIMINATI</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>assets/user/images/Mobil8.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Daihatsu Xenia</a></h3>
                    <p class="mb-0">N 4654 KA</p>
                    <p class="text-primary font-weight-bold">Rp 250.000 per hari</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>assets/user/images/Mobil15.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Mitsubishi Xpander</a></h3>
                    <p class="mb-0">N 1307 GE</p>
                    <p class="text-primary font-weight-bold">Rp 300.000 per hari</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>assets/user/images/Mobil13.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Honda Civic</a></h3>
                    <p class="mb-0">N 6332 TA</p>
                    <p class="text-primary font-weight-bold">Rp 400.000 per hari</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>assets/user/images/Mobil3.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Suzuki Ertiga</a></h3>
                    <p class="mb-0">N 1322 RE</p>
                    <p class="text-primary font-weight-bold">Rp 350.000 per hari</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>assets/user/images/Mobil10.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Mini Bus</a></h3>
                    <p class="mb-0">N 7781 NA</p>
                    <p class="text-primary font-weight-bold">Rp 300.000 per hari</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
