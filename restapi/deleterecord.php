<?php
include 'curl_helper.php';
$id = 1;
$response = sendRequest("http://localhost/CIA/restapi/api.php/students/$id", 'DELETE');
echo $response;
?>
