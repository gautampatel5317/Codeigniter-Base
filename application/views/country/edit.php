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
                        <h3 class="box-title">Update Country Details</h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="editcountry" action="<?php echo base_url() ?>country/updateCountry" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $countryInfo->name; ?>" id="name" name="name">
                                        <input type="hidden" value="<?php echo $countryInfo->id; ?>" name="countryId" id="countryId" />
                                    </div>
                                </div>
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input type="text" class="form-control required" value="<?php echo $countryInfo->code; ?>" id="code" name="code">
                                    </div>
                                </div>
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="phone_code">Phone Code</label>
                                        <input type="text" class="form-control required" value="<?php echo $countryInfo->phone_code; ?>" id="phone_code" name="phone_code">
                                    </div>
                                </div>
                                <div class="col-lg-10">                                
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="radio" value="1" <?php echo ($countryInfo->status == '1')?'checked':''; ?> id="status" name="status">Active
                                        <input type="radio" value="0" <?php echo ($countryInfo->status == '0')?'checked':''; ?>  id="status" name="status">InActive
                                    </div>
                                </div>   
                            </div>
                        </div><!-- /.box-body -->
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
<script src="<?php echo base_url(); ?>assets/js/country.js" type="text/javascript"></script>