<?php

include 'includes/db.php';
include 'includes/functions.php';

// Update the data

$id = $_GET['id'];

// $username = $_SESSION['username'];  


$sql = "SELECT * FROM materials where id='$id'";
$_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
$username = $_SESSION['username'];  

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update-btn'])) {

    $id = $_GET['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $place = $_POST['place'];
    $quality = $_POST['quality'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $purchased_date = $_POST['purchased_date'];
    $message = $_POST['message'];
    date_default_timezone_set("Asia/Calcutta");
    $currentTime = time();
    $lastupdated = strftime("%B-%d-%Y %H:%M:%S", $currentTime);
    $updatedby = $_SESSION['username'];


    $updatesql = "UPDATE materials SET id='$id',name='$name',brand='$brand',place='$place',quality='$quality',category='$category',price='$price',quantity='$quantity',purchased_date='$purchased_date',message='$message',
                   lastupdated = '$lastupdated',updatedby='$updatedby' WHERE id='$id'";

    $updatesql_run = mysqli_query($conn, $updatesql);
    if ($updatesql_run) {

        // echo "Your details are updated successfully!!!<br><br>";
        $_SESSION['status'] = "Data updated successfully";
        $_SESSION['status_code'] = "success";
        // // header('location:application.php');
    } else {
        // echo "data not updated";
        $_SESSION['status'] = "Data not updated";
        $_SESSION['status_code'] = "error";
        // header('location: view.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/application.css">
</head>
<style>
    .buttons {
        margin-left: 10px;
        /* background-color:#5cb15c !important;  */
        background-color: #23c2b2 !important;
        border: none;
        padding: 10px;
        border-radius: 50%;
        font-size: large;
    }

    .buttons i {
        color: white;
        font-size: 23px;
    }
</style>

<body>
    

    <div class="editform">
        <button onclick="window.location.href='purchase-view.php'" class="buttons"><i class="fa-solid fa-arrow-left"></i></button>
        <div class="container1">
            <form action="" method="POST" enctype="multipart/form-data">
                <h3 class="title">Update </h3><br>
                <label for="name"> Material Name </label><br>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Material Name" value=" <?php echo $row['name'] ?? ''; ?> " />
                <label for="brand">Brand Name </label><br>
                <input type="text" id="brand" name="brand" class="form-control" value=" <?php echo $row['brand'] ?? ''; ?> " />
                <label for="place">Place of Purchase</label><br>
                <input type="text" id="place" class="form-control" name="place" value=" <?php echo $row['place'] ?? ''; ?> " />
                <label for="quality">Quality </label>
                <input type="text" id="quality" class="form-control" name="quality" value=" <?php echo $row['quality'] ?? ''; ?> " />

                <label for="category">Category</label>
                <input type="text" id="category" class="form-control" name="category" value="<?php echo $row['category'] ?? ''; ?> " /><br />
                <div class="d-flex">
                    <label for="price">Price</label> &nbsp;&nbsp;
                    <input type="text" class="form-control" id="price" name="price" value=" <?php echo $row['price'] ?? ''; ?> " /><br />

                    <label for="quantity">Quantity</label>&nbsp;&nbsp;
                    <input type="text" id="quantity" name="quantity" class="form-control" value=" <?php echo $row['quantity'] ?? ''; ?> "><br>
                </div>
                <label for="date">Purchased Date </label>
                <input class="form-control" type="text" id="date" name="purchased_date" value=" <?php echo $row['purchased_date'] ?? ''; ?> " />
                <label for="message">Message</label><br>
                <textarea id="message" name="message" class="form-control" cols="60" rows="2"><?php echo $row['message'] ?? ''; ?></textarea><br>

                <input class="submit btn btn-success mx-auto" type="submit" value="Update" name="update-btn">
            </form>
        </div>
    </div>
</body>

</html>

<?php
include 'includes/footer.php';
?>