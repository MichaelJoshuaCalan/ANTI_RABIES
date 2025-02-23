<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>
    <?php
    require "db_conn.php";

    // Initializing the variables
    $Date = $Name = $Address = $Age = $Sex = $date_bitten = $Place = $type_animal = $wound_type = $body_bit = "";
    $category = $wash = $Date_given = $ats = $tt = "";

    // Check if the form is submitted and populate variables
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Date = $_POST['Date'];
        $Name = $_POST['Name'];
        $Address = $_POST['Address'];
        $Age = $_POST['Age'];
        $Sex = $_POST['Sex'];
        $date_bitten = $_POST['date_bitten'];
        $Place = $_POST['Place'];
        $type_animal = $_POST['type_animal'];
        $wound_type = $_POST['wound_type'];
        $body_bit = $_POST['body_bit'];
        $category = $_POST['category'];
        $wash = $_POST['wash'];
        $Date_given = $_POST['Date_given'];
        $ats = $_POST['ats'];
        $tt = $_POST['tt'];

        // SQL query to insert data into the database
        $sql = "INSERT INTO records (Date, Name, Address, Age, Sex, date_bitten, Place, type_animal, wound_type, body_bit, category, wash, Date_given, ats, tt)
        VALUES ('$Date', '$Name', '$Address', '$Age', '$Sex', '$date_bitten', '$Place', '$type_animal', '$wound_type', '$body_bit', '$category', '$wash', '$Date_given', '$ats', '$tt')";

        // Execute the query and check if it was successful
        if ($conn->query($sql) === TRUE) {
            // Redirect to avoid resubmission on page refresh
            header("Location: " . $_SERVER['PHP_SELF']);
            exit(); // Always call exit after header redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the connection (it can be done here or after the code block)
    $conn->close();
    ?>

    <nav>
        <a href="index.php">Add Record</a>
        <div class="title" style="color:white;text-shadow: -1px 1px 5px rgb(19, 19, 19);font-size:30px">
            <h1>ABC RECORD</h1>
        </div>
        <a href="table.php">Patients Record</a>
    </nav>

    <div class="index-body">
        <div class="Title">
            <br><br>
            <img src="img/do2.png" alt="" width="300px" height="200px"><br>
            <img src="img/dog3.png" width="300px" height="200px" alt=""><br>
            <img src="img/inject.png" width="300px" height="200px" alt=""><br>
            <img src="img/cat1.png" width="300px" height="200px" alt=""><br>
            <img src="img/dog4.png" width="300px" height="200px" alt=""><br>
        </div>
        
        <div class="form-container">
            <form action="" method="POST">
                <label for="">Date:</label>
                <input type="date" name="Date" id="">

                <label for="">Name: </label>
                <input type="text" name="Name" id="">

                <label for="">Address:</label>
                <input type="text" name="Address" id="">

                <label for="">Age:</label>
                <input type="number" name="Age" id="">

                <label for="">Sex:</label>
                <input type="text" name="Sex" id="">

                <label for="">Date Bitten:</label>
                <input type="date" name="date_bitten" id="">

                <label for="">Place:</label>
                <input type="text" name="Place" id="">

                <label for="">Type of Animal: </label>
                <input type="text" name="type_animal" id="">

                <label for="">Wound Type:</label>
                <input type="text" name="wound_type" id="">

                <label for="">Body parts: </label>
                <input type="text" name="body_bit" id="">

                <label for="">Category:</label>
                <input type="number" name="category" id="">

                <label for="">Wash:</label>
                <input type="text" name="wash" id="">

                <label for="">RIG given:</label>
                <input type="date" name="Date_given" id="">

                <label for="">ATS:</label>
                <input type="text" name="ats" id="">

                <label for="">TT:</label>
                <input type="text" name="tt" id="">

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
