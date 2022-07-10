<?php
require "koneksi.php";
// $conn   = mysqli_connect("localhost","id18732653_root","7W147\OtNW\H~@pJ","id18732653_ta");
$hasil  = mysqli_query($conn, "SELECT hasil FROM b order by ID asc");
$lahan  = mysqli_query($conn, "SELECT lahan FROM b order by ID asc");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartjs, PHP dan MySQL Demo Grafik Batang</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 100%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
        <canvas id="barchart" width="100%" height="50"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("barchart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($lahan)) { echo '"' . $p['lahan'] . '",';}?>],
            datasets: [
            {
              label: "Hasil Panen",
              data: [<?php while ($p = mysqli_fetch_array($hasil)) { echo '"' . $p['hasil'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
              ]
            }
            ]
            };

  var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
            legend: {
              display: false
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>