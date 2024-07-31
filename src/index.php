<?php
require 'navbar.php';
$dsn = 'mysql:dbname=mydatabase;host=mysql;port=3306';
$dbuser = 'myuser';
$dbPassword = 'mypassword';

try {
  $connection = new PDO($dsn, $dbuser, $dbPassword);
  echo "Connection successful" . "<br>";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage() . " (" . $e->getCode() . ")";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <title></title>
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <div class="text-gray-500 text-xl bg-black">
    <?php

    $singer = $connection->prepare("SELECT * FROM best_singer");
    $singer->execute();

    $result = $singer->fetchAll();

    foreach ($result as $row) {
      $name = $row['name'];
      $talent = $row['talent'];
      $description = $row['description'];
      $image = $row["uri"];
      echo $name . "<br>" . $talent . "<br>" . $description . "<br>" . $image . "<br>" . "<image src='$image' alt='singer image'>";
    }
    ?>
  </div>



</body>

</html>
