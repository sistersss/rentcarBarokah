<?php foreach($subkategori as $k) { ?>
<div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Mobil <?php echo $k['nama_subjenis'] ?></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <?php foreach($mobil as $mb) { ?>
              <?php if($k['id_subjenis']==$mb['id_subjenis']) { ?>
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
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php } ?>
