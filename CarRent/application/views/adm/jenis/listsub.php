<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="color: white">Daftar Subjenis Mobil</h3>
              </div>
            </div>

            <div class="clearfix" style="padding-bottom: 20px"></div>
            <div class="col-md-10">
              <input type="text" name="" id="search" class="form-control" style="border-radius: 20px">
            </div>
            <div class="col-md-2">
              <button class="btn btn-success form-control" data-toggle="modal" data-target="#add" style="border-radius: 20px">Tambah Subjenis Mobil</button>
            </div>
            <div class="clearfix" style="padding-bottom: 20px"></div>
            <table id="datatable" class="table table-bordered-bottom" style="color: white;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Subjenis Mobil</th>
													<th>Kuota Mobil</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $kuota=0; $no=1; foreach($subjenis as $e) { ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $e['nama_subjenis'] ?></td>
													<!-- <?php
														foreach($mobil as $me) {
															if($me['id_subjenis']==$e['id_subjenis']){
																if($me['kuota_mobil']>0){
																	$kuota++;
																}
															}
														}
													?> -->
													<!-- <td><?php echo $kuota ?></td> -->
                          <td><?php echo $e['jml_kuota'] ?></td>
                          <td>
                            <center>
                            <a href="" data-toggle="modal" data-target="#edit<?php echo $no; ?>" style="padding: 0px; font-size: 1.1em"><p class="fa fa-edit"></p></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url() ?>Jenis/hapusSubjenis/<?php echo $e['id_subjenis'] ?>/<?php echo $this->uri->segment(3) ?>" style="padding: 0px; font-size: 1.1em" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')"><p class="fa fa-trash"></p></a>&nbsp;&nbsp;
                            </center>
                          </td>
                        </tr>
                        <?php $no++; $kuota=0; } ?>
                      </tbody>
                    </table>
                    <div class="clearfix" style="padding-bottom: 20px"></div>
</div>
<?php $num=1; foreach($subjenis as $m) { ?>
  <div class="modal fade bs-example-modal-lg" id="edit<?php echo $num; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() ?>Jenis/editSubjenis/<?php echo $m['id_subjenis'] ?>/<?php echo $this->uri->segment(3) ?>" method="POST" enctype="multipart/form-data">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Subjenis Mobil</h4>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_subjenis">Nama Subjenis 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nama_subjenis" name="nama_subjenis" value="<?php echo $m['nama_subjenis'] ?>" required="required" class="form-control col-md-7 col-xs-12">
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
  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() ?>Jenis/tambahSubjenis/<?php echo $this->uri->segment(3) ?>" method="POST" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Subjenis Mobil</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_subjenis">Nama Subjenis 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nama_subjenis" name="nama_subjenis" required="required" class="form-control col-md-7 col-xs-12">
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
