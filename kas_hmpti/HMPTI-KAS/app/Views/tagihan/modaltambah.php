<div class="modal fade" id="modaltambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Tagihan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open(base_url('/tagihan/simpanTagihan'), ['class' => 'formtambah']); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="tgl_tagihan">Tanggal Tagihan</label>
          <input type="date" name="tgl_tagihan" id="tgl_tagihan" class="form-control">
          <div class="invalid-feedback error_tgl_tagihan"></div>
        </div>
        <div class="form-group">
          <label for="nominal">Nominal (Rp)</label>
          <input type="text" name="nominal" id="nominal" class="form-control">
          <div class="invalid-feedback error_nominal"></div>
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
          <div class="invalid-feedback error_keterangan"></div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary btnSimpan"><i class="fa fa-save"></i> Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="<?= base_url(); ?>/template/autoNumeric.js"></script>
<script>
  $(document).ready(function() {
    $("#nominal").autoNumeric('init', {
      mDec: 0,
      aSep: '.',
      aDec: ','
    });

    $('.formtambah').submit(function(e) {
      e.preventDefault();
      let form = $(this)[0];
      let formdata = new FormData(form);
      formdata.set('nominal', $('#nominal').autoNumeric('get'));
      // console.log(...data);

      $.ajax({
        type: "post",
        url: $(this).attr('action'),
        data: formdata,
        processData: false,
        contentType: false,
        dataType: "json",
        beforeSend: function() {
          $('.btnSimpan').html('<i class="fa fa-spinner fa-spin"></i>');
          $('.btnSimpan').attr('disabled', true);
        },
        complete: function() {
          $('.btnSimpan').html('<i class="fa fa-save"></i> Simpan');
          $('.btnSimpan').removeAttr('disabled');
        },
        success: function(response) {
          if (response.success) {
            Swal.fire('Sukses', response.success, 'success').then(() => {
              window.location.reload();
            });
          }

          if (response.error) {
            Swal.fire('Error', response.error, 'error').then(() => {
              window.location.reload();
            });
          }

          if (response.errors) {
            if (response.errors.error_tgl_tagihan) {
              $("#tgl_tagihan").addClass("is-invalid");
              $(".error_tgl_tagihan").html(response.errors.error_tgl_tagihan);
            } else {
              $("#tgl_tagihan").removeClass("is-invalid");
              $(".error_tgl_tagihan").html("");
            }
            if (response.errors.error_nominal) {
              $("#nominal").addClass("is-invalid");
              $(".error_nominal").html(response.errors.error_nominal);
            } else {
              $("#nominal").removeClass("is-invalid");
              $(".error_nominal").html("");
            }
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + '\n' + thrownError);
        }
      });
    });
  });
</script>