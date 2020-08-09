<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wejap- week3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .message {
            color: #FF0000;
        }
    </style>
</head>
<body>
    <?php
    session_start();
         // define variables and set to empty values
    $firstnameErr = $secondnameErr = $emailErr = $genderErr = $dobErr = $colorErr = $departmentErr= $passwordErr = "";
    $firstname = $secondname = $email = $gender = $dob = $color = $department = $password = "";

    if (isset($_POST['submit'])) {

        if (empty($_POST["firstname"])) {
         $firstnameErr = "Name is required";
     }else {
         $name = test_input($_POST["firstname"]);
     }

     if (empty($_POST["secondname"])) {
        $secondnameErr = " secondName is required";
    }else {
        $name = test_input($_POST["secondname"]);
    }


    if (empty($_POST["email"])) {
     $emailErr = "Email is required";
 }else {
     $email = test_input($_POST["email"]);

               // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
  }
}
if (empty($_POST["genderM"]) && ($_POST["genderF"])) {
    $genderErr = "Gender is required";
}elseif(($_POST['genderM'] == "male") && ($_POST['genderF'] == "female")){
    $genderErr = "you can't select both male and female";
}

else {
    $gender = test_input($_POST["gender"]);
}


if (empty($_POST["dob"])) {
 $dobErr = "Date of birth is required";
}else {
 $dob = test_input($_POST["dob"]);
}

if (empty($_POST["color"])) {
 $colorErr = "color is required";
}else {
 $color = test_input($_POST["color"]);
}

if (empty($_POST["department"])) {
    $departmentErr = "department is required";
}else {
    $department = test_input($_POST["department"]);
}

if (empty($_POST["password"])) {
    $psaswordErr = "passowrd is required";
}
elseif (strlen($_POST["password"]) <= '15') {
    $passwordErr = "Your Password Must Contain At Least 15 Characters!";
}
elseif(!preg_match("#[0-9]+#", $_POST["password"])) {
    $passwordErr = "Your Password Must Contain At Least 1 Number!";
}
elseif(!preg_match("#[A-Z]+#", $_POST["password"])) {
    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
}
elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
    $passwordErr = "Your Password Must Contain At Least 1 Special Character !";
}else{
    $password = test_input($_POST["password"]);
}

if ($firstnameErr == "" && $secondnameErr =="" && $emailErr =="" && $genderErr =="" && $dobErr =="" && $colorErr =="" && $departmentErr =="" && $passwordErr == "") {
    $_SESSION['firstname'] = $firstname;
    $_SESSION['secondname'] = $secondname;
    $_SESSION['gender'] = $gender;
    $_SESSION['dob'] = $dob;
    $_SESSION['color'] = $color;
    $_SESSION['department'] = $department;
    header('location:color.php');    
    ; 
}

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="container mt-5">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <h4 class="text-center">Fill Bio-Data</h4>
                    <hr>
                    <div class="row">                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> First Name </label>
                                <input type="text" name="firstname" class="form-control" placeholder=" First Name">
                                <span class ="message" > <?php echo $firstnameErr;?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Second Name </label>
                                <input type="text" name="secondname" class="form-control" placeholder=" Second Name">
                                <span class ="message" > <?php echo $secondnameErr;?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Email </label>
                                <input type="email" name="email" class="form-control" placeholder=" Email">
                                <span class ="message" > <?php echo $emailErr;?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Date of Birth </label>
                                <input type="date" name="dob" class="form-control" placeholder=" Date of birht">
                                <span class ="message" > <?php echo $dobErr;?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Favourite Color </label>
                                <input type="color" name="color" class="form-control" placeholder=" First Name">
                                <span class ="message" > <?php echo $colorErr;?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Gender  </label>
                                <div class="form-check">

                                  <label class="form-check-label" for="check1">
                                    <input type="checkbox" class="form-check-input" name="genderM" value="male">Male
                                </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label" for="check2">
                                <input type="checkbox" class="form-check-input"  name="genderF" value="female">Female
                            </label>
                        </div>
                        <span class ="message" > <?php echo $genderErr;?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Department  </label>
                        <select name="department" class="form-control">
                            <option value="">--- select department---</option>
                            <option value="it"> IT </option>
                            <option value="hr"> HR </option>
                            <option value="staff"> STAFF </option>
                        </select>
                        <span class ="message" > <?php echo $departmentErr;?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Password </label>
                        <input type="password" name="password" class="form-control">
                        <span class ="message"> <?php echo $passwordErr;?></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block"  name="submit" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>


