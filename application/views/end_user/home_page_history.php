<div class="container-fluid fh5co-recent-work" style="min-height: 800px">
  <div class="container contact-pop">
    <div class="container recent" id="activity">
      <div class="row">
        <h2 class="text-center wow fadeInDown"><strong>Riwayat Event</strong></h2>
        <hr class="garis-putih">
        <p class="text-center text-white subtitle-caption wow slideInUp" style="margin-top: -10px;">Berikut ini adalah beberapa event yang telah dilaksanakan</p>
        <div class="owl-carousel owl-carousel2 owl-theme">
          <?php foreach ($events_lama as $key => $event) : ?>



            <?php
            $pendaftar = $this->Model_pendaftar->check_exists($this->session->userdata('email'), $event['id_event']);
            ?>



            <div class="card wow zoomIn" style="border:0" title="<?php echo substr(strip_tags($event['deskripsi']), 0, 140) ?>...">
              <div class="card-img" style="
                      background: url('<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>');
                      background-size: cover;">
              </div>

              <div class="card-img-overlay">
                <div class="bottom-text">
                  <p class="card-title"><?php echo $event['judul'] ?></p>


                  <p class="card-text"><?php echo date("d M Y, H:m", $event['jadwal']) . " WIB" ?></p>
                  <p class="countdown_wrapper">Countdown: <span class="countdown"><?php echo ceil(($event['jadwal'] - time()) / 60) ?></span> menit <i class="fa fa-circle blinking"></i></p>
                  <?php if ($pendaftar->num_rows() > 0) : // check, kalau terdaftar, boleh kasih ulasan 
                  ?>
                    <?php if ($pendaftar->row_array()['status'] == 'Unset' && !empty($pendaftar->row_array()['bintang'])) : ?>
                      <a class="btn shadow btn-warning w-100" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Sdg Diproses...</a>
                    <?php elseif ($pendaftar->row_array()['status'] == 'Unset') : ?>
                      <!-- <a class="btn shadow btn-success <?php echo 'glow' ?>" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review</a> -->
                    <?php elseif ($pendaftar->row_array()['status'] == 'Valid') : ?>
                      <!-- <a class="btn shadow btn-success mb-2 w-100" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review Valid</a> -->
                      <?php if (!empty($event['sertifikat'])) : ?>
                        <a class="btn shadow btn-primary w-100" href="<?php echo base_url() ?>p/download_sertifikat/<?php echo $event['id_event'] ?>.pdf" role="button">Download Sertifikat</a>
                      <?php endif; ?>
                    <?php elseif ($pendaftar->row_array()['status'] == 'Invalid') : ?>
                      <a class="btn shadow btn-danger w-100" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review Invalid</a>
                    <?php endif ?>
                  <?php endif ?>

                  <a class="btn-get-started w-100" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)">Lihat detail</a>
                </div>
              </div>

            </div><!-- /.event -->
          <?php endforeach ?>
        </div>
      </div>
      <?php if (empty(count($events_lama))) : ?>
        <div class="text-center text-muted">
          <p>
            <i>Belum ada riwayat.</i>
          </p>
        </div>
      <?php endif ?>
      <div class="col-12 mt-4">
        <p class="text-center">
          <a class="btn shadow btn-outline-light do_transition wow zoomIn" href="<?php echo base_url() ?>p/search?q=" role="button">See more</a>
        </p>
      </div> <!-- /load more -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</div>