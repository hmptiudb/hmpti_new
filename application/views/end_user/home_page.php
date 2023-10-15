<style type="text/css">

</style>

<section id="intro">
  <div class="carousel">
    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="<?php echo base_url() ?>assets/img/carousel/1631487954.jpg" width="100%" />
        <div class="carousel-container">
          <div class="carousel-content">
            <h2 class="text-uppercase wow slideInDown" style="font-weight: 300 !important" data-wow-delay=".1s" data-wow-duration="2s">
              Himpunan Mahasiswa Prodi Teknik Informatika
            </h2>
            <h2 class="text-uppercase wow zoomIn" style="font-weight: 700" data-wow-delay=".1s" data-wow-duration="2s">
              Universitas Duta Bangsa Surakarta
            </h2>
            <p class="wow slideInUp" data-wow-delay=".1s" data-wow-duration="2s">
              Bergerak untuk memajukan SDM Indonesia dalam mengasah skill di
              bidang teknologi.
            </p>
            <a href="<?php echo base_url() ?>p/visi_misi" class="btn-get-started wow zoomIn" data-wow-delay=".2s" data-wow-duration="1.2s">Visi & Misi</a>
          </div>
        </div>

        <!-- <h1><?php echo $car['judul'] ?></h1> -->
        <!-- <p><?php echo $car['paragraf'] ?></p> -->
      </div>
    </div>
  </div>
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