<section id="ormawa">
  <!-- EVENT -->
  <div class="container">

    <h1 class="headline-event text-center wow zoomIn">Search</h1>
    <h2 class="text-center mb-4 wow zoomIn"><strong>Berita & Event</strong></h2>


    <?php foreach ($events as $key => $event) : ?>

      <a href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)" style="text-decoration: none;">

        <div class="row">
          <div class="col-lg-12 event-list wow fadeInUp" style="border-radius: 10px;">
            <div class="card-sc">
              <div class="info-content-sc">
                <h5 class="sc"><?php echo $event['judul'] ?>
                  <?php
                  $pendaftar = $this->Model_pendaftar->check_exists($this->session->userdata('email'), $event['id_event']);
                  echo ($pendaftar->num_rows() > 0) ? '<span class="text-muted">[Anda Terdaftar]</span>' : '';
                  ?>
                </h5>
              </div>
              <!-- <img src=" <?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>"> -->
            </div>
          </div>
        </div>
      </a>

    <?php endforeach ?>
    <?php if (empty(count($events))) : ?>
      <div class="text-center text-muted">
        <p>
          <i>Tidak ada hasil.</i>
        </p>
      </div>
    <?php endif ?>
    <?php if (count($events) > 100) : ?>
      <div class="text-center text-muted my-3">
        <p>
          <i>Dibatasi hanya 100 konten.</i>
        </p>
      </div>
    <?php endif ?>
  </div><!-- /.container -->
</section>

<!-- ORANG -->
<section id="ormawa">
  <div class="container">

    <h2 class="headline-event text-center wow zoomIn"><strong>Orang</strong></h2>

    <?php foreach ($members as $key => $o) : ?>

      <div class="row">
        <div class="col-lg-12 mb-2 event-list wow fadeInUp">
          <div class="card-sc">
            <div class="info-content-sc">
              <a href="<?php echo base_url() ?>p/profil/<?php echo $o['nim'] ?>" style="text-decoration: none;">
                <h5 class="nama-sc" style="margin-bottom:0px !important"><?php echo $o['nama'] ?></h5>
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>


    <?php if (empty(count($members))) : ?>
      <div class="text-center text-muted">
        <p>
          <i>Tidak ada hasil.</i>
        </p>
      </div>
    <?php endif ?>
    <?php if (count($members) > 100) : ?>
      <div class="text-center text-muted my-3">
        <p>
          <i>Dibatasi hanya 100 konten.</i>
        </p>
      </div>
    <?php endif ?>
  </div><!-- /.container -->
</section>



<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center" id="detail_event">
        <!-- the content goes here -->
        <div class="col-12" style="
                  background-image: url('<?php echo base_url() ?>assets/img/loader.gif');
                  background-repeat: no-repeat;
                  background-position: center;
                  min-height: 50px;
                ">
        </div>
      </div>
    </div>
  </div>
</div> <!-- /.modal -->