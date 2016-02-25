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
        $pres = $row["ppres"];
        $pcap = $row["pcap"];
    }
}

$percent = round($pres/$pcap*100, 2);

$arr = array('ppres' => $pres, 'pcap' => $pcap, 'percent' => $percent);
echo json_encode($arr);

$conn->query($sql);

?>
