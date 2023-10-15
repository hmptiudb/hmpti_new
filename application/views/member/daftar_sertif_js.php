<!-- DataTables -->
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->

<script>
    $(document).ready(function() {
        table = $("#daftar").DataTable({
            responsive: true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],
    
            "ajax": {
              "url": "<?= base_url('admin/event/listDataSertif') ?>",
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