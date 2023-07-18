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
                        <?php 
                            foreach ($ques as $key) {
                            ?>
                            <div class="col-md-4 bg-<?php echo $key['type']; ?>" title="<?php echo $key['type']; ?>" >

                                <div class="card bg-<?php echo $key['color']; ?> text-white">
                                    <div class="card-body">
                                        
                                        <p class="text-center"><b><?php echo $key['question']; ?></b></p>
                                        
                                    </div>
                                </div>
                            </div>
                            
                             <?php } ?>     

                             <div id="container"></div>                                                           
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

<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-heatmap.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">

<script type="text/javascript">
anychart.onDocumentReady(function () {
  // Creates Heat Map
  var chart = anychart.heatMap(getData());

  // Sets chart settings and hover chart settings
  chart.stroke('#fff');
  chart
    .hovered()
    .stroke('6 #fff')
    .fill('#545f69')
    .labels({ fontColor: '#fff' });

  // Sets selection mode for single selection
  chart.interactivity().selectionMode('none');

  // Sets title
  chart
    .title()
    .enabled(true)
    .text('Risk Matrix in Project Server')
    .padding([0, 0, 20, 0]);

  // variable with list of labels
  var namesList = ['Low', 'Medium', 'High', 'Extreme'];
  // Sets adjust chart labels
  chart
    .labels()
    .enabled(true)
    .minFontSize(14)
    // Formats labels
    .format(function () {
      // replace values with words for points heat
      return namesList[this.heat];
    });

  // Sets Axes
  chart.yAxis().stroke(null);
  chart.yAxis().labels().padding([0, 15, 0, 0]);
  chart.yAxis().ticks(false);
  chart.xAxis().stroke(null);
  chart.xAxis().ticks(false);

  // Sets Tooltip
  chart.tooltip().title().useHtml(true);
  chart
    .tooltip()
    .useHtml(true)
    .titleFormat(function () {
      return '<b>' + namesList[this.heat] + '</b> Residual Risk';
    })
    .format(function () {
      return (
        '<span style="color: #CECECE">Likelihood: </span>' +
        this.x +
        '<br/>' +
        '<span style="color: #CECECE">Consequence: </span>' +
        this.y
      );
    });

  // set container id for the chart
  chart.container('container');
  // initiate chart drawing
  chart.draw();
});

function getData() {
  return [
    {
      x: 'Rare',
      y: 'Insignificant',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Rare',
      y: 'Minor',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Rare',
      y: 'Moderate',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Rare',
      y: 'Major',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Rare',
      y: 'Extreme',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Unlikely',
      y: 'Insignificant',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Unlikely',
      y: 'Minor',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Unlikely',
      y: 'Moderate',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Unlikely',
      y: 'Major',
      heat: 1,
      fill: '#ffb74d'
    },
    {
      x: 'Unlikely',
      y: 'Extreme',
      heat: 1,
      fill: '#ffb74d'
    },
    {
      x: 'Possible',
      y: 'Insignificant',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Possible',
      y: 'Minor',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Possible',
      y: 'Moderate',
      heat: 1,
      fill: '#ffb74d'
    },
    {
      x: 'Possible',
      y: 'Major',
      heat: 1,
      fill: '#ffb74d'
    },
    {
      x: 'Possible',
      y: 'Extreme',
      heat: 1,
      fill: '#ffb74d'
    },
    {
      x: 'Likely',
      y: 'Insignificant',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Likely',
      y: 'Minor',
      heat: 1,
      fill: '#ffb74d'
    },
    {
      x: 'Likely',
      y: 'Moderate',
      heat: 1,
      fill: '#ffb74d'
    },
    {
      x: 'Likely',
      y: 'Major',
      heat: 2,
      fill: '#ef6c00'
    },
    {
      x: 'Likely',
      y: 'Extreme',
      heat: 2,
      fill: '#ef6c00'
    },
    {
      x: 'Almost\nCertain',
      y: 'Insignificant',
      heat: 0,
      fill: '#90caf9'
    },
    {
      x: 'Almost\nCertain',
      y: 'Minor',
      heat: 1,
      fill: '#ffb74d'
    },
    {
      x: 'Almost\nCertain',
      y: 'Moderate',
      heat: 1,
      fill: '#ffb74d'
    },
    {
      x: 'Almost\nCertain',
      y: 'Major',
      heat: 2,
      fill: '#ef6c00'
    },
    {
      x: 'Almost\nCertain',
      y: 'Extreme',
      heat: 3,
      fill: '#d84315'
    }
  ];
}
</script>