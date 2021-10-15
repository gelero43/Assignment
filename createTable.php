<?php
include 'connectionToDB.php';

$conn = makeConnection();

$sql = "CREATE TABLE myData (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    gatewayEui INT NOT NULL,
    profileId INT NOT NULL,
    endpointId INT NOT NULL,
    clusterId INT NOT NULL,
    attributeId INT NOT NULL,
    aValue INT NOT NULL,
    aTimestamp TIMESTAMP 
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table myData created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>