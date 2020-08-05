 <?php $this->load->view('template/meta');?>
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dosen</h1>
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
                        <h3 class="card-title">Dosen</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('dosen/create'),'Tambah', 'class="btn bg-cyan"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <!-- <div class="col-md-3 text-right">
                <form action="<?php echo site_url('dosen/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dosen'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn bg-cyan" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div> -->
        </div>
        <table id="example1" class="table table-bordered" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th>NIP/NIDN</th>
		<th>Nama</th>
		<th>Tanggal Lahir</th>
		<th>Jabatan</th>
		<th>Gelar</th>
		<th>Keahlian</th>
		<th>Prodi</th>
		<th>Fakultas</th>
		<th>Role</th>
		<th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=1;
            foreach ($dosen_data as $dosen)
            {
                ?>
                
                
                <tr>
			<td width="80px"><?php echo $dosen->nipd ?></td>
			<td><?php echo $dosen->nama ?></td>
			<td><?php echo $dosen->tanggal_lahir ?></td>
			<td><?php echo $dosen->jabatan ?></td>
			<td><?php echo $dosen->gelar ?></td>
			<td><?php echo $dosen->keahlian ?></td>
			<td><?php echo $dosen->nama_prodi ?></td>
			<td><?php echo $dosen->nama_fakultas ?></td>
      <?php if($dosen->role == 1){ ?>
			  <td><span class="badge bg-maroon">Admin</span></td>
      <?php }else{ ?>
        <td><span class="badge bg-teal">Dosen</span></td>
      <?php } ?>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dosen/read/'.$dosen->nipd),'<i class="nav-icon fas fa-eye"></i>'); 
				echo ' | '; 
				echo anchor(site_url('dosen/update/'.$dosen->nipd),'<i class="nav-icon fas fa-edit"></i>'); 
				echo ' | '; 
				echo anchor(site_url('dosen/delete/'.$dosen->nipd),'<i class="nav-icon fas fa-trash"></i>','onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row">
        <!-- <object data="croflash.swf" type="application/x-shockwave-flash" width="600" height="400">
                  <param name="data" value="croflash.swf">
                  <param name="src" value="croflash.swf">
                  <embed type="application/x-shockwave-flash" src="croflash.swf" width="300" height="300">
                </object> -->
           
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