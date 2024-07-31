<!DOCTYPE html>
<html>
<head>
  <title>Porter Robinson Songs</title>
</head>
<body>
  <h1>Porter Robinson Songs</h1>
  <ul>
    <?php
      $songs = ['Shelter', 'Goodbye to a World', 'Sea of Voices', 'Divinity', 'Language'];
      foreach ($songs as $song) {
          echo "<li>$song</li>";
      }
    ?>
  </ul>
</body>
</html>
