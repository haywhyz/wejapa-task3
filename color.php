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
    <label for="">
    <?php echo $_SESSION['firstname'] ?>
    </label>

    <label for="">
    <?php echo $_SESSION['secondname'] ?>
    </label>

    <label for="">
    <?php echo $_SESSION['email'] ?>
    </label>

    <label for="">
    <?php echo $_SESSION['gender'] ?>
    </label>
    <label for="">
    <?php echo $_SESSION['dob'] ?>
    </label>
    <label for="">
    <?php echo $_SESSION['department'] ?>
    </label>

</body>
</html>