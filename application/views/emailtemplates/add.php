<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-envelope-open-o"></i> Email Template Management
        <small>Add / Edit Email Template</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Email Template Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addemailtemplate" action="<?php echo base_url() ?>store" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('title'); ?>" id="title" name="title" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="type">Email Template Type</label>
                                        <select class="form-control required" id="type" name="type">
                                            <option value="0">Select Template Type</option>
                                            <?php
                                            if(!empty($type))
                                            {
                                                foreach ($type as $value)
                                                {
                                                    ?>
                                                    <option value="<?php echo $value->id ?>" <?php if($value->id == set_value('type')) {echo "selected=selected";} ?>><?php echo $value->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>    
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="placeholder">Placeholder</label>
                                        <select class="form-control required" id="placeholder" name="placeholder">
                                            <option value="0">Select Placeholdere</option>
                                            <?php
                                            if(!empty($placeholder))
                                            {
                                                foreach ($placeholder as $values)
                                                {
                                                    ?>
                                                    <option value="<?php echo $values->id ?>" <?php if($values->id == set_value('placeholder')) {echo "selected=selected";} ?>><?php echo $values->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('subject'); ?>" id="subject" name="subject" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <textarea class="textarea" id="body" style="width: 82%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; margin-right:100%" name="body" value="<?php echo set_value('body'); ?>"></textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="checkbox" value="1" id="status" name="status" required>
                                    </div>
                                </div>   
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/addemailtemplate.js" type="text/javascript"></script>