<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="color: white">Daftar Iklan</h3>
              </div>
            </div>

            <div class="clearfix" style="padding-bottom: 20px"></div>
            <div class="col-md-10">
              <input type="text" name="" id="search" class="form-control" style="border-radius: 20px">
            </div>
            <div class="col-md-2">
              <button class="btn btn-success form-control" data-toggle="modal" data-target="#add" style="border-radius: 20px">Tambah Iklan</button>
            </div>
            <div class="clearfix" style="padding-bottom: 20px"></div>
            <table id="datatable" class="table table-bordered-bottom" style="color: white;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Iklan</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($iklan as $e) { ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $e['nama_iklan'] ?></td>
                          <td>
                            <center>
                            <a href="" data-toggle="modal" data-target=".gambar<?php echo $no; ?>"><p class="fa fa-eye"></p></a>&nbsp;&nbsp;
                            <a href="" data-toggle="modal" data-target="#edit<?php echo $no; ?>" style="padding: 0px; font-size: 1.1em"><p class="fa fa-edit"></p></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url() ?>Dashboard/hapusIklan/<?php echo $e['id_iklan'] ?>" style="padding: 0px; font-size: 1.1em" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')"><p class="fa fa-trash"></p></a>&nbsp;&nbsp;
                            </center>
                          </td>
                        </tr>
                        <!-- POP UP GAMBAR -->
                        <div class="modal fade bs-example-modal-lg gambar<?php echo $no; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">Iklan <?php echo $e['nama_iklan'] ?></h4>
                              </div>
                              <div class="modal-body">
                                <img src="<?php echo base_url() ?>assets/image/iklan/<?php echo $e['gambar'] ?>" width="100%">
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                    <div class="clearfix" style="padding-bottom: 20px"></div>
</div>
<?php $num=1; foreach($iklan as $m) { ?>
  <div class="modal fade bs-example-modal-lg" id="edit<?php echo $num; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() ?>Dashboard/editIklan/<?php echo $m['id_iklan'] ?>" method="POST" enctype="multipart/form-data">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Iklan</h4>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_iklan">Nama Iklan 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nama_iklan" name="nama_iklan" value="<?php echo $m['nama_iklan'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gambar">Gambar 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="gambar" name="gambar" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                              </div>
                            </div>
                          </div>
                          </form>
                        </div>
<?php $num++; } ?>
<div class="modal fade bs-example-modal-lg" id="add" tabindex="-1" role="dialog" aria-hidden="true">
  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() ?>Dashboard/tambahIklan" method="POST" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Iklan</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_iklan">Nama Iklan 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nama_iklan" name="nama_iklan" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gambar">Gambar 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="file" id="gambar" name="gambar" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
      </div>
    </div>
  </div>
  </form>
</div>
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

