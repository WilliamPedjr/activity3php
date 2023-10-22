<?php
$form = mysqli_connect('localhost', 'root', 'password') or
    die('Unable to connect. Check your connection parameters.');
mysqli_select_db($form, 'registration') or die(mysqli_error($form));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sex = $_POST['sex'];

    $query = "INSERT INTO user (Fname, Lname, Email, Pass, Sex) 
              VALUES ('$firstname', '$lastname', '$email', '$pass', '$sex')";
    if (mysqli_query($form, $query)) {
        echo "<script>alert('Successfully added.');</script>";
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($form);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration Form</title>
</head>

<body>
    <div class="cont">
    <h1>Registration Form</h1>  
    <form action="" method="post">
    
        <div class="form">
            <label for="firstname">First Name</label><br>
            <input type="text" placeholder="Enter Firstname" name="firstname" required><br>

            <label for="lastname">Last Name</label><br>
            <input type="text" placeholder="Enter Lastname" name="lastname" required><br>

            <label for="email">Email</label><br>
            <input type="text" placeholder="Enter Email" name="email" required><br>

            <label for="pass">Password</label><br>
            <input type="password" name="pass" placeholder="***" id="age" required><br>

            <label for="gender">Sex :</label>
            <label for="male">Male</label>
            <input type="radio" name="sex" id="male" value="male" required>
            <label for="female">Female</label>
            <input type="radio" name="sex" id="female" value="female" required><br><br>

            <input type="submit" name="action" value="Submit" id="submit">
        </div>
    </form>
    </div>
</body>

</html>
