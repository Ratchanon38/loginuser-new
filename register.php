<?php 

    session_start();

    require_once "connection.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $Email = $_POST['Email'];
        $student_id = $_POST['student_id'];
        $Line_id = $_POST['Line_id'];
        

        $user_check = "SELECT * FROM loginuser WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $loginuser = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO loginuser (username, password, firstname, lastname, Email, student_id, Line_id, userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', '$Email','$student_id','$Line_id','a')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: index.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: index.php");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>


                    <form method="POST">

                    <div class="field-column">
                            <label for="username">Username</label>
                            <input type="text" class="input--style-3" name="username" placeholder="Enter your username" required>
                        </div>

                        <div class="field-column">
                            <label for="password">Password</label>
                            <input type="password" class="input--style-3" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="field-column">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="input--style-3" name="firstname" placeholder="Enter your firstname" required>
                        </div>
                        <div class="field-column">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="input--style-3" name="lastname" placeholder="Enter your lastname" required>
                        </div>
                        <div class="field-column">
                            <label for="Email">Email</label>
                            <input type="text" class="input--style-3" name="Email" placeholder="mju6xxxxxxxxx@mju.ac.th" required>
                        </div>
                        <div class="field-column">
                            <label for="student_id">student_id</label>
                            <input type="text" class="input--style-3" name="student_id" placeholder="Enter your student_id" required>
                        </div>
                        <div class="field-column">
                            <label for="Line_id_id">Line_id</label>
                            <input type="text" class="input--style-3" name="Line_id" placeholder="Enter your Line_id" required>
                        </div>



                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="submit" value="Submit">Submit</button>
                        </div>
                    </form>
                    <a href="index.php">Go back</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->