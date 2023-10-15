<?= $this->extend('templates/template_user'); ?>

<?= $this->section('main'); ?>

<div class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">
          <button type="button" class="btn btn-primary" onclick="window.location.href = '<?= base_url('/tagihan'); ?>';"><i class="fas fa-arrow-left"></i> Kembali</button>
        </h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Detail Tagihan</h5>
              </div>
              <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item"><b>Tanggal Tagihan : </b><?= date('d F Y', strtotime($tagihan['tgl_tagihan'])); ?></li>
                  <li class="list-group-item"><b>Nominal : </b>Rp. <?= number_format($tagihan['nominal'], 0, ",", "."); ?></li>
                  <li class="list-group-item"><b>Keterangan : </b><?= $tagihan['keterangan']; ?></li>
                  <li class="list-group-item"><b>Bendahara : </b><?= $tagihan['nama']; ?></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Member</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary" id="aktifkan_aksi" onclick="aktifkan_aksi();"><i class="fas fa-lock"></i> Aktifkan Aksi
                  </button>
                  <button type="button" class="btn btn-danger" id="matikan_aksi" onclick="matikan_aksi();"><i class="fas fa-lock-open"></i> Matikan Aksi
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="cek_status">Status Kas</label>
                  <select name="cek_status" id="cek_status" class="form-control">
                    <option value="">-- pilih</option>
                    <option value="1">Belum Iuran</option>
                    <option value="2">Sudah Iuran</option>
                  </select>
                </div>

                <div class="data_member"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="viewmodal" style="display: none;"></div>

<script>
  function reset_aksi() {
    $("#cek_status").val(""); // mengosongkan cari status
    $('#matikan_aksi').hide();
    $('#aktifkan_aksi').show();
    $("select[name=status_pembayaran]").attr('disabled', true);
  }

  function data_member() {
    $.ajax({
      type: "post",
      url: "<?= base_url('/tagihan/data_member'); ?>",
      data: {
        id_tagihan: "<?= $tagihan['id']; ?>"
      },
      dataType: "json",
      beforeSend: function() {
        $('.data_member').html('<div class="text-center"><i class="fa fa-spin fa-spinner fa-lg"></i></div>');
      },
      success: function(response) {
        if (response.data) {
          $('.data_member').html(response.data);
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + '\n' + thrownError);
      }
    });
  }

  function matikan_aksi() {
    $("select[name=status_pembayaran]").attr('disabled', true);
    $('#matikan_aksi').hide();
    $('#aktifkan_aksi').show();
  }

  function aktifkan_aksi() {
    $("select[name=status_pembayaran]").removeAttr('disabled');
    $('#matikan_aksi').show();
    $('#aktifkan_aksi').hide();
  }

  $('#cek_status').change(function(e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "<?= base_url('/tagihan/data_member'); ?>",
      data: {
        id_tagihan: "<?= $tagihan['id']; ?>",
        cek_status: $(this).val()
      },
      dataType: "json",
      beforeSend: function() {
        $('.data_member').html('<div class="text-center"><i class="fa fa-spin fa-spinner fa-lg"></i></div>');
      },
      success: function(response) {
        if (response.data) {
          $('.data_member').html(response.data);
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + '\n' + thrownError);
      }
    });
  });

  $(document).ready(function() {
    data_member();
    reset_aksi();
  });
</script>

<?= $this->endSection('main'); ?>