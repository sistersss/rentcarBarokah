<div class="site-blocks-cover" style="background-image: url(<?php echo base_url() ?>assets/user/images/hero_1.jpg);" data-aos="fade">
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
                    <a href="<?php echo base_url() ?>index.php/HomeUser/detailMobil/<?php echo $mb['id_mobil'] ?>"><button class="btn btn-success">PINJAM</button></a>
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
                    <a href="<?php echo base_url() ?>index.php/HomeUser/detailMobil/<?php echo $ml['id_mobil'] ?>"><button class="btn btn-success">PINJAM</button></a>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
<<<<<<< HEAD
<<<<<<< HEAD
    </div>
=======

>>>>>>> 92b6d6ab3db2db2462e88f1aed76ec8980365257
=======
    </div>
>>>>>>> master
