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
                        
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="">
                                            <div class="form-group">
                                                <label for="">Brief Background</label>
                                                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Problem Definition</label>
                                                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Solution Exected</label>
                                                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Result Exected</label>
                                                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                            </div>

                                            <input type="submit" class="btn btn-sm btn-success" value="Submit">
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
   

</script>