
<?php 
$gen_info_id = isset($t_data['gen_info_id'])?$t_data['gen_info_id']:0;

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
                                        <form method="post" id="addTrainingForm" action="<?php echo base_url('training/addtraining'); ?>">

                                            <input type="hidden" name="gen_info_id" value="<?php echo $gen_info_id; ?>">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Company</label>
                                                        <select name="company" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" required="" id="company">
                                                            <option value="">Choose</option>
                                                            <?php
                                                            if(!empty($company)){
                                                                foreach ($company as $key) {
                                                             ?>
                                                            <option value="<?php echo $key['CompCd'];?>" <?php if(isset($t_data['company']) && $t_data['company'] == $key['CompCd']){ echo 'selected'; } ?>><?php echo $key['Name'];?></option>
                                                        <?php }  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select name="country" class="form-control" required="" id="country">
                                                            <option value="">Choose</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Location / City</label>
                                                        <select name="location" class="form-control" required="" id="city">
                                                            <option value="">Choose</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Preffered location</label>
        <input type="text" name="preffered_location" class="form-control" required="" value="<?php  echo isset($t_data['preffered_location'])? $t_data['preffered_location'] : '';?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Industry</label>
                                                        <select name="industry" class="form-control" required="" id="industry">
                                                            <option value="">Choose</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Sector</label>
                                                        <select name="sector" class="form-control" required="" id="sector">
                                                            <option value="">Choose</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Domain</label>
                                                        <select name="domain" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" required="" id="domain">
                                                            <option value="">Choose</option>
                                                            <?php
                                                            if(!empty($domain)){
                                                                foreach ($domain as $key) {
                                                             ?>
                                                            <option value="<?php echo $key['DCd'];?>" <?php if(isset($t_data['domain']) && $t_data['domain'] == $key['DCd']){ echo 'selected'; } ?>><?php echo $key['Domain'];?></option>
                                                        <?php }  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Sub domain</label>
                                                        <select name="sub_domain" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" required="" id="sub_domain">
                                                            <option value="">Choose</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Group Size</label>
                                                        <input type="number" name="group_size" class="form-control" required="" value="<?php  echo isset($t_data['group_size'])? $t_data['group_size'] : '';?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Group Level</label>
                                                        <select name="group_level" class="form-control" required="">
                                                            <option value="">Choose</option>
                                                            <?php
                                                            if(!empty($groups)){
                                                                foreach ($groups as $key) {
                                                             ?>
                                                            <option value="<?php echo $key['level_id'];?>" <?php if(isset($t_data['group_level']) && $t_data['group_level'] == $key['level_id']){ echo 'selected'; } ?>><?php echo $key['level_name'];?></option>
                                                        <?php }  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Topics to be covered</label>
                                                        <input type="text" name="topics_to_be_covered" class="form-control" required="" value="<?php  echo isset($t_data['topics_to_be_covered'])? $t_data['topics_to_be_covered'] : '';?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Preffered no of days</label>
                                                        <input type="number" name="preffered_no_of_days" class="form-control" required="" value="<?php  echo isset($t_data['preffered_no_of_days'])? $t_data['preffered_no_of_days'] : '';?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Preffered hours</label>
                                                        <input type="number" name="preffered_hours" class="form-control" required="" value="<?php  echo isset($t_data['preffered_hours'])? $t_data['preffered_hours'] : '';?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Training Type</label>
                                                        <select name="type[]" class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" required="" id="type">
                                                            <option value="">Choose</option>
                                                            <?php
                                                $type = isset($t_data['type'])? json_decode($t_data['type']): array();
                                                            if(!empty($training_type)){
                                                                foreach ($training_type as $key) {
                                                             ?>
                                                            <option value="<?php echo $key['tt_id'];?>" <?php if(in_array($key['tt_id'], $type)){ echo 'selected'; } ?>><?php echo $key['tt_name'];?></option>
                                                        <?php }  } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>University</label>
                                                        <input type="text" name="university" class="form-control" value="<?php  echo isset($t_data['university'])? $t_data['university'] : '';?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Course </label>
                                                        <input type="text" name="course" class="form-control" value="<?php  echo isset($t_data['course'])? $t_data['course'] : '';?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if(!isset($t_data['gen_info_id'])) {
                                            ?>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <?php } ?>
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
        $('#company, #domain, #sub_domain, #type').select2();

        var company_id = "<?php echo isset($t_data['company'])?$t_data['company']:''; ?>";
        if(company_id){
            getCompany(company_id);
        }

        var domain = "<?php echo isset($t_data['domain'])?$t_data['domain']:''; ?>";
        if(domain){
            getDomain(domain);
        }
    });

    $('#domain').on('change', function(e){
        e.preventDefault();

        var domain = $(this).val();
        // console.log(country);
        if(domain){
            getDomain(domain);
        }
    });

    function getDomain(domain){
        $("#sub_domain").empty();
        $.post('<?= base_url('Training/get_subdomain') ?>',{domain:domain},function(res){
                if(res.status == 'success'){
                  // alert(res.response);
                  var data = res.response;
                  $temp = '<option value="">Choose</option>';
                        for ($i = 0; $i < data.length; $i++) {   
                            $temp +="<option value=\""+data[$i]['SDCd']+"\">"+data[$i]['SubDomain']+"</option>";
                        }   
                        $('#sub_domain').html($temp);
                        var sub_domain = "<?php echo isset($t_data['sub_domain'])?$t_data['sub_domain']:''; ?>";
                        if(sub_domain !=''){
                            $('#sub_domain option[value="'+sub_domain+'"]').prop('selected', true);
                        }
                }else{
                  alert(res.response);
                }
            });   
    }

    $('#company').on('change', function(e){
        e.preventDefault();

        var company_id = $(this).val();
        if(company_id){
            getCompany(company_id);
        }
    });

    function getCompany(company_id){
        $("#country").empty();
        $("#city").empty();
        $("#industry").empty();
        $("#sector").empty();
        $.post('<?= base_url('Training/get_company_details') ?>',{company_id:company_id},function(res){
            if(res.status == 'success'){
              var val = res.response;
              
              $('#country').html("<option value=\""+val['HOCountryCd']+"\">"+val['country_name']+"</option>");
              $('#city').html("<option value=\""+val['HOCityCd']+"\">"+val['city_name']+"</option>");
              $('#industry').html("<option value=\""+val['industry']+"\">"+val['insName']+"</option>");
              $('#sector').html("<option value=\""+val['sector']+"\">"+val['secName']+"</option>");
              
            }else{
              alert(res.response);
            }

            });
    }

    

    $('#addForm').on('submit', function(e){
        e.preventDefault();

        var data = $(this).serializeArray();
        $.post('<?= base_url('Company') ?>',data,function(res){
                if(res.status == 'success'){
                  alert(res.response);
                  location.reload();
                }else{
                  alert(res.response);
                }
            });

    })


</script>