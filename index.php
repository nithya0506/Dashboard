<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];


    if (empty($username) || empty($password) || empty($role)) {
        $_SESSION['errormessage'] = "All field's must be filled out";
        Redirect_to("index.php");
    } else {

        $sql = "SELECT * from login where username='$username' AND password='$password' AND role='$role' limit 1";

        $resultlogin = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultlogin);

        if (mysqli_num_rows($resultlogin) > 0) {

            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
              

            
            Redirect_to("dashboard.php");
            // header('location:dashboard.php?username=' . $_SESSION['username']);
            // header('location:dashboard.php');
            // Redirect_to("index.php");
            exit();


        } else {
            $_SESSION['errormessage'] = "Incorrect Username Password and User Type !";
            Redirect_to("index.php");
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index </title>
    <link rel="stylesheet" href="css/purchase.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</head>
<body>
    <!-- Log in Form  -->

    <form method="POST" action="">
        <div class="login-page">
            <div class="form">
                <img src="/images/logo.png" style="height:150px; width:200px;" class="indexlogo">
                <h3 class="heading"> Maintenance Team</h3>
                <?php
                echo errormessage();
                echo successmessage();
                ?>
               
                <input class="input1" type="text" name="username" id="username" placeholder="Enter your Name" value=""><br>
                                                                                                                                 
               
                <input type="password" class="input1" name="password" id="password" placeholder="Enter your password" value=""><br>
                <select id="role" name='role' style="width:280px;height:30px;">
                    <option class="input1">-------- Select user Type ---------</option>
                    <option class="input1" name='role'>Admin</option>
                    <option class="input1" name='role'>User</option>
                </select>
                <br><br>

                <button type="submit" class="" name="login">Log In</button>
            
    </form>
    
    <!-- js script code -->

   
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>