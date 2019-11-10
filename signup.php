<?php session_start()?>
<!doctype html>
<html>
<head>
<title> Who Want To Be A Millionaire? </title>
    <link rel="stylesheet" href="css/signup.css">
  </head>
<body>
    

    
    <ul>
        <li><a href="home.php"> Home</a></li>
        <li><a href="signup.php"> Register</a></li>
        <li><a href="login.php"> Log in</a></li>
        
    </ul>
    <h1> Registration page </h1>
    <form method="post">
    <div class="frm">
    <label> First name :</label>
    <input type="text" name="firstname" value="" placeholder="first name" required><br><br>
    <label> Last name :</label>
    <input type="text" name="lastname" value="" placeholder="last name" required><br><br>
    <label> Username :</label>
    <input type="text" name="username" value="" required><br><br>
    <label> Password :</label>
    <input type="password" name="password" value=""  required><br><br>
    <br><br>
      <input type="submit" name="submit" value="Sign Up" class="button">
    </div>
    <div></div>
        
  
 
        </form>
</body>
</html>
    <?php

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    

        $logins[$username]=$password;
    

print_r($logins);
}

    ?>