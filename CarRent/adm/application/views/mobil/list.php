<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="color: white">Daftar Mobil</h3>
              </div>
            </div>

            <div class="clearfix" style="padding-bottom: 20px"></div>
            <div class="col-md-10">
              <input type="text" name="" id="search" class="form-control" style="border-radius: 20px">
            </div>
            <div class="col-md-2">
              <button class="btn btn-success form-control" data-toggle="modal" data-target="#add" style="border-radius: 20px">Tambah Mobil</button>
            </div>
            <div class="clearfix" style="padding-bottom: 20px"></div>
            <table id="datatable" class="table table-bordered-bottom" style="color: white;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Merk Mobil</th>
                          <th>Nomor Polisi</th>
                          <th>Harga Sewa</th>
                          <th>Kuota</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($mobil as $e) { ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $e['merk_mobil'] ?></td>
                          <td><?php echo $e['no_polisi']; ?></td>
                          <td><?php echo $e['harga_sewa'] ?></td>
                          <td><?php echo $e['kuota_mobil'] ?></td>
                          <td>
                            <center>
                            <a href="" data-toggle="modal" data-target=".gambar<?php echo $no; ?>"><p class="fa fa-eye"></p></a>&nbsp;&nbsp;
                            <a href="" data-toggle="modal" data-target="#edit<?php echo $no; ?>" style="padding: 0px; font-size: 1.1em"><p class="fa fa-edit"></p></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url() ?>Mobil/hapusMobil/<?php echo $e['id_mobil'] ?>" style="padding: 0px; font-size: 1.1em" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')"><p class="fa fa-trash"></p></a>&nbsp;&nbsp;
                            </center>
                          </td>
                        </tr>
                        <!-- POP UP GAMBAR -->
                        <div class="modal fade bs-example-modal-lg gambar<?php echo $no; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">Mobil <?php echo $e['merk_mobil'] ?></h4>
                              </div>
                              <div class="modal-body">
                                <img src="<?php echo base_url() ?>assets/image/mobil/<?php echo $e['gambar'] ?>" width="100%">
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                    <div class="clearfix" style="padding-bottom: 20px"></div>
</div>
<?php $num=1; foreach($mobil as $m) { ?>
  <div class="modal fade bs-example-modal-lg" id="edit<?php echo $num; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() ?>Mobil/editMobil/<?php echo $m['id_mobil'] ?>" method="POST" enctype="multipart/form-data">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Mobil</h4>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="merk_mobil">Merk Mobil 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="merk_mobil" name="merk_mobil" value="<?php echo $m['merk_mobil'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="merk_mobil">Jenis Mobil 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="required" class="form-control col-md-7 col-xs-12" name="jenis" id="jenis">
                                      <option>--Pilih Jenis Mobil--</option>
                                      <?php foreach($jenis as $j) { ?>
                                        <?php if($j['id_jenis']==$m['id_jenis']) { ?>
                                        <option value="<?php echo $j['id_jenis'] ?>" selected><?php echo $j['nama_jenis'] ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $j['id_jenis'] ?>"><?php echo $j['nama_jenis'] ?></option>
                                        <?php } ?>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gambar">Gambar 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="gambar" name="gambar" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="warna">Warna Mobil 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="warna" name="warna" value="<?php echo $m['warna'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_polisi">Nomor Polisi 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="no_polisi" name="no_polisi" value="<?php echo $m['no_polisi'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_pembuatan">Tahun Pembuatan 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="tahun_pembuatan" value="<?php echo $m['tahun_pembuatan'] ?>" name="tahun_pembuatan" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kuota_mobil">Kuota Mobil 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="kuota_mobil" name="kuota_mobil" value="<?php echo $m['kuota_mobil'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga_sewa">Harga Sewa 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="harga_sewa" name="harga_sewa" value="<?php echo $m['harga_sewa'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="merk_mobil">Deskripsi 
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea required="required" class="form-control col-md-7 col-xs-12" name="deskripsi" id="deskripsi"><?php echo $m['deskripsi'] ?></textarea>
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
  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() ?>Mobil/tambahMobil" method="POST" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Mobil</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="merk_mobil">Merk Mobil 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="merk_mobil" name="merk_mobil" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="merk_mobil">Jenis Mobil 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select required="required" class="form-control col-md-7 col-xs-12" name="jenis" id="jenis">
              <option>--Pilih Jenis Mobil--</option>
              <?php foreach($jenis as $j) { ?>
                <option value="<?php echo $j['id_jenis'] ?>"><?php echo $j['nama_jenis'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="merk_mobil">Subjenis Mobil 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select required="required" class="form-control col-md-7 col-xs-12" name="subjenis" id="subjenis">
              <option>--Pilih Subjenis Mobil--</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gambar">Gambar 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="file" id="gambar" name="gambar" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="warna">Warna Mobil 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="warna" name="warna" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_polisi">Nomor Polisi 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="no_polisi" name="no_polisi" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_pembuatan">Tahun Pembuatan 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="tahun_pembuatan" name="tahun_pembuatan" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kuota_mobil">Kuota Mobil 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="kuota_mobil" name="kuota_mobil" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga_sewa">Harga Sewa 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="harga_sewa" name="harga_sewa" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="merk_mobil">Deskripsi 
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea required="required" class="form-control col-md-7 col-xs-12" name="deskripsi" id="deskripsi"></textarea>
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
<script type="text/javascript">
    $(document).ready(function() {

        $('select[name="jenis"]').on('change', function() {
            var jenisID = $(this).val();
            if(jenisID) {
                $.ajax({
                    url: '<?php echo base_url() ?>Mobil/subjenisAjax/'+jenisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="subjenis"]').empty();
                        $('select[name="subjenis"]').append('<option>--Pilih Jenis Mobil--</option>');
                        $.each(data, function(key, value) {
                            $('select[name="subjenis"]').append('<option value="'+ value.id_subjenis +'">'+ value.nama_subjenis +'</option>');
                            console.log(value.id_subjenis);
                        });
                    }
                });
            }else{
                $('select[name="subjenis"]').empty();
            }
        });
    });
</script>