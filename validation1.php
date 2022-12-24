<?php
    session_start();
?>


<?php

$_SESSION["field_error1"] ="";
$_SESSION["field_error2"] ="";
$_SESSION["field_error3"] ="";
$_SESSION["field_error4"] ="";
$_SESSION["field_error5"] ="";

    function sanitized_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data , ENT_QUOTES);
    return $data;
}

    if(isset($_POST["submit"])){


      $username= sanitized_data($_POST["username"]);
      if(empty($_POST["username"])){
          $_SESSION["field_error1"] = "This field is not empty";
      }
      



      $pswd=sanitized_data($_POST["pswd"]);
      if(empty($_POST["pswd"])){
        $_SESSION["field_error2"] = "This field is not empty";
      }
      $uppercase = preg_match('@[A-Z]@', $pswd);
      $lowercase = preg_match('@[a-z]@', $pswd);
      $number    = preg_match('@[0-9]@', $pswd);
      $specialChars = preg_match('@[^\w]@', $pswd);
  
      if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pswd) < 8) {
          $_SESSION["field_error2"]= "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
      }
      else{
          echo "Strong password.";
      } 



      $company=sanitized_data($_POST["company"]);
      if(empty($_POST["company"])){
          $_SESSION["field_error3"] = "This field is not empty";
      }


      $comment=sanitized_data($_POST["comment"]);
        if(empty($_POST["comment"])){
          $_SESSION["field_error4"] = "This field is not empty";
      }


      $gender=sanitized_data($_POST["gender"]);
          if(empty($_POST["gender"])){
              $_SESSION["field_error5"] = "This field is not empty";
          }
      
      echo "<center><h2>Data is sanitized in appropriate format</h2></center>";





    
        echo "<h3>This is your name =  $username </h3>";
        echo "<h3> This is your password =  $pswd </h3>";
        echo "<h3> This ids your company name =  $company </h3>";
        echo "<h3>  This is the comment =  $comment </h3>";
        echo "<h3>  Your gender =  $gender </h3>";
  }
  ?>
