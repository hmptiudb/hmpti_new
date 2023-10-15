<!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="row">
    <div class="col">
        <div class="card">
          <div class="card-header">
              <div class="row justify-content-between">
                <div class="col-4">
                  <h3 class="card-title">
                      Pendaftaran
                    
                      
                      </h3>
                </div>
                <div class="col-4">
                    <?php if ($detail['daftar'] == '0' ) :?>
                    <!--<div class="d-flex justify-content-end"> <a type="button" href="<?= base_url('admin/oprek/aktifdaftar') ?>" class="btn btn-primary">Aktif</a></div>-->
                    <div>  <button onclick="aktifP()" type="button" class="btn btn-info"  title="Aktif"><i class="fas fa-user-check"></i></button> AKtif </div>
                    <?php else : ?>
                    <!--<div class="d-flex justify-content-end"> <a type="button" href="<?= base_url('admin/oprek/nonaktifdaftar') ?>" class="btn btn-danger">NonAktif</a></div>-->
                    <div>  <button onclick="nonAktifP()" type="button" class="btn btn-danger"  title="NonAktifkan"><i class="fas fa-user-check"></i></button> NonAktif </div>
                    <?php endif ?>
                </div>
                </div>
              </div>
          
          </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo $subtitle ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
            <!--<table id="datamahasiswa" class="table table-bordered table-striped display nowrap" style="width:100%;">-->
              <thead>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
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
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"><?php echo $val['kelas'] ?></td> 
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"><?php echo $val['noHp'] ?></td> 
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"><a class=" btn btn-outline-secondary" href="<?= base_url()?>admin/oprek/myPdfPage/<?= $val['formulir_pen'] ?> " target="_blank"> <i class="fas fa-clipboard-list"></i> Formulir </a></td> 
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"> <a class="btn btn-outline-success" href="<?= base_url()?>admin/oprek/myPdfPage/<?= $val['cv'] ?> " target="_blank"> <i class="fas fa-clipboard-check"></i> CV </a></td>
	  		              <td id="id_oprek-<?php echo $val['id_oprek'] ?>"> <a class="btn btn-outline-warning" href="<?= base_url()?>admin/oprek/myPdfPage/<?= $val['krs'] ?> " target="_blank"><i class="fas fa-clipboard"></i> KRS </a></td>
	  		          
                     
	  		              <td>
	  		                  
	  		                <?php if($val['statuss'] == 0) : ?>
    	  		              	<div class="btn-group">
      		                      <button onclick="terima('<?= $val['id_oprek'] ?>','<?= $val['nama'] ?>')" id_oprek="<?= $val['id_oprek'] ?>"  type="button" class="btn btn-info"  title="Terima"><i class="fas fa-user-check"></i></button>
      		                      <!--<button onclick="klik('<?= $val['id_oprek'] ?>','<?= $val['nama'] ?>')" type="button" class="btn btn-info"  title="Terima"><i class="fas fa-user-check"></i></button>-->
      		                      
      		                      <button onclick="tolak('<?= $val['id_oprek'] ?>','<?= $val['nama'] ?>')" type="button" class="btn btn-danger" title="Tolak"><i class="fas fa-user-alt-slash"></i></button>
      		                    </div>
  		                  
  		                  <?php elseif($val['statuss'] == 1) : ?>
  		                  <div class="btn-group">
      		                    <span class="badge badge-danger">DiTolak</span>
          		              </div>
  		                  <?php else : ?>
      		                  <div class="btn-group">
      		                    <span class="badge badge-success">DiTerima</span>
          		              </div>
  		                  <?php endif; ?>
  		                  
	  		              </td>
	  		            </tr>
	              <?php endforeach ?>
              </tbody>
              
              
              <tfoot>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
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

<div class="viewmodal" style="display: none;"></div>

<!--<div class="col-12 text-right">-->
<!--	<button  type="button" class="btn btn-lg btn-info rounded-circle to_top" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"></i></button>-->
<!--</div>-->




