<?php 
session_start();
if(isset($_POST['submit']))
{
    $logins = array('chi' => '12345678', 'luong' => 'admin', 'chiluong' => 'admin');
    $leader = array('chi' => '', 'luong' => '', 'chiluong' => '');
    $username=isset($_POST['username']) ? $_POST['username'] : '';
    $password=isset($_POST['pswrd']) ? $_POST['pswrd']: '';
   
    
    if (isset($logins[$username]) && $logins[$username] == $password){
        /* Success: Set session variables and redirect to Protected page  */
        $_SESSION['UserData']['Username']=$logins[$username];
        $_SESSION['count'] = 0;
        $_SESSION['logic'] = 0;
        $_SESSION['score'] = 0;
        $_SESSION['skipQ'] = 0;
        $_SESSION['audience'] = 0;
        header("location:millionaire.php");
        exit;
    } else {
        $sound = "<audio autoplay><source src='audio/fail.mp3'></audio>";
        /*Unsuccessful attempt: Set error message */
        $msg="<span style='color:red; font-weight:bold; font-size:2em;'>Invalid Login</sapn><p style='color:red; font-weight:bold; font-size:15pt;'> User Name or Password is not correct</p>";
    }
  
}

?>
<!doctype html>
<html>
	<head>
		<title> Who Want To Be The Millionaire?</title>
    	<link rel="stylesheet" href="css/login1.css">
    </head>
	<body>
	<?php if($sound){
	echo $sound;
	}?>
    	<ul>
     		<li><a href="home.php"> Home</a></li>
      		<li><a href="signup.php"> Register</a></li>
        	<li><a href="login.php"> Log in</a></li>
		</ul>
		<h1> Who Wants To Be the Millionaire? </h1>
    	
    	<br>
    	<br>
    	<br>
    	<br>
    	<form method="POST">
    		<div class="login">
        	<label> Username :</label>
        	<input type="text" name="username" placeholder="username" required><br>
        	<br>
        	<label> Password :</label>
        	<input type="password" name="pswrd" value=""required><br><br>
       		</div>
    		<div style = 'text-align:center'><input type="submit" name="submit"  class="button" value="Log In">
        	<a href="forget.php" class = "forget"> Forget password ?</a>
    		</div>
    	</form>
    
    <?php if(isset($msg)){?>
    
     <div style = 'text-align: center'><?php echo $msg;?></div>
    
    <?php } ?>
    	</body>
</html>

