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
        $(document).ready(function() {
                    swal({
                        title: "<?php echo $_SESSION['status']; ?>",
                        // text: "You clicked the button!",
                        icon: "<?php echo $_SESSION['status_code']; ?>",
                        button: "Ok.Done!",
                    });
                });
    </script>
<?php
    unset($_SESSION['status']);
}
?>