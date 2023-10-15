<!-- Marketing messaging and featurettes
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="visi-body">
  <div class="about row">
    <div class="col-md-4 text-center">
      <img width="100%" src="<?php echo base_url() ?>assets/img/<?php echo $this->website['image'] ?>" class="img-visi-misi">
    </div>
    <div class="col-md-8">
      <h2 class="display-3">Tentang Kami</h2>
      <p class="lead" style="padding:0px"><?php echo $tentang_kami ?></p>
    </div>
  </div> <!-- /.about -->

  <hr class="garis-putih-vision">

  <!-- START THE FEATURETTES -->

  <div class="row featurette">
    <div class="col-md-8">
      <h2 class="display-3">Visi</h2>
      <p class="lead" style="padding:0px"><?php echo $visi ?></p>
    </div>
    <div class="col-md-4 text-center">
      <img class="img-visi-misi missing" src="<?php echo base_url() ?>assets/img/visi.png">
    </div>
  </div>

  <hr class="garis-putih-vision">

  <div class="row featurette">
    <div class="col-md-8 order-md-2">
      <h2 class="display-3">Misi</h2>
      <p class="lead" style="padding:0px"><?php echo $misi ?></p>
    </div>
    <div class="col-md-4 order-md-1 text-center">
      <img class="img-visi-misi missing" src="<?php echo base_url() ?>assets/img/misi.png">
    </div>
  </div>

  <!-- /END THE FEATURETTES -->

</div><!-- /.container -->