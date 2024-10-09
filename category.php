<?php
include 'includes/db.php';
include 'includes/functions.php';
?>

<?php
 $_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];

if (isset($_POST['submit'])) {    

    $title = $_POST['title'];
    $author =$_SESSION['username'];
    date_default_timezone_set("Asia/Calcutta");
    $currentTime = time();
    $datetime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

    if (empty($title)) {
        $_SESSION['errormessage'] = "All field's must be filled out";
        // Redirect_to("categories.php");
    } elseif (strlen($title) < 3) {
        $_SESSION['errormessage'] = "Category title should be more than 2 characters";
        // Redirect_to("categories.php");
    } elseif (strlen($title) > 49) {
        $_SESSION['errormessage'] = "Category title should be less than 50 characters";
        // Redirect_to("categories.php");
    } else {
        // insert query
        $sql = "INSERT INTO ebcategory (title,author,datetime) VALUES ('$title','$author','$datetime')";
        $sql_run = (mysqli_query($conn, $sql));



        if ($sql_run) {
            $_SESSION['successmessage'] = "Added successfully";
            Redirect_to("category.php");
            // echo "New record created successfully";
        } else {
            $_SESSION['errormessage'] = "Something went wrong. Try Again !";
            Redirect_to("category.php");
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
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Oleo+Script:wght@400;700&display=swap" rel="stylesheet">
    <title>Categories</title>
</head>

<body>
    <!-- <div style="height:10px; background-color:#4CAF50;"></div> -->
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h2 style="color:#fff;"><i class="fas fa-edit" style="color:#c0047b"></i> &nbsp;Manage Categories</h2>
            </a>
           
        </div>
    </nav>


    <!-- Main area start -->

    <section class="container py-5 mb-4">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6" style="min-height:50px">
                <?php echo errormessage();
                echo successmessage();
                ?>
                <form action="category.php" method="POST">
                    <div class="card bg-secondary mb-3">
                        <div class="card-header">
                            <h3 class="text-light">Add Category</h3>
                        </div>
                        <div class="card_body bg-dark mb-4">
                            <div class="form-group">
                                <label for="title"><span class="fieldinfo"> Category Title: </span></label><br>
                                <input class="form-control" type="text" id="title" name="title" placeholder="Enter your Title" value="" style="color:black;">
                            </div>
                            <div class="row m-3 g-3">
                                <div class="col-lg-6 ">
                                    <a href="purchase.php" class="btn btn-warning d-grid"><i class="fas fa-arrow-left"></i>Back to Home</a>
                                </div>
                                <div class="col-lg-6 ">
                                    <button class="btn btn-success d-grid col-12" type="submit" name="submit">
                                        <i class="fas fa-check"></i>Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
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



</body>

</html>