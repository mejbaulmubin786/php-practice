<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_method']) && $_POST['form_method'] === 'comprehensive') {
    // Retrieve data from the form
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $gender = htmlspecialchars($_POST['gender']);
    $interests = isset($_POST['interests']) ? implode(', ', $_POST['interests']) : 'None';
    $country = htmlspecialchars($_POST['country']);
    $bio = htmlspecialchars($_POST['bio']);
    $dob = htmlspecialchars($_POST['dob']);
    $resume = isset($_FILES['resume']) ? $_FILES['resume']['name'] : 'No file uploaded';

    // Output the data
    echo "<h2>Submitted Data</h2>";
    echo "Name: $name<br />";
    echo "Age: $age<br />";
    echo "Email: $email<br />";
    echo "Password: $password<br />";
    echo "Gender: $gender<br />";
    echo "Interests: $interests<br />";
    echo "Country: $country<br />";
    echo "Bio: $bio<br />";
    echo "Date of Birth: $dob<br />";
    echo "Resume: $resume<br />";
} else {
    echo "Invalid form submission.";
}
?>
