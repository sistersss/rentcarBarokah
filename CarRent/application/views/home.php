<!-- <div class="site-blocks-cover" style="background-image: url(<?php echo base_url() ?>assets/user/images/Mobil0.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          
        </div>
      </div>
    </div> -->

<?php if($iklan!=null){ ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php $no=0; foreach($iklan as $ik){ ?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $no ?>" <?php if($no==0){ echo 'class="active"'; } ?>></li>
      <?php $no++;} ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php $no=0; foreach($iklan as $ik){ ?>
      <div class="item <?php if($no==0){ echo 'active'; } ?>">
        <img src="<?php echo base_url() ?>adm/assets/image/iklan/<?php echo $ik['gambar'] ?>" alt="<?php echo $ik['nama_iklan'] ?>" style="width:100%;">
      </div>
      <?php $no++;} ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<?php } ?>

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
              <?php foreach($mobil_terbaru as $mb) { ?>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>adm/assets/image/mobil/<?php echo $mb['gambar'] ?>" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#"><?php echo $mb['merk_mobil'] ?></a></h3>
                    <p class="mb-0"><?php echo $mb['nama_jenis'] ?></p>
                    <p class="text-primary font-weight-bold"><?php echo "Rp.".number_format($mb['harga_sewa'],0,"",".") ?></p>
										<?php if($mb['kuota_mobil']>0) { ?>
                    <a href="<?php echo base_url() ?>index.php/HomeUser/detailMobil/<?php echo $mb['id_mobil'] ?>"><button class="btn btn-success">PINJAM</button></a>
										<?php } else { ?>
											<button class="btn btn-success" style="background: grey">DISEWA</button>
										<?php } ?>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Mobil Terlaris</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <?php foreach($mobil_terlaris as $ml) { ?>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?php echo base_url() ?>adm/assets/image/mobil/<?php echo $ml['gambar'] ?>" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#"><?php echo $ml['merk_mobil'] ?></a></h3>
                    <p class="mb-0"><?php echo $ml['nama_jenis'] ?></p>
                    <p class="text-primary font-weight-bold"><?php echo "Rp.".number_format($ml['harga_sewa'],0,"",".") ?></p>
                    <?php if($ml['kuota_mobil']>0) { ?>
                    <a href="<?php echo base_url() ?>index.php/HomeUser/detailMobil/<?php echo $ml['id_mobil'] ?>"><button class="btn btn-success">PINJAM</button></a>
										<?php } else { ?>
											<button class="btn btn-success" style="background: grey">DISEWA</button>
										<?php } ?>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
