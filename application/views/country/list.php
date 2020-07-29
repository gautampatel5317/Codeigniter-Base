<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-flag"></i> Country Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <?php
            if($message = $this->session->flashdata('success')){
            ?>
            <div class="col-sm-12">
                <div class="alert alert-success" id="success-alert">
                <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $message; ?>
                <div class="alerts-con"></div>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>country/createCountry"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                    <table class="table table-bordered table-striped" id="mytable"> 
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Phone Code</th>
                                    <th>status</th>
                                    <th>Created On</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/country.js" type="text/javascript"></script>
<script type="text/javascript"> 
    $(document).ready(function() { 
        // Ajax Data Load
        var dataTable = $('#mytable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: baseURL + "country/getCountry",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
            },
            order: [],
            searchDelay: 500,
            dom: 'lBfrtip',
            buttons: {
                buttons: [{
                        extend: 'copy',className: 'copyButton',exportOptions: { columns: [0, 1, 2, 3] } },
                        { extend: 'csv',className: 'csvButton',exportOptions: { columns: [0, 1, 2, 3] } },
                        { extend: 'excel',className: 'excelButton',exportOptions: { columns: [0, 1, 2, 3] } },
                        { extend: 'pdf',className: 'pdfButton',exportOptions: { columns: [0, 1, 2, 3] } },
                        { extend: 'print',className: 'printButton',exportOptions: { columns: [0, 1, 2, 3] } 
                }]
            }
        });
    }); 
</script> 