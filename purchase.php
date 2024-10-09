<?php
include 'includes/db.php';
include 'includes/functions.php';


$_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];

if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $place = $_POST['place'];
    $quality = $_POST['quality'];
    $category = $_POST['category'];
    // $image = isset($_FILES['image']);
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $purchased_date = $_POST['purchased_date'];
    $message = $_POST['message'];
    $username = $_SESSION['username'];
    date_default_timezone_set("Asia/Calcutta");
    $currentTime = time();
    $datetime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

    $query = "INSERT INTO materials(name,brand,place,quality,category,price,quantity,purchased_date,message,username,datetime)
              VALUES ('$name','$brand','$place','$quality','$category','$price','$quantity','$purchased_date','$message','$username','$datetime')";
    $query_run = mysqli_query($conn, $query);



    if ($query_run) {


        $_SESSION['status'] = "Data Registerd successfully";
        $_SESSION['status_code'] = "success";
        // header('location:application.php');
    } else {

        $_SESSION['status'] = "Data not Registerd";
        $_SESSION['status_code'] = "error";
        // header('location: application.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/application.css">
</head>

<body>
    <!-- Application Form -->
    <div class="bgimage">
        <a href="logout.php"><button class="logoutbtn">Logout</button></a>
        <a href="category.php"><button class="logoutbtn">Add Category</button></a>
        <a href="dashboard.php"><button class="logoutbtn">Dashboard</button></a>
        <div class="container_purchase">

            <form action="purchase.php" method="POST" class="purchase-form" enctype="multipart/form-data">
                <h3 class="title">Materials Details</h3><br>

                <input type="hidden" id="username" name="username" class="form-control" />
                <label for="name"> Material Name </label><br>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Material Name" required />
                <label for="brand">Brand Name </label><br>
                <input type="text" id="brand" name="brand" class="form-control" required />
                <label for="place">Place of Purchase</label><br>
                <input type="text" id="place" class="form-control" name="place" required />


                <!-- <label for=" image">Upload your Image :</label><br>
                <input type="file" id="image" class="input-box" name="image" /><br />-->


                <label for="category">Select Category</label>
                <select id="category" name="category" class="form-control">
                    <?php
                    // include 'db.php';
                    $sql = "SELECT * from ebcategory";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row['id'];
                        $categoryName = $row['title'];
                    ?>
                        <option><?php echo $categoryName; ?></option>
                    <?php
                    } ?>
                </select><br>
                <div class="d-flex">
                    <label for="price">Price</label> &nbsp;&nbsp;
                    <input type="text" class="form-control" id="price" name="price" required /><br /><br />

                    <label for="quantity">Quantity</label>&nbsp;&nbsp;
                    <input type="text" id="quantity" name="quantity" class="form-control"><br>
                </div>
                <label for="quality">Quality </label>
                <input type="text" id="quality" class="form-control" name="quality" required />
                <label for="purchased_date">Purchased Date </label>
                <input class="form-control" type="date" id="purchased_date" name="purchased_date" required />
                <label for="message">Message</label>
                <textarea id="message" name="message" class="form-control" cols="60" rows="4"></textarea><br>
                <div class="d-flex justify-content-evenly">
                    <input class="submit btn btn-success mx-2" type="submit" value="Submit" name="submit">
                    <!-- <button type="submit" class="btn btn-success " name="submit" onclick="window.location.href='code.php'">Submit</button> -->
                    <button class="btn btn-info mx-2" name="username" onclick="window.location.href='purchase-view.php'">View/Update</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                                url: "categories.php",
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
</body>

</html>