 <?php $this->load->view('template/meta');?>
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Absen</h1>
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
                        <h3 class="card-title">Absen</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
        <table class="table">
	    <tr><td>Id Fakultas</td><td><?php echo $id_fakultas; ?></td></tr>
	    <tr><td>Id Prodi</td><td><?php echo $id_prodi; ?></td></tr>
	    <tr><td>NIP/NIDN</td><td><?php echo $nipd; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Jam Masuk</td><td><?php echo $jam_masuk; ?></td></tr>
	    <tr><td>Jam Keluar</td><td><?php echo $jam_keluar; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('absen') ?>" class="btn btn-default">Cancel</a></td></tr>
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