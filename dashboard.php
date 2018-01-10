<?php
	require 'config.php';
    
	session_start();
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $query = sprintf("SELECT * FROM credenziale where email='".$email."' and password='".$password."'");
    $conn = new mysqli($servername, $user, $pass, $database);
    $result = $conn->query($query);
    if($result === false || $result->num_rows != 1){
    	    header('Location: http://sensorlogicsystemlogin.altervista.org/index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="generator" content="AlterVista - Editor HTML"/>
  <title></title>
  <link href="adminDesktop.css" media="only screen and (min-width: 401px)" rel="stylesheet" type="text/css">
  <link href="adminMobile.css" media="only screen and (max-width: 400px)" rel="stylesheet" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>
          <br />
        	<div class="countStatistiche">
              <div class="stat">
                  <span class="titoloStatistiche">Totale Clienti</span>
                  <br />
                  	<?php
                    	require 'config.php';
                    	$conn = new mysqli($servername, $user, $pass, $database);
                        $query = sprintf("select * from credenziale where permesso = 'u'");
                        $result = $conn->query($query);
                        echo '<span class="resstat">'.$result->num_rows.'</span>';
                    ?>
              </div>
              <div class="stat"> 
                  <span class="titoloStatistiche">Totale Tecnici</span>
                  <br />
                  	<?php
                    	require 'config.php';
                    	$conn = new mysqli($servername, $user, $pass, $database);
                        $query = sprintf("select * from credenziale where permesso = 't'");
                        $result = $conn->query($query);
                        echo '<span class="resstat">'.$result->num_rows.'</span>';
                    ?>
              </div>
              <div class="stat"> 
                  <span class="titoloStatistiche">Totale Impianti</span>
                  <br />
                  	<?php
                    	require 'config.php';
                    	$conn = new mysqli($servername, $user, $pass, $database);
                        $query = sprintf("select * from impianto");
                        $result = $conn->query($query);
                        echo '<span class="resstat">'.$result->num_rows.'</span>';
                    ?>
              </div>
              <div class="stat"> 
                  <span class="titoloStatistiche">Totale Sensori</span>
                  <br />
                  	<?php
                    	require 'config.php';
                    	$conn = new mysqli($servername, $user, $pass, $database);
                        $query = sprintf("select * from sensore");
                        $result = $conn->query($query);
                        echo '<span class="resstat">'.$result->num_rows.'</span>';
                    ?>
              </div>
              <div class="stat1"> 
                  <span class="titoloStatistiche">Totale Rilevazioni</span>
                  <br />
                  	<?php
                    	require 'config.php';
                    	$conn = new mysqli($servername, $user, $pass, $database);
                        $query = sprintf("select * from rilevazione");
                        $result = $conn->query($query);
                        echo '<span class="resstat">'.$result->num_rows.'</span>';
                    ?>
              </div>
            </div>
            <canvas id="ChartClienti" class="chartClienti"></canvas>

<script type="text/javascript">
    var date = <?php require 'chartClienti.php'; echo json_encode($date) ?>;
    var clienti = <?php require 'chartClienti.php'; echo json_encode($clienti) ?>;

    var myChart = new Chart(document.getElementById("ChartClienti"), {
      type: 'line',
      data: {
        labels: date,
        datasets: [{ 
            data: clienti,
            label: "Clienti",
            borderColor: "#3e95cd",
            fill: false
          }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'Adesioni dei clienti per anno'
        }
      }
    });
</script>
</body>
</html>
