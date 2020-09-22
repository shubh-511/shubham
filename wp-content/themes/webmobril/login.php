<?php
include "config.php";

//session_start();
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$encpassword = md5($password);
$email = test_input($email);
$sql = "SELECT * FROM users where email = '$email' and password = '$encpassword'";
$selectresult = mysqli_query($con, $sql);


if(empty($email))
{
	echo 2;
}
elseif(empty($password))
{
	echo 3;
}

elseif(mysqli_num_rows($selectresult) == 0) 
{
	echo 4;
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //$emailErr = "Invalid email format"; 
	  echo 5;
    }

else{
    //$sql_query = "insert into users where ='".$uname."' and password='".$password."'";
	$sql_query = "SELECT * FROM users where email = '$email' and password = '$encpassword'";
	
    $result = mysqli_query($con,$sql_query);
    //$row = mysqli_fetch_array($result);

    $count = count($result);

    if($count > 0){ 
	
		while($row = mysqli_fetch_assoc($result)) {
		$_SESSION['id'] = $row['id'];
        }
		echo 1;
    }else{
        echo 0;
    }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>