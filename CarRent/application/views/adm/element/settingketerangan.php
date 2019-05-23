<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="color: white">Setting Keterangan</h3>
              </div>
            </div>

            <div class="clearfix" style="padding-bottom: 20px"></div>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() ?>Transaction/settingKeterangan" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <?php echo $this->ckeditor->editor("keterangan", $keterangan[0]['keterangan']); ?>
                  <!-- <textarea id="keterangan" name="keterangan" required="required" class="form-control col-md-7 col-xs-12"><?php echo $keterangan[0]['keterangan'] ?></textarea> -->
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input type="submit" class="btn btn-primary pull-left" name="submit" value="Update">
                </div>
              </div>
            </form>
            <div class="clearfix" style="padding-bottom: 20px"></div>
</div>