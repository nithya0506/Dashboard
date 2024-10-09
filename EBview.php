<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EB Bills</title>
    <link rel=stylesheet href="css/application.css">
    <!-- Font-->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-md navbar-dark  header" id="myHeader">
        &emsp;<a class="navbar-brand" href="#">SHANTHI MAARKA SABAI EB SERVICE DETAILS</a>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav ">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="EB.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="EBview.php">View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="EBexport.php">Export to Excel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"> <i class="fa-solid fa-power-off text-danger"></i>&nbsp;Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>

    <?php
    include 'includes/db.php';
    include 'includes/functions.php';

    $_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
    $role = $_SESSION['role'];
    if ($role == "Admin") {


        $currentYear = date('Y');
        $years = range($currentYear, $currentYear + 10);
        // Fetch records for the selected year, defaulting to the current year
        $selectedYear = $_GET['year'] ?? $currentYear;

        // Update the unitTotal and amountTotal for all records of the selected year
        $updateSql = "UPDATE EBbills SET
        unitTotal = (unit_jan_feb + unit_mar_apr + unit_may_june + unit_jul_aug + unit_sep_oct + unit_nov_dec),
        amountTotal = (amount_jan_feb + amount_mar_apr + amount_may_june + amount_jul_aug + amount_sep_oct + amount_nov_dec)
        WHERE year = '$selectedYear'";
        mysqli_query($conn, $updateSql);

        $sql = "SELECT * FROM EBbills WHERE year = '$selectedYear'";
        $result = mysqli_query($conn, $sql);
    ?>

        <form method="GET" action="">
            <strong><label for="yearSelect">Select Year:</label></strong>
            <select id="yearSelect" name="year" onchange="this.form.submit()">
                <?php foreach ($years as $year) : ?>
                    <option value="<?= $year ?>" <?= $year == $selectedYear ? 'selected' : '' ?>><?= $year ?></option>
                <?php endforeach; ?>
            </select>
        </form>
        <br>
        <table style="font-size:13px;" class="">
            <tr style="font-size:13px;">
                <th rowspan='2'>ID</th>
                <th rowspan='2'>HOUSE NO</th>
                <th rowspan='2'>SERVICE NO</th>
                <th rowspan='2'>SERVICE TYPE</th>
                <th colspan='2'>JAN - FEB</th>
                <th colspan='2'>MAR - APRIL</th>
                <th colspan='2'>MAY - JUNE</th>
                <th colspan='2'>JULY - AUGUST</th>
                <th colspan='2'>SEP - OCTOBER</th>
                <th colspan='2'>NOV - DEC</th>
                <th rowspan='2'>UNIT TOTAL</th>
                <th rowspan='2'>AMOUNT TOTAL</th>
                <th rowspan="2" colspan="2">Action</th>
            </tr>
            <tr style="font-size:11px;">
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
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $houseNo = $row['houseNo'];
                    $serviceNo = $row['serviceNo'];
                    $servicetype = $row['servicetype'];
                    $unit1 = $row['unit_jan_feb'];
                    $amount1 = $row['amount_jan_feb'];
                    $unit2 = $row['unit_mar_apr'];
                    $amount2 = $row['amount_mar_apr'];
                    $unit3 = $row['unit_may_june'];
                    $amount3 = $row['amount_may_june'];
                    $unit4 = $row['unit_jul_aug'];
                    $amount4 = $row['amount_jul_aug'];
                    $unit5 = $row['unit_sep_oct'];
                    $amount5 = $row['amount_sep_oct'];
                    $unit6 = $row['unit_nov_dec'];
                    $amount6 = $row['amount_nov_dec'];
                    $unitTotal = $row['unitTotal'];
                    $amountTotal = $row['amountTotal'];


            ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td style="width:130px;text-align:left;"><?php echo $houseNo; ?></td>
                        <td><?php echo $serviceNo; ?></td>
                        <td style="width:130px;text-align:left;"><?php echo $servicetype; ?></td>
                        <td style="text-align:center;"><?php echo $unit1; ?></td>
                        <td style="text-align:center;"><?php echo $amount1; ?></td>
                        <td style="text-align:center;"><?php echo $unit2; ?></td>
                        <td style="text-align:center;"><?php echo $amount2; ?></td>
                        <td style="text-align:center;"><?php echo $unit3; ?></td>
                        <td style="text-align:center;"><?php echo $amount3; ?></td>
                        <td style="text-align:center;"><?php echo $unit4; ?></td>
                        <td style="text-align:center;"><?php echo $amount4; ?></td>
                        <td style="text-align:center;"><?php echo $unit5; ?></td>
                        <td style="text-align:center;"><?php echo $amount5; ?></td>
                        <td style="text-align:center;"><?php echo $unit6; ?></td>
                        <td style="text-align:center;"><?php echo $amount6; ?></td>
                        <td style="text-align:center; font-weight:bold;"><?php echo $unitTotal; ?></td>
                        <td style="text-align:center;font-weight:bold;"><?php echo $amountTotal; ?></td>
                        <!-- <td><a href='edit.php?id=<?php echo $id; ?>' class="btn btn-primary">Edit</a></td> -->
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" class="delete_id_value" name="delete_id" value="<?php echo $id; ?>">
                                <a href="javascript:void(0)" class="delete_btn_ajax "><i class="fa-solid fa-trash" style="color:darkred;margin-left:10px;"></i></a>
                        </td>
                    </tr>
            <?php }
            } ?>
            <!-- Add Grand Total row -->
            <tr style="font-weight:bold; text-align:center;">
                <td colspan='4' style="text-align: center;">
                    <h3>Grand Total</h3>
                </td>
                <?php
                // Calculate grand total for selected year
                $totalColumns = ['unit_jan_feb', 'amount_jan_feb', 'unit_mar_apr', 'amount_mar_apr', 'unit_may_june', 'amount_may_june', 'unit_jul_aug', 'amount_jul_aug', 'unit_sep_oct', 'amount_sep_oct', 'unit_nov_dec', 'amount_nov_dec'];

                foreach ($totalColumns as $column) {
                    $sqlSum = "SELECT SUM($column) FROM EBbills WHERE year = '$selectedYear'";
                    $resultSum = mysqli_query($conn, $sqlSum);
                    $rowSum = mysqli_fetch_assoc($resultSum);
                    $total = array_shift($rowSum);
                    echo "<td>" . ($total ?? 0) . "</td>";
                }

                // Overall Unit and Amount Total for the selected year
                $sqlUnitTotal = "SELECT SUM(unitTotal) FROM EBbills WHERE year = '$selectedYear'";
                $resultUnitTotal = mysqli_query($conn, $sqlUnitTotal);
                $rowUnitTotal = mysqli_fetch_assoc($resultUnitTotal);
                $totalUnitTotal = array_shift($rowUnitTotal);

                $sqlAmountTotal = "SELECT SUM(amountTotal) FROM EBbills WHERE year = '$selectedYear'";
                $resultAmountTotal = mysqli_query($conn, $sqlAmountTotal);
                $rowAmountTotal = mysqli_fetch_assoc($resultAmountTotal);
                $totalAmountTotal = array_shift($rowAmountTotal);

                echo "<td>" . ($totalUnitTotal ?? 0) . "</td>";
                echo "<td>" . ($totalAmountTotal ?? 0) . "</td>";
            } else {


                $_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];

                $currentYear = date('Y');
                $years = range($currentYear, $currentYear + 10);
                // Fetch records for the selected year, defaulting to the current year
                $selectedYear = $_GET['year'] ?? $currentYear;

                // Update the unitTotal and amountTotal for all records of the selected year
                $updateSql = "UPDATE EBbills SET
        unitTotal = (unit_jan_feb + unit_mar_apr + unit_may_june + unit_jul_aug + unit_sep_oct + unit_nov_dec),
        amountTotal = (amount_jan_feb + amount_mar_apr + amount_may_june + amount_jul_aug + amount_sep_oct + amount_nov_dec)
        WHERE year = '$selectedYear'";
                mysqli_query($conn, $updateSql);

                $sql = "SELECT * FROM EBbills WHERE year = '$selectedYear'";
                $result = mysqli_query($conn, $sql);
                ?>

                <form method="GET" action="">
                    &emsp;<strong><label for="yearSelect" style="margin-left: 20px;">Select Year:</label></strong>
                    <select id="yearSelect" name="year" onchange="this.form.submit()">
                        <?php foreach ($years as $year) : ?>
                            <option value="<?= $year ?>" <?= $year == $selectedYear ? 'selected' : '' ?>><?= $year ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
                <br>
                <table style="font-size:13px;" class="">
                    <tr style="font-size:13px;">
                        <th rowspan='2'>ID</th>
                        <th rowspan='2'>HOUSE NO</th>
                        <th rowspan='2'>SERVICE NO</th>
                        <th rowspan='2'>SERVICE TYPE</th>
                        <th colspan='2'>JAN - FEB</th>
                        <th colspan='2'>MAR - APRIL</th>
                        <th colspan='2'>MAY - JUNE</th>
                        <th colspan='2'>JULY - AUGUST</th>
                        <th colspan='2'>SEP - OCTOBER</th>
                        <th colspan='2'>NOV - DEC</th>
                        <th rowspan='2'>UNIT TOTAL</th>
                        <th rowspan='2'>AMOUNT TOTAL</th>

                    </tr>
                    <tr style="font-size:11px;">
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
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $houseNo = $row['houseNo'];
                            $serviceNo = $row['serviceNo'];
                            $servicetype = $row['servicetype'];
                            $unit1 = $row['unit_jan_feb'];
                            $amount1 = $row['amount_jan_feb'];
                            $unit2 = $row['unit_mar_apr'];
                            $amount2 = $row['amount_mar_apr'];
                            $unit3 = $row['unit_may_june'];
                            $amount3 = $row['amount_may_june'];
                            $unit4 = $row['unit_jul_aug'];
                            $amount4 = $row['amount_jul_aug'];
                            $unit5 = $row['unit_sep_oct'];
                            $amount5 = $row['amount_sep_oct'];
                            $unit6 = $row['unit_nov_dec'];
                            $amount6 = $row['amount_nov_dec'];
                            $unitTotal = $row['unitTotal'];
                            $amountTotal = $row['amountTotal'];


                    ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td style="width:130px;text-align:left;"><?php echo $houseNo; ?></td>
                                <td><?php echo $serviceNo; ?></td>
                                <td style="width:130px;text-align:left;"><?php echo $servicetype; ?></td>
                                <td style="text-align:center;"><?php echo $unit1; ?></td>
                                <td style="text-align:center;"><?php echo $amount1; ?></td>
                                <td style="text-align:center;"><?php echo $unit2; ?></td>
                                <td style="text-align:center;"><?php echo $amount2; ?></td>
                                <td style="text-align:center;"><?php echo $unit3; ?></td>
                                <td style="text-align:center;"><?php echo $amount3; ?></td>
                                <td style="text-align:center;"><?php echo $unit4; ?></td>
                                <td style="text-align:center;"><?php echo $amount4; ?></td>
                                <td style="text-align:center;"><?php echo $unit5; ?></td>
                                <td style="text-align:center;"><?php echo $amount5; ?></td>
                                <td style="text-align:center;"><?php echo $unit6; ?></td>
                                <td style="text-align:center;"><?php echo $amount6; ?></td>
                                <td style="text-align:center; font-weight:bold;"><?php echo $unitTotal; ?></td>
                                <td style="text-align:center;font-weight:bold;"><?php echo $amountTotal; ?></td>
                                <!-- <td><a href='edit.php?id=<?php echo $id; ?>' class="btn btn-primary">Edit</a></td> -->

                            </tr>
                    <?php }
                    } ?>
                    <!-- Add Grand Total row -->
                    <tr style="font-weight:bold; text-align:center;background-color:#476f95;">
                        <td colspan='4' style="text-align: center;">
                            <h3>Grand Total</h3>
                        </td>
                    <?php
                    // Calculate grand total for selected year
                    $totalColumns = ['unit_jan_feb', 'amount_jan_feb', 'unit_mar_apr', 'amount_mar_apr', 'unit_may_june', 'amount_may_june', 'unit_jul_aug', 'amount_jul_aug', 'unit_sep_oct', 'amount_sep_oct', 'unit_nov_dec', 'amount_nov_dec'];

                    foreach ($totalColumns as $column) {
                        $sqlSum = "SELECT SUM($column) FROM EBbills WHERE year = '$selectedYear'";
                        $resultSum = mysqli_query($conn, $sqlSum);
                        $rowSum = mysqli_fetch_assoc($resultSum);
                        $total = array_shift($rowSum);
                        echo "<td>" . ($total ?? 0) . "</td>";
                    }

                    // Overall Unit and Amount Total for the selected year
                    $sqlUnitTotal = "SELECT SUM(unitTotal) FROM EBbills WHERE year = '$selectedYear'";
                    $resultUnitTotal = mysqli_query($conn, $sqlUnitTotal);
                    $rowUnitTotal = mysqli_fetch_assoc($resultUnitTotal);
                    $totalUnitTotal = array_shift($rowUnitTotal);

                    $sqlAmountTotal = "SELECT SUM(amountTotal) FROM EBbills WHERE year = '$selectedYear'";
                    $resultAmountTotal = mysqli_query($conn, $sqlAmountTotal);
                    $rowAmountTotal = mysqli_fetch_assoc($resultAmountTotal);
                    $totalAmountTotal = array_shift($rowAmountTotal);

                    echo "<td>" . ($totalUnitTotal ?? 0) . "</td>";
                    echo "<td>" . ($totalAmountTotal ?? 0) . "</td>";
                }
                    ?>
                    </tr>



                </table>
                <?php  // confirm Delete message

                if (isset($_POST['delete_btn_set'])) {

                    $del_id = $_POST['delete_id'];

                    $sql_delete = "DELETE FROM EBbills WHERE id ='$del_id'";
                    $sql_delete_run = mysqli_query($conn, $sql_delete);
                }
                ?>
                <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

                <!-- <script  src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
                <script src="sweetalert.js"></script>

                <script>
                    $(document).ready(function() {
                        $('.delete_btn_ajax').click(function(e) {
                            e.preventDefault();
                            // console.log(hello); 
                            var delete_id = $(this).closest("tr").find('.delete_id_value').val();
                            // console.log(id);
                            swal({
                                    title: "Are you sure?",
                                    text: "Once deleted, you will not be able to recover this Data!",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        $.ajax({
                                            type: "POST",
                                            url: "EBview.php",
                                            data: {
                                                "delete_btn_set": 1,
                                                "delete_id": delete_id,
                                            },
                                            success: function(response) {

                                                swal("Data deleted Sucessfully!", {
                                                    icon: "success",
                                                }).then((result) => {
                                                    location.reload();
                                                });
                                            } // sucess query

                                        })



                                    }
                                });



                        });
                    });
                </script>


</body>

</html>