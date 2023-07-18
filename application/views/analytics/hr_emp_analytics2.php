<?php $this->load->view('layouts/admin/head'); ?>
<style type="text/css">
 
 .container1{
  width: 500px;
  height: 400px;
  overflow: hidden;
  position: relative;
  /*margin:50px auto;*/
  bottom: -50px;
}

.barcontainer{
  background-color: #181818;
  position: relative;
  transform: translateY(-50%);
  top: 50%;
  margin-left: 2px; /* set margin for progress bar*/
  width: 20px;
  height: 320px;
  float: left;
  //border darken(#98AFC7, 40%) 3px solid
}
  
.bar{
  /*background-color: #9BC9C7;*/
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 80%;
  //border-top: 6px solid #FFF;
  box-sizing: border-box;
  animation: grow 1.5s ease-out forwards;
  transform-origin: bottom;
}
@keyframes grow{
  from{
    transform: scaleY(0);
  }
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
                                    <h4 class="mb-0 font-size-18">
                                        <?php echo $title; ?>
                                    </h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex flex-row" style="margin-top: -55px;">
                                        <?php 
                                        foreach ($subdomain as $row ) {

                                        ?>
                                          <div class="p-2" style="width: 142px;">
                                              <div class="container1">
                                                  <div class="barcontainer" title="<?php echo $row[0]['sub_domain']; ?> : <?php echo $row[0]['avg']; ?>" data-toggle="tooltip" data-placement="right">
                                                    <div class="bar"style="height:<?php echo $row[0]['avg'] * 10; ?>%;color:white;background: green;"><?php echo $row[0]['avg']; ?>
                                                    </div>
                                                  </div>

                                                  <div class="barcontainer" title="<?php echo $row[1]['sub_domain']; ?> : <?php echo $row[1]['avg']; ?>" data-toggle="tooltip" data-placement="right">
                                                    <div class="bar"style="height:<?php echo $row[1]['avg'] * 10; ?>%;color:white;background: #488d48;"><?php echo $row[1]['avg']; ?>
                                                    </div>
                                                  </div>

                                                  <div class="barcontainer" title="<?php echo $row[2]['sub_domain']; ?> : <?php echo $row[2]['avg']; ?>" data-toggle="tooltip" data-placement="right">
                                                    <div class="bar"style="height:<?php echo $row[2]['avg'] * 10; ?>%;color:white;background: #7ab57a;"><?php echo $row[2]['avg']; ?>
                                                    </div>
                                                  </div>

                                                  <div class="barcontainer" title="<?php echo $row[3]['sub_domain']; ?> : <?php echo $row[3]['avg']; ?>" data-toggle="tooltip" data-placement="right">
                                                    <div class="bar "style="height:<?php echo $row[3]['avg'] * 10; ?>%;color:white;background: #e13737;"><?php echo $row[3]['avg']; ?>
                                                    </div>
                                                  </div>

                                                  <div class="barcontainer" title="<?php echo $row[4]['sub_domain']; ?> : <?php echo $row[4]['avg']; ?>" data-toggle="tooltip" data-placement="right">
                                                    <div class="bar bg-danger"style="height:<?php echo $row[4]['avg'] * 10; ?>%;color:white;"><?php echo $row[4]['avg']; ?>
                                                    </div>
                                                  </div>

                                                  <div class="barcontainer" title="<?php echo $row[5]['sub_domain']; ?> : <?php echo $row[5]['avg']; ?>" data-toggle="tooltip" data-placement="right">
                                                    <div class="bar"style="height:<?php echo $row[5]['avg'] * 10; ?>%;color:white;background: #d77a7a;"><?php echo $row[5]['avg']; ?>
                                                    </div>
                                                  </div>

                                                  
                                                  
                                                </div>
                                                <p class="mt-2 pl-2"><?php echo $row['domain']; ?></p>
                                          </div>
                                          <?php } ?>
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


<script>

</script>