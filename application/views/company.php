<?php $this->load->view('layouts/admin/head'); ?>
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
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('company/add_company'); ?>">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                        
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php if($this->session->flashdata('success')): ?>
                                        <div class="alert alert-success" role="alert" id="alertBlock"><?= $this->session->flashdata('success') ?></div>
                                        <?php endif; ?>

                                        <div class="table-responsive">
                                            <table id="company_table" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Company</th>
                                                    <th>Country</th>
                                                    <th>City</th>
                                                    <th>Industry</th>
                                                    <th>Sector</th>
                                                    <th>Sr Headd Name</th>
                                                    <th>Senior Email</th>
                                                    <th style="width: 81px;">Action</th>
                                                </tr>
                                                </thead>
            
                                                <tbody>
                                                    <?php
                                                    if(!empty($companies)){
                                                        foreach ($companies as $key) {
                                                     ?>
                                                    
                                                <tr>
                                                    <td><?php echo $key['Name']; ?></td>
                                                    <td><?php echo $key['country_name']; ?></td>
                                                    <td><?php echo $key['city_name']; ?></td>
                                                    <td><?php echo $key['insName']; ?></td>
                                                    <td><?php echo $key['secName']; ?></td>
                                                    <td><?php echo $key['senior_head_name']; ?></td>
                                                    <td><?php echo $key['senior_email']; ?></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success">
                                                            <i class="fas fa-eye"></i>
                                                        </button> 
                                                        <a class="btn btn-sm btn-info" href="<?php echo base_url('company/add_company/'.$key['Comp_no']); ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </a> 
                                                        <button class="btn btn-sm btn-danger" onclick="delCompany(<?php echo $key['Comp_no']; ?>)">
                                                            <i class="fa fa-trash"></i>
                                                        </button>  
                                                    </td>
                                                </tr>
                                                <?php }
                                                 }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
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
        $('#country, #city').select2();
        $('#company_table').DataTable();
    });

    $('#country').on('change', function(e){
        e.preventDefault();

        var country = $(this).val();
        // console.log(country);
        $("#city").empty();
        $.post('<?= base_url('Company/getCities') ?>',{country:country},function(res){
                if(res.status == 'success'){
                  // alert(res.response);
                  var data = res.response;
                  $temp = [];
                        for ($i = 0; $i < data.length; $i++) {   
                            // console.log(data[$i]['topicName']);
                            $temp.push("<option value=\""+data[$i]['city_id']+"\">"+data[$i]['city_name']+"</option>");
                        }   
                        $('#city').html($temp);
                }else{
                  alert(res.response);
                }
            });
    });

    function delCompany(cid){
      var result = confirm("Are you sure to want delete?");
      if (result==true) {
       $.post('<?= base_url('company/del_company') ?>',{cid:cid},function(res){
            if(res.status == 'success'){
              alert(res.response);
              location.reload();
            }else{
              alert(res.response);
            }
        });
      }
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