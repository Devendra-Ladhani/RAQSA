<?php
// Connect to your MySQL database
include_once 'connection.php';

// Get the state ID from the AJAX request
$stateId = $_GET['state_id'];

// Fetch cities based on the state ID
$cityQuery = "SELECT id, city_name FROM cities WHERE state_id = $stateId";
$cityResult = mysqli_query($conn,$cityQuery);

$cities = array();

if ($cityResult->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($cityResult)) {
        $cities[] = $row;
    }
}
header('Content-Type: application/json');
echo json_encode($cities);
?>
