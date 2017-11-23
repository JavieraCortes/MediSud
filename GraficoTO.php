<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          
          <?php
       
            $enfArray = array('Enfermedad Renal Cronica','Diabetes Mellitus','VIH/SIDA','Hipertension','Hemofilia',
                              'Enfermedad Pulmonar Obstructiva Cronica','Artrosis','Fibrosis Quistica','Artritis Reumatoidea',
                              'Epilepsia','Asma Bronquial','Parkinson','Artritis Idiopatica Juvenil','Esclerosis Multiple',
                              'Hepatitis B','Hepatitis C','Hipotiroidismo','Lupus Eritematoso Sistemico');
        
            require 'conexion.php';
            
            for($i=0; $i<18; $i++){
      
                $sql="SELECT IFNULL(COUNT(*),0) AS Cantidad FROM ENFERMEDAD WHERE NomEnfermedad = '".$enfArray[$i]."';";
   
                $result=$conn->query($sql);

                while($row=$result->fetch_assoc()){

                     if($row['Cantidad']>0){
                        echo "['".$enfArray[$i]."',".$row['Cantidad']."],";        
                    }
                }
            }           
            $conn->close();
          
          ?>
           
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>