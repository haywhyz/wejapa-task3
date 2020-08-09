<?php
session_start();

?>
    
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>color page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body style= "background-color: <?php echo $_SESSION['color'] ?> ">
  <center><h2>Below are your Details </h2></center>

  
    <p>
   <h4> <?php echo $_SESSION['firstname'] ?></h4>
    </p>

    <p>
   <h4> <?php echo $_SESSION['secondname'] ?></h4>
    </p>

    <p>
   <h4> <?php echo $_SESSION['email'] ?></h4>
    </p>

    <p>
    <h4><?php echo $_SESSION['gender'] ?></h4>
    </p>
    <p>
   <h4> <?php echo $_SESSION['dob'] ?></h4>
    </p>
    <p>
   <h4> <?php echo $_SESSION['department'] ?></h4>
    </p>

</body>
</html>