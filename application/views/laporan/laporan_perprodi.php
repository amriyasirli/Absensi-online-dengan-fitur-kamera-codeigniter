<?php $this->load->view('template/meta');?>
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>

      

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              <?= $title ?> 
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Beranda') ?>">Beranda</a></li>
              <!-- <li class="breadcrumb-item active"><?= $title ?></li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-teal card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-file-pdf"></i>
                  Laporan Absensi Dosen
                </h3>
            </div>
            <div class="card-body">
              <div class="row">
              <!-- Date and time range -->
              
              

                  

                <!-- <a href="" id="" class="btn bg-teal mb-3" role="button"><i class="fa fa-plus"></i> Tambah</a> -->
                <?php
                $no = 0;
                  $warna = ['teal', 'maroon', 'gray', 'info', 'success', 'warning', 'danger'];
                  foreach ($prodi as $row) :
                // if($row->id_kelas == 1){}else{
                ?>  
                
                <div class="col-md-3">
                    <a href="<?= base_url('Laporan/perprodi/' . $row->id_prodi) ?>" target="_blank">
                    <div class="info-box bg-<?= $warna[$no++] ?>">
                      <span class="info-box-icon"><i class="far fa-file-pdf"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text"><?= $row->nama_prodi; ?></span>
                        <span class="info-box-number"><?= $this->db->get_where('dosen', ['id_prodi' =>$row->id_prodi])->num_rows(); ?> Dosen</span>
                      </div>
                      <!-- /.info-box-content -->
                      
                    </div>
                    
                    
                    <!-- /.info-box -->
                </a>
                  </div>
                  <?php  endforeach; ?>
                  </div>
                  

              </div>

              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->



            <?php $this->load->view('template/footer');?>
  
