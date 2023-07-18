                     <html>
<head>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-heatmap.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
  <style type="text/css">

    html,
    body,
    #container {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
    }
  
</style>
</head>
<body>
  
  <div id="container"></div>
  

  <script>

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
      var namesList = ['Low', 'Medium', 'High'];
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
          x: 'Low',
          y: 'Low1',
          heat: 0,
          fill: 'red'
        },
        {
          x: 'Low',
          y: 'Medium1',
          heat: 0,
          fill: 'yellow'
        },
        {
          x: 'Low',
          y: 'High1',
          heat: 0,
          fill: 'green'
        },
        {
          x: 'Medium',
          y: 'Low1',
          heat: 0,
          fill: 'yellow'
        },
        {
          x: 'Medium',
          y: 'Medium1',
          heat: 1,
          fill: 'red'
        },
        {
          x: 'Medium',
          y: 'High1',
          heat: 1,
          fill: 'yellow'
        },
        {
          x: 'High',
          y: 'Low1',
          heat: 1,
          fill: 'green'
        },
        {
          x: 'High',
          y: 'Medium1',
          heat: 1,
          fill: 'yellow'
        },
        {
          x: 'High',
          y: 'High1',
          heat: 1,
          fill: 'red'
        }
      ];
    }
  
</script>
</body>
</html>
                