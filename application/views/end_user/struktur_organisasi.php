<section id="ormawa">
  <div class="container">

    <h1 class="text-center mb-4 headline-event wow zoomIn"><strong style="font-size:1.8rem !important">Struktur Organisasi</strong></h1>

    <?php foreach ($divisi as $key => $div) : ?>
      <div class="divisi row">
        <div class="wow fadeInUp text-center">
          <h2 style="font-size: 1.2rem"><?php echo $div['nama_divisi'] ?> <a href="<?php echo base_url() . "p/divisi/" . $div['id_divisi'] ?>"><i class="link_ke_profil fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Buka informasi tentang divisi ini"></i></a></h2>
        </div>
        <div class="col-lg-12 wow fadeInUp text-center card-tmb">
          <?php
          $jabatan = $this->Model_jabatan->get($div['id_divisi'])->result_array();

          ?>
          <?php foreach ($jabatan as $key => $jab) : ?>
            <?php
            $members = $this->Model_member->get($jab['id_jabatan'])->result_array();
            ?>
            <?php foreach ($members as $key => $m) : ?>

              <div class="card-dk m0">
                <div class="info-content">
                  <h4><?php echo $m['nama'] ?></h4>
                  <span><?php echo $jab['nama_jabatan']; ?></span>
                  <br>
                  <a href="<?php echo base_url() . "p/profil/" . $m['nim'] ?>" class="btn-get-detail wow zoomIn" data-wow-delay=".2s" data-wow-duration="1.2s" data-bs-toggle="##tooltip" data-bs-placement="top" title="" data-bs-original-title="Buka Profil" id="lihat_detail" onclick="lihat_detail('<?= $m['nim']; ?>');">Lihat Detail</a>
                </div>
                <img src="<?php echo (!empty($m['image'])) ? base_url() . 'assets/img/members/' . $m['image'] : base_url() . 'assets/img/members/no_photo.png'; ?>">
              </div>

            <?php endforeach ?>
          <?php endforeach ?>
        </div>
      </div>
    <?php endforeach ?>

  </div>

  <!-- <div class="popup" id="popup">
    <div class="popup-content">
      <div class="popup-img">
        <img src="<?php echo (!empty($member['image'])) ? base_url() . 'assets/img/members/' . $member['image'] : base_url() . 'assets/img/members/no_photo.png'; ?>" alt="">
        <a href="#" class="popup-close">&times;</a>
      </div>
      <div class="popup-header">
        <h1 style="color:white">
          <div class="nama"></div>
        </h1>
      </div>
      <div class="popup-teks">
        <h3 class="lead">Jabatan: <div class="jabatan"></div>
        </h3>
        <h3 class="lead">Instagram: <div class="instagram"></div>
        </h3>
        <h3 class="lead">Kelas: <div class="kelas"></div>
        </h3>
        <h3 class="lead">Deskripsi: <div class="deskripsi"></div>
        </h3>
      </div>
    </div>
  </div> -->

</section>