<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Graph Using Highcharts </title>
    <script src="assets/js/highcharts.js"></script>
    <script src="assets/js/jquery-1.10.1.min.js"></script>
    <script>
        var chart; 
        $(document).ready(function() {
              chart = new Highcharts.Chart(
              {
                  
                 chart: {
                    renderTo: 'mygraph',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'Statistik Fakultas'
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                    }
                 },
                 
                
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                            }
                        }
                    }
                 },
       
                    series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                    <?php
                        include "conn.php";
                        $query = mysqli_query($con,"SELECT mhs.Kode_f, tfakultas.Nama_f, COUNT(tfakultas.Kode_F) AS jumlah FROM mhs INNER JOIN tfakultas ON (tfakultas.Kode_F=mhs.Kode_F) GROUP BY tfakultas.Nama_F");
                     
                        while ($row = mysqli_fetch_array($query)) {
                            $Nama_f = $row['Nama_f'];
                         
                            $data = mysqli_fetch_array(mysqli_query($con,"SELECT jumlah from viewfakultas where Nama_f='$Nama_f'"));
                            $jumlah = $data['jumlah'];
                            ?>
                            [ 
                                '<?php echo $Nama_f ?>', <?php echo $jumlah; ?>
                            ],
                            <?php
                        }
                    ?>
                    ]
                }]
              });
        }); 
    </script>
    
        
</head>
<body>
<center><h2>Grafik fakultas yang paling diminati di tahun 2017</h2></center>
<div id ="mygraph"></div>

<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
</body>
</html>
