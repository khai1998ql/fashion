
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
    $sales      = [];
    $sqldm    =   'SELECT c.name, SUM(p.pay * p.price) as tong
                FROM category as c, product as p
                WHERE p.id_category = c.id
                GROUP BY p.id_category';
    $sale  = $db->fetchsql($sqldm);
    // _debug($sale);die;
    $count = 1;
    foreach($sale as $item){
      // _debug($item);die;
      $category[$count] = $item['name'];
      $sales[$count] = $item['tong'];
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
        ["category","sales"],
        <?php
        for($i=1;$i<=$resultCount;$i++){
          ?>[<?php echo "'".$category[$i]."', ".$sales[$i] ?>],
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
         ['category', 'sales', { role: 'style' }, { role: 'annotation' }],
        <?php
        for($i=1;$i<=$resultCount;$i++){
          ?>[<?php echo "'".$category[$i]."', ".$sales[$i].", '".$color[$i]."' , "."'".$sales[$i]."'" ?>],
        <?php } 
        ?>
        ]);

      var options = {
    	    title: "Doanh thu theo mặt hàng",
        chartArea: {width: '100%'},
        hAxis: {
          title: 'Tất cả mặt hàng',
          minValue: 0
        },
        vAxis: {
          title: 'Mặt hàng'
        },
        legend: { position: "none" }
      };

      var chart = new google.visualization.BarChart(document.getElementById('bar-chart-dm'));

      chart.draw(data, options);
    }


  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawColumnChart);
    function drawColumnChart() {
      var data = google.visualization.arrayToDataTable([
        ['category', 'Doanh thu', { role: 'style' }, { role: 'annotation' }],
        <?php
        for($i=1;$i<=$resultCount;$i++){
          ?>[<?php echo "'".$category[$i]."', ".$sales[$i].", '".$color[$i]."' , "."'".$sales[$i]."'" ?>],
        <?php } 
        ?>
        ]);


      var options = {
        title: "Doanh thu theo danh mục",
        chartArea: {width: '100%'},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("column-chart-dm"));
      chart.draw(data, options);
  }
  </script>
  
  <style>
    body{
        max-width: 100%;
        /* margin-top:500px; */
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
      <div id="pie-chart" class="chart-div"></div>

      <div id="bar-chart-dm" class="chart-div"></div>

      <div id="column-chart-dm" class="chart-div"></div>
    </div>
  </body>
</html>
