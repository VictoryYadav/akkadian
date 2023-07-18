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
                                        <div id="curve_chart" style="height: 500px"></div>

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


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $subdomain_list; ?>);

        // var data = google.visualization.arrayToDataTable([
        //   ['Domain', 'HR', 'Employee'],
        //   ['LEADERSHIP', 10,8],
        //   ['BEHAVIORAL', 8,3],
        //   ['BUSINESS', 2,4],
        //   ['KNOWLEDGE', 6,7],
        //   ['STRUCTURAL', 4,5],
        //   ['FUNCTIONAL', 4,6],
        //   ['DEVELOPMENTAL', 6,7]
        // ]);

        var options = {
          title: 'Domain Gap Analysis',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>