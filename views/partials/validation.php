<?php
  include('signup.php');
  /* Form Required Field Validation */
  foreach($_POST as $key=>$value) {
    if (isset($_POST['register'])) {
      if(empty($_POST[$key])) {
        var_dump($key);
        $error_message = array("$key"=>"Please fill the * feild/s.");
        break;
      }
    }
  }
  /* Email Validation */
  if(!isset($error_message)) {
    /* Validation to check for duplicate emails*/
    $sql = "SELECT email FROM users WHERE email='$email'";
    $duplicate = mysqli_query($connection, $sql);
    dd($duplicate);
    if(mysqli_num_rows($duplicate) >0){
      $errors_message = array("$key"=>"Username already used.");
    }
    /* Validation to check the email fomat */
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $error_message =  array("$key"=>"Invalid Email Address.");
    }
  }


  //code to be written

  /* Password Matching Validation */
  if($_POST['password'] != $_POST['confirm-password']){
    $error_message =  array("$key"=>'Passwords should be same.');
  }

  /* Validation to check if Terms and Conditions are accepted */
  if(!isset($error_message)) {
    if(!isset($_POST["terms"])) {
      $error_message =  array("$key"=>"Accept Terms and Conditions to Register");
    }
  }
?>
