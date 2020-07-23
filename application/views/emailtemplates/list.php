<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-envelope-open-o"></i> Email Templates Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <?php if($message = $this->session->flashdata('success')){ ?>
            <div class="col-sm-12">
                <div class="alert alert-success" id="success-alert">
                <button class="close" data-dismiss="alert" type="button">×</button>
                    <?php echo $message; ?>
                <div class="alerts-con"></div>
                </div>
            </div>
            <?php } ?>
            <div class="col-xs-12">
                <div class="form-group">
                    <button class="btn btn-default btn-flat" data-clipboard-target="#foo">Copy</button>
                    <a class="btn btn-primary" style="float:right;" href="<?php echo base_url(); ?>emailtemplates/create"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body" id="foo">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Subject</th>
                                    <th>Body</th>
                                    <th>status</th>
                                    <th>Created On</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($data)){
                                    foreach($data as $record){ ?>
                                <tr>
                                    <td><?php echo $record->title ?></td>
                                    <td><?php echo $record->subject ?></td>
                                    <td><?php echo $record->body ?></td>
                                    <td><?php echo ($record->status == '1')?'Active':'InActive'; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="<?php echo base_url().'emailtemplates/edit/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-sm btn-danger deleteEmailtemplate" href="#" data-emailid="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php }
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/addemailtemplate.js" type="text/javascript"></script>
