<?php
include 'curl_helper.php';
$id = 2;

$data = [
    "last_name" => "Dela Cruz",
    "first_name" => "Juanito",
    "middle_name" => "Reyes",
    "date_of_birth" => "2001-05-20",
    "gender" => "Male",
    "address" => "123 Updated Address",
    "mobile_no" => "09998887766",
    "email" => "juanito@example.com",
    "date_registered" => date("Y-m-d")
];

$response = sendRequest("http://localhost/CIA/restapi/api.php/students/$id", 'PUT', $data);
echo $response;
?>
