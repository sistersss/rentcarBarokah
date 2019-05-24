<style>
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #3B3C3C;;
}

/* Style the buttons inside the tab */
.tab button {
    color: white;
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
    color: black;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
    color: black;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="color: white">Daftar Pelanggan Blacklist</h3>
              </div>
            </div>

            <div class="clearfix" style="padding-bottom: 20px"></div>
            <div class="col-md-12">
              <input type="text" name="" id="search" class="form-control" style="border-radius: 20px">
            </div>
            <div class="clearfix" style="padding-bottom: 20px"></div>
            <div class="tab">
              <button type="button" class="tablinks <?php if($this->uri->segment(3) != ''){if($this->uri->segment(3)=='blacklist'){echo 'active'; }}else{ echo 'active';} ?>" onclick="openCity(event, 'Blacklist')">Blacklist</button>
              <button type="button" class="tablinks <?php if($this->uri->segment(3) != ''){if($this->uri->segment(3)=='pelanggan'){echo 'active'; }}else{ echo 'active';} ?>" onclick="openCity(event, 'Pelanggan')">Pelanggan</button>
            </div>

            <div id="Blacklist" class="tabcontent" style="display: <?php if($this->uri->segment(3) != ''){if($this->uri->segment(3)=='blacklist'){echo 'block'; }}else{ echo 'block';} ?>">
            <table id="datatable" class="table table-bordered-bottom" style="color: white;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pelanggan</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>Nomor Telepon</th>
                          <th>Username</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($blacklist as $e) { ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $e['nama_pelanggan'] ?></td>
                          <td><?php echo $e['alamat']; ?></td>
                          <td><?php echo $e['email'] ?></td>
                          <td><?php echo $e['no_telp'] ?></td>
                          <td><?php echo $e['username'] ?></td>
                          <td>
                            <center>
                            <a href="<?php echo base_url() ?>Pelanggan/lepasBlacklist/<?php echo $e['id_pelanggan'] ?>"><button class="btn btn-primary">Lepas Blacklist</button></a>
                            </center>
                          </td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
            </div>
            <div id="Pelanggan" class="tabcontent" style="display: <?php if($this->uri->segment(3) != ''){if($this->uri->segment(3)=='pelanggan'){echo 'block'; }}else{ echo 'block';} ?>">
              <table id="datatable" class="table table-bordered-bottom" style="color: white;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pelanggan</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>Nomor Telepon</th>
                          <th>Username</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($pelanggan as $e) { ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $e['nama_pelanggan'] ?></td>
                          <td><?php echo $e['alamat']; ?></td>
                          <td><?php echo $e['email'] ?></td>
                          <td><?php echo $e['no_telp'] ?></td>
                          <td><?php echo $e['username'] ?></td>
                          <td>
                            <center>
                            <a href="<?php echo base_url() ?>Pelanggan/blacklist/<?php echo $e['id_pelanggan'] ?>"><button class="btn btn-danger">Blacklist</button></a>
                            </center>
                          </td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
            </div>
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
<script>
    function openCity(evt, command) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(command).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>