<section id="ormawa" class="m-fix">
  <div class="container">

    <div class="row">
      <h1 class="col-lg-12 text-center headline-event"><strong>Anggota nonaktif</strong></h1>
      <div style="height:548px"></div>
      <?php foreach ($anggota_nonaktif as $key => $m) : ?>
        <!-- <div class="card-dk mbmt-8">
          <div class="info-content">
            <h4><?php echo $m['nama'] ?></h4>
            <span><?php echo $jab['nama_jabatan']; ?></span>
            <br>
            <a href="<?php echo base_url() . "p/profil/" . $m['nim'] ?>" class="btn-get-detail wow zoomIn" data-wow-delay=".2s" data-wow-duration="1.2s" data-bs-toggle="##tooltip" data-bs-placement="top" title="" data-bs-original-title="Buka Profil">Lihat Detail</a>
          </div>
          <img src="<?php echo (!empty($m['image'])) ? base_url() . 'assets/img/members/' . $m['image'] : base_url() . 'assets/img/members/no_photo.png'; ?>">
        </div> -->

        <!-- <a href="<?php echo base_url() . "p/profil/" . $m['nim'] ?>"><i class="link_ke_profil fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Buka Profil"></i></a><br> -->
      <?php endforeach ?>
    </div>
  </div>
</section>