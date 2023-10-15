
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-md-12"> -->
            <!-- DONUT CHART -->
            <!-- <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                <p><strong>Sedang dalam pengembangan ...</strong></p>
              </div>
            </div> -->
            <!-- /.card -->

          <!-- </div> -->
          <!-- /.col (LEFT) -->
          <div class="col-md-12">

            <!-- BAR CHART -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
              </div>
              <div class="card-body">
                 <!--validation_errors('<div class="bg-danger">', '</div>');-->
                  
                <form action="" method="post" class="ubah_profil" id="ubah_profil" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" value="<?= $this->session->userdata('email'); ?>" readonly=true>
                        <?= form_error('email', '<div = "text-danger pl-3">', '</div>'); ?>
                    </div>
                     <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= $pengunjung['nama']; ?>">
                        <?= form_error('nama', '<div = "text-danger pl-3">', '</div>'); ?>
                    </div>
                     <div class="form-group">
                        <label>No. Telp</label>
                        <input type="number" name="no_telp" class="form-control" value="<?= $pengunjung['no_telp']; ?>">
                        <?= form_error('no_telp', '<div = "text-danger pl-3">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Foto Profil</label>
                        <div class="form-group">
                          <img style="width: 300px; max-width:100%;" src="<?php echo (!empty($pengunjung['gambar_pengunjung'])) ?  base_url($pengunjung['gambar_pengunjung'])  :  base_url() . "assets/img/no_image.jpg" ?>" id="edit_preview_profil">
                          <!-- <p class="text-danger">Disarankan ukuran 700px x 700px</p> -->
                          <p>
                            <div class="custom-file">
                              <input name="update_profil" type="hidden" id="update_profil" value="">
                              <input name="gambar_pengunjung" type="file" class="form-control" id="edit_profil" accept="image/png, image/jpeg, image/jpg">
                            </div>
                          </p>
                        </div>
                      </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" onsubmit="submit_form('#ubah_profil')">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
<!-- jQuery -->
<script src="<?= base_url() ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <script>
      // preview image before upload
    function readURL(input, display) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $(display).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
    $("#edit_profil").change(function() {
      $("#update_profil").val(1);
      readURL(this, "#edit_preview_profil");
    });
  </script>