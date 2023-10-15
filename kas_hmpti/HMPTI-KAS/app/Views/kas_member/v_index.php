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
        <h5 class="card-title">
          <button type="button" class="btn btn-primary" id="tambahTagihan" onclick="window.location = '<?= base_url('/kasmember'); ?>';"><i class="fas fa-sync-alt"></i> Refresh</button>
        </h5>
        <div class="card-tools">
          <button type="button" class="btn btn-primary" onclick="cetak_laporan();"><i class="fas fa-print"></i> Cetak Laporan
          </button>
          <button type="button" class="btn btn-warning" id="aktifkan_aksi" onclick="aktifkan_aksi();"><i class="fas fa-lock"></i> Aktifkan Aksi
          </button>
          <button type="button" class="btn btn-danger" id="matikan_aksi" onclick="matikan_aksi();"><i class="fas fa-lock-open"></i> Matikan Aksi
          </button>
        </div>
      </div>
      <div class="card-body">
        <?= form_open(base_url('/kasmember'), ['method' => 'get']); ?>
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="tahun" placeholder="Tahun" min=2019 max=<?= date("Y"); ?> value="<?= $tahun; ?>" autofocus>
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari tahun</button>
          </div>
        </div>
        <?= form_close(); ?>

        <div class="table table-responsive">
          <?php if (count($tagihan) > 0) { ?>
            <table class="table table-bordered table-hover" id="example1">
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th>Nama</th>
                  <?php foreach ($tagihan as $t) : ?>
                    <th style="width: 15%;"><?= date('d-m-Y', strtotime($t['tgl_tagihan'])); ?></th>
                  <?php endforeach; ?>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($member as $m) :
                  $sudah_dibayar = 0;
                  $seharusnya_dibayar = 0;
                ?>
                  <tr>
                    <td><?= $i++; ?>.</td>
                    <td><?= $m['nama']; ?></td>
                    <?php foreach ($tagihan as $t) : ?>
                      <?php
                      // hitung yang seharusnya dibayar oleh member
                      $seharusnya_dibayar += $t['nominal'];

                      // apakah member sudah membayar kas
                      $cek_kas = $db->table('h_pembayaran')->where('id_tagihan', $t['id'])->where('id_member', $m['nim'])->get()->getRowArray();

                      // tagihan kas yang sudah dibayar user
                      if ($cek_kas) {
                        $sudah_dibayar += $t['nominal'];
                      }

                      ?>
                      <td class="text-center">
                        <!-- jika member sudah membayar kas maka input akan checked -->
                        <input type="checkbox" id_member="<?= $m['nim']; ?>" id_tagihan="<?= $t['id']; ?>" member="<?= $m['nama']; ?>" name="check_kas" class="form-control" <?= $cek_kas ? "checked" : ""; ?>>
                      </td>
                    <?php endforeach; ?>
                    <td>
                      <?= $sudah_dibayar === $seharusnya_dibayar ? '<span class="badge badge-success">Sudah Lunas</span>' : "Kurang Rp. " . number_format($seharusnya_dibayar - $sudah_dibayar, 0, ",", "."); ?>
                    </td>
                    <td>
                      <button type="button" class="btn btn-sm btn-primary" onclick="detail('<?= $m['nim']; ?>')"><i class="fa fa-eye"></i> Detail</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php } else { ?>
            Tidak ada tagihan kas ditahun <?= $_GET['tahun']; ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="viewmodal" style="display: none;"></div>

<script>
  function reset_aksi() {
    $('#matikan_aksi').hide();
    $('#aktifkan_aksi').show();
    $("input[name=check_kas]").attr('disabled', true);
  }

  function matikan_aksi() {
    $("input[name=check_kas]").attr('disabled', true);
    $('#matikan_aksi').hide();
    $('#aktifkan_aksi').show();
  }

  function aktifkan_aksi() {
    $("input[name=check_kas]").removeAttr('disabled');
    $('#matikan_aksi').show();
    $('#aktifkan_aksi').hide();
  }

  function cetak_laporan() {
    let tahun = $('input[name=tahun]').val();
    window.open(`<?= base_url('/kasmember/cetak_laporan'); ?>/${tahun}`, '_blank');
  }

  function detail(id_member) {
    $.ajax({
      type: "post",
      url: "<?= base_url('/kasmember/detail_kas'); ?>",
      data: {
        id_member,
      },
      dataType: "json",
      success: function(response) {
        if (response.data) {
          $('.viewmodal').html(response.data).show();
          $('#modaldetail').modal('show');
        }
        if (response.error) {
          Swal.fire('Error', response.error, 'error').then(() => window.location.reload());
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + '\n' + thrownError);
      }
    });
  }

  $("input[name=check_kas]").click(function(e) {
    let url;
    if ($(this).is(':checked')) {
      url = "<?= base_url('/pembayaran/check_kas'); ?>";
    } else {
      url = "<?= base_url('/pembayaran/uncheck_kas'); ?>";
    }

    Swal.fire({
      title: 'Perubahan Kas',
      text: `Apakah anda yakin mengubah kas member milik ${$(this).attr('member')} ?`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, ubah!',
      cancelButtonText: 'batal!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "post",
          url: url,
          data: {
            id_member: $(this).attr('id_member'),
            id_tagihan: $(this).attr('id_tagihan'),
          },
          dataType: "json",
          success: function(response) {
            if (response.success) {
              Swal.fire('Sukses', response.success, 'success').then(() => window.location.reload());
            }
            if (response.error) {
              Swal.fire('Error', response.error, 'error').then(() => window.location.reload());
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
          }
        });
      } else {
        window.location.reload();
      }
    });
  });

  $(document).ready(function() {
    reset_aksi();
  });
</script>

<?= $this->endSection('main'); ?>