<?php foreach($mobil as $m) { ?>
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo base_url() ?>adm/assets/image/mobil/<?php echo $m['gambar'] ?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $m['merk_mobil'] ?></h2>
            <div class="row">
              <div class="col-md-6">
                <b>Jenis Mobil : <?php echo $m['nama_jenis'] ?></b>
              </div>
              <div class="col-md-6">
                <b>Warna Mobil : <?php echo $m['warna'] ?></b>
              </div>
            </div><br>
            <p><?php echo $m['deskripsi'] ?></p>
            <p><strong class="text-primary h4"><?php echo "Rp.".number_format($m['harga_sewa'],0,"",".") ?></strong></p>
            
            <p><a href="<?php echo base_url() ?>" class="buy-now btn btn-sm btn-success">Kembali</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url() ?>index.php/HomeUser/pesanMobil/<?php echo $m['id_mobil'] ?>" class="buy-now btn btn-sm btn-primary">Pesan</a></p>

          </div>
        </div>
      </div>
    </div>
    <?php } ?>