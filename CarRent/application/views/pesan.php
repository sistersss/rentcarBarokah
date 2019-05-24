<?php foreach($pelanggan as $p) { ?>
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Silahkan Cek Data Diri Anda Untuk Pemesanan Mobil</h2>
          </div>
          <div class="col-md-12">

            <form action="<?php echo base_url() ?>index.php/HomeUser/transaction/<?php echo $this->uri->segment(3) ?>" method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="nama" class="text-black">Nama Pelanggan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $p['nama_pelanggan'] ?>" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="alamat" class="text-black">Alamat </label>
                    <textarea name="alamat" id="alamat" cols="30" rows="7" class="form-control" readonly=""><?php echo $p['alamat'] ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo $p['email'] ?>" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="no_telp" class="text-black">Nomor Telepon </label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $p['no_telp'] ?>" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="tgl_pinjam" class="text-black">Tanggal Peminjaman </label>
                    <input type="date" class="form-control" required="" id="tgl_pinjam" name="tgl_pinjam">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="lama_pinjam" class="text-black">Lama Peminjaman </label>
                    <div class="row">
                    <div class="col-md-2">
                      <input type="number" min='1' class="form-control" required="" id="lama_pinjam" name="lama_pinjam">
                    </div>
                    <div class="col-md-1">
                      <h3>hari</h3>
                    </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-lg-6">
                    <a href="<?php echo base_url() ?>"><input type="button" class="btn btn-danger btn-lg btn-block" value="Batal"></a>
                  </div>
                  <div class="col-lg-6">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Pesan">
                  </div>
                </div>

                <div class="form-group row">
                  <?php echo $keterangan[0]['keterangan'] ?>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
