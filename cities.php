<?php
// Include your database connection logic here (e.g., $conn)
include_once 'connection.php';

if (isset($_POST['stateId'])) {
    $stateId = $_POST['stateId'];

    $sql = "SELECT city_id, city FROM city_master WHERE state_id = $stateId";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo '<option value="' . $row['city_id'] . '">' . $row['city'] . '</option>';
        }
    } else {
        echo '<option value="">No cities found for this state</option>';
    }
} else {
    echo '<option value="">Invalid state ID</option>';
}
?>
