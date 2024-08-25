<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiplication Table</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      min-height: 100vh;
    }

    h1 {
      color: #333;
      margin-bottom: 20px;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #555;
    }

    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    button[type="submit"] {
      background-color: green;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
      background-color: darkgreen;
    }

    .table {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 20px;
      gap: 15px;
    }

    .column {
      background-color: #fff;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
      text-align: center;
    }

    .column:hover {
      transform: scale(1.05);
    }

    .column::after {
      content: '';
      display: block;
      margin-top: 10px;
      border-bottom: 2px solid green;
      width: 100%;
    }
  </style>
</head>

<body>
  <h1>Multiplication Table</h1>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start = intval($_POST["start"]);
    $counting = intval($_POST["counting"]);
    $end = intval($_POST["end"]);

    echo '<div class="table">';
    for ($i = $start; $i <= $counting; $i++) {
        echo '<div class="column">';
        for ($j = 1; $j <= $end; $j++) {
            echo $i . ' x ' . $j . ' = ' . ($i * $j) . '<br>';
        }
        echo '</div>';
    }
    echo '</div>';
}
?>
  <br>
  <form method="post">
    <label for="start">Start:</label>
    <input type="number" id="start" name="start" required>
    <label for="counting">Counting:</label>
    <input type="number" id="counting" name="counting" required>
    <label for="end">End:</label>
    <input type="number" id="end" name="end" required>
    <button type="submit">Submit</button>
  </form>
</body>

</html>
