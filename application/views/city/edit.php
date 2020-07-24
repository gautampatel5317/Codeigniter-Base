<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-building-o"></i> City Management
        <small>Add / Edit City</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Update City Details</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="editcity" action="<?php echo base_url() ?>city/updateCity" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $cityInfo->name; ?>" id="name" name="name">
                                        <input type="hidden" value="<?php echo $cityInfo->id; ?>" name="cityId" id="cityId" />
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="type">Country</label>
                                        <select class="form-control select2" id="country_id" name="country_id">
                                            <option value="0">Select Country</option>
                                            <?php
                                            if(!empty($country)){
                                                foreach ($country as $value){?>
                                                    <option value="<?php echo $value->id ?>" <?php if($value->id == $cityInfo->country_id) {echo "selected=selected";} ?>><?php echo $value->name ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="state_id">State</label>
                                        <span class="state_select" style="display: none;"><?php echo ($cityInfo->state_id != "" )? $cityInfo->state_id : "";?></span>
                                        <select class="form-control" id="state_id" name="state_id" >
                                            <option value="0">Select State</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="radio" value="1" id="status" name="status" <?php if($cityInfo->status == '1') {echo "checked";} ?>>Active
                                        <input type="radio" value="0" id="status" name="status" <?php if($cityInfo->status == '0') {echo "checked";} ?>>InActive
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Update" />
                            <a href="<?php echo base_url() ?>city"><input type="button" class="btn btn-default" value="Cancel" /></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>  
</div>
<script src="<?php echo base_url(); ?>assets/js/city.js" type="text/javascript"></script>