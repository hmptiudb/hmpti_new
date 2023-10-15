<?php if (empty($nama_divisi)) : ?>

  <div class="container marketing">

    <p class="display-5 mb-4">Divisi</p>

    <div class="row featurette mb-5">
      <div class="col-md-7">
        <h2 class="featurette-heading"><?php echo $nama ?></h2>
        <p class="lead">Divisi tidak ditemukan.</p>
      </div>
    </div>

  </div>
<?php return;
endif ?>

<section id="ormawa">
  <div class="container">

    <h1 class="headline-event text-center wow zoomIn"><?php echo $nama_divisi ?></h1>

    <div class="row featurette">
      <div class="col-md-12 order-md-2">
        <p class="lead wow fadeInUp"><?php echo $deskripsi ?></p>
      </div>
    </div>

    <hr class="featurette-divider">

    <div style="margin-top: 100px;"></div>

    <div class="divisi row">
      <div class="col-lg-12 wow fadeInUp text-center card-tmb">
        <h2>Anggota</h2>
        <!--<span class="badge badge-warning">Terlaksana</span>-->
      </div>
      <?php
      $jabatan = $this->Model_jabatan->get($id_divisi)->result_array();

      ?>
      <?php foreach ($jabatan as $key => $jab) : ?>
        <?php
        $members = $this->Model_member->get($jab['id_jabatan'])->result_array();
        ?>
        <?php foreach ($members as $key => $m) : ?>
          <div class="card-dk wow fadeInUp">
            <div class="info-content">
              <h4><?php echo $m['nama'] ?></h4>
              <span><?php echo $jab['nama_jabatan']; ?></span>
              <br>
              <a href="<?php echo base_url() . "p/profil/" . $m['nim'] ?>" class="btn-get-detail wow zoomIn" data-wow-delay=".2s" data-wow-duration="1.2s" data-bs-toggle="##tooltip" data-bs-placement="top" title="" data-bs-original-title="Buka Profil">Lihat Detail</a>
            </div>
            <img src="<?php echo (!empty($m['image'])) ? base_url() . 'assets/img/members/' . $m['image'] : base_url() . 'assets/img/members/no_photo.png'; ?>">
          </div>
        <?php endforeach ?>
      <?php endforeach ?>
    </div>

    <hr class="featurette-divider">

    <div style="margin-top: 100px;"></div>

    <div class="row">
      <h2 class="text-center wow zoomIn">Program Kerja</h2>
    </div>

    <div class="col-lg-12 wow fadeInUp text-center card-tmb">

      <?php foreach ($proker_jamak as $key => $proker) : ?>
        <div class="card-dvs">
          <div class="info-content">
            <h4 class="text-center"><?php echo $proker['judul'] ?></h4>
            <p class="lead" style="padding:0px !important"><?php echo $proker['deskripsi'] ?></p>
            <p class="card-text"><small style="color:white"><?php echo $proker['waktu'] ?></small></p>
            <p class="card-text"><span class="badge bg-<?= $proker['id_status']['warna'] ?>"><?= $proker['id_status']['text'] ?></span></p>
          </div>
        </div>

        <!-- <div class="col-sm-12 col-md-5 col-lg-3 proker">
          <div class="card shadow mx-1 my-3">
            <div class="card-body">
              <h5 class="card-title"><?php echo $proker['judul'] ?></h5>
              <p class="card-text"><?php echo $proker['deskripsi'] ?></p>
              <p class="card-text"><small class="text-muted"><?php echo $proker['waktu'] ?></small></p>
              <p class="card-text"><span class="badge bg-<?= $proker['id_status']['warna'] ?>"><?= $proker['id_status']['text'] ?></span></p>
            </div>
          </div>
        </div> -->
      <?php endforeach ?>

    </div>

    <div style="padding-top: 100px;"></div>

  </div>
</section>