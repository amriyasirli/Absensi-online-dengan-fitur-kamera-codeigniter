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
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">NIP/NIDN</label>
            <input type="text" class="form-control" name="id" id="id" placeholder="Masukkan NIP/NIDN" value="<?php echo $nipd; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Gelar <?php echo form_error('gelar') ?></label>
            <input type="text" class="form-control" name="gelar" id="gelar" placeholder="Gelar" value="<?php echo $gelar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keahlian <?php echo form_error('keahlian') ?></label>
            <input type="text" class="form-control" name="keahlian" id="keahlian" placeholder="Keahlian" value="<?php echo $keahlian; ?>" />
        </div>
        <div class="form-group">
          <label for="">Prodi</label>
          <select class="form-control" name="prodi" id="">
            <option value="<?php echo $id_prodi; ?>"><?php echo $nama_prodi; ?></option>
            <?php
              
              foreach ($prodi as $row) :
            ?>
            <option value="<?= $row->id_prodi; ?>"><?= $row->nama_prodi; ?></option>
              <?php endforeach; ?>
          </select>
        </div>
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
          <label for="">Role<?php echo form_error('role') ?></label>
          <select class="form-control" name="role" id="role">
            <option value="<?php echo $role; ?>">- Pilih -</option>
            <option value="1">Admin</option>
            <option value="2">Dosen</option>
          </select>
        </div>
	    <!-- <div class="form-group">
            <label for="int">Role </label>
            <input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $role; ?>" />
        </div> -->
	    <input type="hidden" name="nipd" value="<?php echo $nipd; ?>" /> 
	    <button type="submit" class="btn bg-cyan"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dosen') ?>" class="btn btn-default">Cancel</a>
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