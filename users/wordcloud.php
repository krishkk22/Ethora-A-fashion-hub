<!DOCTYPE html>
<html>
  <head>
    <title>Reviews for our website</title>  
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-tag-cloud.min.js"></script>
    <style>
      html, body, #container {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      }
    </style>    
  </head>
  <body> 
    <div id="container">
        <script>
            anychart.onDocumentReady(function() {
            var data = [
                {"x": "Excellent", "value": 30},
                {"x": "Awesome", "value": 25},
                {"x": "Great", "value": 20},
                {"x": "Amazing", "value": 15},
                {"x": "Fantastic", "value": 10},
                {"x": "Superb", "value": 8},
                {"x": "Wonderful", "value": 5},
                {"x": "Good", "value": 4},
                {"x": "Fabulous", "value": 3},
                {"x": "Perfect", "value": 2},
                {"x": "Love", "value": 1},
                {"x": "Outstanding", "value": 1}
            ];
            // create a tag (word) cloud chart
            var chart = anychart.tagCloud(data);
            // set a chart title
            chart.title('Positive Reviews Word Cloud')
            // set an array of angles at which the words will be laid out
            chart.angles([0])
            // enable a color range
            chart.colorRange(true);
            // set the color range length
            chart.colorRange().length('80%');
            // display the word cloud chart
            chart.container("container");
            chart.draw();
            // format the tooltips
            var formatter = "{%value}{scale:(1)|()|( positive review)}";
            var tooltip = chart.tooltip();
            tooltip.format(formatter);
            });
        </script>
    </div>
  </body>
</html>
