<!-- SQL FOR ADDING/CREATING -->
<?php
                include "db_conn.php";

                $Registration = $Date = $Name =$Address = $Age = $Sex = "";

                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])){
                  
                  
                  $Registration = mysqli_real_escape_string($conn,$_POST['Registration']);
                  $Date = mysqli_real_escape_string($conn,$_POST['Date']);
                  $Name = mysqli_real_escape_string($conn,$_POST['Name']);
                  $Address = mysqli_real_escape_string($conn,$_POST['Address']);
                  $Age = mysqli_real_escape_string($conn,$_POST['Age']);
                  $Sex = mysqli_real_escape_string($conn,$_POST['Sex']);

                  $create_query = "INSERT INTO record_s(Registration,Date,Name,Address,Age,Sex)
                                  VALUES('$Registration','$Date','$Name','$Address','$Age','$Sex')";

                  
                  if($conn->query($create_query)=== TRUE){
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit();
                  }

                }
              ?>
              <!-- END OF SQL FOR ADDING/CREATING -->
              
              <!-- SQL FOR DISPLAYING/VIEWING -->
              <?php
                  include "db_conn.php";
                  $placeholder_date = date('Y-m-d');
                  $read_query = "SELECT * FROM record_s";

                  $result_read = mysqli_query($conn, $read_query);

                  if (!$result_read) {
                      die("Failed" . mysqli_error($conn));
                  }
              ?>
              <!--END SQL FOR DISPLAYING/VIEWING -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<style>
    

    /* Header Styling */
    .header {
      border: 2px solid white;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color:green;
    height: 25vh;
    width: 100%;
background-image: linear-gradient(green,white);    
}

    .header nav {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        
    }

    .title {
        max-width: 70vh;
        width: 100%;
        text-align: center;
    }

    .title p {
        background-color: aliceblue;
        font-size: 1.5em;
        margin: 10px 0;
        color: green;
        font-weight: bolder;
    }
    .row{
        display: flex;
        justify-content: center;
    }
    .col-lg-12{
      width: 100%;
      
        
        
    }
    td{
      border-right: 1px solid green;
    }
    .btn-primary{
      border:1px solid green;
      margin-left:20px; 
      height:2em;
      text-align:center;
      align-items:center;
      display:flex; 
      background-color: green;
      transition: background-color 0.3s ease,color 0.3 ease;

    }
    .btn-primary:hover{
      background-color: greenyellow;
      border:1px solid greenyellow;

      color: black;
    }
    .modal-body{
      display: flex;
    }
    form{
      padding:10px;
    }
    form input{
      width: 100%;
      height: 4vh;
      margin-bottom: 10px;
    }
</style>

<body class="toggle-sidebar">
    
<div class="header">
        <header>
            <nav>
                <img src="img/1.png" alt="" width="125px" height="120px" style="margin-right:-20px;z-index: 1;">
                <div class="title">
                    <p>PROVINCIAL HEALTH OFFICE</p>
                    <p>&nbsp;&nbsp;ANIMAL BITE TREATMENT CENTER&nbsp;&nbsp;</p>
                </div>
                <img src="img/2.png" alt="" width="125px" height="120px" style="margin-left:-20px;z-index:1;">
            </nav>
        </header>
    </div>

  <main id="main" class="main" style="margin-top:-20px;">
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
            
          <div class="card">
            <div class="card-body">
              <div class="title_top" style="display: flex; align-items: center;">
                <h5 class="card-title">Patient's Records</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                  Add Record
                </button>      
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal_report">
                  Small Modal
                </button>

              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th style="background-color: green;color:white;">Registration</th>
                    <th style="background-color: green;color:white;">Date (YYYY-MM-DD)</th>
                    <th style="background-color: green;color:white;">Name</th>
                    <th style="background-color: green;color:white;">Address</th>
                    <th style="background-color: green;color:white;">Age</th>
                    <th style="background-color: green;color:white;">Sex</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($row_read = mysqli_fetch_assoc($result_read)): ?>
                    <tr>
                      <td style="border-left:1px solid green;border-bottom:1px solid green;"><?php echo $row_read['Registration']; ?></td>
                      <td style="border-bottom:1px solid green;"><?php echo $row_read['Date']; ?></td>
                      <td style="border-bottom:1px solid green;"><?php echo $row_read['Name']; ?></td>
                      <td style="border-bottom:1px solid green;"><?php echo $row_read['Address']; ?></td>
                      <td style="border-bottom:1px solid green;"><?php echo $row_read['Age']; ?></td>
                      <td style="border-bottom:1px solid green;"><?php echo $row_read['Sex']; ?></td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <!-- CONTENT OF MODAL FOR ADDING -->
              <div class="modal fade" id="smallModal" tabindex="-1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Fill up</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST">
                      <label for="">Registration</label>
                      <input type="text" name="Registration" id="">
                  
                      <label for="">Date</label>
                      <input type="date" name="Date" id="Date" value="<?php echo $placeholder_date; ?>">

                      <label for="">Name</label>
                      <input type="text" name="Name" id="">

                      <label for="">Address</label>
                      <input type="text" name="Address" id="">

                      <label for="">Age</label>
                      <input type="text" name="Age" id="">
                      
                      <label for="">Sex</label>
                      <input type="text" name="Sex" id="">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="create" class="btn btn-primary">Add Record</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--END CONTENT OF MODAL FOR ADDING -->
              <!-- CONTENT OF REPORT(YEAR) -->
              <div class="modal fade" id="smallModal_report" tabindex="-1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Fill up</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php
                      include "db_conn.php";
                      $display_year = "SELECT DISTINCT YEAR(Date) as year FROM record_s";
                      $result_year = mysqli_query($conn,$display_year);

                      if(!$result_year){
                        die("FAILED"  .mysqli_error($conn));
                      }
                      
                      ?>
                      
                      <?php while($year = mysqli_fetch_assoc($result_year)):?>
                        <a href="reports_<?php echo $year['year'].".php";?>" ><?php echo $year['year'];?></a><br>
                      <?php endwhile;?>
                  </div>
                </div>
              </div>
              <!--END OF CONTENT OF REPORT(YEAR) -->
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
