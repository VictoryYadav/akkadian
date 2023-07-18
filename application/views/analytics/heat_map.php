<?php 

$this->load->view('layouts/admin/head'); ?>
<style>
#chart {
      max-width: 650px;
      margin: 35px auto;
}
      /*@import url('https://fonts.googleapis.com/css?family=Lato:300,400,600,700');*/
/*
body {

    height: 100vh;

    background: #f9f9f9;
}*/

#chart, .chart-box {

    padding-top: 20px;

    padding-left: 10px;

    background: #fff;

    border: 1px solid #ddd;

    box-shadow: 0 22px 35px -16px rgba(0,0,0, 0.1);

}

.apexcharts-tooltip {

    background: #f3f3f3;

    color: orange;

  }

select.flat-select {

    -moz-appearance: none;

    -webkit-appearance: none;

    appearance: none;

    background: #008FFB url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'60px\' height=\'60px\'><polyline fill=\'white\' points=\'46.139,15.518 25.166,36.49 4.193,15.519\'/></svg>") no-repeat scroll right 2px top 9px / 16px 16px;

    border: 0 none;

    border-radius: 3px;

    color: #fff;

    font-family: arial,tahoma;

    font-size: 16px;

    font-weight: bold;

    outline: 0 none;

    height: 33px;

    padding: 5px 20px 5px 10px;

    text-align: center;

    text-indent: 0.01px;

    text-overflow: "";

    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);

    transition: all 0.3s ease 0s;

    width: auto;

    -webkit-transition: 0.3s ease all;

    -moz-transition: 0.3s ease all;

    -ms-transition: 0.3s ease all;

    -o-transition: 0.3s ease all;

    transition: 0.3s ease all;

  }
  select.flat-select:focus, select.flat-select:hover {

    border: 0;

    outline: 0;

  }
.apexcharts-canvas {
    margin: 0 auto;
}

#html {
    display: none;
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
                                        
                                        <div id="app">

                                          <div id="chart">

                                            <apexchart type="heatmap" height="400" width="400" :options="chartOptions" :series="series"></apexchart>

                                          </div>

                                        </div>
                                        
                                        <div id="html">

                                          &lt;div id=&quot;chart&quot;&gt;

                                            &lt;apexchart type=&quot;heatmap&quot; height=&quot;350&quot; :options=&quot;chartOptions&quot; :series=&quot;series&quot;&gt;&lt;/apexchart&gt;

                                          &lt;/div&gt;

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

      window.Promise ||

        document.write(

          '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'

        )

      window.Promise ||

        document.write(

          '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'

        )

      window.Promise ||

        document.write(

          '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'

        )

    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>

 <script>

      // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests

      // Based on https://gist.github.com/blixt/f17b47c62508be59987b

      var _seed = 42;

      Math.random = function() {

        _seed = _seed * 16807 % 2147483647;

        return (_seed - 1) / 2147483646;

      };

    </script>
    <script>

  function generateData(count, yrange) {

    var i = 0;

    var series = [];

    while (i < count) {

      var x = (i + 1).toString();

      var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

      series.push({

        x: x,

        y: y

      });

      i++;

    }

    return series;

  }

   var data = generateData(20, {

                min: -30,

                max: 55

              });

   console.log(data);

  </script>

  <script>

      var tools = <?= $tool?>;

      // console.log(tools);

      new Vue({

        el: '#app',

        components: {

          apexchart: VueApexCharts,

        },

        data: {

          series: <?= $data?>,

          chartOptions: {

            chart: {

              height: 50,

              type: 'heatmap'

            },

            plotOptions: {

              heatmap: {

                shadeIntensity: 0.5,

                radius: 0,

                height: 10,

                useFillColorAsStroke: true,

                reverseNegativeShade: true,

                colorScale: {

                  ranges: [

                    {

                      from: 0,

                      to: 1,

                      name: 'low/low',

                      color: '#008000'

                    },

                    {

                      from: 1.1,

                      to: 2,

                      name: 'low/medium',

                      color: '#00FF00'

                    },

                    {

                      from: 2.1,

                      to: 3,

                      name: 'low/high',

                      color: '#800000'

                    },

                    {
                      from: 3.1,

                      to: 4,

                      name: 'medium/low',

                      color: '#808000'

                    },

                    {

                      from: 4.1,

                      to: 5,

                      name: 'medium/medium',

                      color: '#FFFF00'

                    },

                    {

                      from: 5.1,

                      to: 6,

                      name: 'medium/high',

                      color: '#00FFFF'

                    },

                    {

                      from: 6.1,

                      to: 7,

                      name: 'high/low',

                      color: '#FF5733'

                    },

                    {

                      from: 7.1,

                      to: 8,

                      name: 'high/medium',

                      color: '#008080'

                    },

                    {

                      from: 8.1,

                      to: 9,

                      name: 'high/high',

                      color: '#FF0000'

                    }


                  ]

                }

              }

            },

            dataLabels: {

              enabled: false

            },

            stroke: {

              width: 1

            },

            title: {

              text: 'SubDomain Heat Map (HML - CEO / HR)'

            },

            tooltip: {

              custom: function({series, seriesIndex, dataPointIndex, w}) {

                console.log(seriesIndex+" "+dataPointIndex);

                // alert(series[seriesIndex][dataPointIndex]);

                return '<div class="arrow_box">' +

                  '<span>' + tools[seriesIndex][dataPointIndex] + '</span>' +

                  '</div>'

              }

            }

          },          

        },

      })

    </script>