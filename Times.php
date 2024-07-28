<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiplication Table</title>
  <style>
    .table {
      display: flex;
      flex-wrap: wrap;
      border-left: 2px solid green;
    }

    .column {
      margin: 0 10px;
      padding-right: 10px;
      position: relative;
    }

    .column::after {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      height: 100%;
      border-right: 2px solid green;
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