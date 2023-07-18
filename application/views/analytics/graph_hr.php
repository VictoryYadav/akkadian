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
                                        <div id="columnchart_values" ></div>

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
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable(
        <?php echo $subdomain_list; ?>
      );

      // var data = google.visualization.arrayToDataTable([
      //   ["Element", "Density", { role: "style" } ],
      //   ["Sub1", 8.94, "#b87333"],
      //   ["Sub1", 10.49, "silver"],
      //   ["Sub1", 19.30, "gold"],
      //   ["Sub1", 21.45, "color: #e5e4e2"]
      // ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "HR SubDomain Expectation",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
        vAxis: {
            viewWindow: {
            min:0
            }   
          }
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>