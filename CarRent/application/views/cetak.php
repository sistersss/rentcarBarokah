<?php foreach($mobil as $m) { ?>
<div class="site-section" id='printMe'>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Bukti Transaksi Anda, Silahkan Cetak dan bawa saat ingin mengambil mobil</h2>
          </div>
          <div class="col-md-12">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="nama" class="text-black">Merk Mobil </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $m['merk_mobil'] ?>" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="nama" class="text-black">Warna Mobil </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $m['warna'] ?>" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="nama" class="text-black">Nomor Polisi </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $m['no_polisi'] ?>" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="nama" class="text-black">Tanggal Peminjaman </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $tgl_pinjam ?>" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="nama" class="text-black">Lama Peminjaman </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $lama_pinjam ?>" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="nama" class="text-black">Total Biaya </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $total_bayar ?>" readonly="">
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <input type="button" class="btn btn-success btn-lg btn-block" value="Cetak" onclick="printDiv('printMe')">
    <?php } ?>
    <script>
      function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      }
    </script>