<!-- View Diterima -->

<!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="row">
	<div class="col-12">
		<div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo $subtitle ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>NoHP</th>
                <th>Fomulir</th>
                <th>CV</th>
                <th>KRS</th>
                <th>Control</th>
              </tr>
              </thead>
              <tbody>
	              <?php foreach ($oprek as $key => $val): ?>
	  	              	<tr>
	  		              <td><?php echo $key+1 ?></td>
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"><?php echo $val['nim'] ?></td>
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"><?php echo $val['nama'] ?></td>
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"><?php echo $val['email'] ?></td>
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"><?php echo $val['kelas'] ?></td> 
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"><?php echo $val['noHp'] ?></td> 
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"><a class=" btn btn-outline-secondary" href="<?= base_url()?>admin/oprek/myPdfPage/<?= $val['formulir_pen'] ?> " target="_blank"> <i class="fas fa-clipboard-list"></i> Formulir </a></td> 
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"> <a class="btn btn-outline-success" href="<?= base_url()?>admin/oprek/myPdfPage/<?= $val['cv'] ?> " target="_blank"> <i class="fas fa-clipboard-check"></i> CV </a></td>
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"> <a class="btn btn-outline-warning" href="<?= base_url()?>admin/oprek/myPdfPage/<?= $val['krs'] ?> " target="_blank"><i class="fas fa-clipboard"></i> KRS </a></td>
	  		          
                     
	  		              <td>
	  		              	<div class="btn-group">
  		                      <!--<button onclick="terima('<?= $val['id_oprek'] ?>','<?= $val['nama'] ?>')" type="button" class="btn btn-info"  title="Terima"><i class="fas fa-user-check"></i></button>-->
  		                      <button onclick="tolak('<?= $val['id_oprek'] ?>','<?= $val['nama'] ?>')" type="button" class="btn btn-danger" title="Tolak"><i class="fas fa-user-alt-slash"></i></button>
  		                    </div>
	  		              </td>
	  		            </tr>
	              <?php endforeach ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Email</th>
                <th>Fomulir</th>
                <th>CV</th>
                <th>KRS</th>
                <th>Control</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
	</div>
</div>

<!--<div class="col-12 text-right">-->
<!--	<button  type="button" class="btn btn-lg btn-info rounded-circle" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"></i></button>-->
<!--</div>-->


<div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Profil Anggota</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		<!-- form start -->
      		<form action="<?php echo base_url() ?>admin/anggota/edit" method="post" role="form" id="editForm" novalidate="novalidate" enctype="multipart/form-data">

      		  <div class="form-group">
      		  	<input type="hidden" name="nim" id="edit_nim">
      		    <label for="edit_nama">Nama</label>
      		    <input type="text" name="nama" class="form-control" id="edit_nama" placeholder="Nama jabatan ...">
      		  </div>
            <div class="form-group">
              <label for="edit_email">Email</label>
              <input type="text" name="email" class="form-control" id="edit_email" placeholder="Email ...">
            </div>
            <div class="form-group">
              <label for="edit_kelas">Kelas</label>
              <input type="text" name="kelas" class="form-control" id="edit_kelas" placeholder="Kelas ...">
            </div>
            <div class="form-group">
              <label for="edit_id_jabatan">Jabatan</label>
              <select class="form-control" name="id_jabatan" id="edit_id_jabatan">
                <?php foreach ($jabatan as $key => $val): ?>
                  <option id="<?php echo $val['id_jabatan'] ?>" value="<?php echo $val['id_jabatan'] ?>"><?php echo $val['nama_jabatan'] ?> (<?php echo $this->Model_divisi->id_to_divisi($val['id_divisi']) ?>)</option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label>Kontak (opsional)</label>
              <p><i>Pisahkan kontak dengan koma (,). Contoh <strong>Email: ormawa@gmail.com, Whatsapp: 08XXXXXXXX</strong></i>
              <textarea class="form-control" name="kontak" id="edit_kontak" rows="4" placeholder="Kontak ..."></textarea></p>

            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="7" placeholder="Deskripsi ..."></textarea>

            </div>
            <label>Image (opsional)</label>
            <div class="form-group">
              <img width="240" height="240" src="" id="edit_preview">
              <p class="text-danger">Disarankan ukuran 500px x 500px</p>
              <p>
                <div class="custom-file">
                  <input name="image" type="file" class="form-control" id="edit_image">
                </div>
              </p>
            </div>
      		  <!-- <div class="form-group mb-0">
      		    <div class="custom-control custom-checkbox">
      		      <input type="checkbox" name="a" class="custom-control-input required" id="a">
      		      <label class="custom-control-label" for="a">I agree to the <a href="#">terms of service</a>.</label>
      		    </div>
      		  </div> -->
      		  
      		</form>
      	</div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-primary" onclick="submit_form('#editForm')">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<!--<div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-dialog-centered modal-lg">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <h4 class="modal-title">Tambah Jabatan</h4>-->
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--          <span aria-hidden="true">×</span>-->
<!--        </button>-->
<!--      </div>-->
<!--      <div class="modal-body">-->
        
