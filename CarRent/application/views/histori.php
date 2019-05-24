<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center><h2 class="h3 mb-3 text-black">Histori Transaksi</h2></center>
          </div>
          <div class="col-md-12">
            <table width="100%" border="1">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Tanggal Sewa</th>
                  <th>Merk Mobil</th>
                  <th>Lama Sewa</th>
                  <th>Total Biaya</th>
									<th>Status Mobil</th>
									<th>Action</th>
                </tr>
              </thead>
              <?php $num=1; foreach($histori as $h){ ?>
                <tbody>
                  <tr>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $h['tgl_sewa'] ?></td>
                    <td><?php echo $h['merk_mobil'] ?></td>
                    <td><?php echo $h['lama_sewa'] ?></td>
                    <td><?php echo "Rp.".number_format($h['total_biaya'],0,"",".") ?></td>
                    <td>
                      <?php 
                        if($h['tgl_kembali']!=NULL){
                          echo "Sudah Kembali";
												}
												else if($h['status']==3){
													echo "Dibatalkan";
												}
                        else if($h['status']==1){
                          echo "Sedang di Gunakan";
                        }
                        else if($h['status']==2) {
                          echo "Expired";
                        }
                        else if($h['status']==0) {
                          echo "Belum di Ambil";
                        }
                      ?>
										</td>
										<td>
											<?php if($h['tgl_kembali']==NULL && $h['status']==0){ ?>
											<a href="<?php echo base_url() ?>index.php/HomeUser/batalkanTransaksi/<?php echo $h['id_transaksi'] ?>/<?php echo $h['id_mobil'] ?>"><button class="btn btn-danger">Batalkan</button></a>
											<?php } ?>
										</td>
                  </tr>
                </tbody>
              <?php $num++; } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
