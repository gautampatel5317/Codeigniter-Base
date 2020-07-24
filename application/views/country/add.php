<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-flag"></i> Country Management
        <small>Add / Edit Country</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Country Details</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addcountry" action="<?php echo base_url() ?>country/storeCountry" method="post" role="form">
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
                                        <label for="code">Code</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('code'); ?>" id="code" name="code">
                                    </div>
                                </div>
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="phone_code">Phone Code</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('phone_code'); ?>" id="phone_code" name="phone_code">
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
                            <a href="<?php echo base_url() ?>country"><input type="button" class="btn btn-default" value="Cancel" /></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
<script src="<?php echo base_url(); ?>assets/js/country.js" type="text/javascript"></script>