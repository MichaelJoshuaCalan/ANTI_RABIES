
<?php
include"db_conn.php";

  $month = [];

  for($i=1; $i<=12; $i++){
    $query = "SELECT COUNT(*) as count FROM record_s WHERE MONTH(Date)=$i AND YEAR(Date)=2025 ";
    $result = mysqli_query($conn,$query);

    if(!$result){
      die("Connection Failed".mysqli_error($conn));
    }
    $months=mysqli_fetch_assoc($result);
    $total[$i] = $months['count'];
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <title>ANTI-RABIES</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/dog.png" rel="icon" >
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
  .back {
    transition: color 0.3s ease;
    border-radius: 5px;
    color: black;
  }

  .back:hover {
    color: green; /* Change text color on hover */
  }
  .total_output{
    display: flex;
  }
  .total_output h3{
    margin-left:30px;
  }
</style>

<body class="toggle-sidebar">

  <!-- ======= Header ======= -->
  
        <div class="logo_office" style="display:flex;justify-content:center;align-items:center;height: 27.3vh;margin-top:-17px;width:100%;background-image: linear-gradient(green, white);">
            <img src="img/1.png" width="320px" height="180px" alt="" style="margin-right:24%;z-index:1;position:absolute;" >
            <h1 style="border:5px solid; width:24%;color:white; font-weight:bolder;padding:15px;text-align:center;background-color:green;z-index:0;position:relative;">KOBE BRYANT</h1>
            <img src="img/2.png" width="320px" height="180px" alt="" style="margin-right:-24%;z-index:1;position:absolute;">
          </div>
  <main id="main" class="main">
    <section class="section">
      <div class="row" style="display:flex;align-items:center;justify-content: center;margin-top:-5%;">
        <div class="col-lg-6" style="width:90%;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="display: flex;justify-content:space-between">Monthy Report (2025) <a class="back" href="table.php" style="font-size:30px;"><i class="bi bi-arrow-bar-left"></i>&nbsp;Back</a></h5>
                <div class="total">
                  <?php 
                    include "db_conn.php";
                    $query="SELECT COUNT(*) as count FROM record_s WHERE YEAR(Date)=2025";
                    $result = mysqli_query($conn,$query);

                    if(!$result){
                      die("COnnection Failed".mysqli_error($conn));
                    }
                    $total_patient = mysqli_fetch_assoc($result);
                  ?>
                  <?php 
                    include "db_conn.php";
                    $query="SELECT COUNT(*) as count FROM record_s WHERE YEAR(Date)=2025 AND sex='m'";
                    $result = mysqli_query($conn,$query);

                    if(!$result){
                      die("COnnection Failed".mysqli_error($conn));
                    }
                    $total_male = mysqli_fetch_assoc($result);
                  ?>
                  <?php 
                    include "db_conn.php";
                    $query="SELECT COUNT(*) as count FROM record_s WHERE YEAR(Date)=2025 AND sex='f'";
                    $result = mysqli_query($conn,$query);

                    if(!$result){
                      die("COnnection Failed".mysqli_error($conn));
                    }
                    $total_female = mysqli_fetch_assoc($result);
                  ?>
                  <div class="total_output">
                  <h3 style="margin-left:-1px"><?php echo "OVERALL: ". $total_patient['count'];?></h3>
                  <h3><?php echo "MALE: ". $total_male['count'];?></h3>
                  <h3><?php echo "FEMALE: ". $total_female['count'];?></h3>
                  </div>
                </div>
              <!-- Bar Chart -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
                      datasets: [{
                        label: 'Bar Chart',
                        data: [<?php echo implode(",", $total);
                          ?>],
                        backgroundColor: [
                          'rgba(0, 123, 255, 0.2)',   // Soft Blue
                          'rgba(40, 167, 69, 0.2)',   // Soft Green
                          'rgba(255, 193, 7, 0.2)',   // Soft Yellow
                          'rgba(220, 53, 69, 0.2)',   // Soft Red
                          'rgba(108, 117, 125, 0.2)', // Soft Gray
                          'rgba(111, 66, 193, 0.2)',  // Soft Purple
                          'rgba(23, 162, 184, 0.2)',  // Soft Cyan
                          'rgba(255, 87, 34, 0.2)',   // Soft Orange
                          'rgba(52, 58, 64, 0.2)',    // Deep Gray
                          'rgba(233, 30, 99, 0.2)',   // Soft Pink
                          'rgba(0, 200, 83, 0.2)',    // Vibrant Green
                          'rgba(255, 152, 0, 0.2)'    // Deep Orange
                        ],
                        borderColor: [
                          'rgb(0, 123, 255)',   // Blue
                          'rgb(40, 167, 69)',   // Green
                          'rgb(255, 193, 7)',   // Yellow
                          'rgb(220, 53, 69)',   // Red
                          'rgb(108, 117, 125)', // Gray
                          'rgb(111, 66, 193)',  // Purple
                          'rgb(23, 162, 184)',  // Cyan
                          'rgb(255, 87, 34)',   // Orange
                          'rgb(52, 58, 64)',    // Deep Gray
                          'rgb(233, 30, 99)',   // Pink
                          'rgb(0, 200, 83)',    // Vibrant Green
                          'rgb(255, 152, 0)'    // Deep Orange
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Bar CHart -->
              <div class="quarterly_report">
                <?php
                  include "db_conn.php";
                  
                    $query="SELECT QUARTER(Date) as quarter,COUNT(*) as count 
                            FROM record_s 
                            WHERE YEAR(Date)=2025
                            GROUP BY QUARTER(Date)
                            ORDER BY quarter
                            ";
                    $result = mysqli_query($conn,$query);

                    if(!$result){
                        die ("Connection Failed".mysqli_error($conn));
                      }
                  ?>
              </div>
                  <?php while($row=mysqli_fetch_assoc($result)){ ;?>
              <div class="quarter_print" style="display:flex;flex-direction:row;justify-content:center;" >
                <h5 style="border:2px solid;text-align:center;padding:10px;border-radius:10px;background-color:green;margin:20px;color:white;"><?php echo "QUARTER: ".$row['quarter']." | TOTAL: ".$row['count'];?></h5>
                <?php } ?>
              </div>
                      </div>
          </div>
        </div>
        
      </div>
      

    </section>
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>