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
                                        <?php
                                        if(in_array(authuser()->role, array(5,6))){ ?>
                                            <a class="btn btn-sm btn-primary" href="<?php echo base_url('course/add_course')?>" title="add new course">
                                            <i class="fa fa-plus"></i>
                                        </a>

                                        <?php } else { ?>
                                        
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('course')?>">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    <?php } ?>
                                    </h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4 align-self-center">
                                                <div class="icon-info">
                                                    <i class="mdi mdi-diamond text-warning"></i>
                                                </div> 
                                            </div>
                                            <div class="col-8 align-self-center text-center">
                                                <div class="ml-2 text-right">
                                                    <p class="mb-1 text-muted font-size-13">Projects</p>
                                                    <h4 class="mt-0 mb-1 font-20">35</h4>                           
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar progress-animated  bg-warning" role="progressbar" style="max-width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4 align-self-center">
                                                <div class="icon-info">
                                                    <i class="mdi mdi-account-multiple text-purple"></i>
                                                </div> 
                                            </div>
                                            <div class="col-8 align-self-center text-center">
                                                <div class="ml-2 text-right">
                                                    <p class="mb-1 text-muted font-size-13">Member</p>
                                                    <h4 class="mt-0 mb-1 font-20">12</h4>                                                                                                                                           
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar progress-animated  bg-purple" role="progressbar" style="max-width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>                                        
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4 align-self-center">
                                                <div class="icon-info">
                                                    <i class="mdi mdi-playlist-check text-success"></i>
                                                </div> 
                                            </div>
                                            <div class="col-8 align-self-center text-center">
                                                <div class="ml-2 text-right">
                                                    <p class="mb-0 text-muted font-size-13">Tasks</p>
                                                    <span class="mt-0 font-20"><strong>40</strong></span>
                                                    <span class="badge badge-soft-success mt-1 shadow-none">Active</span>                                                                                                                                     
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar progress-animated  bg-success" role="progressbar" style="max-width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4 col-4 align-self-center">
                                                <div class="icon-info">
                                                    <i class="mdi mdi-coin text-pink"></i>
                                                </div> 
                                            </div>
                                            <div class="col-sm-8 col-8 align-self-center text-center">
                                                <div class="ml-2 text-right">
                                                    <p class="mb-1 text-muted font-size-13">Budget</p>
                                                    <h4 class="mt-0 mb-1 font-20">$18090</h4>                                                                                                                                           
                                                </div>
                                            </div>                    
                                        </div>
                                        <div class="progress mt-2" style="height:3px;">
                                            <div class="progress-bar progress-animated  bg-pink" role="progressbar" style="max-width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
 -->
                        <div class="row">
                        
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php if($this->session->flashdata('success')): ?>
                                        <div class="alert alert-success" role="alert" id="alertBlock"><?= $this->session->flashdata('success') ?></div>
                                        <?php endif; ?>
                                        <div class="table-responsive">
                                            <table id="training_table" class="table table-bordered">
                                                <thead>
                                                <tr>
                                        <?php if(authuser()->role < 5 || authuser()->role >= 9){ ?>
                                                    <th>Trainer</th>
                                        <?php } if(in_array(authuser()->role, array(5,6)) || authuser()->role >= 9 ){ ?>
                                                    <th>Company</th>
                                                <?php } ?>
                                                    <th>Course Name</th>
                                                    <th style="width: 70px;">Date</th>
                                                    <th>Type</th>
                                                    <th>Language</th>
                                                    <th>G.Size</th>
                                                    <!-- <th>Rating</th> -->
                                                    <!-- <th>Status</th> -->
                                                    <th style="width: 100px;">Action</th>
                                                </tr>
                                                </thead>
            
                                                <tbody>
                                                    <?php
                                                    if(!empty($training)){
                                                        foreach ($training as $key) {
                                                            $val = 'Short Listed';
                                                            $sts = 'warning';
                                                            if($key['stat'] ==1){
                                                                $sts = 'primary';
                                                                $val = 'Training Done';
                                                            }
                                                     ?>
                                                    
                                                <tr>
                                                    <?php if(authuser()->role < 5 || authuser()->role >= 9){ ?>
                                                    <td><?php echo $key['Name']; ?></td>
                                        <?php } if(in_array(authuser()->role, array(5,6)) || authuser()->role >= 9 ){ ?>
                                                    <td><?php echo $key['Name']; ?></td>
                                                <?php } ?>

                                                    
                                                    <td>
                                                        <a href="<?php echo base_url('course/customize/'.$key['CourseId']); ?>" target="_blank">
                                                        <?php echo $key['CourseName']; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo date('d-M-Y',strtotime($key['training_date'])); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('enrollment'); ?>" target="_blank">
                                                            <?php echo $key['tt_name']; ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <!-- <a href="<?php echo base_url('uploads/'.$key['link_file_path']); ?>" target="_blank"> -->
                                                            <a href="<?php echo base_url('uploads/pdf/6-Leadership-1.pdf'); ?>" target="_blank">

                                                        <?php echo $key['lang_name']; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $key['group_size']; ?></td>
                                                    <!-- <td>0</td> -->
                                                    <!-- <td><span class="badge badge-boxed  badge-<?php echo $sts; ?>"><?php echo $val; ?></span></td> -->
                                                    <th>
                                                        <a class="btn btn-sm btn-success" href="<?php echo base_url('training/detail/'.$key['training_no']); ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </a> 
                                                        <a class="btn btn-sm btn-info" href="#">
                                                            <i class="fa fa-edit"></i>
                                                        </a> 
                                                        <!-- <a class="btn btn-sm btn-info" href="<?php echo base_url('training/addtraining/'.$key['training_no']); ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </a>  -->
                                                        <a class="btn btn-sm btn-danger" href="" onclick="delTraining(<?php echo $key['training_no']; ?>)">
                                                            <i class="fa fa-trash"></i>
                                                        </a>  
                                                    </th>
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
        $('#training_table').DataTable();
    });

    function delTraining(tid){
      var result = confirm("Are you sure to want delete?");
      if (result==true) {
       $.post('<?= base_url('Training/del_training') ?>',{tid:tid},function(res){
            if(res.status == 'success'){
              alert(res.response);
              location.reload();
            }else{
              alert(res.response);
            }
        });
      }
    }

</script>