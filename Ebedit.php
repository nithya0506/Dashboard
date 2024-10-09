 <?php

    include 'includes/db.php';
    include 'includes/functions.php';
    $id = $_GET['id'];

    // Fetching the EB data
    $sql = "SELECT * FROM EBbills where id='$id'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $month = $_POST['month'];
      

        // $unit = '';
        // $amount = '';
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

        // Check the selected month pair and get the corresponding unit and amount
        if ($month === 'Jan-Feb') {
            $unit1 = $_POST['unit_jan_feb'];
            $amount1 = $_POST['amount_jan_feb'];
        } elseif ($month === 'Mar-Apr') {
            $unit2 = $_POST['unit_mar_apr'];
            $amount2 = $_POST['amount_mar_apr'];
        } elseif ($month === 'May-Jun') {
            $unit3 = $_POST['unit_may_june'];
            $amount3 = $_POST['amount_may_june'];
        } elseif ($month === 'Jul-Aug') {
            $unit4 = $_POST['unit_jul_aug'];
            $amount4 = $_POST['amount_jul_aug'];
        } elseif ($month === 'Sep-Oct') {
            $unit5 = $_POST['unit_sep_oct'];
            $amount5 = $_POST['amount_sep_oct'];
        } elseif ($month === 'Nov-Dec') {
            $unit6 = $_POST['unit_nov_dec'];
            $amount6 = $_POST['amount_nov_dec'];
        }




        $sql = "UPDATE EBbills SET unit_jan_feb='$unit1', amount_jan_feb='$amount1',unit_mar_apr='$unit2',amount_mar_apr='$amount2',unit_may_june='$unit3',amount_may_june='$amount3',unit_jul_aug='$unit4',amount_jul_aug='$amount4',unit_sep_oct='$unit5',amount_sep_oct='$amount5',unit_nov_dec='$unit6',amount_nov_dec='$amount6' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // $conn->close();
    ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
     <link rel="stylesheet" href="/assets/./css/application.css">
 </head>
 <style>
     form {
         width: 50%;
         margin: auto;
     }

     table {
         width: 100%;
         border-collapse: collapse;
     }

     th,
     td {
         border: 1px solid #ddd;
         padding: 8px;
         text-align: left;
     }

     th {
         background-color: #f2f2f2;
     }

     .hidden {
         display: none;
     }
 </style>
 <script>
     function handleMonthChange() {
         const month = document.getElementById("month").value;
         document.querySelectorAll(".unit-amount").forEach(element => element.classList.add("hidden"));

         if (month === "Jan-Feb") {
             document.getElementById("unit-amount-jan-feb").classList.remove("hidden");
         } else if (month === "Mar-Apr") {
             document.getElementById("unit-amount-mar-apr").classList.remove("hidden");
         } else if (month === "May-Jun") {
             document.getElementById("unit-amount-may-june").classList.remove("hidden");
         } else if (month === "Jul-Aug") {
             document.getElementById("unit-amount-jul-aug").classList.remove("hidden");
         } else if (month === "Sep-Oct") {
             document.getElementById("unit-amount-sep-oct").classList.remove("hidden");
         } else if (month === "Nov-Dec") {
             document.getElementById("unit-amount-nov-dec").classList.remove("hidden");
         }
     }
 </script>

 <body>
     <div class="Eb-editform ">
         <button onclick="window.location.href='ebview.php'" class="buttons"><i class="fa-solid fa-arrow-left"></i></button>
         <div class="card">
             <div class="card-header">
                 <h4>Update Unit and Amount</h4>
             </div>
             <div class="card-body">
                 <form action="" method="post">
                    
                     <label for="month">Select Month:</label>
                     <select id="month" name="month" onchange="handleMonthChange()">
                         <option value="">--Select Month--</option>
                         <option value="Jan-Feb">January - February</option>
                         <option value="Mar-Apr">March - April</option>
                         <option value="May-Jun">May - June</option>
                         <option value="Jul-Aug">July - August</option>
                         <option value="Sep-Oct">September - October</option>
                         <option value="Nov-Dec">November - December</option>
                     </select>
                     <br>

                     <div id="unit-amount-jan-feb" class="unit-amount hidden">
                         <h5>January - February</h5>
                         <label for="unit-jan-feb">Unit:</label>
                         <input type="text" id="unit-jan-feb" name="unit_jan_feb" value="<?php echo $unit1; ?>">
                         <label for="amount-jan-feb">Amount:</label>
                         <input type="text" id="amount-jan-feb" name="amount_jan_feb" value="<?php echo $amount1; ?>">
                     </div>

                     <div id="unit-amount-mar-apr" class="unit-amount hidden">
                         <h5>March - April</h5>
                         <label for="unit-mar-apr">Unit:</label>
                         <input type="text" id="unit-mar-apr" name="unit_mar_apr" value="<?php echo $unit2; ?>">
                         <label for="amount-mar-apr">Amount:</label>
                         <input type="text" id="amount-mar-apr" name="amount_mar_apr" value="<?php echo $amount2; ?>">
                     </div>

                     <div id="unit-amount-may-june" class="unit-amount hidden">
                         <h5>May - June</h5>
                         <label for="unit-may-june">Unit:</label>
                         <input type="text" id="unit-may-june" name="unit_may_june" value="<?php echo $unit3; ?>">
                         <label for="amount-may-jun">Amount:</label>
                         <input type="text" id="amount-may-june" name="amount_may_june" value="<?php echo $amount3; ?>">
                     </div>

                     <div id="unit-amount-jul-aug" class="unit-amount hidden">
                         <h5>July - August</h5>
                         <label for="unit-jul-aug">Unit:</label>
                         <input type="text" id="unit-jul-aug" name="unit_jul_aug" value="<?php echo $unit4; ?>">
                         <label for="amount-jul-aug">Amount:</label>
                         <input type="text" id="amount-jul-aug" name="amount_jul_aug" value="<?php echo $amount4; ?>">
                     </div>

                     <div id="unit-amount-sep-oct" class="unit-amount hidden">
                         <h5>September - October</h5>
                         <label for="unit-sep-oct">Unit:</label>
                         <input type="text" id="unit-sep-oct" name="unit_sep_oct" value="<?php echo $unit5; ?>">
                         <label for="amount-sep-oct">Amount:</label>
                         <input type="text" id="amount-sep-oct" name="amount_sep_oct" value="<?php echo $amount5; ?>">
                     </div>

                     <div id="unit-amount-nov-dec" class="unit-amount hidden">
                         <h5>November - December</h5>
                         <label for="unit-nov-dec">Unit:</label>
                         <input type="text" id="unit-nov-dec" name="unit_nov_dec" value="<?php echo $unit6; ?>">
                         <label for="amount-nov-dec">Amount:</label>
                         <input type="text" id="amount-nov-dec" name="amount_nov_dec" value="<?php echo $amount6; ?>">
                     </div>
                     <br><br>

                     <button type="submit" class="btn btn-success">Update</button>

                 </form>
             </div>
         </div>
     </div>

 </body>

 </html>

 <?php
    include 'includes/footer.php';
    ?>