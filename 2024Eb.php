 <?php
    include 'includes/db.php';
    include 'includes/functions.php';


    if (isset($_POST['save'])) {

        $id = $_POST['id'];
        $year = "2024";
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


        // $query = "INSERT INTO EBbills(unit_jan_feb,amount_jan_feb,unit_mar_apr,amount_mar_apr,unit_may_june,amount_may_june,unit_jul_aug,amount_jul_aug,unit_sep_oct,amount_sep_oct,unit_nov_dec,amount_nov_dec)
        //       VALUES ('$unit1','$amount1','$unit2','$amount2','$unit3','$amount3','$unit4','$amount4','$unit5','$amount5','$unit6','$amount6') where id='$id'";

        $query = "
            INSERT INTO EBbills (id, year,unit_jan_feb, amount_jan_feb, unit_mar_apr, amount_mar_apr, unit_may_june, amount_may_june, unit_jul_aug, amount_jul_aug, unit_sep_oct, amount_sep_oct, unit_nov_dec, amount_nov_dec)
            VALUES ('$id','$year', '$unit1', '$amount1', '$unit2', '$amount2', '$unit3', '$amount3', '$unit4', '$amount4', '$unit5', '$amount5', '$unit6', '$amount6')
            ON DUPLICATE KEY UPDATE
            year=VALUES(year),
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
            amount_nov_dec = VALUES(amount_nov_dec)";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {

            $_SESSION['status'] = "Data Registerd successfully";
            $_SESSION['status_code'] = "success";
            // header('location:application.php');
        } else {
            // echo "Something went wrong";
            $_SESSION['status'] = "Data not Registerd";
            $_SESSION['status_code'] = "error";
            // header('location: application.php');
        }
        // mysqli_close($conn);
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel=stylesheet href="css/application.css">
     <title>Eb-2024 </title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>
 <style>

 </style>

 <body>
     <!-- Nav Bar -->
     <nav class="navbar navbar-expand-md navbar-dark  header" id="myHeader">
         <a class="navbar-brand" href="#">SHANTHI MAARKA SABAI EB SERVICE DETAILS - 2024</a>
         <div class="container-fluid">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNav ">
                 <ul class="container navbar-nav">
                     <li class="nav-item">
                         <a class="nav-link text-white" href="2024EB.php">Home</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link text-white" href="2024ebview.php">View</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Year
                         </a>
                         <ul class="dropdown-menu ">
                             <li><a class="dropdown-item " href="2024EB.php">2024</a></li>
                             <li><a class="dropdown-item" href="2025Eb.php">2025</a></li>
                             <li><a class="dropdown-item" href="2026Eb.php">2026</a></li>
                         </ul>
                     </li>

                 </ul>
             </div>
         </div>
     </nav>
     <!-- Nav bar End -->

     <br>
     <?php
        $sql = "SELECT * FROM EBbills";
        $result = mysqli_query($conn, $sql);

        ?>

     <table style="font-size:13px;" class="table table-hover">
         <tr style="font-size:13px; text-align:center;">
             <th rowspan='2'> ID </th>
             <th rowspan='2'>HOUSE NO</th>
             <th rowspan='2'> SERVICE NO</th>
             <th rowspan='2'> SERVICE TYPE</th>
             <th colspan='2'> JAN - FEB </th>
             <th colspan='2'> MAR - APRIL</th>
             <th colspan='2'> MAY - JUNE</th>
             <th colspan='2'> JULY - AUGUST</th>
             <th colspan='2'> SEP - OCTOBER</th>
             <th colspan='2'> NOV - DEC</th>
             <th rowspan='2'> ACTION</th>
         </tr>
         <tr style="font-size:11px;text-align:center;">
             <th>UNIT </th>
             <th>AMOUNT</th>
             <th>UNIT </th>
             <th>AMOUNT</th>
             <th>UNIT </th>
             <th>AMOUNT</th>
             <th>UNIT </th>
             <th>AMOUNT</th>
             <th>UNIT </th>
             <th>AMOUNT</th>
             <th>UNIT </th>
             <th>AMOUNT</th>
         </tr>
         <?php
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
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
            ?>
                 <tr>
                     <input type="hidden" name="year">
                     <td style="text-align:left;"> <?php echo $id; ?></td>
                     <td style="width:100px;text-align:left;"> <?php echo $houseNo; ?></td>
                     <td> <?php echo $serviceNo; ?></td>
                     <td style="width:130px;text-align:left;"> <?php echo $servicetype; ?></td>
                     <form action="" method="POST" style="text-align:center;">
                         <input type="hidden" value="<?php echo $id; ?>" name="id" style="text-align:center">
                         <td><input type="text" name="unit_jan_feb" style="height: 50px;width:50px" value=" <?php echo $unit1; ?>"></td>
                         <td><input type="text" name="amount_jan_feb" style="height: 50px;width:50px" value="<?php echo $amount1; ?>"></td>
                         <td><input type="text" name="unit_mar_apr" style="height: 50px;width:50px" value="<?php echo $unit2; ?>"></td>
                         <td><input type="text" name="amount_mar_apr" style="height: 50px;width:50px" value="<?php echo $amount2; ?>"></td>
                         <td><input type="text" name="unit_may_june" style="height: 50px;width:50px" value="<?php echo $unit3; ?>"></td>
                         <td><input type="text" name="amount_may_june" style="height: 50px;width:50px" value="<?php echo $amount3; ?>"></td>
                         <td><input type="text" name="unit_jul_aug" style="height: 50px;width:50px" value="<?php echo $unit4; ?>"></td>
                         <td><input type="text" name="amount_jul_aug" style="height: 50px;width:50px" value="<?php echo $amount4; ?>"></td>
                         <td><input type="text" name="unit_sep_oct" style="height: 50px;width:50px" value="<?php echo $unit5; ?>"></td>
                         <td><input type="text" name="amount_sep_oct" style="height: 50px;width:50px" value="<?php echo $amount5; ?>"></td>
                         <td><input type="text" name="unit_nov_dec" style="height: 50px;width:50px" value="<?php echo $unit6; ?>"></td>
                         <td><input type="text" name="amount_nov_dec" style="height: 50px;width:50px" value="<?php echo $amount6; ?>"></td>
                         <td><input type="submit" name="save" class="btn btn-success" value="save"></td>
                     </form>
                 </tr>

         <?php }
            } ?>
     </table>


     <?Php


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

     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

     <!-- <script  src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
     <script src="sweetalert.js"></script>


 </body>

 </html>