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

    // Display output in a styled format
    echo "
   <!DOCTYPE html>
   <html lang='en'>
   <head>
       <meta charset='UTF-8'>
       <meta name='viewport' content='width=device-width, initial-scale=1.0'>
       <title>Form Submission Result</title>
       <style>
           body {
               font-family: Arial, sans-serif;
               background-color: #f4f4f4;
               padding: 20px;
               margin: 0;
           }
           .result-container {
               width: 50%;
               margin: auto;
               background: #fff;
               padding: 20px;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           }
           h2 {
               color: #333;
               text-align: center;
           }
           .result {
               margin-top: 20px;
           }
           .result p {
               margin: 10px 0;
               color: #555;
           }
           .result span {
               font-weight: bold;
               color: #333;
           }
       </style>
   </head>
   <body>
       <div class='result-container'>
           <h2>Form Submission Result</h2>
           <div class='result'>
               <p><span>Name:</span> $name</p>
               <p><span>Age:</span> $age</p>
               <p><span>Email:</span> $email</p>
               <p><span>Password:</span> $password</p>
               <p><span>Gender:</span> $gender</p>
               <p><span>Interests:</span> $interests</p>
               <p><span>Country:</span> $country</p>
               <p><span>Bio:</span> $bio</p>
               <p><span>Date of Birth:</span> $dob</p>
               <p><span>Resume:</span> $resume</p>
           </div>
       </div>
   </body>
   </html>";
} else {
    echo "Invalid form submission.";
}
?>
