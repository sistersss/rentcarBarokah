<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="color: white">Daftar Mobil Yang Masih Disewa</h3>
              </div>
            </div>

            <div class="clearfix" style="padding-bottom: 20px"></div>
            <div class="col-md-10">
              <input type="text" name="" id="search" class="form-control" style="border-radius: 20px">
            </div>
            <div class="clearfix" style="padding-bottom: 20px"></div>
            <table id="datatable" class="table table-bordered-bottom" style="color: white;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pelanggan</th>
                          <th>Mobil</th>
                          <th>Nomor Polisi</th>
                          <th>Tanggal Sewa</th>
                          <th>Lama Sewa</th>
                          <th>Total Biaya</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($pengembalian as $e) { ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $e['nama_pelanggan'] ?></td>
                          <td><?php echo $e['merk_mobil'] ?></td>
                          <td><?php echo $e['no_polisi'] ?></td>
                          <td><?php echo $e['tgl_sewa'] ?></td>
                          <td><?php echo $e['lama_sewa'] ?></td>
                          <td><?php echo $e['total_biaya'] ?></td>
                          <td>
                            <center>
                            <a href="<?php echo base_url() ?>Transaction/kembaliMobil/<?php echo $e['id_transaksi'] ?>/<?php echo $e['id_mobil'] ?>"><button class="btn btn-success">Dikembalikan</button></a>
                            </center>
                          </td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                    <div class="clearfix" style="padding-bottom: 20px"></div>
</div>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript">
      $('#datatable').dataTable( {
        "dom": 'lrtip',
      } );
      oTable = $('#datatable').dataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
      $('#search').keyup(function(){
            oTable.fnFilter($(this).val()).draw() ;
      });
    </script> 