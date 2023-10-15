<!-- DataTables -->
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->

<script>
    $(document).ready(function() {
        table = $("#tabel_sertif").DataTable({
            responsive: true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],
    
            "ajax": {
              "url": "<?= base_url('pengunjung/listDataSertif') ?>",
              "type": "POST"
            },
    
            "columnDefs": [{
              "targets": [0],
              "orderable": false,
              "width": 5
            }],
        })
    });
    
    function refresh(){
        table.ajax.reload();
    }
</script>