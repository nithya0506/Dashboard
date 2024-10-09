<?php
include 'includes/db.php';
include 'includes/functions.php';



if (isset($_POST['save'])) {

    // Fetch form data
    $id = $_POST['id'];
    $houseNo = $_POST['houseNo'];
    $serviceNo = $_POST['serviceNo'];
    $servicetype = $_POST['servicetype'];
    $year = $_POST['year']; // Fetch the selected year
    $unit1 = $_POST['unit_jan_feb'];
    $amount1 = $_POST['amount_jan_feb'];
    $unit2 = $_POST['unit_mar_apr'];
    $amount2 = $_POST['amount_mar_apr'];
    $unit3 = $_POST['unit_may_june'];
    $amount3 = $_POST['amount_may_june'];
    $unit4 = $_POST['unit_jul_aug'];
    $amount4 = $_POST['amount_jul_aug'];
    $unit5 = $_POST['unit_sep_oct'];
    $amount5 = $_POST['amount_sep_oct'];
    $unit6 = $_POST['unit_nov_dec'];
    $amount6 = $_POST['amount_nov_dec'];

    // Insert or update the record
    $query = "
        INSERT INTO EBbills (id, houseNo, serviceNo, servicetype, year, unit_jan_feb, amount_jan_feb, unit_mar_apr, amount_mar_apr, unit_may_june, amount_may_june, unit_jul_aug, amount_jul_aug, unit_sep_oct, amount_sep_oct, unit_nov_dec, amount_nov_dec)
        VALUES ('$id', '$houseNo', '$serviceNo', '$servicetype', '$year', '$unit1', '$amount1', '$unit2', '$amount2', '$unit3', '$amount3', '$unit4', '$amount4', '$unit5', '$amount5', '$unit6', '$amount6')
        ON DUPLICATE KEY UPDATE
            houseNo = VALUES(houseNo),
            serviceNo = VALUES(serviceNo),
            servicetype = VALUES(servicetype),
            unit_jan_feb = VALUES(unit_jan_feb),
            amount_jan_feb = VALUES(amount_jan_feb),
            unit_mar_apr = VALUES(unit_mar_apr),
            amount_mar_apr = VALUES(amount_mar_apr),
            unit_may_june = VALUES(unit_may_june),
            amount_may_june = VALUES(amount_may_june),
            unit_jul_aug = VALUES(unit_jul_aug),
            amount_jul_aug = VALUES(amount_jul_aug),
            unit_sep_oct = VALUES(unit_sep_oct),
            amount_sep_oct = VALUES(amount_sep_oct),
            unit_nov_dec = VALUES(unit_nov_dec),
            amount_nov_dec = VALUES(amount_nov_dec)
    ";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // echo "Added successfully";
        $_SESSION['status'] = "Data added Successfully";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Data not Registered";
        $_SESSION['status_code'] = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/application.css">
    <title>EB Bills</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-md navbar-dark header" id="myHeader">
        &emsp;<a class="navbar-brand" href="#">SHANTHI MAARKA SABAI EB SERVICE DETAILS</a>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav ">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="EB.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="EBview.php">View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Nav bar End -->

    <br>
    <?php
    $_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
    include 'includes/db.php';

    $currentYear = date('Y');
    $years = range($currentYear, $currentYear + 10);

    // Fetch records for the selected year, defaulting to the current year
    $selectedYear = $_GET['year'] ?? $currentYear;
    $sql = "SELECT * FROM EBbills WHERE year = '$selectedYear'";
    $result = mysqli_query($conn, $sql);
    ?>

    <!-- Add new row button -->
    <form method="GET" action="">
        <strong><label for="yearSelect">Select Year:</label></strong>
        <select id="yearSelect" name="year" onchange="this.form.submit()">
            <?php foreach ($years as $year) : ?>
                <option value="<?= $year ?>" <?= $year == $selectedYear ? 'selected' : '' ?>><?= $year ?></option>
            <?php endforeach; ?>
        </select>
        <!-- <input type="submit" class="btn btn-primary" name="add" value="Add New Row"> -->
    </form>
    <br>

    <table style="font-size:13px; background-color:#b6e2d3;">
        <tr style="font-size:13px; text-align:center;">
            <th rowspan='2'>ID</th>
            <th rowspan='2'>HOUSE NO</th>
            <th rowspan='2'>SERVICE NO</th>
            <th rowspan='2'>SERVICE TYPE</th>
            <th colspan='2'>JAN - FEB</th>
            <th colspan='2'>MAR - APR</th>
            <th colspan='2'>MAY - JUN</th>
            <th colspan='2'>JUL - AUG</th>
            <th colspan='2'>SEP - OCT</th>
            <th colspan='2'>NOV - DEC</th>
            <th rowspan='2'>ACTION</th>
        </tr>
        <tr style="font-size:11px;text-align:center;">
            <th>UNIT</th>
            <th>AMOUNT</th>
            <th>UNIT</th>
            <th>AMOUNT</th>
            <th>UNIT</th>
            <th>AMOUNT</th>
            <th>UNIT</th>
            <th>AMOUNT</th>
            <th>UNIT</th>
            <th>AMOUNT</th>
            <th>UNIT</th>
            <th>AMOUNT</th>
        </tr>
        <tr>
            <form action="" method="POST" style="text-align:center;">
                <!-- Hidden input to store the selected year -->
                <input type="hidden" name="year" value="<?= $selectedYear ?>">

                <td style="text-align:left;"><input type="text" name="id" style="height: 50px;width:50px" value=""></td>
                <td style="width:100px;text-align:left;"><input type="text" name="houseNo" style="height: 50px;width:auto" value=""></td>
                <td><input type="text" name="serviceNo" style="height: 50px;width:auto" value=""></td>
                <td style="width:auto;text-align:left;"><input type="text" name="servicetype" style="height: 50px;width:auto" value=""></td>
                <td><input type="text" name="unit_jan_feb" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="amount_jan_feb" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="unit_mar_apr" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="amount_mar_apr" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="unit_may_june" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="amount_may_june" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="unit_jul_aug" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="amount_jul_aug" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="unit_sep_oct" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="amount_sep_oct" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="unit_nov_dec" style="height: 50px;width:50px" value=""></td>
                <td><input type="text" name="amount_nov_dec" style="height: 50px;width:50px" value=""></td>
                <td><input type="submit" name="save" class="btn btn-success" value="Save"></td>
            </form>
        </tr>
        <?php

        ?>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- <script  src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="sweetalert.js"></script>

    <?php

    if (isset($_SESSION['status']) &&  $_SESSION['status'] != '') {

    ?>

        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                // text: "You clicked the button!",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok.Done!",
            });
        </script>
    <?php
        unset($_SESSION['status']);
    }
    ?>
</body>

</html>