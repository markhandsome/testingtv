<?php
require_once 'config.php';

$db = new Database();
$conn = $db->connect();

if ($conn) {
    echo "✅ Database connected successfully!";
} else {
    echo "❌ Failed to connect.";
}
?>
