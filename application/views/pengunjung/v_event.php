
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <!-- /.col (LEFT) -->
          <div class="col-md-12">

            <!-- BAR CHART -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Event</h3>
              </div>
              <div class="card-body">
                 <!--validation_errors('<div class="bg-danger">', '</div>');-->
                    <!-- Three columns of text below the carousel -->
                       <div class="container">

        <!-- Three columns of text below the carousel -->
        <div class="row d-flex justify-content-center">
                    
                          <div class="col-12 mb-4">
                            <!--<h2 class="text-center mb-4 headline-event"><strong>Riwayat Event</strong></h2>-->
                            <!--<hr class="garis-bawah">-->
                            <h4 class="section-subheading text-muted text-center">Berikut ini adalah beberapa event yang telah dilaksanakan</h4>
                          </div>
                    
                      <?php foreach ($events as $key => $event): ?>
                        <div class="event text-start d-flex flex-column justify-content-center align-items-center" title="<?php echo substr( strip_tags($event['deskripsi']) , 0, 140) ?>...">
                          <div class="bd-placeholder-img mt-3 overflow-hidden" style="
                                  width: 275px;
                                  height: 320px;
                                  background: url('<?php echo base_url() ?>assets/img/events/<?php echo $event['thumbnail'] ?>');
                                  background-position: left bottom;
                                  background-size: cover;
                                  background-repeat: no-repeat;
                          " role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)">
                          </div>
            
                          <p class="mt-2 mx-2 h5" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)"><?php echo $event['judul'] ?></p>
                          <p class="mt-2 mx-2"><?php echo date( "d M Y, H:m", $event['jadwal'] ) . " WIB" ?></p>
                          <p class="countdown_wrapper mt-2 mx-2">Countdown: <span class="countdown" data-time="<?php echo date("M d, Y H:i:s", $event['jadwal']) ?>"></span> <i class="fa fa-circle text-danger blinking"></i></p>
                          <a class="btn shadow btn-success mb-3" style="width: 275px;" href="#" role="button" data-toggle="modal" data-target="#exampleModal" onclick="get_detail(<?php echo $event['id_event'] ?>)">Join now &raquo;</a>
                        </div><!-- /.event -->
                      <?php endforeach ?>
                      <?php if ( empty(count($events)) ): ?>
                        <div class="text-center text-muted">
                          <p>
                            <i>Coming soon....</i>
                          </p>  
                        </div>
                      <?php endif ?>
                      </div>
                      </div>
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