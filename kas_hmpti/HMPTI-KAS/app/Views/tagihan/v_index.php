<?= $this->extend('templates/template_user'); ?>

<?= $this->section('main'); ?>

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<script src="<?= base_url(); ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<div class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">
          <button type="button" class="btn btn-primary" id="tambahTagihan"><i class="fas fa-plus"></i> Tambah Tagihan</button>
        </h5>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th>Tanggal</th>
              <th style="width: 15%;">Nominal (Rp)</th>
              <th>Keterangan</th>
              <th style="width: 15%;">Bendahara</th>
              <th style="width: 15%;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($tagihan as $t) :
            ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= date('d F Y', strtotime($t['tgl_tagihan'])); ?></td>
                <td><?= number_format($t['nominal'], 0, ",", "."); ?></td>
                <td><?= $t['keterangan']; ?></td>
                <td><?= $t['nama']; ?></td>
                <td class="text-center">
                  <button type="button" class="btn btn-sm btn-success" title="Detail" onclick="detail('<?= $t['id']; ?>')"><i class="fas fa-eye"></i></button>
                  <button type="button" class="btn btn-sm btn-primary" title="Edit" onclick="edit('<?= $t['id']; ?>')"><i class="fas fa-edit"></i></button>
                  <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="hapus('<?= $t['id']; ?>')"><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Nominal</th>
              <th>Keterangan</th>
              <th>Bendahara</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>

<div class="viewmodal" style="display: none;"></div>

<script>
  function detail(id) {
    window.location.href = `<?= base_url('/tagihan/detail'); ?>/${id}`;
  }

  function edit(id) {
    $.ajax({
      type: "post",
      url: "<?= base_url('/tagihan/modalEdit'); ?>",
      data: {
        id
      },
      dataType: "json",
      success: function(response) {
        if (response.data) {
          $('.viewmodal').html(response.data).show();
          $('#modaledit').modal("show");
        }
        if (response.error) {
          Swal.fire("Error", response.error, "error").then(() => window.location.reload());
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + '\n' + thrownError);
      }
    });
  }

  function hapus(id) {
    Swal.fire({
      title: 'Hapus?',
      text: "Apakah anda yakin menghapus tagihan ini ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'batal',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "post",
          url: "<?= base_url('/tagihan/hapusTagihan'); ?>",
          data: {
            id
          },
          dataType: "json",
          success: function(response) {
            if (response.success) {
              Swal.fire("Sukses", response.success, "success").then(() => window.location.reload());
            }
            if (response.error) {
              Swal.fire("Error", response.error, "error").then(() => window.location.reload());
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
          }
        });
      }
    });
  }

  $('#tambahTagihan').click(function(e) {
    e.preventDefault();
    $.ajax({
      url: "<?= base_url('/tagihan/modalTambah'); ?>",
      dataType: "json",
      success: function(response) {
        if (response.data) {
          $('.viewmodal').html(response.data).show();
          $('#modaltambah').modal("show");
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + '\n' + thrownError);
      }
    });
  });
</script>

<?= $this->endSection('main'); ?>