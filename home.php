<?php
include 'includes/db.php';
// include 'includes/functions.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('location:index.php');
}

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
} else {
    // header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/purchase.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>

<body>

    <div class="homelogin-page">
        <div class="form">
            <h2 style="text-align:center;"> Welcome
                <?php echo $_SESSION['username']; ?> !!!</h2>
            <br><br>
            <button class="homedashboard" onclick="window.location.href='dashboard.php'">Dashboard</button><br><br>
            <button class="homelogout" onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>
</body>
<script src="bootstrap.min.js"></script>

</html>