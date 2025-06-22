

<?php


include 'curl_helper.php';
$id = $_GET['id'] ?? 1;
$response = sendRequest("http://localhost/CIA/restapi/api.php/students/$id");
echo $response;
?>
