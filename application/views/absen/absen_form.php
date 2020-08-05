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
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Fakultas <?php echo form_error('id_fakultas') ?></label>
            <input type="text" class="form-control" name="id_fakultas" id="id_fakultas" placeholder="Id Fakultas" value="<?php echo $id_fakultas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Prodi <?php echo form_error('id_prodi') ?></label>
            <input type="text" class="form-control" name="id_prodi" id="id_prodi" placeholder="Id Prodi" value="<?php echo $id_prodi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nipd <?php echo form_error('nipd') ?></label>
            <input type="text" class="form-control" name="nipd" id="nipd" placeholder="Nipd" value="<?php echo $nipd; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jam Masuk <?php echo form_error('jam_masuk') ?></label>
            <input type="text" class="form-control" name="jam_masuk" id="jam_masuk" placeholder="Jam Masuk" value="<?php echo $jam_masuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jam Keluar <?php echo form_error('jam_keluar') ?></label>
            <input type="text" class="form-control" name="jam_keluar" id="jam_keluar" placeholder="Jam Keluar" value="<?php echo $jam_keluar; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <input type="hidden" name="id_absen" value="<?php echo $id_absen; ?>" /> 
	    <button type="submit" class="btn bg-cyan"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('absen') ?>" class="btn btn-default">Cancel</a>
	</form>
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