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

 $getGay = $connection->prepare("SELECT * FROM gaylist");
  $getGay->execute();

  $result = $getGay->fetchAll();
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
  <h1 class="text-gray-500 text-xl bg-black">
  <?php

  foreach ($result as $row) {
    echo $row['gayname'] . "  is gay " . $row["gayage"] . "<br>";
  }
    ?>      
      hello world
  </h1>

    <div> 
      <nav class="flex justify-between"> 
        <div>logo</div>
        <ul class="flex [&>li]:m-10">
          <li>Home</li>
          <li>About</li>
          <li>Contact</li>
          </ul>
      </nav>

    </div>
     
  </body>
</html>

