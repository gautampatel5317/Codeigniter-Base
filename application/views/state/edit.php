<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-envelope-open-o"></i> State Management
        <small>Add / Edit State</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Update State Details</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="editstate" action="<?php echo base_url() ?>state/updateState" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $stateInfo->name; ?>" id="name" name="name">
                                        <input type="hidden" value="<?php echo $stateInfo->id; ?>" name="stateId" id="stateId" />
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="type">Country</label>
                                        <select class="form-control" id="country_id" name="country_id">
                                            <option value="0">Select Country</option>
                                            <?php
                                            if(!empty($country)){
                                                foreach ($country as $value){?>
                                                    <option value="<?php echo $value->id ?>" <?php if($value->id == $stateInfo->country_id) {echo "selected=selected";} ?>><?php echo $value->name ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>  
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="radio" value="1" id="status" name="status" <?php if($stateInfo->status == '1') {echo "checked";} ?>>Active
                                        <input type="radio" value="0" id="status" name="status" <?php if($stateInfo->status == '0') {echo "checked";} ?>>InActive
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Update" />
                            <a href="<?php echo base_url() ?>country"><input type="button" class="btn btn-default" value="Cancel" /></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>  
</div>
<script src="<?php echo base_url(); ?>assets/js/state.js" type="text/javascript"></script>