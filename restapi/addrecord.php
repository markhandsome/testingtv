<?php
include 'curl_helper.php';

$data = [
    "last_name" => "sdads",
    "first_name" => "Ana",
    "middle_name" => "Luz",
    "date_of_birth" => "2003-02-14",
    "gender" => "Female",
    "address" => "456 Cebu City",
    "mobile_no" => "09179876543",
    "email" => "ana.garcia@example.com",
    "date_registered" => date("Y-m-d")
];

$response = sendRequest("http://localhost/restapi/api.php/students", 'POST', $data);
echo $response;
?>
