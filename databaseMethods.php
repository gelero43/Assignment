<?php
include 'connectionToDB.php';


function insertData($gatewayEui, $profileId, $endpointId, $clusterId, $attributeId, $value, $timestamp){
    $conn = makeConnection();

    $sql = "INSERT INTO myData(gatewayEui, profileId, endpointId, clusterId, attributeId, aValue, aTimestamp)
    VALUES ($gatewayEui, $profileId, $endpointId, $clusterId, $attributeId, $value, UNIX_TIMESTAMP($timestamp) )";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}



