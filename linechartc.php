<?php
$conn    = mysqli_connect("localhost","id18732653_root","7W147\OtNW\H~@pJ","id18732653_ta");
require "linechartdatac.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
        <canvas id="linechart" width="100%" height="50"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript"> //script linechart
            var ctx = document.getElementById("linechart").getContext("2d");
            var data = {
                        labels: ["Periode 1","Periode 2","Periode 3"],
                        datasets: [
                            {
                                label: "Lahan 1 C",
                                fill: false,
                                lineTension: 0.1,
                                backgroundColor: "#2E8B57",
                                borderColor: "#2E8B57",
                                pointHoverBackgroundColor: "#2E8B57",
                                pointHoverBorderColor: "#2E8B57",
                                data: [<?php while ($p = mysqli_fetch_array($lahan1c)) { echo '"' . $p['dosis'] . '",';}?>]
                            },
                            ]
                    };

            var myBarChart = new Chart(ctx, {
                        type: 'line',
                        data: data,
                        options: {
                        legend: {
                        display: true
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