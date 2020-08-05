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
                      <!-- <div class="card-header"> -->
                        <!-- <h3 class="card-title">Absensi</h3> -->
                      <!-- </div> -->
                      <!-- /.card-header -->
                      <div class="card-body">
                      <div class="row">
			<div class="col-md-6">
				<h1>Ambil Absen</h1>
				<hr>
                <div class="table-responsive">
                    <form id="register">
                        <div class="form-group">
                            <!-- <label for="">NIPD</label> -->
                            <input type="hidden" class="form-control" value="<?= $this->session->userdata('nipd') ?>" name="nipd" id="nipd" required>
                        </div>
                        <div class="form-group">
                            <!-- <label for="">Email</label> -->
                            <input type="hidden" class="form-control" value="<?= $this->session->userdata('id_prodi') ?>" name="id_prodi" id="id_prodi" required>
                        </div>
                        <div class="form-group">
                            <!-- <label for="">Password</label> -->
                            <input type="hidden" class="form-control" value="<?= $this->session->userdata('id_fakultas') ?>" name="id_fakultas" id="id_fakultas" required autocomplete="off">
                        </div>
                        <div id="my_camera">
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                          <div class="col-md-6">
                            
                        <button type="submit" class="btn bg-teal mb-3">Ambil Absen</button>
                          </div>
                          <div class="col-md-6">
                            
                        <button type="button" class="btn bg-cyan" data-toggle="modal" data-target="#exampleModal">
                          Keterangan Lain (Sakit/Izin)
                        </button>
                          </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
   </div>
            
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keterangan Tidak Bisa Hadir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Absen/keterangan') ?>" method="post">
          <div class="form-group">
            <Textarea type="text"
              class="form-control" name="keterangan" id="" aria-describedby="helpId" placeholder="Tuliskan keterangan lain jika berhalangan hadir"></textarea>
            <small id="helpId" class="form-text text-danger">*) Jika berhalangan hadir</small>
          </div>
          <div class="form-group">
                <!-- <label for="">NIPD</label> -->
                <input type="hidden" class="form-control" value="<?= $this->session->userdata('nipd') ?>" name="nipd" id="nipd" required>
            </div>
            <div class="form-group">
                <!-- <label for="">Email</label> -->
                <input type="hidden" class="form-control" value="<?= $this->session->userdata('nama') ?>" name="nama" id="nama" required>
            </div>
            <div class="form-group">
                <!-- <label for="">Email</label> -->
                <input type="hidden" class="form-control" value="<?= $this->session->userdata('id_prodi') ?>" name="id_prodi" id="id_prodi" required>
            </div>
            <div class="form-group">
                <!-- <label for="">Password</label> -->
                <input type="hidden" class="form-control" value="<?= $this->session->userdata('id_fakultas') ?>" name="id_fakultas" id="id_fakultas" required autocomplete="off">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- /.content-wrapper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script type="text/javascript">

      function loadData() {
        $("#load").load("<?php echo base_url('Welcome') ?>");
      }

		$('#register').on('submit', function (event) {
			event.preventDefault();
			var image = '';
			var nipd = $('#nipd').val();
      var nama = $('#nama').val();
			var id_prodi = $('#id_prodi').val();
			var id_fakultas = $('#id_fakultas').val();
			Webcam.snap( function(data_uri) {
				image = data_uri;
			});
			$.ajax({
				url: '<?php echo site_url("Kamera/save");?>',
				type: 'POST',
				dataType: 'json',
				data: {nipd: nipd, nama: nama, id_prodi: id_prodi, id_fakultas: id_fakultas, image:image},
			})
			.done(function(data) {
				if (data > 0) {
					alert('Terima Kasih, Anda Sudah Berhasil Mengambil Absen !');
          loadData();
					$('#register')[0].reset();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
        loadData();
			});
			
			
		});
	</script>

            <?php $this->load->view('template/footer');?>