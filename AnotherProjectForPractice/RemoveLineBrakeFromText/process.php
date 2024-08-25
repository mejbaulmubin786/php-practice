<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // User input text
    $userInputText = $_POST['userInput'];

    // Replace line breaks (\n) with an empty string
    $replacedText = str_replace(array("\r\n", "\r", "\n"), "", $userInputText);

    // Include the HTML page and display the replaced text
    include 'index.html.php';
    exit; // Exit is important to stop further execution
}
?>
