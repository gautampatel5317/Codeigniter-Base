<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-envelope-open-o"></i> Email Template Management
        <small>Add / Edit Email Template</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Email Template Details</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addemailtemplate" action="<?php echo base_url() ?>emailtemplates/store" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('title'); ?>" id="title" name="title" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="type">Email Template Type <span class="text-danger">*</span></label>
                                        <select class="form-control required" id="type" name="type">
                                            <option value="0">Select Template Type</option>
                                            <?php
                                            if(!empty($type)){
                                                foreach ($type as $value){?>
                                                    <option value="<?php echo $value->id ?>" <?php if($value->id == set_value('type')) {echo "selected=selected";} ?>><?php echo $value->name ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>    
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="placeholder">Placeholder <span class="text-danger">*</span></label>
                                        <select class="form-control required" id="placeholder" name="placeholder">
                                            <option value="0">Select Placeholdere</option>
                                            <?php
                                            if(!empty($placeholder)){
                                                foreach ($placeholder as $values){?>
                                                    <option value="<?php echo $values->id ?>" <?php if($values->id == set_value('placeholder')) {echo "selected=selected";} ?>><?php echo $values->name ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="subject">Subject <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('subject'); ?>" id="subject" name="subject" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="body">Body <span class="text-danger">*</span></label>
                                        <textarea class="textarea" id="body" style="width: 82%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; margin-right:100%" name="body" value="<?php echo set_value('body'); ?>"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="radio" value="1" id="status" name="status" checked>Active
                                        <input type="radio" value="0" id="status" name="status">InActive
                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <a href="<?php echo base_url() ?>emailtemplates"><input type="button" class="btn btn-default" value="Cancel" /></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/addemailtemplate.js" type="text/javascript"></script>