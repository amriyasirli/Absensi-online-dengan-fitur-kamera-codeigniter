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
				<h1>Ambil Absen Pulang</h1>
				<hr>
                <div class="table-responsive">
                    <form action="<?= base_url('Kamera/pulang') ?>" method="post">
                        <div class="form-group">
                            <!-- <label for="">NIPD</label> -->
                            <input type="hidden" class="form-control" value="<?= $this->session->userdata('nipd') ?>" name="nipd" id="nipd" required>
                        </div>
                        <!-- <div class="form-group"> -->
                            <!-- <label for="">Email</label> -->
                            <!-- <input type="hidden" class="form-control" value="<?= $this->session->userdata('id_prodi') ?>" name="id_prodi" id="id_prodi" required> -->
                        <!-- </div> -->
                        <!-- <div class="form-group"> -->
                            <!-- <label for="">Password</label> -->
                            <!-- <input type="hidden" class="form-control" value="<?= $this->session->userdata('id_fakultas') ?>" name="id_fakultas" id="id_fakultas" required autocomplete="off"> -->
                        <!-- </div> -->
                        <!-- <div id="my_camera"> -->
                        <!-- </div> -->
                        <br>
                        <!-- <hr> -->
                        <button type="submit" class="btn btn-info btn-block">Submit</button>
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
  <!-- /.content-wrapper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script type="text/javascript">
		$('#register').on('submit', function (event) {
			event.preventDefault();
			var image = '';
			var nipd = $('#nipd').val();
			var id_prodi = $('#id_prodi').val();
			var id_fakultas = $('#id_fakultas').val();
			Webcam.snap( function(data_uri) {
				image = data_uri;
			});
			$.ajax({
				url: '<?php echo site_url("Kamera/pulang");?>',
				type: 'POST',
				dataType: 'json',
				data: {nipd: nipd},
			})
			.done(function(data) {
				if (data > 0) {
					alert('Absen Pulang Sukses Di ambil');
					$('#register')[0].reset();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
			
		});
	</script>

            <?php $this->load->view('template/footer');?>