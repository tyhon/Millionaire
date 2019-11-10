<html>
<head>
<title> Logic and IQ Test</title>
    <link rel="stylesheet" href="css/forget.css">
  </head>
<body>
    <form method="POST">
    <ul>
        <li><a href="home.php"> Home</a></li>
         <li><a href="signup.php"> Register</a></li>
        <li><a href="login.php"> Log in</a></li>
        <li><a href="forget.php"> Forget password</a></li>
        
        
  <li><a href="#about">About us</a></li>
    </ul>
    <h1> Forget password ?</h1>
    
    <div class="frgt center">
        <label> Username :</label>
        <input type="text" name="username" placeholder="username@email.com" required><br>
        <br>
        
    </div>
    <button class="button" type="submit" name="submit">Submit</button>
    </form>
    </body>
</html>
<?php

if(isset($_POST) & !empty($_POST))
{
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $sql="select * from register where username='$username'";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    if($count==1)
    {
        $r=mysqli_fetch_assoc($res);
        $password=$r['password'];
        $to=$r['username'];
        $subject="your recovered password";
        $message="please use this password to login".$password;
        $headers="from:amanvr2@gmail.com";
        if(mail($to,$subject,$message,$headers))
        {
            echo"your password has been sent to your email id";
        }
        else{
            echo"username doesnot exist in database";
            
        }
    
    }
    
}
?>