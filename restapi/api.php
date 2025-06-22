<?php
require_once 'Student.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$studentObj = new Student();
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

header("Content-Type: application/json");

if (preg_match('/students\/?(\d+)?/', $requestUri, $matches)) {
    $id = $matches[1] ?? null;

    switch ($requestMethod) {
        case 'GET':
            echo json_encode($id ? $studentObj->getStudentById($id) : $studentObj->getAllStudents());
            break;

            case 'POST':
                $rawInput = file_get_contents("php://input");
                $data = json_decode($rawInput, true);
            
                if (is_null($data)) {
                    echo json_encode([
                        "error" => "Invalid or empty JSON",
                        "raw_input" => $rawInput,
                        "json_last_error" => json_last_error_msg()
                    ]);
                    exit;
                }
            
                echo json_encode(["success" => $studentObj->addStudent($data)]);
                break;
            

        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode(["success" => $studentObj->updateStudent($id, $data)]);
            break;

        case 'DELETE':
            echo json_encode(["success" => $studentObj->deleteStudent($id)]);
            break;

        default:
            http_response_code(405);
            echo json_encode(["error" => "Method Not Allowed"]);
            break;
    }
}
?>
