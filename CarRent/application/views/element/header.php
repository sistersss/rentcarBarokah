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
            <li class="active"><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="has-children">
              <a href="#">Kategori Mobil</a>
              <ul class="dropdown">
                <?php foreach($kategori as $k) { ?>
                <li><a href="<?php echo base_url() ?>index.php/HomeUser/listMobil/<?php echo $k['id_jenis'] ?>"><?php echo $k['nama_jenis'] ?></a></li>
                <?php } ?>
              </ul>
            </li>
            <li><a href="<?php echo base_url() ?>index.php/HomeUser/contactUs">Contact Us</a></li>
            <?php if(!empty($this->session->userdata('id_pelanggan'))){ ?>
            <li style="right: 16em; position: absolute;"><a href="<?php echo base_url() ?>index.php/HomeUser/historiTransaksi/<?php echo $this->session->userdata('id_pelanggan') ?>">Histori Transaksi</a></li>
            <li style="right: 10em; position: absolute;"><a href="<?php echo base_url() ?>index.php/User/logout">Logout</a></li>
            <?php } else { ?>
            <li style="right: 10em; position: absolute;"><a href="<?php echo base_url() ?>index.php/User">Login</a></li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </header>