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
                                        <?php if($this->session->flashdata('success')): ?>
                                        <div class="alert alert-success" role="alert" id="alertBlock"><?= $this->session->flashdata('success') ?></div>
                                        <?php endif; ?>

                                        <?php if($this->session->flashdata('error')): ?>
                                        <div class="alert alert-danger" role="alert" id="alertBlock"><?= $this->session->flashdata('error') ?></div>
                                        <?php endif; ?>

                                        <form method="post" id="passwordForm">
                                            <input type="hidden" name="user_id" value="<?php echo authuser()->id; ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>New Passowd</label>
                                                        <input type="password" name="pass" class="form-control" required="" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Passowd</label>
                                                        <input type="password" name="new_pass" class="form-control" required="" >
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-sm btn-success" value="Update">
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

    $('#passwordForm').on('submit', function(e){
        e.preventDefault();

        var data = $(this).serializeArray();
        $.post('<?= base_url('auth/change_password') ?>',data,function(res){
                if(res.status == 'success'){
                  alert(res.response);
                  location.reload();
                }else{
                  alert(res.response);
                }
            });

    })

</script>