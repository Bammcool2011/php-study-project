<?php
require 'navbar.php';
$dsn = 'mysql:dbname=mydatabase;host=mysql;port=3306';
$dbuser = 'myuser';
$dbPassword = 'mypassword';

try {
  $connection = new PDO($dsn, $dbuser, $dbPassword);
  $singer = $connection->prepare("SELECT * FROM best_singer");
  $singer->execute();

  $result = $singer->fetchAll();
  // echo "Connection successful" . "<br>";
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


  <div class="text-[46px] text-bold justify-center items-center flex flex-col mt-3">
    TITLE
    <?php
    foreach ($result as $row) {
      $name = $row['name'];
      $talent = $row['talent'];
      $description = $row['description'];
      $image = $row["uri"];
      echo ("
      <div>$name</div>
      <div>$talent</div>
      <div>$description</div>
      <div> <img src='$image' class='w-40 h-40' alt='singer image'></div>
      ");
    };
    ?>
  </div>

</body>

</html>
