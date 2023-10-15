      <div class="container marketing" id="divisiHMP">
        <img src="<?php echo base_url() ?>assets/img/logo.png" class="dvs">

        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
          <div class="col-12 mb-4">
            <h2 class="text-center mb-4 headline-event wow fadeInUp"><strong>Divisi</strong></h2>
            <hr class="garis-bawah">
            <center>
              <p class="subtitle-caption wow slideInUp">Berikut daftar divisi, klik untuk melihat detail divisi beserta program kerjanya.</p>
            </center>
          </div>
          <div class="row d-flex justify-content-center">
            <?php foreach ($this->all_divisi as $key => $divisi) : ?>
              <div class="col-sm-3 wow fadeInUp dvs-mobile">
                <div class="entry-thumb kotak-overlay">
                  <div class="imgoverlay text-light">
                    <a href="<?php echo base_url() ?>p/divisi/<?php echo $divisi['id_divisi'] ?>">
                      <img src="<?php echo $divisi['logo'] ?>" class="img-responsive" alt="" />
                      <div class="overlay">
                        <span class="overlaycolor"></span>
                        <div class="overlayinfo">
                          <h6><?php echo $divisi['nama_divisi'] ?></h6>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>

              <!-- <div class="col-12">
                <a class="" href="<?php echo base_url() ?>p/divisi/<?php echo $divisi['id_divisi'] ?>" style="text-decoration: none; color: #5a5a5a;">
                  <div class="card hover-shadow mb-4" style="border-radius: 10px;">
                    <div class="card-body text-center">
                      <h2><?php echo $divisi['nama_divisi'] ?></h2>
                    </div>
                  </div>
                </a>
              </div> -->
            <?php endforeach ?>
          </div>

          <?php if (empty(count($this->all_divisi))) : ?>
            <div class="text-center text-muted">
              <p>
                <i>Belum ada divisi.</i>
              </p>
            </div>
          <?php endif ?>
        </div><!-- /.row -->
      </div><!-- /.container -->