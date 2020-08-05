 <?php $this->load->view('template/meta');?>
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Fakultas</h1>
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
                        <h3 class="card-title">Fakultas</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Fakultas <?php echo form_error('nama_fakultas') ?></label>
            <input type="text" class="form-control" name="nama_fakultas" id="nama_fakultas" placeholder="Nama Fakultas" value="<?php echo $nama_fakultas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Dekan <?php echo form_error('dekan') ?></label>
            <input type="text" class="form-control" name="dekan" id="dekan" placeholder="Dekan" value="<?php echo $dekan; ?>" />
        </div>
	    <input type="hidden" name="id_fakultas" value="<?php echo $id_fakultas; ?>" /> 
	    <button type="submit" class="btn bg-cyan"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('fakultas') ?>" class="btn btn-default">Cancel</a>
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