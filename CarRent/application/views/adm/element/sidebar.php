<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url() ?>Dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a href="<?php echo base_url() ?>Mobil"><i class="fa fa-home"></i> Daftar Mobil </a></li>
                  <li><a href="<?php echo base_url() ?>Pelanggan"><i class="fa fa-home"></i> Daftar Pelanggan </a></li>
                  <li><a href="<?php echo base_url() ?>Jenis"><i class="fa fa-home"></i> Daftar Jenis Mobil </a></li>
                  <li><a><i class="fa fa-home"></i> Daftar Transaksi </a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>Transaction/penyewaan">Transaksi Penyewaan</a></li>
                      <li><a href="<?php echo base_url() ?>Transaction/pengembalian">Transaksi Pengembalian</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url() ?>Transaction/settingKeterangan"><i class="fa fa-home"></i>Setting Keterangan Transaksi</a></li>
                  <li><a href="<?php echo base_url() ?>Transaction/kembalikanMobil"><i class="fa fa-home"></i> Pengembalian Mobil </a></li>
                  <li><a href="<?php echo base_url() ?>Pelanggan/akunBlacklist/blacklist"><i class="fa fa-home"></i> Akun Blacklist </a></li>
                  <li><a href="<?php echo base_url() ?>Dashboard/settingAdmin/<?php echo $this->session->userdata('id_admin') ?>"><i class="fa fa-home"></i> Setting Akun Admin </a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->