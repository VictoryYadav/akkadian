<?php 

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
                                        <h4>HML Analytics</h4>
                                        <hr>
                                        
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th >Domain</th>
                                                <th >Low</th>
                                                <th >Medium</th>
                                                <th >High</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Low</td>
                                                <td style="background-color: <?php if(!empty($ll)){?>red<?php }?>">Total Question: <?= sizeof($ll)?></td>
                                                <td style="background-color: <?php if(!empty($lm)){?>yellow<?php }?>">Total Question: <?= sizeof($lm)?></td>
                                                <td style="background-color: <?php if(!empty($lh)){?>green<?php }?>">Total Question: <?= sizeof($lh)?></td>
                                            </tr>
                                            <tr>
                                                <td>Medium</td>
                                                <td style="background-color: <?php if(!empty($ml)){?>yellow<?php }?>">Total Question: <?= sizeof($ml)?></td>
                                                <td style="background-color: <?php if(!empty($mm)){?>red<?php }?>">Total Question: <?= sizeof($mm)?></td>
                                                <td style="background-color: <?php if(!empty($mh)){?>yellow<?php }?>">Total Question: <?= sizeof($mh)?></td>
                                            </tr>
                                            <tr>
                                                <td>High</td>
                                                <td style="background-color: <?php if(!empty($hl)){?>green<?php }?>">Total Question: <?= sizeof($hl)?></td>
                                                <td style="background-color: <?php if(!empty($hm)){?>yellow<?php }?>">Total Question: <?= sizeof($hm)?></td>
                                                <td style="background-color: <?php if(!empty($hh)){?>red<?php }?>">Total Question: <?= sizeof($hh)?></td>
                                            </tr>
                                        </tbody>
                                    </table>

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
    function removevSelectVal(el, idd){

        var vall = el.value;
        var id = el.id;
        // console.log(el+' val-'+vall+'-id-'+id);
        $('.ranking'+idd+' option[value ='+vall+']').remove();
        $('#'+id).append('<option value="'+vall+'">'+vall+'</option>');
        $('#'+id).val(vall);
    }

</script>