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
              
              
                <div class="col-md-3">
                  
                
                  <!-- Date and time range -->
                  <form method="get" action="">
                    <label>Filter Berdasarkan</label>
                    <select name="filter" id="filter" class="custom-select">
                        <option value="">Pilih</option>
                        <option value="1">Per Tanggal</option>
                        <option value="2">Per Bulan</option>
                        <option value="3">Per Tahun</option>
                    </select>
                </div>
                    
                <div class="col-md-3">

                    <div id="form-tanggal">
                        <label>Tanggal</label><br>
                        <input type="text" name="tanggal" class="input-tanggal" />
                        
                    </div>

                    <div id="form-bulan">
                      <label>Bulan</label>
                        <select name="bulan" class="custom-select">
                            <option value="">Pilih</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        
                    </div>
                  </div>
                  <div class="col-md-3">

                    <div id="form-tahun">
                        <label>Tahun</label><br>
                        <select name="tahun" class="custom-select">
                            <option value="">Pilih</option>
                            <?php
                            foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                            }
                            ?>
                        </select>
                        
                    </div>
                  </div>
                </div>
                <div class="col-md-5 text-left">
                    <button type="submit" class="btn btn-sm bg-cyan mt-4"><i class="fa fa-check"></i> TAMPILKAN</button>
                    <a href="<?php echo base_url('Laporan'); ?>" class="btn btn-sm bg-maroon mt-4" class="text-danger"><i class="fa fa-ban"></i> Reset Filter</a>
                    <?php if(($ket == "")){ ?>
                    <a href="<?php echo $url_cetak; ?>" class="btn btn-sm bg-teal disabled mt-4"><i class="fa fa-file-pdf" target="_blank"></i> CETAK PDF</a>
                    <?php }else{ ?>
                      <a href="<?php echo $url_cetak; ?>" class="btn btn-sm bg-teal mt-4"><i class="fa fa-file-pdf" target="_blank"></i> CETAK PDF</a>
                    <?php } ?>
                  </div>
                </form>



                <!-- <a href="" id="" class="btn bg-teal mb-3" role="button"><i class="fa fa-plus"></i> Tambah</a> -->
                <br>
                  <h4 class="text-primary"><?php echo $ket; ?></h4>
                  <br>
                  <div class="table- table-responsive mt-1">
                  <table id="example1" class="table table-bordered" style="margin-bottom: 10px">
                    <thead>
                    <tr>
                        <th>NIDN</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if( ! empty($absen)){
                      $no = 1;
                      foreach($absen as $data){
                        $tgl = date('d-m-Y', strtotime($data->tanggal));
                        
                        echo "<tr>";
                        echo "<td>".$data->nipd."</td>";
                        echo "<td>".$data->nama."</td>";
                        echo "<td>".$tgl."</td>";
                        echo "<td>".$data->jam_masuk."</td>";
                        echo "<td>".$data->jam_keluar."</td>";
                        echo "<td>".$data->keterangan."</td>";
                        echo "</tr>";
                        $no++;
                      }
                    }
                    ?>
                    </tbody>
                    </table>
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



            <!-- Modal Panduan
<div class="modal fade" id="panduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Petunjuk Pemilihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
          <li>Pilih salah satu tema pemilihan dengan mengklik tombol buka.</li>
          <li>Setelah anda mengklik tombol buka maka akan masuk kehalaman pemilihan calon yang menampilkan foto dan nama calon.</li>
          <li>Klik salah satu foto calon untuk melakukan pemilihan dan anda kembali dibawa kehalaman tema pemilihan.</li>
          <li>Apabila anda sudah menyelesaikan pemilihan maka akan muncul tombol selesai</li>
          <li>Klik tombol selesai jika anda telah selesai memilih</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
<!-- Modal Panduan -->
<div class="modal fade" id="panduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Tahun Ajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Tahun_ajaran/create') ?>" method="post">
          <div class="form-group">
            <label for="">Tahun Ajaran</label>
            <input type="text"
              class="form-control" name="tahun" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Format : 2020/2021</small>
          </div>
          <div class="form-group">
            <label for="">Semester</label>
            <select class="form-control" name="semester" id="">
              <option>- Pilih -</option>
              <option value="Ganjil">Ganjil</option>
              <option value="Genap">Genap</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn bg-cyan">Simpan</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah Anda Yakin Ingin Keluar ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('AdminLogin/logout')?>">Okay</a>
        </div>
      </div>
    </div>
  </div>
<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">ABSENSI DOSEN </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-xs-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('assets/')?>jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/AdminLTE/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/AdminLTE/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/AdminLTE/')?>dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url('assets/AdminLTE/')?>dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('assets/AdminLTE/')?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/')?>chartjs/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<!-- Select2 -->
<script src="<?= base_url('assets/AdminLTE/')?>plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets/AdminLTE/')?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- WYSWYG -->


<script src="<?= base_url('assets/') ?>sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>



<script src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/dataTables/jquery.dataTables.min.js"></script>  
<script src="<?php echo base_url();?>assets/dataTables/dataTables.bootstrap4.min.js"></script>          
<script src="<?php echo base_url();?>assets/summernote/summernote.js"></script>
<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> 
<script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
        
        
    })
    </script>
    </body>
    </html>
  
