<?php
function sendRequest($url, $method = 'GET', $data = []) {
    $curl = curl_init();
    $headers = ['Content-Type: application/json'];

    switch ($method) {
        case 'POST':
            curl_setopt($curl, CURLOPT_POST, true); // ✅ REQUIRED
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case 'PUT':
        case 'DELETE':
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case 'GET':
            if (!empty($data)) {
                $url .= '?' . http_build_query($data);
            }
            break;
    }

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers
    ]);

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        echo 'cURL Error: ' . curl_error($curl);
    }

    curl_close($curl);
    return $response;
}

?>
