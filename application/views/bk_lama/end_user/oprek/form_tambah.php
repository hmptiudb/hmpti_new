<!- Jofan File--->
    

    


<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
          
          <div class="modal-header d-flex justify-content-center">
            <h3 class="modal-title " id="exampleModalLongTitle">Pendaftaran Open Recruitment HMPTI</h3>
             <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
          </div>
          <div class="modal-header">
            <p class="modal-title " id="exampleModalLongTitle">Download File pendaftaran jika belum punya <a href="<?= base_url('p/downloadFile') ?>" >Download</a></p> 
            
          </div>
           <!--<div class="pesan" style="display: none;"></div>-->
          
        
          <!--  </div>-->
          <!--</center>-->
          
         <form class="form-horizontal" id="submit">
          <div class="modal-body">
                
            <div class="row" id="modalku">
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="name" required>
                </div>
                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" class="form-control" name="nim" id="nim" aria-describedby="nim" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" placeholder="Conth : TI22A1" name="kelas" id="kelas" required>
                </div>
                <div class="form-group">
                    <label for="noHp">No HP</label>
                    <input type="text" class="form-control" name="noHp" id="noHp" required>
                </div>
              </div>
            </div>
         
        <div class="form-group mt-3">
            <label for="formulir_pen">Upload File Pendaftaran</label><small  class="form-text text-muted">(File .pdf)</small>
            <div class="custom-file">
              <input name="formulir_pen" type="file" class="form-control " required>
            </div>
            
        </div>
        <div class="form-group mt-3">
            <label for="cv">Upload File CV</label><small  class="form-text text-muted">(File .pdf)</small>
            <div class="custom-file">
              <input name="cv" type="file" class="form-control " required>
            </div>
             
        </div>
        <div class="form-group mt-3">
            <label for="krs">Upload File KRS</label><small  class="form-text text-muted">(File .pdf)</small>
            <div class="custom-file">
              <input name="krs" type="file" class="form-control " required>
            </div>
             <small  class="form-text text-muted">Masukan KRS terbaru</small>
             
        </div>
            
          </div>
          <div class="modal-footer">
            <!--<button type="button" class="btn btn-secondary" >Close</button>-->
            <!--<button type="button" class="btn btn-secondary close" data-toggle="modal" data-target="#modaltambah">Close</button>-->
            
            <button type="submit" class="btn btn-primary btnUpload" >Kirim</button>
          </div>
            </form>
        </div>
  </div>
</div>
<script>
  $(document).ready(function() {
      
    
    
    $('#submit').submit(function(e) {
        e.preventDefault();
      $.ajax({
        // type: "POST",
        url: '<?= base_url('P/daftar') ?>',
        type:"post",
        data:new FormData(this),
        processData:false,
        contentType:false,
        cache:false,
        async:false,
        
        dataType: "json",
        success: function(response) {
          if (response.error) {
            Swal.fire(
              'Cek Lagi?',
              response.error,
              'error'
            )
          }

          if (response.sukses) {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: response.sukses
            });
            
            $('#modaltambah').modal('hide');
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });

    //   return false;
    });
  });
</script>