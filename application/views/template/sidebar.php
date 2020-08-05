<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-cyan">
    <!-- Brand Logo -->
    <a href="<?= base_url('')?>" class="brand-link navbar-cyan">
      <img src="<?= base_url('assets/')?>img/logoiain.jpg" alt="Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>ABSENSI </strong>DOSEN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <strong><?= $this->session->userdata('nama') ?></strong>
          <p><?= $this->session->userdata('nipd') ?></p>
        </div>
        <div class="info">
          <a href="<?= base_url('assets/AdminLTE/')?>#" class="d-block"> 
          <?php 
          // if ($user['admin_nama'] == TRUE){
          //   echo $user['admin_nama'];
          // }
          // else {
          //   echo "offline";
          // }
            ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php 
               if($this->session->userdata('role') == 1) { ?>
                   <li class="nav-header">ADMINISTRATOR</li>
                <?php 
               }else{
                echo '<li class="nav-header">DOSEN</li>';

               }
                ?>
          
          <li class="nav-item">
          <a href="<?= base_url('Welcome')?>" <?= $this->uri->segment(1) == 'Welcome' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <?php if($this->session->userdata('role') == 2){ ?>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('Absen')?>" <?= $this->uri->segment(1) == 'Absen' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Absen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if($this->session->userdata('role') == 1){ ?>
              <li class="nav-item">
                <a href="<?= base_url('Absen') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap Absen</p>
                </a>
              </li>
              <?php }else{ ?>
              <li class="nav-item">
                <a href="<?= base_url('Absen/absen_masuk') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absen Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Absen/absen_pulang') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absen Keluar</p>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>
          <?php }else{ ?>
            <li class="nav-item">
          <a href="<?= base_url('Absen')?>" <?= $this->uri->segment(1) == 'Absen' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Rekap Absen
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url('Dosen')?>" <?= $this->uri->segment(1) == 'Dosen' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Dosen
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url('Fakultas')?>" <?= $this->uri->segment(1) == 'Fakultas' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-archway"></i>
              <p>
                Fakultas
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url('Prodi')?>" <?= $this->uri->segment(1) == 'Prodi' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-building"></i>
              <p>
                Prodi
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
          <a href="<?= base_url('Laporan')?>" <?= $this->uri->segment(1) == 'Laporan' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>
                Laporan
              </p>
              <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Laporan/laporan_perprodi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Per Prodi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Laporan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Filter Tanggal</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <li class="nav-item">
          <a href="<?= base_url('Informasi')?>" <?= $this->uri->segment(1) == 'Informasi' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-info"></i>
              <p>
                Informasi
              </p>
            </a>
          </li>
          <hr>
          <li class="nav-item">
          <a href="<?= base_url('Auth/logout')?>" onclick="javascript: return confirm('Are You Sure ?')" <?= $this->uri->segment(1) == 'Auth' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>