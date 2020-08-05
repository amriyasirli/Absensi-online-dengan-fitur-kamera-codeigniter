<?php $tahun_ajaran = $this->db->get('tahun_ajaran')->result_array(); 

  
  foreach ($tahun_ajaran as $row) :
?>
<?php endforeach; ?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-cyan">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?= base_url('assets/AdminLTE/')?>#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php if($this->session->userdata('role') == 1) { ?>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#panduan">Tahun Ajaran</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#reset">Reset</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
      <span class="nav-link">Tahun Ajaran : <?= $row['tahun'] ?></span>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="nav-link">Semester : <?= $row['semester'] ?></span>
      </li>
      <?php }else{ ?>
      <li class="nav-item d-none d-sm-inline-block">
      <span class="nav-link">Tahun Ajaran : <?= $row['tahun'] ?></span>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="nav-link">Semester : <?= $row['semester'] ?></span>
      </li>
      <?php } ?>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="<?= base_url('assets/AdminLTE/')?>#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?= base_url('assets/AdminLTE/')?>#" class="dropdown-item">
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('assets/AdminLTE/')?>#" class="dropdown-item">
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('assets/AdminLTE/')?>#" class="dropdown-item">
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('assets/AdminLTE/')?>#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="<?= base_url('assets/AdminLTE/')?>#">
          <i class="far fa-user"></i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?= base_url('Auth/logout') ?>"><span class="dropdown-item dropdown-header"><i class="fas fa-lock"></i> Logout</span></a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Logout Modal-->
<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <span>Mereset ulang akan menghapus semua data absensi !</span>
          <p>Anda Yakin Reset Ulang ?</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('Absen/reset')?>">Okay</a>
        </div>
      </div>
    </div>
  </div>