<?php foreach($admin as $a) { ?>
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="color: white">Setting Akun Admin</h3>
              </div>
            </div>

            <div class="clearfix" style="padding-bottom: 20px"></div>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() ?>Dashboard/settingAdmin/<?php echo $a['id_admin'] ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_admin">Nama Admin 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nama_admin" name="nama_admin" value="<?php echo $a['nama_admin'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="username" name="username" value="<?php echo $a['username'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="retype">Retype-Password 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" id="retype" name="retype" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="submit" class="btn btn-primary pull-right" name="submit" value="Update">
                </div>
              </div>
            </form>
            <div class="clearfix" style="padding-bottom: 20px"></div>
</div>
<?php } ?>