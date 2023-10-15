<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<script src="<?= base_url(); ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<table class="table table-bordered table-hover" id="example2">
  <thead>
    <tr>
      <th style="width: 5%;">No</th>
      <th>Member</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach ($member as $m) : ?>

      <?php
      $db = \Config\Database::connect();
      $query = $db->table('h_pembayaran')
        ->where('id_member', $m['nim'])->where('id_tagihan', $id_tagihan)
        ->get()->getRowArray();
      ?>

      <tr>
        <td><?= $i++; ?></td>
        <td><?= $m['nama']; ?></td>
        <td>
          <?= $query ? '<span class="badge badge-success">Sudah iuran</span>' : '<span class="badge badge-danger">Belum iuran</span>'; ?>
        </td>
        <td>
          <select name="status_pembayaran" class="form-control" id_member="<?= $m['nim']; ?>" id_tagihan="<?= $id_tagihan; ?>" disabled>
            <option value="1" <?= !$query ? "selected" : ""; ?>>Belum lunas</option>
            <option value="2" <?= $query ? "selected" : ""; ?>>Lunas</option>
          </select>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  $(function() {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian-Alternative.json"
      },
    });
  });

  $("select[name=status_pembayaran]").change(function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda mengubah status pembayaran !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, ubah!',
      cancelButtonText: 'batal',
    }).then((result) => {
      if (result.isConfirmed) {
        let status_pembayaran = $(this).val();
        let id_member = $(this).attr("id_member");
        let id_tagihan = $(this).attr("id_tagihan");
        $.ajax({
          type: "post",
          url: "<?= base_url('/pembayaran/aksi_pembayaran'); ?>",
          data: {
            status_pembayaran,
            id_member,
            id_tagihan
          },
          dataType: "json",
          beforeSend: function() {
            $("select[name=status_pembayaran]").attr('disabled', true);
          },
          success: function(response) {
            if (response.success) {
              Swal.fire('Sukses', response.success, 'success');
              data_member();
            }
            if (response.error) {
              Swal.fire('Error', response.error, 'error');
              data_member();
            }
            reset_aksi();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
          }
        });
      } else {
        data_member();
        reset_aksi();
      }
    });
  });
</script>