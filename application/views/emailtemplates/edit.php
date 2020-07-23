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
                    <form role="form" id="editemailtemplate" action="<?php echo base_url() ?>editEmailTemplate" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" value="<?php echo $emailInfo->title; ?>" id="title" name="title" maxlength="128">
                                        <input type="hidden" value="<?php echo $emailInfo->id; ?>" name="emailId" id="emailId" />    
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="type">Email Template Type</label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="0">Select Template Type</option>
                                            <?php
                                            if(!empty($type))
                                            {
                                                foreach ($type as $value)
                                                {
                                                    ?>
                                                    <option value="<?php echo $value->id ?>" <?php if($value->id == $emailInfo->type_id) {echo "selected=selected";} ?>><?php echo $value->name ?></option>
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
                                        <select class="form-control" id="placeholder" name="placeholder">
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
                                        <input type="text" class="form-control" value="<?php echo $emailInfo->subject; ?>" id="subject" name="subject" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <textarea class="textarea" id="body" style="width: 82%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; margin-right:100%" name="body" ><?php echo $emailInfo->body; ?></textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="radio" value="1" <?php echo ($emailInfo->status == '1')?'checked':''; ?> id="status" name="status">Active
                                        <input type="radio" value="0" <?php echo ($emailInfo->status == '0')?'checked':''; ?>  id="status" name="status">InActive
                                    </div>
                                </div>   
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Update" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section> 
</div>
<script src="<?php echo base_url(); ?>assets/js/addemailtemplate.js" type="text/javascript"></script>