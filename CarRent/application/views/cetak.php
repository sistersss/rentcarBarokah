<?php foreach($transaksi as $m) { ?>
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Bukti Transaksi Anda, Silahkan Cetak dan bawa saat ingin mengambil mobil</h2>
          </div>
          <div class="col-md-12">
             
              <div class="p-3 p-lg-3 border" id='printMe'>
                <center><h2 class="h3 mb-3 text-black">Rental Mobil Barokah</h2></center>
                <div class="row" style="color: black;">
                  <div class="col-md-8">
                    Nama Pelanggan : <?php echo $m['nama_pelanggan'] ?>
                  </div>
                  <div class="col-md-4">
                    Tanggal Sewa : <?php echo $m['tgl_sewa'] ?>
                  </div>
                  <div class="col-md-8">
                    Alamat Pelanggan : <?php echo $m['alamat'] ?>
                  </div>
                  <div class="col-md-4">
                    Lama Sewa : <?php echo $m['lama_sewa'] ?>
                  </div>
                  <div class="col-md-8">
                    Nomor Telepon Pelanggan : <?php echo $m['no_telp'] ?>
                  </div>
                  <div class="col-md-4">
                  </div>
                </div>

                <div class="row" style="color: black; margin-top: 20px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-10 border">
                    <b>Data Mobil :</b><br>
                    <table width="100%" border="0">
                      <tr>
                        <td>Nomor Polisi</td>
                        <td>:</td>
                        <td><?php echo $m['no_polisi'] ?></td>
                      </tr>
                      <tr>
                        <td>Merk / Type</td>
                        <td>:</td>
                        <td><?php echo $m['merk_mobil'] ?> / <?php echo $m['nama_subjenis'] ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Mobil</td>
                        <td>:</td>
                        <td><?php echo $m['nama_jenis'] ?></td>
                      </tr>
                      <tr>
                        <td>Tahun Pembuatan</td>
                        <td>:</td>
                        <td><?php echo $m['tahun_pembuatan'] ?></td>
                      </tr>
                      <tr>
                        <td>Warna Mobil</td>
                        <td>:</td>
                        <td><?php echo $m['warna'] ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-1"></div>
                </div><br><br>
                <font style="color: black">
                Syarat dan Ketentuan :
                <?php echo $keterangan[0]['keterangan'] ?>
                </font>
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