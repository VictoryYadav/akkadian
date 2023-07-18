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
                                      
                                    </h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Training Info</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="mt-3"><?php echo $training['CourseName']; ?></h5>
                                                <p class="text-muted font-12">Course</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-3"><?php echo $training['insName']; ?></h5>
                                                <p class="text-muted font-12">Industry</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-3"><?php echo $training['secName']; ?></h5>
                                                <p class="text-muted font-12">Sector</p>
                                            </div>

                                            <div class="col-md-6">
                                                <h5 class="mt-3"><?php echo date('d-M-Y',strtotime($training['training_date'])); ?></h5>
                                                <p class="text-muted font-12">Training Date</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-3"><?php echo date('d-M-Y',strtotime($training['created_time'])); ?></h5>
                                                <p class="text-muted font-12">Date</p>
                                            </div>

                                        </div>                                   
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Company Info</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="mt-3"><?php echo $training['companyName']; ?></h5>
                                                <p class="text-muted font-12">Company</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-3"><?php echo $training['country_name']; ?></h5>
                                                <p class="text-muted font-12">Country</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mt-3"><?php echo $training['city_name']; ?></h5>
                                                <p class="text-muted font-12">City</p>
                                            </div>
                                            
                                        </div>                                   
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        
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


</script>