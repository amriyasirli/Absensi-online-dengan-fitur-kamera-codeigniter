 <?php $this->load->view('template/meta');?>
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Prodi</h1>
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
                        <h3 class="card-title">Prodi</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
          <label for="">Fakultas</label>
          <select class="form-control" name="fakultas" id="">
            <option value="<?php echo $id_fakultas; ?>"><?php echo $nama_fakultas; ?></option>
            <?php
              
              foreach ($fakultas as $row) :
            ?>
            <option value="<?= $row->id_fakultas; ?>"><?= $row->nama_fakultas; ?></option>
              <?php endforeach; ?>
          </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Prodi <?php echo form_error('nama_prodi') ?></label>
            <input type="text" class="form-control" name="nama_prodi" id="nama_prodi" placeholder="Nama Prodi" value="<?php echo $nama_prodi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kajur <?php echo form_error('kajur') ?></label>
            <input type="text" class="form-control" name="kajur" id="kajur" placeholder="Kajur" value="<?php echo $kajur; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">NIP/NIDN <?php echo form_error('nidn') ?></label>
            <input type="text" class="form-control" name="nidn" id="nidn" placeholder="Masukan NIP/NIDN" value="<?php echo $nidn; ?>" />
        </div>
	    <input type="hidden" name="id_prodi" value="<?php echo $id_prodi; ?>" /> 
	    <button type="submit" class="btn bg-cyan"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('prodi') ?>" class="btn btn-default">Cancel</a>
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