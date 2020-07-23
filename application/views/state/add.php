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
                        <h3 class="box-title">Enter State Details</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addstate" action="<?php echo base_url() ?>state/storeState" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('name'); ?>" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="type">Country</label>
                                        <select class="form-control required" id="country_id" name="country_id">
                                            <option value="0">Select Country</option>
                                            <?php
                                            if(!empty($country)){
                                                foreach ($country as $value){
                                                    ?>
                                                    <option value="<?php echo $value->id ?>" <?php if($value->id == set_value('country_id')) {echo "selected=selected";} ?>><?php echo $value->name ?></option>
                                                <?php }
                                            }?>
                                        </select>
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
                            <a href="<?php echo base_url() ?>state"><input type="button" class="btn btn-default" value="Cancel" /></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>   
</div>
<script src="<?php echo base_url(); ?>assets/js/state.js" type="text/javascript"></script>