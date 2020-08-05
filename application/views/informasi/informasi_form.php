 <?php $this->load->view('template/meta');?>
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Informasi</h1>
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
                        <h3 class="card-title">Informasi</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                      <?php $nama = $this->session->userdata('nama')  ?>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="informasi"> <?php echo form_error('informasi') ?></label>
            <textarea class="form-control" rows="5" name="informasi" id="informasi" placeholder="Tulis Informasi"><?php echo $informasi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar"> <?php echo form_error('nama') ?></label>
<input type="hidden" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>" />
        </div>
	    <input type="hidden" name="id_informasi" value="<?php echo $id_informasi; ?>" /> 
	    <button type="submit" class="btn bg-cyan"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('informasi') ?>" class="btn btn-default">Cancel</a>
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