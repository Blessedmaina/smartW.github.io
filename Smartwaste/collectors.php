
<?php
if(empty($_POST["co"])){
    die("Company name is required");
  }
  if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
    
  }
  if(empty($_POST["password"])){
      die("password field cannot be empty");
  }
  if(strlen($_POST["password"])<8){
    die("Password must be at least 8 characters");
  }
  if(! preg_match("/[a-z]/i",$_POST["password"])){
    die("Password must contain at least one letter");
  }
  if(! preg_match("/[0-9]/", $_POST["password"])){
    die("Password must contain at least one number");
  }
  
require __DIR__  ."/enterdata.php";

// Check if email already exists in the table
$email = $_POST['email'];

$sql = "SELECT * FROM userdata WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  echo "email already exists";
} 
  $sql = "INSERT INTO collectors(co, email, `password`)
          VALUES(?,?,?)";
  $stmt = $mysqli->stmt_init();
  
  if(!$stmt->prepare($sql)){
    die("SQL error:" .$mysqli->$connect_error);
  }
  
  $stmt->bind_param("sss", 
                    $_POST["co"],
                    $_POST["email"],
                    $_POST["password"]);
  
  $stmt->execute();


echo "Account created Successfully";

$stmt->close();
$mysqli->close();

?>