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
                                        Paper Test : <?php echo $ques[0]['QPaperName']; ?>
                                    </h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>General Instructions:</h4>
                                        <p class="text-danger">
                                            1. 15-minute prior reading time allotted for Q-paper reading.
                                        </p>
                                        <p class="text-danger">
                                            2. The Question Paper contains SIX Types Objective, HML, Multiple Choice, Ranking, Rating and Descriptive.
                                        </p>
                                        <p class="text-danger">
                                            3.  Attempt question based on specific instructions for each part.
                                        </p>
                                    </div>
                                </div>
                            <form method="post" action="<?php echo base_url('questions');?>">
                                <input type="hidden" name="QNo" value="<?php echo $ques[0]['QNo']; ?>">
                                <input type="hidden" name="QFor" value="<?php echo $ques[0]['QFor']; ?>">
                                <input type="hidden" name="EmailId" value="<?php echo $email; ?>">
                                <div class="row">
                                 <?php
                                $i=1;
                                foreach ($ques as $key) { 
                                    $QTyp = $key['QTyp'];
                                ?>
                                <input type="hidden" name="QTyp[<?php echo $key['QTyp']; ?>][]" value="<?php echo $key['QTyp']; ?>">
                                <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <p>
                                            Q.<?php echo $i++; ?>: <?php echo $key['Question']; ?> 
                                        </p>
                                        <!-- options -->
                                        <?php 
                                        if($key['QTyp'] == 1){
                                        foreach ($key['options'] as $opt) { 
                                        ?>

                                        <div class="radio my-2">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio<?php echo $opt['qono']; ?>" name="questions[<?php echo $key['QCd']; ?>][<?php echo $key['QTyp']; ?>][1][]" class="custom-control-input" value="<?php echo $opt['qono']; ?>" required>
                                                <label class="custom-control-label" for="customRadio<?php echo $opt['qono']; ?>"><?php echo $opt['opt1']; ?></label>
                                            </div>
                                        </div>
                                        <!-- multiple choice -->
                                    <?php }  }else if($key['QTyp'] == 3){
                                        foreach ($key['options'] as $opt) { 
                                        ?>
                                        <div class="checkbox my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck<?php echo $opt['qono']; ?>" data-parsley-multiple="groups" data-parsley-mincheck="2" name="questions[<?php echo $key['QCd']; ?>][<?php echo $key['QTyp']; ?>][1][]" value="<?php echo $opt['qono']; ?>" >
                                                <label class="custom-control-label" for="customCheck<?php echo $opt['qono']; ?>"><?php echo $opt['opt1']; ?></label>
                                            </div>
                                        </div>
                                        <!-- Ranking -->
                                    <?php } } else if($key['QTyp'] == 4){  
                                        foreach ($key['options'] as $opt) { 
                                        ?>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <?php echo $opt['opt1']; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control ranking<?php echo $key['QCd']; ?>" name="questions[<?php echo $key['QCd']; ?>][<?php echo $key['QTyp']; ?>][1][]" id="<?= uniqid()?>_<?php echo $key['QCd']; ?>" onchange='removevSelectVal(this,<?php echo $key['QCd']; ?>)' required>
                                                    <option value="">Choose</option>
                                                    <?php
                                                    for($j=1; $j<=count($key['options']); $j++) {
                                                    ?>
                                                    <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- descriptive -->
                                    <?php } } else if($key['QTyp'] == 5){ ?>
                                        <textarea class="form-control" name="questions[<?php echo $key['QCd']; ?>][<?php echo $key['QTyp']; ?>][1][]" required></textarea>
                                    <?php } else if($key['QTyp'] == 2){ 
                                        $hml = array('High' => 1, 'Medium' => 2, 'Low' => 3);
                                        foreach ($hml as $key1 => $value) {
                                        ?>
                                        <div class="radio my-2">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio<?php echo $key1.$i; ?>" name="questions[<?php echo $key['QCd']; ?>][<?php echo $key['QTyp']; ?>][1][]" class="custom-control-input" value="<?php echo $value; ?>" required>
                                                <label class="custom-control-label" for="customRadio<?php echo $key1.$i; ?>"><?php echo $key1; ?></label>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                    <?php } } else if($key['QTyp'] == 6){ ?>
                                        <select class="form-control col-md-3" name="questions[<?php echo $key['QCd']; ?>][<?php echo $key['QTyp']; ?>][1][]" required>
                                        <option>Choose Rating</option>
                                        <?php
                                        for ($rat=1; $rat <= $key['MaxRating'] ; $rat++) { 
                                        ?>
                                        <option value="<?php echo $rat; ?>"><?php echo $rat; ?></option>
                                        <?php } ?>
                                        </select>
                                        <!--  query HML -->
                                    <?php } else if($key['QTyp'] == 7){
                                        foreach ($do_subdomain as $opt) { 
                                        ?>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <?php echo $opt['SubDomain']; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control ranking<?php echo $key['QCd']; ?>" name="questions[<?php echo $key['QCd']; ?>][<?php echo $key['QTyp']; ?>][<?php echo $opt['SDCd']; ?>][]" id="<?= uniqid()?>_<?php echo $key['QCd']; ?>"  required>
                                                    <option value="">Choose</option>
                                                    <option value="1">High</option>
                                                    <option value="2">Medium</option>
                                                    <option value="3">Low</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- query Rating -->
                                    <?php } } else if($key['QTyp'] == 8){
                                        foreach ($do_subdomain as $opt) { ?>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <?php echo $opt['SubDomain']; ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control ranking<?php echo $key['QCd']; ?>" name="questions[<?php echo $key['QCd']; ?>][<?php echo $key['QTyp']; ?>][<?php echo $opt['SDCd']; ?>][]" id="<?= uniqid()?>_<?php echo $key['QCd']; ?>"  required>
                                                        <option value="">Choose</option>
                                                        <?php
                                                        for($j=1; $j<=$key['MaxRating']; $j++) {
                                                        ?>
                                                        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        <?php } } ?>
                                    </div>
                                </div>
                                </div>
                                <?php } ?>

                                </div> 
                            <input type="submit" class="btn btn-success float-right mb-3" value="Submit">
                            </form>
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