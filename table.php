<?php
    // Include your database connection
    require "db_conn.php";
    $Registration= $Date = $Name = $Address = $Age = $Sex = $date_bitten = $Place = $type_animal = $wound_type = $body_bit = "";
    $category = $wash = $Date_given = $ats = $tt = "";
    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $Registration = $_POST['Registration'];
        $Date = $_POST['Date'];
        $Name = $_POST['Name'];
        $Address = $_POST['Address'];
        $Age = $_POST['Age'];
        $Sex = $_POST['Sex'];
        // Insert or Add Query
        $sql = "INSERT INTO record_s (Date, Name, Address, Age, Sex)
        VALUES ('$Date', '$Name', '$Address', '$Age', '$Sex')";
        
        
        if ($conn->query($sql) === TRUE) {
          // Redirect to avoid resubmission on page refresh
          header("Location: " . $_SERVER['PHP_SELF']);
          exit(); // Always call exit after header redirection
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    // Write the query for displaying records
    $query = "SELECT 
                UPPER(`Registration`) AS Registration, 
                UPPER(`Date`) AS Date, 
                UPPER(`Name`) AS Name, 
                UPPER(`Address`) AS Address, 
                UPPER(`Age`) AS Age, 
                UPPER(`Sex`) AS Sex  
              FROM `record_s` ORDER BY Date DESC";
              
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
// Later in HTML:



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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    .button_add{
      display: flex; 
      justify-content: center;
      align-items: center; 
      border: 2px solid black;
      margin-top: 10px;
      margin-left: 50px;
      height: 40px;
      padding: 10px;
      border-radius: 20px;
      background-color: aquamarine;
    }
    form{
      display: flex;
      flex-direction: column;
    }
    /* Styling for the entire table */
table {
    width: 100%;
    background-color: #f0f0f0; /* Change this to your desired background color */
    border-collapse: collapse;
    margin-top: 20px;
}

/* Styling for the table header */
table th {
    background-color: #007bff; /* Header color */
    color: white; /* Text color for header */
    padding: 10px;
    text-align: center;
}

/* Styling for table rows */
table td {
    background-color: #f9f9f9; /* Same background color as the rest of the table */
    text-align: center;
    padding: 10px;
}

/* Optional: Add a hover effect for rows */
table tr:hover {
    background-color: #f1f1f1; /* Lighten up the row when hovered */
}

/* Optional: Add a border to the table */
table, th, td {
    border: 1px solid #ddd; /* Border color */
}
form input{
  color:green;
}
form input,label{
  font-size: 18px;
}
input{
  margin-bottom:10px;
}
  </style>
</head>

<body class="toggle-sidebar" style="background-color:white;">
<div class="logo_office" style="display:flex;justify-content:center;align-items:center;height: 20vh;margin-top:-1%;background-image: linear-gradient(green, white);">
            <img src="img/1.png" width="320px" height="180px" alt="" style="margin-right:24%;z-index:1;position:absolute;" >
            <h1 style="border:5px solid; width:24%;color:white; font-weight:bolder;padding:15px;text-align:center;background-color:green;z-index:0;position:relative;">KOBE BRYANT</h1>
            <img src="img/2.png" width="320px" height="180px" alt="" style="margin-right:-24%;z-index:1;position:absolute;">
          </div>
  <main id="main" class="main">
    <section class="section" >
      <div class="row">
        <div class="col-lg-12">
          
          <div class="card" >
            <div class="card-body" >
              <div class="" style="display:flex;" >
                <h5 class="card-title">ANTI-RABIES PATIENT RECORDS</h5>
                <button style="display:flexbox;margin-top:6px;margin-left:50px; text-align:center;justify-content:center;height:50px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                Add Record
                </button>

                <button style="display:flexbox;margin-top:6px;margin-left:50px; text-align:center;justify-content:center;height:50px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                  View Reports
                </button>              
            </div>

            <!-- MODAL FOR VIEW REPORTS -->
            <div class="modal fade" id="smallModal" tabindex="-1">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Select Year</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="Display:flex;flex-direction:column;justify-content:center;text-align:center;font-size:20px">
                      <a href="">2030</a>
                      <a href="">2029</a>
                      <a href="">2028</a>
                      <a href="">2027</a>
                      <a href="">2026</a>
                      <a href="reports_2025.php">2025</a>
                      <a href="reports_2024.php">2024</a>
                      <a href="reports_2023.php">2023</a>
                    </div>                   
                  </div>
                </div>
              </div>
              
              
              <!-- Modal/ Add Record Form Popup -->
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content" style="color:green;">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Record</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="POST">
                      <label for="">Registration:</label>
                      <input type="text" name="Registration" required>

                      <label for="">Date:</label>
                      <input type="date" name="Date" required>

                      <label for="">Name:</label>
                      <input type="text" name="Name" required>

                      <label for="">Address:</label>
                      <input type="text" name="Address" >

                      <label for="">Age:</label>
                      <input type="number" name="Age" >

                      <label for="">Sex:</label>
                      <input type="text" name="Sex" >
                      <br>
                      <button type="submit">Submit</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Table displaying the records -->
              <table class="table datatable">
                <thead >
                  <tr>
                    <th><b>Registration</b></th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Sex</th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                  <tr>
                    <td><?php echo htmlspecialchars($row['Registration']); ?></td>
                    <td><?php echo htmlspecialchars($row['Date']); ?></td>
                    <td><?php echo htmlspecialchars($row['Name']); ?></td>
                    <td><?php echo htmlspecialchars($row['Address']); ?></td>
                    <td><?php echo htmlspecialchars($row['Age']); ?></td>
                    <td><?php echo htmlspecialchars($row['Sex']); ?></td>
                  </tr>
                <?php endwhile; ?>
                </tbody>
              </table>
              <!-- End Table -->             
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->

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
