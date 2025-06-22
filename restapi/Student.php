<?php
require_once 'config.php';

class Student {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAllStudents() {
        $stmt = $this->conn->prepare("SELECT * FROM students");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudentById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addStudent($data) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO students ( last_name, first_name, middle_name, date_of_birth, gender, address, mobile_no, email, date_registered
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([ $data['last_name'], $data['first_name'], $data['middle_name'], $data['date_of_birth'], $data['gender'], $data['address'],  $data['mobile_no'], $data['email'], $data['date_registered'] ]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    public function updateStudent($id, $data) {
        $stmt = $this->conn->prepare("UPDATE students SET 
            last_name = ?, first_name = ?, middle_name = ?, date_of_birth = ?, 
            gender = ?, address = ?, mobile_no = ?, email = ?, date_registered = ?
            WHERE id = ?");
        
        return $stmt->execute([
            $data['last_name'], $data['first_name'], $data['middle_name'],
            $data['date_of_birth'], $data['gender'], $data['address'],
            $data['mobile_no'], $data['email'], $data['date_registered'], $id
        ]);
    }

    public function deleteStudent($id) {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
