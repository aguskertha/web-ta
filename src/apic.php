<?php
require "koneksi.php";
// $servername = "localhost";

// // REPLACE with your Database name
// $dbname = "id18732653_ta";
// // REPLACE with Database user
// $username = "id18732653_root";
// // REPLACE with Database user password
// $password = "7W147\OtNW\H~@pJ";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $lahan = $pengukuran = $skala = $target = $dosis = $hasil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $lahan = test_input($_POST["lahan"]);
        $pengukuran = test_input($_POST["pengukuran"]);
        $skala = test_input($_POST["skala"]);
        $target = test_input($_POST["target"]);
		$dosis = test_input($_POST["dosis"]);
        
        // Create connection
        // $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO c (lahan, pengukuran, skala, target, dosis)
        VALUES ('" . $lahan . "', '" . $pengukuran . "', '" . $skala . "', '" . $target . "', '" . $dosis . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}