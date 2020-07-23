<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-flag"></i> State Management
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
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>state/createState"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">State List</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Country Name</th>
                                    <th>status</th>
                                    <th>Created On</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($data))
                                {
                                    foreach($data as $record)
                                    {
                                ?>
                                <tr>
                                    <td><?php echo $record->name ?></td>
                                    <td><?php echo $record->country_name ?></td>
                                    <td><?php echo ($record->status == '1')?'Active':'InActive'; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-info" href="<?php echo base_url().'state/editState/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-sm btn-danger deleteState" href="#" data-stateid="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/state.js" type="text/javascript"></script>