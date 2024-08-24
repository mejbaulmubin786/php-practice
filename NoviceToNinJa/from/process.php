<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['name']) && isset($_GET['age'])) {
    // Handle GET request
    $name = htmlspecialchars($_GET['name']);
    $age = htmlspecialchars($_GET['age']);
    echo "<h2>GET Form Data</h2>";
    echo "Name: $name<br>";
    echo "Age: $age<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    // Handle POST request
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    echo "<h2>POST Form Data</h2>";
    echo "Email: $email<br>";
    echo "Password: $password<br>";
}
?>
