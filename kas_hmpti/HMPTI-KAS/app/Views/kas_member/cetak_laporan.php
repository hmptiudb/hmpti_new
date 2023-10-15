<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
</head>

<body onload="print();">
  <h1 style="text-align: center;">Laporan Kas Bulanan Tahun <?= $tahun; ?></h1>
  <br>
  <?php if (count($tagihan) > 0) { ?>
    <table border="1" cellspacing="0" cellpadding="0" width="100%">
      <thead>
        <tr>
          <th style="width: 3%;">No</th>
          <th>Nama</th>
          <?php foreach ($tagihan as $t) : ?>
            <th><?= date('d-m-Y', strtotime($t['tgl_tagihan'])); ?></th>
          <?php endforeach; ?>
          <th>Kekurangan</th>
          <th>Total (Rp)</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $kekurangan_member = 0;
        $total_kas_member = 0;
        $total_kas_seharusnya = 0;

        $i = 1;
        foreach ($member as $m) :
          $sudah_dibayar = 0;
          $seharusnya_dibayar = 0;
        ?>
          <tr>
            <td style="text-align: center;"><?= $i++; ?>.</td>
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
              <td style="text-align: center;">
                <!-- jika member sudah membayar kas maka input akan checked -->
                <b><?= $cek_kas ? '✓' : '☓'; ?></b>
              </td>
            <?php endforeach; ?>
            <td>
              <?= $sudah_dibayar === $seharusnya_dibayar ? 'Sudah Lunas' : "Kurang Rp. " . number_format($seharusnya_dibayar - $sudah_dibayar, 0, ",", "."); ?>
            </td>
            <td style="text-align: right;"><?= number_format($sudah_dibayar, 0, ",", "."); ?></td>
          </tr>

        <?php
          $total_kas_seharusnya += $seharusnya_dibayar;
          $total_kas_member += $sudah_dibayar;
          $kekurangan_member += $seharusnya_dibayar - $sudah_dibayar;
        endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="6">Total Kekurangan Kas (Rp)</th>
          <td style="text-align: right;"><?= number_format($kekurangan_member, 0, ",", "."); ?></td>
        </tr>
        <tr>
          <th colspan="6">Total Kas Member (Rp)</th>
          <td style="text-align: right;"><?= number_format($total_kas_member, 0, ",", "."); ?></td>
        </tr>
        <tr>
          <th colspan="6">Total Kas Seharusnya (Rp)</th>
          <td style="text-align: right;"><?= number_format($total_kas_seharusnya, 0, ",", "."); ?></td>
        </tr>
      </tfoot>
    </table>
  <?php } else { ?>
    Tidak ada laporan kas ditahun <?= $tahun; ?>
  <?php } ?>
</body>

</html>