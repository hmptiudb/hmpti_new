
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <!-- /.col (LEFT) -->
          <div class="col-md-12">

            <!-- BAR CHART -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Event yang pernah diikuti</h3>
              </div>
              <div class="card-body">
                  

      <div class="container">

        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
                 <!--validation_errors('<div class="bg-danger">', '</div>');-->
                    <!-- Three columns of text below the carousel -->
                      <?php foreach ($events as $key => $event): ?>
                      
                      <?php 
                            $pendaftar = $this->Model_pendaftar->check_exists( $this->session->userdata('email'), $event['id_event'] );
                        ?>

                      
                        <div class="event card text-start" title="<?php echo substr( strip_tags($event['deskripsi']) , 0, 140) ?>...">
                            <div style="display: flex;
                                justify-content: center;">
                                <div class="bd-placeholder-img mt-3 overflow-hidden" style="
                                  width: 275px;
                                  height: 320px;
                                  background: url('<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>');
                                  background-position: left bottom;
                                  background-size: cover;
                                  background-repeat: no-repeat;
                          " role="button" data-toggle="modal" data-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)">
                          </div>
            
                            </div>
                          
                          <p class="mt-2 mx-2 h5" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)"><?php echo $event['judul'] ?></p>
                          <p class="mt-2 mx-2"><?php echo date( "d M Y, H:m", $event['jadwal'] ) . " WIB" ?></p>
                          <p class="countdown_wrapper mt-2 mx-2">Countdown: <span class="countdown" data-time="<?php echo date("M d, Y H:i:s", $event['jadwal']) ?>"></span> <i class="fa fa-circle text-danger blinking"></i></p>
                          
                          <p class="mt-2 mx-2">
                          <?php if ( $pendaftar->num_rows() > 0 ): // check, kalau terdaftar, boleh kasih ulasan ?>
                            <?php if ( $pendaftar->row_array()['status']=='Unset' && !empty($pendaftar->row_array()['bintang']) ): ?>
                                <a class="btn shadow btn-warning mb-2 w-100" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Sdg Diproses...</a>
                              <?php elseif( $pendaftar->row_array()['status']=='Unset' ): ?>
                                <!-- <a class="btn shadow btn-success <?php echo 'glow' ?>" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review</a> -->
                              <?php elseif( $pendaftar->row_array()['status']=='Valid' ): ?>
                                <!-- <a class="btn shadow btn-success mb-2 w-100" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review Valid</a> -->
                                <?php if ( !empty($event['sertifikat']) ) : ?>
                                  <a class="btn shadow btn-primary mb-2 w-100" href="<?php echo base_url() ?>p/download_sertifikat/<?php echo $event['id_event'] ?>.pdf" role="button">Download Sertifikat</a>
                                <?php endif; ?>
                              <?php elseif( $pendaftar->row_array()['status']=='Invalid' ): ?>
                                <a class="btn shadow btn-danger mb-2 w-100" href="<?php echo base_url() ?>p/review/<?php echo $event['id_event'] ?>" role="button">Review Invalid</a>
                            <?php endif ?>
                          <?php endif ?>
                          
                          <a class="btn shadow btn-secondary mb-2 w-100" href="#" role="button"  data-toggle="modal" data-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)">Lihat detail</a>
                        </p>
                        </div><!-- /.event -->
                      <?php endforeach ?>
                      
              </div>
              
            </div>
            
            
                      <?php if ( empty(count($events)) ): ?>
                        <div class="text-center text-muted">
                          <p>
                            <i>Coming soon....</i>
                          </p>  
                        </div>
                      <?php endif ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<!-- Button trigger modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center" id="detail_event">
        <div class="col-12" style="
                  background-image: url('<?php echo base_url() ?>assets/img/loader.gif');
                  background-repeat: no-repeat;
                  background-position: center;
                  min-height: 50px;
                ">
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>