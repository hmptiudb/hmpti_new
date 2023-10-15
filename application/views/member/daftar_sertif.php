<!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<?php //echo "<pre>"; var_dump( $valisi ); die(); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo $subtitle ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="daftar" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal Event</th>
                <th>Judul</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
	              
              </tbody>
              <tfoot>
              <tr>
                <th>No.</th>
                <th>Tanggal Event</th>
                <th>Judul</th>
                <th>Action</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
	</div>
</div>

