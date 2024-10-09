<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="css/application.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
    <nav class="navbar navbar-expand-lg" style="background-color:#0C7C59; height:80px;">
        <div class="container-fluid">
            &emsp;<h3><a class="navbar-brand text-white" href="#">
                    Purchased Materials Details
                </a></h3>
            <button class="navbar-toggler btn btn-outline-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="margin-left:auto;">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="purchase-view.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="purchase.php">Add details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                    </li>
                </ul>
                &emsp;
                <ul class="navbar-nav ml-auto search">
                    <form class="d-flex" action="purchase-view.php">
                        <div class="form-group">
                            <input type="text" class="form-control searchform" name="search" placeholder="Search Here" value="">
                </ul>
                <button class="btn btn-primary mx-2 searchbtn" name="searchbutton" value="">Go</button>

                <a class="btn btn-secondary" href="purchaseexport.php">Export to Excel</a>
                <!-- <input type="submit" href="purchaseexport.php" value="Download" class="btn btn-secondary"> -->

            </div>
        </div>
        </form>
        </div>
        </div>
    </nav>
    <br>


    <?php

    include 'includes/db.php';
    $_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];

    session_start();
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];

    if (isset($_GET["searchbutton"]) && ($role == "Admin")) {
        $search = $_GET['search'];

        // $sql = "SELECT * from materials where username='$username' and name like '%$search%' or brand like '%$search%' or category like '%$search%' or place like '%$search%' or quality like '%$search%' or date like '%$search%' or username like '%$search%'";
        $sql = "SELECT * from materials where name like '%$search%' or brand like '%$search%' or category like '%$search%' or place like '%$search%' or quality like '%$search%' or purchased_date like '%$search%'";
        $result = mysqli_query($conn, $sql);

        echo "<table> <tr> <th> Id </th>
                    <th>Material Name </th>
                    <th> Brand</th>
                    <th> Place </th>
                    <th> Quality</th>
                    <th> Category</th>
                    <th> Price </th>
                    <th> Quantity </th>                    
                    <th>Purchased Date </th>
                    <th> Message</th>
                    <th> Author</th>                    
                    <th> Entry Date</th> 
                    <th>Last Updated</th> 
                    <th> Action1 </th>
                    <th> Action2 </th>                 
                    </tr>";

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $brand = $row['brand'];
                $place = $row['place'];
                $quality = $row['quality'];
                $category = $row['category'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $date = $row['purchased_date'];
                $message = $row['message'];
                $username = $row['username'];
                $datetime = $row['datetime'];
                $lastupdated = $row['lastupdated'];
                $updatedby = $row['updatedby'];


    ?>
                <tr>
                    <td class="id"><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $brand; ?></td>
                    <td><?php echo $place; ?></td>
                    <td><?php echo $quality; ?></td>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $message; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php
                        if (strlen($datetime) > 15) {
                            $datetime = substr($datetime, 0, 12);
                        }
                        echo $datetime;
                        ?></td>
                    <td><?php
                        if (strlen($lastupdated) > 15) {
                            $lastupdated = substr($lastupdated, 0, 12);
                        }
                        echo $lastupdated .
                            "<br>" . $updatedby;
                        ?></td>
                    <td><a href='purchase-edit.php?id=<?php echo $id; ?>' class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" class="delete_id_value" name="delete_id" value="<?php echo $id; ?>">
                            <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">Delete</a>

                        </form>
                    </td>
                </tr>
            <?php
            }
        }
    } elseif (isset($_GET["searchbutton"])) {

        $_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];

        $search = $_GET['search'];
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];


        // $sql = "SELECT * from materials where username='$username' and name like '%$search%' or brand like '%$search%' or category like '%$search%' or place like '%$search%' or quality like '%$search%' or date like '%$search%' or username like '%$search%'";
        $sql = "SELECT * from materials where username='$username' and (name like '%$search%' or brand like '%$search%' or category like '%$search%' or place like '%$search%' or quality like '%$search%' or purchased_date like '%$search%')";
        $result = mysqli_query($conn, $sql);

        echo "<table> <tr> <th> Id </th>
                    <th>Material Name </th>
                    <th> Brand</th>
                    <th> Place </th>
                    <th> Quality</th>
                    <th> Category</th>
                    <th> Price </th>
                    <th> Quantity </th>                    
                    <th>Purchased Date </th>
                    <th> Message</th>
                    <th> Authorised Person</th>                   
                    <th> Entry Date</th> 
                    <th>Last Updated</th>
                    <th> Action1 </th>
                    <th> Action2 </th>  

                    </tr>";

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $brand = $row['brand'];
                $place = $row['place'];
                $quality = $row['quality'];
                $category = $row['category'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $date = $row['purchased_date'];
                $message = $row['message'];
                $username = $row['username'];
                $datetime = $row['datetime'];
                $lastupdated = $row['lastupdated'];
                $updatedby = $row['updatedby'];

            ?>
                <tr>
                    <td class="id"><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $brand; ?></td>
                    <td><?php echo $place; ?></td>
                    <td><?php echo $quality; ?></td>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $message; ?></td>
                    <td style="text-align:center"><?php echo $username; ?></td>

                    <td><?php
                        if (strlen($datetime) > 15) {
                            $datetime = substr($datetime, 0, 12);
                        }
                        echo $datetime;
                        ?></td>
                    <td><?php
                        if (strlen($lastupdated) > 15) {
                            $lastupdated = substr($lastupdated, 0, 12);
                        }
                        echo $lastupdated .
                            "<br>" . $updatedby;
                        ?></td>
                    <td><a href='purchase-edit.php?id=<?php echo $id; ?>' class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" class="delete_id_value" name="delete_id" value="<?php echo $id; ?>">
                            <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">Delete</a>
                    </td>
                    </form>

                </tr>
            <?php
            }
        }
    } elseif ($role == "Admin") {

        $_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
        $username = $_SESSION['username'];

        $sql = "SELECT * from materials";
        $result = mysqli_query($conn, $sql);

        echo "<table> <tr> <th> Id </th>
                    <th>Material Name </th>
                    <th> Brand</th>
                    <th> Place </th>
                    <th> Quality</th>
                    <th> Category</th>
                    <th> Price </th>
                    <th> Quantity </th>                    
                    <th> Purchased Date </th>
                    <th> Message</th>
                    <th> Authorised Person</th>                   
                    <th> Entry Date</th> 
                    <th>Last Updated</th> 
                    <th> Action1 </th>
                    <th> Action2 </th>                    
    </tr>";

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $brand = $row['brand'];
                $place = $row['place'];
                $quality = $row['quality'];
                $category = $row['category'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $date = $row['purchased_date'];
                $message = $row['message'];
                $username = $row['username'];
                $datetime = $row['datetime'];
                $lastupdated = $row['lastupdated'];
                $updatedby = $row['updatedby'];
            ?>
                <tr>
                    <td class="id"><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $brand; ?></td>
                    <td><?php echo $place; ?></td>
                    <td><?php echo $quality; ?></td>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $message; ?></td>
                    <td style="text-align:center"><?php echo $username; ?></td>

                    <td><?php
                        if (strlen($datetime) > 15) {
                            $datetime = substr($datetime, 0, 12);
                        }
                        echo $datetime;
                        ?></td>
                    <td><?php

                        if (strlen($lastupdated) > 15) {
                            $lastupdated = substr($lastupdated, 0, 12);
                        }
                        echo $lastupdated .
                            "<br>" . $updatedby;
                        ?></td>
                    <td><a href='purchase-edit.php?id=<?php echo $id; ?>' class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" class="delete_id_value" name="delete_id" value="<?php echo $id; ?>">
                            <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">Delete</a>
                    </td>
                    </form>
                </tr>
            <?php  }
        }
    } elseif ($role == "User") {
        $_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];

        $username = $_SESSION['username'];
        // $role = "Admin";

        $sql = "SELECT * from materials where username='$username'";
        $result = mysqli_query($conn, $sql);

        echo "<table> <tr> <th> Id </th>
                    <th>Material Name </th>
                    <th> Brand</th>
                    <th> Place </th>
                    <th> Quality</th>
                    <th> Category</th>
                    <th> Price </th>
                    <th> Quantity </th>                    
                    <th> purchased Date </th>
                    <th> Message</th>
                    <th> Author</th>                   
                    <th> Entry Date</th> 
                    <th>Last Updated</th> 
                    <th> Action1 </th>
                    <th> Action2 </th>                   
    </tr>";

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $brand = $row['brand'];
                $place = $row['place'];
                $quality = $row['quality'];
                $category = $row['category'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $date = $row['purchased_date'];
                $message = $row['message'];
                $username = $row['username'];
                $datetime = $row['datetime'];
                $lastupdated = $row['lastupdated'];
                $updatedby = $row['updatedby'];


            ?>
                <tr>
                    <td class="id"><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $brand; ?></td>
                    <td><?php echo $place; ?></td>
                    <td><?php echo $quality; ?></td>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $message; ?></td>
                    <td><?php echo $username; ?></td>

                    <td><?php
                        if (strlen($datetime) > 15) {
                            $datetime = substr($datetime, 0, 12);
                        }
                        echo $datetime;
                        ?></td>
                    <td><?php

                        if (strlen($lastupdated) > 15) {
                            $lastupdated = substr($lastupdated, 0, 12);
                        }
                        echo $lastupdated .
                            "<br>" . $updatedby;
                        ?></td>
                    <td><a href='purchase-edit.php?id=<?php echo $id; ?>' class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" class="delete_id_value" name="delete_id" value="<?php echo $id; ?>">
                            <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">Delete</a>
                    </td>
                    </form>
                </tr>

    <?php }
        }
    }

    echo '</table>';


    // confirm Delete message

    if (isset($_POST['delete_btn_set'])) {

        $del_id = $_POST['delete_id'];

        $sql_delete = "DELETE FROM materials WHERE id ='$del_id'";
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
                                url: "purchase-view.php",
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


    <!-- <script>alert('hello')</script> -->
</body>

</html>