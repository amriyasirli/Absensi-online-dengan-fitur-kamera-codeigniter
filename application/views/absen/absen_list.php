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
                        <h3 class="card-title">Rekap Absen</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <!-- <?php echo anchor(site_url('absen/create'),'Tambah', 'class="btn bg-cyan"'); ?> -->
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <!-- <form action="<?php echo site_url('absen/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('absen'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn bg-cyan" type="submit">Search</button>
                        </span>
                    </div>
                </form> -->
            </div>
        </div>
        <table id="example1" class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th>No</th>
		<!-- <th>Id Fakultas</th>
		<th>Id Prodi</th> -->
		<th>NIP/NIDN</th>
    <th>Nama</th>
		<th>Tanggal</th>
		<th>Jam Masuk</th>
		<th>Jam Keluar</th>
    <th>Gambar</th>
		<th>Keterangan</th>
		<th class="text-center">Aksi</th>
            </tr><?php
            foreach ($absen as $absen)
            {
                ?>
                </thead>
                <tbody>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<!-- <td><?php echo $absen->id_fakultas ?></td>
			<td><?php echo $absen->id_prodi ?></td> -->
			<td><?php echo $absen->nipd ?></td>
      <td><?php echo $absen->nama ?></td>
			<td><?php echo $absen->tanggal ?></td>
			<td><?php echo $absen->jam_masuk ?></td>
			<td><?php echo $absen->jam_keluar ?></td>
      <td>
          <img src="<?= base_url('uploads/'. $absen->image) ?>" width="100" class="round">
			<td><?php echo $absen->keterangan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('absen/read/'.$absen->id_absen),'<i class="nav-icon fas fa-eye"></i>'); 
				echo ' | '; 
				echo anchor(site_url('absen/update/'.$absen->id_absen),'<i class="nav-icon fas fa-edit"></i>'); 
				echo ' | '; 
				echo anchor(site_url('absen/delete/'.$absen->id_absen),'<i class="nav-icon fas fa-trash"></i>','onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn bg-cyan">Total Record : <?php echo $total_rows ?></a> -->
	    </div>
            <div class="col-md-6 text-right">
                <!-- <?php echo $pagination ?> -->
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