<!--      	<div class="container">-->
      		    <!-- form start -->
<!--              <form action="<?php echo base_url() ?>admin/anggota/add" method="post" role="form" id="addForm" novalidate="novalidate" enctype="multipart/form-data">-->

<!--                <div class="form-group">-->
<!--                  <label for="add_nama">NIM Mahasiswa</label>-->
<!--                  <input type="text" name="nim" class="form-control" id="add_nim" placeholder="Nomor Induk Mahasiswa ...">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                  <label for="add_nama">Nama</label>-->
<!--                  <input type="text" name="nama" class="form-control" id="add_nama" placeholder="Nama anggota ...">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                  <label for="add_email">Email</label>-->
<!--                  <input type="text" name="email" class="form-control" id="add_email" placeholder="Email ...">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                  <label for="add_kelas">Kelas</label>-->
<!--                  <input type="text" name="kelas" class="form-control" id="add_kelas" placeholder="Kelas ...">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                  <label for="add_id_jabatan">Jabatan</label>-->
<!--                  <select class="form-control" name="id_jabatan" id="add_id_jabatan">-->
<!--                      <option value="">::Pilih jabatan::</option>-->
<!--                    <?php foreach ($jabatan as $key => $val): ?>-->
<!--                      <option id="<?php echo $val['id_jabatan'] ?>" value="<?php echo $val['id_jabatan'] ?>"><?php echo $val['nama_jabatan'] ?> (<?php echo $this->Model_divisi->id_to_divisi($val['id_divisi']) ?>)</option>-->
<!--                    <?php endforeach ?>-->
<!--                  </select>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                  <label>Kontak (opsional)</label>-->
<!--                  <p><i>Pisahkan kontak dengan koma (,). Contoh <strong>Email: ormawa@gmail.com, Whatsapp: 08XXXXXXXX</strong></i>-->
<!--                  <textarea class="form-control" name="kontak" id="add_kontak" rows="4" placeholder="Kontak ..."></textarea></p>-->

<!--                </div>-->
<!--                <div class="form-group">-->
<!--                  <label>Deskripsi</label>-->
<!--                  <textarea class="form-control" name="deskripsi" id="add_deskripsi" rows="7" placeholder="Deskripsi ..."></textarea>-->

<!--                </div>-->
<!--                <label>Image (opsional)</label>-->
<!--                <div class="form-group">-->
<!--                  <img width="240" height="240" src="" id="add_preview">-->
<!--                  <p class="text-danger">Disarankan ukuran 500px x 500px</p>-->
<!--                  <p>-->
<!--                    <div class="custom-file">-->
<!--                      <input name="image" type="file" class="form-control" id="add_image">-->
<!--                    </div>-->
<!--                  </p>-->
<!--                </div>-->
                <!-- <div class="form-group mb-0">
<!--                  <div class="custom-control custom-checkbox">-->
<!--                    <input type="checkbox" name="a" class="custom-control-input required" id="a">-->
<!--                    <label class="custom-control-label" for="a">I agree to the <a href="#">terms of service</a>.</label>-->
<!--                  </div>-->
<!--                </div> -->-->
                
<!--              </form>-->
<!--      	</div>-->

<!--      </div>-->
<!--      <div class="modal-footer justify-content-between">-->
<!--        <button type="button" class="btn btn-primary" onclick="submit_form('#addForm')">Submit</button>-->
<!--        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>-->
<!--      </div>-->
<!--    </div>-->
    <!-- /.modal-content -->
<!--  </div>-->
  <!-- /.modal-dialog -->
<!--</div>-->