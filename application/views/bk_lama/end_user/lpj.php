<div class="container marketing">
<div class="row">
    

<div class="col-md-12"> 
                    <h1 class="m-0 text-center"> LPJ Online HMPTI UDB</h1> 
</div>

<div class="col-md-12 pt-5">
    <div class="card p-2">
        <div class="card-header p-2 ">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item "><a class="nav-link active" href="#divisi" data-toggle="tab">Divisi</a></li>
                <li class="nav-item"><a class="nav-link" href="#progja" data-toggle="tab">Program Kerja</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body p-2">
            <div class="tab-content p-2">
                <div class="active  tab-pane" id="divisi">
                    <h2 class="text-center">Divisi</h2>
                    <div class="row divisi">
                         <?php foreach ($this->all_divisi as $key => $divisi): ?>
                            
                            <div class="col-md-4 align-center text-center p-2">
                                    <img  src="<?php echo base_url() ?>assets/img/<?php echo $this->website['image'] ?>"  width="200px" class="logo">
                                    <h4 class="mt-4"><?= $divisi['nama_divisi']; ?></h4>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="progja">
                    <h2 class="text-center">Program Kerja Tahun  </h2>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="triwulan1">
                               
                            </div>

                       
                        </div>
                        <!-- Tab -content -->
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

</div>
</div>