<!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="col-sm-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> LPJ </h3>
            <div class="card-tools m-1">
                <button type="button" class="btn btn-tool btn-primary box-solid tomboltambah" data-toggle="modal" data-target="#modaltambah">
                    <i class=" fas fa-plus mt-2"></i>
                    Tambah
                </button>
            </div>

        </div>

        <!-- Card -->
        <div class="card-body p-0 justify-content-center text-center">
            <table id="example2" class="table table-bordered table-hover">
      
              <thead>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>NoHP</th>
                <th>Fomulir</th>
                <th>CV</th>
                <th>KRS</th>
                <th>Control</th>
              </tr>
              </thead>
              <tbody class="viewdata">
                  
                  
                 
              </tbody>
            </table>
        </div>
    </div>
</div>

<div class="viewmodal" style="display: none;"></div>

<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>

<script>
    function datamahasiswa() {
        $.ajax({
            type  : 'GET',
            url: "<?= base_url('admin/lpj/ambildata') ?>",
            dataType: "json",
            success : function(data){
                    var html = '';
                    var i=1;
                    for(i=1; i<data.length; i++){
                        
                        html +=
                                
                                '<tr>'+
                                '<td>'+ i +'</td>'+
                                '<td>'+data[i].nim+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].kelas+'</td>'+
                                '<td>'+data[i].noHp+'</td>'+
                                '<td> <a class=" btn btn-outline-secondary" href="<?= base_url()?>admin/oprek/myPdfPage/' + data[i].formulir_pen +'" target="_blank"><i class="fas fa-clipboard-list"> </i></td>'+
                                '<td>'+data[i].cv+'</td>'+
                                '<td>'+data[i].krs+'</td>'+
                                '</tr>';
                    }
                    $('.viewdata').html(html);
                }
           
        });
    }
    // //fungsi tampil barang
        // function tampil_data_barang(){
        //     $.ajax({
        //         type  : 'GET',
        //         url: "<?= site_url('admin/lpj/ambildata') ?>",
        //         async : true,
        //         dataType : 'json',
        //         success : function(data){
        //             var html = '';
        //             var i;
        //             for(i=0; i<data.length; i++){
        //                 html += 
        //                 '<table id="example2" class="table table-bordered table-hover">' +
        //                 '<tr>'+
        //                         '<td>'+data[i].id_oprek+'</td>'+
                               
        //                         '<td style="text-align:right;">'+
        //                             '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id_oprek+'">Edit</a>'+' '+
        //                             '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id_oprek+'">Hapus</a>'+
        //                         '</td>'+
        //                         '</tr>' + 
        //                         '</table>'
        //                         ;
        //             }
        //             $('.viewdata').html(html);
        //         }
 
        //     });
        // }
        
    $(document).ready(function() {
        datamahasiswa().dataTables({
            responsive:true
        });

    

    })
</script>