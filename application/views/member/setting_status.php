<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<?php //echo "<pre>"; var_dump( $valisi ); die(); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
          <div class="card-header" style="width: 100%;">
            <h3 class="card-title">Settingan Status Program kerja</h3> 
            <a href="" style="float:right"><i class="fas fa-cog fa-lg"></i></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No.</th>
                <th>Text</th>
                <th>Warna</th>
                <th>Hasil</th>
                <th>Control</th>
              </tr>
              </thead>
              <tbody>
	              <?php foreach ($main_data as $key => $val): ?>
	  	              <tr>
	  		              <td><?php echo $key+1 ?></td>
	  		              <td id="text-<?php echo $val['id_status'] ?>"><?php echo $val['text'] ?></td>
	  		              <td "><span id="warna-<?php echo $val['id_status'] ?>" class="badge badge-<?php echo strtolower($val['warna']) ?>"><?php echo $val['warna'] ?></span></td>
                          <td id="deskripsi-<?php echo $val['id_status'] ?>"><span class="badge badge-<?php echo strtolower($val['warna']) ?>"><?php echo $val['text'] ?></span></td>
	  		              <td>
	  		              	<div class="btn-group">
  		                      <button onclick="edit_prepare(<?php echo $val['id_status'] ?>)" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-pencil-alt"></i></button>
  		                      <button onclick="delete_row(<?php echo $val['id_status'] ?>)" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
  		                    </div>
	  		              </td>
	  		            </tr>
	              <?php endforeach ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Text</th>
                <th>Warna</th>
                <th>Hasil</th>
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

<div class="col-12 text-right">
	<button  type="button" class="btn btn-lg btn-info rounded-circle" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"></i></button>
</div>


<div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Status Proker</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		<!-- form start -->
      		<form action="<?php echo base_url() ?>admin/status/edit" method="post" role="form" id="editForm" novalidate="novalidate">

            <input type="hidden" name="id_status" id="edit_id_status">
      		  <div class="form-group">
      		    <label for="edit_text">Text</label>
      		    <input type="text" name="text" class="form-control" id="edit_text" placeholder="Text ..." required>
      		  </div>
            <div class="form-group">
              <label for="edit_warna">Pilih Warna</label>
              <select class="form-control" id="edit_warna" name="warna">
               
              </select>
            </div>
            <div class="from-group">
              <label for="">Informasi Warna</label> <br>
              <span class="badge badge-primary">Primary</span>
              <span class="badge badge-secondary">Secondary</span>
              <span class="badge badge-success">Success</span>
              <span class="badge badge-danger">Danger</span>
              <span class="badge badge-warning">Warning</span>
              <span class="badge badge-info">Info</span>
              <span class="badge badge-light">Light</span>
              <span class="badge badge-dark">Dark</span>
            </div>
      		  <div class="modal-footer justify-content-between">
              <submit type="submit" class="btn btn-primary" onclick="submit_form('#editForm')" id="submitform">Simpan</submit>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
      		</form>
      	</div>

      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-add" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Status Proker</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="container">
      		<!-- form start -->
      		<form action="<?php echo base_url() ?>admin/status/add" method="post" role="form" id="addstatus">

            <div class="form-group">
              <label for="add_judul">Text</label>
              <input type="text" name="text" class="form-control" id="add_text" placeholder="Text ..." required>
            </div>
            <div class="form-group">
              <label for="add_warna">Pilih Warna</label>
              <select class="form-control" id="add_warna" name="warna">
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="success">Success</option>
                <option value="danger">Danger</option>
                <option value="warning">Warning</option>
                <option value="info">Info</option>
                <option value="light">light</option>
                <option value="dark">dark</option>
              </select>
            </div>
            <div class="from-group">
              <label for="">Informasi Warna</label> <br>
              <span class="badge badge-primary">Primary</span>
              <span class="badge badge-secondary">Secondary</span>
              <span class="badge badge-success">Success</span>
              <span class="badge badge-danger">Danger</span>
              <span class="badge badge-warning">Warning</span>
              <span class="badge badge-info">Info</span>
              <span class="badge badge-light">Light</span>
              <span class="badge badge-dark">Dark</span>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
      		</form>
      	</div>
        
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<!-- page script -->
<script>
 
  function edit_prepare(id) {
    let text = $("#text-"+id).html();
    let warna = $("#warna-"+id).text();
    let select = `
    <option value="primary" ${warna.toLowerCase() == "primary" ? 'selected' : ''}>Primary</option>
    <option value='secondary' ${warna.toLowerCase() == "secondary" ? 'selected' : ''}>Secondary</option>
    <option value="success" ${warna.toLowerCase() == "success" ? 'selected' : ''}>Success</option>
    <option value="danger" ${warna.toLowerCase() == "danger" ? 'selected' : ''}>Danger</option>
    <option value="warning" ${warna.toLowerCase() == "warning" ? 'selected' : ''}>Warning</option>
    <option value="info" ${warna.toLowerCase() == "info" ? 'selected' : ''}>Info</option>
    <option value="light" ${warna.toLowerCase() == "light" ? 'selected' : ''}>Light</option>
    <option value="dark" ${warna.toLowerCase() == "dark" ? 'selected' : ''}>Dark</option>
    `
    
    // masukkan ke form
    $("#edit_id_status").val(id);
    $("#edit_text").val(text);
    $("#edit_warna").html(select);
  }

  function delete_row(id) {
    Swal.fire({
      title: 'Yakin ingin menghapus proker ini?',
      text: "Tindakan ini tidak akan dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus saja!'
    }).then((result) => {
      if (result.value) {
        window.location.href = "<?php echo base_url() ?>admin/status/delete/"+id;
      }
    });
  }
</script>
