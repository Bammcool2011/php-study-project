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


  <div class="text-[46px] text-bold mt-3 w-[55%]">
    <!-- <div class="text-[46px] text-bold grid grid-flow-col auto-cols-auto"> -->
    <?php
    foreach ($result as $row) {
      $name = $row['name'];
      $talent = $row['talent'];
      $description = $row['description'];
      $image = $row["uri"];

    ?>
      <div class='[&>div]:flex ml-5 [&>div]:justify-between [&>div]:mb-5'>
        <div class="">
          TITLE
          <div><?php echo $name ?></div>
        </div>
        <div>
          <div>Talent</div>
          <div><?php echo $talent ?></div>
        </div>
        <div>
          <div>Description</div>
          <div class="text-[1rem] w-[50%]"><?php echo $description ?></div>
        </div>
      </div>
      <img src='<?php echo $image ?>' class='m-5 absolute top-0 right-0 object-cover object-center w-[40%] h-[80vh] mb-[50%]' alt='singer image'>

    <?php }; ?>
  </div>

</body>

</html>
