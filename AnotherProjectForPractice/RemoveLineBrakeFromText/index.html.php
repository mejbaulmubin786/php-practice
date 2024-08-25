<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Text Replacement Example</title>
    <link rel="stylesheet" href="styles.css">

  </head>
  <body>
    <header>
        <h1>Text Replacement Application</h1>
    </header>
    <div class="container">
    <form method="post" action="process.php">
      <label for="userInput">Enter Text:</label><br />
      <textarea
        id="userInput"
        name="userInput"
        placeholder="Type your text here..."
      ></textarea><br />
      <button type="submit">Replace Line Breaks</button>
    </form>
    </div>

    <!-- Check if $replacedText is set and not empty -->
    <?php if (isset($replacedText)): ?>
    <div class="result">
      <h2>Resulting Text:</h2>
      <textarea><?php echo htmlspecialchars($replacedText); ?></textarea>
    </div>
    <?php endif;?>
    <footer>
        <p>&copy; 2024 Mejbaul Mubin's Text Replacement Application. All rights reserved.</p>
    </footer>
  </body>
</html>
