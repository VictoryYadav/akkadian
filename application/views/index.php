
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Range HeatMap</title>


    <style>
      
        #chart {
      max-width: 650px;
      margin: 35px auto;
    }
      /*@import url('https://fonts.googleapis.com/css?family=Lato:300,400,600,700');*/

* {
    font-family: Arial;
}

body {
    height: 100vh;
    background: #f9f9f9;
}

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
   // alert(data);
   console.log(data);
  </script>
  </head>

  <body>
    
    <div id="app">
      <div id="chart">
        <apexchart type="heatmap" height="350" :options="chartOptions" :series="series"></apexchart>
      </div>
    </div>

    <!-- Below element is just for displaying source code. it is not required. DO NOT USE -->
    <div id="html">
      &lt;div id=&quot;chart&quot;&gt;
        &lt;apexchart type=&quot;heatmap&quot; height=&quot;350&quot; :options=&quot;chartOptions&quot; :series=&quot;series&quot;&gt;&lt;/apexchart&gt;
      &lt;/div&gt;
    </div>

    <script>
      // console.log(tools);
              var options = {
          series: [{
            name: 'Jan',
            data: generateData(20, {
              min: -30,
              max: 55
            })
          },
          {
            name: 'Feb',
            data: generateData(20, {
              min: -30,
              max: 55
            })
          },
          {
            name: 'Mar',
            data: generateData(20, {
              min: -30,
              max: 55
            })
          },
          {
            name: 'Apr',
            data: generateData(20, {
              min: -30,
              max: 55
            })
          },
          {
            name: 'May',
            data: generateData(20, {
              min: -30,
              max: 55
            })
          },
          {
            name: 'Jun',
            data: generateData(20, {
              min: -30,
              max: 55
            })
          },
          {
            name: 'Jul',
            data: generateData(20, {
              min: -30,
              max: 55
            })
          },
          {
            name: 'Aug',
            data: generateData(20, {
              min: -30,
              max: 55
            })
          },
          {
            name: 'Sep',
            data: generateData(20, {
              min: -30,
              max: 55
            })
          }
        ],
          chart: {
          height: 700,
          width: 1800,
          type: 'heatmap',
        },
        plotOptions: {
          heatmap: {
            shadeIntensity: 0.5,
            radius: 0,
            useFillColorAsStroke: true,
            colorScale: {
              ranges: [{
                  from: -30,
                  to: 5,
                  name: 'low',
                  color: '#00A100'
                },
                {
                  from: 6,
                  to: 20,
                  name: 'medium',
                  color: '#128FD9'
                },
                {
                  from: 21,
                  to: 45,
                  name: 'high',
                  color: '#FFB200'
                },
                {
                  from: 46,
                  to: 55,
                  name: 'extreme',
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
          text: 'HeatMap Chart with Color Range'
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();


    </script>
    
  </body>
</html>
