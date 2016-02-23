<?php

include("config.php");


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM locations WHERE name = 'Bib Blandijn'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $old = $row["ppres"];
    }
}

$new = $old + 1;
$sql = "UPDATE locations SET ppres = " . $new . " WHERE name = 'Bib Blandijn'";


$conn->query($sql);

?>
