<div class="modal fade" id="modaldetail">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Kas Member</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <ul class="list-group">
          <li class="list-group-item"><b>Nama :</b> <?= $member['nama']; ?></li>
          <li class="list-group-item"><b>NIM :</b> <?= $member['nim']; ?></li>
          <li class="list-group-item"><b>Divisi :</b> <?= $member['nama_divisi']; ?></li>
          <li class="list-group-item"><b>Jabatan :</b> <?= $member['nama_jabatan']; ?></li>
        </ul>

        <table class="table table-bordered table-hover mt-3">
          <thead>
            <tr>
              <th>No</th>
              <th>Tgl Tagihan Kas</th>
              <th>Tgl Pembayaran</th>
              <th>nominal (Rp)</th>
              <th>Keterangan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($data_tagihan as $kas) : ?>

              <?php
              $cek_kas = $db->table('h_pembayaran')
                ->where('id_member', $member['nim'])
                ->where('id_tagihan', $kas['id'])
                ->get()->getRowArray();
              ?>

              <tr>
                <td><?= $i++; ?>.</td>
                <td><a href="<?= base_url('/tagihan/detail/' . $kas['id']); ?>"><?= date('d-m-Y', strtotime($kas['tgl_tagihan'])); ?></a></td>
                <td><?= $cek_kas ? date('d-m-Y H:i:s', strtotime($cek_kas['tgl_bayar'])) : "Belum membayar"; ?></td>
                <td class="text-right"><?= number_format($kas['nominal'], 0, ",", "."); ?></td>
                <td><?= $kas['keterangan']; ?></td>
                <!-- cek apakah member sudah bayar kas -->
                <td>
                  <?= $cek_kas ? '<span class="badge badge-success">Sudah iuran</span>' : '<span class="badge badge-danger">Belum iuran</span>'; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->