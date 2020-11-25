<?php
    require_once __DIR__ ."/../../autoload/autoload.php";
    $resultCount = 14;
    $color  =   [ 
                    1 => '#0000FF', 2 => '#8A2BE2', 3 => '#A52A2A', 4 => '#DEB887', 
                    5 => '#5F9EA0', 6 => '#7FFF00', 7 => '#D2691E', 8 => '#FF7F50',
                    9 => '#6495ED', 10 => '#00FFFF', 11 => '#00008B', 12 => '#006400',
                    13 => '#8B008B', 14 => '#FF00FF',
                ];
    $category   = [];
    $number      = [];
    $sqltk    =   'SELECT c.name, sum(d.number) as tong
                FROM category as c, product as p, detail as d
                WHERE p.id_category = c.id AND p.id = d.id_product
                GROUP BY p.id_category';
    $tonkho  = $db->fetchsql($sqltk);
    // _debug($tonkho);die;
    // _debug($tonkho);die;
    $count = 1;
    foreach($tonkho as $item){
      // _debug($item);die;
      $category[$count] = $item['name'];
      $number[$count] = $item['tong'];
      $count++;
    }
    // _debug($dulieu);die;
    // _debug($doanhso);die;
    // _debug($color);die;
// _debug($country);die;

?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
      
    google.charts.setOnLoadCallback(drawPieChart);
      
    function drawPieChart() {

      var data = new google.visualization.arrayToDataTable([
        ["category","number"],
        <?php
        for($i=1;$i<=$resultCount;$i++){
          ?>[<?php echo "'".$category[$i]."', ".$number[$i] ?>],
        <?php } 
        ?>
        ]);

      var options = {
          title: "Percentage of Population",
          width: '100%',
          height: '200px',
          colors: [
            <?php
            for($i=1;$i<=$resultCount;$i++) {
              echo "'".$color[$i]."',";
            } 
            ?>
          ]
        };
      var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
      chart.draw(data, options);
    }


    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBarBasic);

    function drawBarBasic() {

      var data = new google.visualization.arrayToDataTable([
         ['category', 'Số lượng', { role: 'style' }, { role: 'annotation' }],
        <?php
        for($i=1;$i<=$resultCount;$i++){
          ?>[<?php echo "'".$category[$i]."', ".$number[$i].", '".$color[$i]."' , "."'".$number[$i]."'" ?>],
        <?php } 
        ?>
        ]);

      var options = {
    	    title: "Thống kê hàng tồn kho",
        chartArea: {width: '100%'},
        hAxis: {
          title: 'Hàng tồn kho',
          minValue: 0
        },
        vAxis: {
          title: 'City'
        },
        legend: { position: "none" }
      };

      var chart = new google.visualization.BarChart(document.getElementById('bar-chart-tk'));

      chart.draw(data, options);
    }


  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawColumnChart);
    function drawColumnChart() {
      var data = google.visualization.arrayToDataTable([
        ['category', 'Số lượng', { role: 'style' }, { role: 'annotation' }],
        <?php
        for($i=1;$i<=$resultCount;$i++){
          ?>[<?php echo "'".$category[$i]."', ".$number[$i].", '".$color[$i]."' , "."'".$number[$i]."'" ?>],
        <?php } 
        ?>
        ]);


      var options = {
        title: "Thống kê hàng tồn kho",
        chartArea: {width: '100%'},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("column-chart-tk"));
      chart.draw(data, options);
  }
  </script>
  
  <style>
    body{
        max-width: 100%;
    }
    #chart_container{
        position: relative;
        padding-bottom: 300px;
        height: 0 ;
    }
    
    .chart-div{
        margin-bottom: 20px;
    }
</style>

  </head>
  
  <body>
    <div id="chart_container">
      <!-- <div id="pie-chart" class="chart-div"></div> -->

      <!-- <div id="bar-chart-tk" class="chart-div"></div> -->

      <div id="column-chart-tk" class="chart-div"></div>
    </div>
  </body>
</html>
