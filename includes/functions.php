<?php
session_start();
// error message
function errormessage()
{
    if (isset($_SESSION['errormessage'])) {
        $output = "<div class=\"alert alert-danger\">";
        $output .= htmlentities($_SESSION['errormessage']);
        $output .= " </div>";
        $_SESSION['errormessage'] = null;
        return $output;
    }
}

// success message
function successmessage()
{
    if (isset($_SESSION['successmessage'])) {
        $output = "<div class=\"alert alert-success\">";
        $output .= htmlentities($_SESSION['successmessage']);
        $output .= " </div>";
        $_SESSION['successmessage'] = null;
        return $output;
    }
}


function Redirect_to($new_location)
{
    header("location:" . $new_location);
    exit;
}
// Eb Unit Total

function unitTotal()
{
    include 'includes/db.php';
    $sqlunitSum = "SELECT (sum(unit_jan_feb)+sum(unit_mar_apr)+sum(unit_may_june)+sum(unit_jul_aug)+ sum(unit_sep_oct)+sum(unit_nov_dec)) as Total from EBbills where id='$id'";
    $result1 = mysqli_query($conn, $sqlunitSum);
    mysqli_num_rows($result1);
    $row = mysqli_fetch_assoc($result1);
    $Totalunits = array_shift($row);
    echo $Totalunits;
}






function exportexcel2025()
{
    header("Content-Type:application/vnd.ms-excel");
    header("Content-Disposition: attachment; Filename = MyData.xls");

    require '2025ebview.php';
}

function exportexcel2026()
{
    header("Content-Type:application/vnd.ms-excel");
    header("Content-Disposition: attachment; Filename = MyData.xls");

    require '2026ebview.php';
}

?>
<?php
function exportexcel(){
header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition: attachment; Filename = MyData.xls");

require 'ebview.php';
}
?>