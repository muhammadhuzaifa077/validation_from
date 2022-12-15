<?php
    $field_error1="";
    $field_error2="";
    $field_error3="";
    $field_error4="";
    $field_error5="";
 

    function sanitized_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data , ENT_QUOTES);
    return $data;
}

    if($_SERVER["REQUEST_METHOD"] == "POST"){


      $username= sanitized_data($_POST["username"]);
      $pswd=sanitized_data($_POST["pswd"]);
      $company=sanitized_data($_POST["company"]);
      $comment=sanitized_data($_POST["comment"]);
      $gender=sanitized_data($_POST["gender"]);
      
      echo "<center><h2>Data is sanitized in appropriate format</h2></center>";

    if(empty($_POST["username"])){
        $field_error1 = "This field is not empty";
    }


    if(empty($_POST["pswd"])){
      $pswd=$_POST["pswd"];
      $field_error2 = "This field is not empty";
    }
    $uppercase = preg_match('@[A-Z]@', $pswd);
    $lowercase = preg_match('@[a-z]@', $pswd);
    $number    = preg_match('@[0-9]@', $pswd);
    $specialChars = preg_match('@[^\w]@', $pswd);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pswd) < 8) {
        $field_error2= "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
    }
    else{
        echo "Strong password.";
    } 


    
    if(empty($_POST["company"])){
        $field_error3 = "This field is not empty";
    }
    if(empty($_POST["comment"])){
        $field_error4 = "This field is not empty";
    }
    if(empty($_POST["gender"])){
        $field_error5 = "This field is not empty";
    }

    
        echo "<h4>This is your name =  $username </h4>";
        echo "<h4> This is your password =  $pswd </h4>";
        echo "<h4> This ids your company name =  $company </h4>";
        echo "<h4>  This is the comment =  $comment </h4>";
        echo "<h4>  Your gender =  $gender </h4>";
  }
  ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    span{
        color : red;
    }
  </style>

  </head>
  <body>

  <center><h1>Validation form</h1></center>

  <div class="container" style="border: solid 1px darkgray">
    <form action="<?php echo(htmlspecialchars($_SERVER["PHP_SELF"]));?>" method="POST">
        <div class="form-group">
            Name : <input class="form-control" type="text" name="username">
            <span ><?php echo ($field_error1);?></span>
            <br>
            Password : <input class="form-control" type="password" name="pswd">
            <span ><?php echo ($field_error2);?></span>
            <br>
            Comapny : <input class="form-control" type="text" name="company">
            <span ><?php echo ($field_error3);?></span>
            <br>
            Comment : <textarea class="form-control" name="comment" cols="40" rows="5"></textarea>
            <span ><?php echo ($field_error4);?></span>
            <br>
            Gender  :
            <input type="radio" name="gender" value="Male">Male
            <input type="radio" name="gender" value="Female">Female
            <input type="radio" name="gender" value="Others"> Others
            <br>
            <span ><?php echo ($field_error5);?></span>
            <br>
            <br>
            <input type="submit" name="submit" class="btn btn-success">
        </div>
    </form>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>