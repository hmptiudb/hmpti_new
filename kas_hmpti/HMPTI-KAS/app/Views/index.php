<?= $this->extend('templates/template_user'); ?>

<?= $this->section('main'); ?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>Rp. <?= number_format($total_kas_tahunan, 0, ",", "."); ?></h3>
            <p>Jumlah Kas <?= date('Y'); ?></p>
          </div>
          <div class="icon">
            <i class="fas fa-money-bill"></i>
          </div>
          <a href="<?= base_url('/kasmember'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $total_member_aktif; ?></h3>
            <p>Total Member <?= date('Y'); ?></p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="<?= base_url('/kasmember'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">User Login</h5>
      </div>
      <div class="card-body">
        <ul>
          <li><b>Nama : </b> <?= session('LoginBendahara')['nama']; ?></li>
          <li><b>NIM : </b> <?= session('LoginBendahara')['id_bendahara']; ?></li>
          <li><b>Jabatan : </b> <?= session('LoginBendahara')['jabatan']; ?></li>
          <li><b>E-mail : </b><?= session('LoginBendahara')['email']; ?></li>
          <li><b>Waktu Login : </b><?= date('d-m-Y H:i:s', strtotime(session('LoginBendahara')['time'])); ?></li>
        </ul>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>
<?= $this->endSection('main'); ?>