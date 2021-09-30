<?php
    $insert = false;
    if(isset($_POST['name'])){

        // Set connection variables
        $server = "localhost";
        $username = "root";
        $password = "";

        //  Create a database connection
        $con = mysqli_connect($server, $username, $password);

        // Check for connection Success.
        if(!$con){
            die("Connection to this database failed due to ". mysqli_connect_error());
        }
        //echo "Success connecting to database";

        // Collect post variables
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO `trip`.`trip_form`(`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

        // echo $sql ;

        // Execute the Query
        if($con->query($sql)==true){
            // echo "Successfully Inserted ";
            // Flag for successful Insertion
            $insert = true;
        }
        else{
            echo "ERROR : $sql <br> $con->error";
        }
        // Close the database connection
        $con->close();
         
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Noto+Sans+SC:wght@100&family=Roboto+Mono&display=swap" rel="stylesheet">
</head>
<body>
    <img src="form5.jpg" alt="Background Image" class="img">
    <div class="container">
        <h1>Welcome to US Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip.</p>
        <?php
            if($insert==true){
                echo '<p class="submitmsg">Thanks for Submitting the form.</p>';
            }  
        ?>
        
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
