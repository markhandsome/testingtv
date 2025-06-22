<?php
include 'curl_helper.php';
$response = sendRequest("http://localhost/CIA/restapi/api.php/students");
echo $response;
?>
