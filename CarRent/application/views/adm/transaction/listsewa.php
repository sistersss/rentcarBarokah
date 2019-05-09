<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="color: white">Daftar Penyewaan</h3>
              </div>
            </div>

            <div class="clearfix" style="padding-bottom: 20px"></div>
            <div class="col-md-10">
              <input type="text" name="" id="search" class="form-control" style="border-radius: 20px">
            </div>
            <div class="col-md-2">
              <button class="btn btn-success form-control" data-toggle="modal" data-target="#add" style="border-radius: 20px">Tambah Transaksi</button>
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
													<th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($sewa as $e) { ?>
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
														<?php
															if($e['stat']==0){ ?>
																<a href="<?php echo base_url() ?>Transaction/ambilMobil/<?php echo $e['id_transaksi'] ?>/<?php echo $e['id_mobil'] ?>"><button class="btn btn-success">Diambil</button></a>
														<?php }
														?>
                            <!-- <a href="" data-toggle="modal" data-target="#edit<?php echo $no; ?>" style="padding: 0px; font-size: 1.1em"><p class="fa fa-edit"></p></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url() ?>Transaction/hapusSewa/<?php echo $e['id_transaksi'] ?>" style="padding: 0px; font-size: 1.1em" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')"><p class="fa fa-trash"></p></a>&nbsp;&nbsp; -->
                            </center>
                          </td>
													<td>
														<?php
															if($e['stat']==2){ ?>
																<span class="label label-warning">EXPIRED</span>
														<?php } else if($e['stat']==3){ ?>
                                <span class="label label-danger">DIBATALKAN</span>
                            <?php } ?>
													</td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                    <div class="clearfix" style="padding-bottom: 20px"></div>
</div><!-- 
<div class="modal fade bs-example-modal-lg" id="add" tabindex="-1" role="dialog" aria-hidden="true">
  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() ?>Transaction/tambahSewa" method="POST" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Penyewaan</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pelanggan">Nama Pelanggan 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="nama_pelanggan" name="nama_pelanggan" required="required" class="form-control col-md-7 col-xs-12">
              <option>--Pilih Pelanggan--</option>
              <?php foreach($pelanggan as $p) { ?>
                <option value="<?php echo $p['id_pelanggan'] ?>"><?php echo $p['nama_pelanggan'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_mobil">Jenis Mobil 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="jenis_mobil" name="jenis_mobil" required="required" class="form-control col-md-7 col-xs-12">
              <option>--Pilih Jenis Mobil--</option>
              <?php foreach($jenis as $j) { ?>
                <option value="<?php echo $j['id_jenis'] ?>"><?php echo $j['nama_jenis'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subjenis_mobil">Subjenis Mobil 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="subjenis_mobil" name="subjenis_mobil" required="required" class="form-control col-md-7 col-xs-12">
              <option>--Pilih Subjenis Mobil--</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobil">Mobil 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="mobil" name="mobil" required="required" class="form-control col-md-7 col-xs-12">
              <option>--Pilih Mobil--</option>
            </select>
          </div>
        </div>
        <input type="hidden" name="harga" id="harga">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_sewa">Tanggal Sewa 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="date" id="tgl_sewa" name="tgl_sewa" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lama_sewa">Lama Sewa 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="number" id="lama_sewa" name="lama_sewa" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_bayar">Total Bayar 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="total_bayar" name="total_bayar" readonly="" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
      </div>
    </div>
  </div>
  </form>
</div> -->
<script src="<?php echo base_url() ?>assets/adm/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/adm/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript">
      $('#datatable').dataTable( {
        "dom": 'lrtip',
      } );
      oTable = $('#datatable').dataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
      $('#search').keyup(function(){
            oTable.fnFilter($(this).val()).draw() ;
      });
    </script> 
<!-- <script type="text/javascript">
    $(document).ready(function() {

        $('select[name="jenis_mobil"]').on('change', function() {
            var jenisID = $(this).val();
            if(jenisID) {
                $.ajax({
                    url: '<?php echo base_url() ?>Transaction/subjenisAjax/'+jenisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="subjenis_mobil"]').empty();
                        $('select[name="subjenis_mobil"]').append('<option>--Pilih Subjenis Mobil--</option>');
                        $.each(data, function(key, value) {
                            $('select[name="subjenis_mobil"]').append('<option value="'+ value.id_subjenis +'">'+ value.nama_subjenis +'</option>');
                            console.log(value.id_subjenis);
                        });
                    }
                });
            }else{
                $('select[name="subjenis_mobil"]').empty();
            }
        });

        $('select[name="subjenis_mobil"]').on('change', function() {
            var subjenisID = $(this).val();
            if(subjenisID) {
                $.ajax({
                    url: '<?php echo base_url() ?>Transaction/mobilAjax/'+subjenisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="mobil"]').empty();
                        $('select[name="mobil"]').append('<option>--Pilih Mobil--</option>');
                        $.each(data, function(key, value) {
                            $('select[name="mobil"]').append('<option value="'+ value.id_mobil +'">'+ value.merk_mobil +'</option>');
                            console.log(value.id_mobil);
                        });
                    }
                });
            }else{
                $('select[name="mobil"]').empty();
            }
        });

        $('select[name="mobil"]').on('change', function() {
            var mobilID = $(this).val();
            if(mobilID) {
                $.ajax({
                    url: '<?php echo base_url() ?>Transaction/detailmobilAjax/'+mobilID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $.each(data, function(key, value) {
                            document.getElementById("harga").value=value.harga_sewa;
                        });
                    }
                });
            }else{
                console.log('error');
            }
        });

        $('#lama_sewa').on('keyup', function() {
            var harga = document.getElementById("harga").value;
            var lama = $(this).val();
            document.getElementById("total_bayar").value = harga*lama;
        });
    });
</script> -->
