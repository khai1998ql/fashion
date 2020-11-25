<?php
    require_once __DIR__ ."/../../autoload/autoload.php";
    $color  = [1 => '#dc7877', 2 => '#9cbb73', 3 => '#9ee2d9', 4 => '#9f9ee2', 5 => '#e29eba', 6 => '#ffff00', 7 => '#D2691E'];
    $sqldt    =   'SELECT * FROM transaction WHERE 1';
    $transactiondt    =   $db->fetchsql($sqldt);
    // _debug($transactiondt);die;
    $month  = array(1 => 'Tháng 1', 2 => 'Tháng 2', 3 => 'Tháng 3', 4 => 'Tháng 4', 5 => 'Tháng 5', 6 => 'Tháng 6', 7 => 'Tháng 7');
    $doanhso   = array(1 => 0, 2 => 0, 3 => 0, 4 => 0,  5 => 0, 6 => 0, 7 => 0);
    foreach($transactiondt as $key => $item){
        $thang  = $item['created_at'];
        $thang  = explode('-', $item['created_at']);
        $mon  = intval($thang[1]);
        $doanhso[$mon] +=  $item['amount'];
    }
    $resultCount = 7;
    // _debug($month);die;
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
        ["month","doanhso"],
        <?php
        for($i=1;$i<=$resultCount;$i++){
          ?>[<?php echo "'".$month[$i]."', ".$doanhso[$i] ?>],
        <?php } 
        ?>
        ]);

      var options = {
          title: "Doanh thu 6 tháng đầu năm 2020",
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
         ['month', 'doanhso', { role: 'style' }, { role: 'annotation' }],
        <?php
        for($i=1;$i<=$resultCount;$i++){
          ?>[<?php echo "'".$month[$i]."', ".$doanhso[$i].", '".$color[$i]."' , "."'".$doanhso[$i]."'" ?>],
        <?php } 
        ?>
        ]);

      var options = {
    	    title: "Number of People per Country",
        chartArea: {width: '100%'},
        hAxis: {
          title: 'Total Population',
          minValue: 0
        },
        vAxis: {
          title: 'City'
        },
        legend: { position: "none" }
      };

      var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));

      chart.draw(data, options);
    }


  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawColumnChart);
    function drawColumnChart() {
      var data = google.visualization.arrayToDataTable([
        ['month', 'Doanh thu', { role: 'style' }, { role: 'annotation' }],
        <?php
        for($i=1;$i<=$resultCount;$i++){
          ?>[<?php echo "'".$month[$i]."', ".$doanhso[$i].", '".$color[$i]."' , "."'".$doanhso[$i]."'" ?>],
        <?php } 
        ?>
        ]);


      var options = {
        title: "Doanh thu 7 tháng đầu năm 2020",
        chartArea: {width: '100%'},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("column-chart-dt"));
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

      <!-- <div id="bar-chart" class="chart-div"></div> -->

      <div id="column-chart-dt" class="chart-div"></div>
    </div>
  </body>
</html>
