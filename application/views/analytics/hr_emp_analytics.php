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
                                        <canvas id="myChart"></canvas>

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


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['LEADERSHIP', 'BEHAVIORAL', 'BUSINESS', 'KNOWLEDGE', 'STRUCTURAL', 'FUNCTIONAL','DEVELOPMENTAL'],
      datasets: <?php echo $subdomain_list; ?>
    },
    options: {
      scales: {
        // y: {
        //   beginAtZero: true
        // }
        y: {
                suggestedMin: 1,
                suggestedMax: 10

                // min: 1,
                // max: 10
                //  ticks: {
                //     stepSize: 0.5
                // }
            }
      }
      // ,
      // animation: true,
      //   plugins: {
      //     legend: {
      //       display: true
      //     },
      //     tooltip: {
      //       enabled: true
      //     }
      //   }

    }
  });
</script>