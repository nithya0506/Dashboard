<?php
include 'includes/db.php';

$houseNo = $conn->real_escape_string($_GET['houseNo']); // Sanitize input
$years = intval($_GET['years']);
$startYear = intval($_GET['startYear']);

$data = array();

for ($i = 0; $i < $years; $i++) {
    $year = $startYear + $i;

    $sql = "SELECT
        SUM(unit_jan_feb) AS total_units_jan_feb,
        SUM(amount_jan_feb) AS total_amount_jan_feb,
        SUM(unit_mar_apr) AS total_units_mar_apr,
        SUM(amount_mar_apr) AS total_amount_mar_apr,
        SUM(unit_may_june) AS total_units_may_june,
        SUM(amount_may_june) AS total_amount_may_june,
        SUM(unit_jul_aug) AS total_units_jul_aug,
        SUM(amount_jul_aug) AS total_amount_jul_aug,
        SUM(unit_sep_oct) AS total_units_sep_oct,
        SUM(amount_sep_oct) AS total_amount_sep_oct,
        SUM(unit_nov_dec) AS total_units_nov_dec,
        SUM(amount_nov_dec) AS total_amount_nov_dec
    FROM EBbills
    WHERE houseNo = '$houseNo' AND year = '$year'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data[$year] = $result->fetch_assoc();
    } else {
        $data[$year] = [
            'total_units_jan_feb' => 0,
            'total_amount_jan_feb' => 0,
            'total_units_mar_apr' => 0,
            'total_amount_mar_apr' => 0,
            'total_units_may_june' => 0,
            'total_amount_may_june' => 0,
            'total_units_jul_aug' => 0,
            'total_amount_jul_aug' => 0,
            'total_units_sep_oct' => 0,
            'total_amount_sep_oct' => 0,
            'total_units_nov_dec' => 0,
            'total_amount_nov_dec' => 0
        ];
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>