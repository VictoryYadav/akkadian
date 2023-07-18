
<?php 
$Comp_no = isset($c_data['Comp_no'])?$c_data['Comp_no']:0;

$this->load->view('layouts/admin/head'); ?>
<style type="text/css">
    .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;
    background: #21253e;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #21253e;
    border-radius: 4px;
}

.select2-container--default .select2-selection--multiple {
    background-color: #21253e;
    border: 1px solid #21253e;
    border-radius: 4px;
    cursor: text;
}

</style>
        <?php $this->load->view('layouts/admin/top'); ?>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <?php $this->load->view('layouts/admin/sidebar'); ?>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18"><?php echo $title; ?>
                                    </h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                        
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post"  action="<?php echo base_url('company/add_company'); ?>">

                                            <input type="hidden" name="Comp_no" value="<?php echo $Comp_no; ?>">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Company</label>
                                                        <input type="text" name="Name" class="form-control" required="" value="<?php  echo isset($c_data['Name'])? $c_data['Name'] : '';?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select name="HOCountryCd" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" required="" id="country">
                                                            <option value="">Choose</option>
                                                            <?php
                                                            if(!empty($country)){
                                                                foreach ($country as $key) {
                                                             ?>
                                                            <option value="<?php echo $key['phone_code'];?>" <?php if(isset($c_data['HOCountryCd']) && $c_data['HOCountryCd'] == $key['phone_code']){ echo 'selected'; } ?> ><?php echo $key['country_name'];?></option>
                                                        <?php }  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <select name="HOCityCd" class="form-control" style="width: 100%; height:36px;" required="" id="city">
                                                            <option value="">Choose</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Industry</label>
                                                        <select name="industry" class="form-control" required="" id="industry">
                                                            <option value="">Choose</option>
                                                            <?php
                                                            if(!empty($industry)){
                                                                foreach ($industry as $key) {
                                                             ?>
                                                            <option value="<?php echo $key['MCd'];?>" <?php if(isset($c_data['industry']) && $c_data['industry'] == $key['MCd']){ echo 'selected'; } ?> ><?php echo $key['Name'];?></option>
                                                        <?php }  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sector</label>
                                                        <select name="sector" class="form-control" required="" id="sector">
                                                            <option value="">Choose</option>
                                                            <?php
                                                            if(!empty($sector)){
                                                                foreach ($sector as $key) {
                                                             ?>
                                                            <option value="<?php echo $key['MCd'];?>" <?php if(isset($c_data['sector']) && $c_data['sector'] == $key['MCd']){ echo 'selected'; } ?> ><?php echo $key['Name'];?></option>
                                                        <?php }  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Senior Head Name</label>
                                                                <input type="text" name="senior_head_name" class="form-control" required="" value="<?php  echo isset($c_data['senior_head_name'])? $c_data['senior_head_name'] : '';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Senior Email</label>
                                                                <input type="email" name="senior_email" class="form-control" required="" value="<?php  echo isset($c_data['senior_email'])? $c_data['senior_email'] : '';?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                
                                            </div>   
                                            <div class="text-center">                                         
                                            <?php
                                            if(!isset($c_data['Comp_no'])) {
                                            ?>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <?php } ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                                                                                             
                        </div><!--end row-->

                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php $this->load->view('layouts/admin/footer'); ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <?php $this->load->view('layouts/admin/color'); ?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        
        <?php $this->load->view('layouts/admin/script'); ?>


<script type="text/javascript">
    $(document).ready(function () {
        $('#country, #industry, #sector').select2();

        var country_id = "<?php echo isset($c_data['HOCountryCd'])?$c_data['HOCountryCd']:''; ?>";
        if(country_id){
            getCity(country_id); 
        }


        $("#city").find('option').each(function( i, opt ) {
    if( opt.value === 1 ) 
        $(opt).attr('selected', 'selected');
});

        
    });

    $('#country').on('change', function(e){
        e.preventDefault();

        var country = $(this).val();
        // console.log(country);
        getCity(country);        
    });

    function getCity(country){

        if(country){
            $("#city").empty();
            $.post('<?= base_url('Company/getCities') ?>',{country:country},function(res){
                if(res.status == 'success'){
                  // alert(res.response);
                  var data = res.response;
                  $temp = "<option value=''>Choose</option>";
                        for ($i = 0; $i < data.length; $i++) {   
                            // console.log(data[$i]['topicName']);
                            $temp +="<option value=\""+data[$i]['city_id']+"\">"+data[$i]['city_name']+"</option>";
                        }   
                        $('#city').html($temp);
                        var city_id = "<?php echo isset($c_data['HOCityCd'])?$c_data['HOCityCd']:''; ?>";
                        if(city_id !=''){
                            $('#city option[value="'+city_id+'"]').prop('selected', true);
                        }
                }else{
                  alert(res.response);
                }
            });
        }
    }




    $('#company').on('change', function(e){
        e.preventDefault();

        var company_id = $(this).val();
        if(company_id){
            getCompany(company_id);
        }
    });

</script>