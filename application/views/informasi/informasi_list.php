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
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            <?php if($this->session->userdata('role') == 1): ?>
                <?php echo anchor(site_url('informasi/create'),'Tambah', 'class="btn bg-cyan"'); ?>
            <?php endif; ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right mb-3">
                <form action="<?php echo site_url('informasi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('informasi'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn bg-cyan" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
	    </div>
            <div class="col-md-6 text-right">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="row">
          <div class="col-md-12">
            <!-- Box Comment -->
            <div class="card card-widget">
              
              <!-- /.card-body -->
              <div class="card-footer card-comments">
              <?php
            foreach ($informasi_data as $informasi)
            {
                ?>
                <a href="<?= base_url('Informasi/read/'. $informasi->id_informasi) ?>">
                <div class="card-comment mb-3">
                  <!-- User image -->
                  <!-- <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image"> -->
                  <div class="comment-text">
                    <span class="username">
                    <?php echo $informasi->nama ?>
                      <span class="text-muted float-right"><?php echo $informasi->tanggal ?></span>
                    </span><!-- /.username -->
                    <?php echo $informasi->informasi ?>
                  </div>
                  
                  <!-- /.comment-text -->
                </div>
                </a>
                <!-- /.card-comment -->
                <?php
            }
            ?>
                <!-- /.card-comment -->
              </div>
              <!-- /.card-footer -->
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card -->
</div>

    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->

            <?php $this->load->view('template/footer');?>