 <?php $this->load->view('template/meta');?>
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dosen</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="http://localhost/app_voting/Auth_admin/beranda">Beranda</a></li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Dosen</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
        <table class="table">
        <tr><td>NIP/NIDN</td><td><?php echo $nipd; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Gelar</td><td><?php echo $gelar; ?></td></tr>
	    <tr><td>Keahlian</td><td><?php echo $keahlian; ?></td></tr>
	    <tr><td>Prodi</td><td><?php echo $nama_prodi; ?></td></tr>
	    <tr><td>Fakultas</td><td><?php echo $nama_fakultas; ?></td></tr>
      <?php if($role == 1){ ?>
        <tr><td>Role</td><td>Admin</td></tr>
      <?php }else{ ?>
        <tr><td>Role</td><td>Dosen</td></tr>
      <?php } ?>
	    <tr><td></td><td><a href="<?php echo site_url('dosen') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div>
            
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

            <?php $this->load->view('template/footer');?>