<?php 
session_start()?>
<html>
<head>
    <title>Who Want To Be A Millionaire?</title>
    <link rel="stylesheet" href="css/home.css">
    </head>
<body>
<audio autoplay><source src="audio/Intro.mp3"></audio>
    <ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="signup.php"> Register</a></li>
  <li><a href="login.php"> Log in</a></li>
  <li><a href="#about">About us</a></li>
  
         
</ul>
	
	<div class="logo"><img src="images/logo.png" alt="Millionaire">
	</div>
    
    <h1> Who Wants To Be A Millionaire? </h1>
    
    <p style="text-align: center">Is your IQ score high enough to be considered a genius?  </p>
    <br>
    <h2> * How this game works ?</h2>
    <p>There are total 12 questions in the game. You choose the best answer. If your answer is correct, it will move on.</p>
    <p>If you're wrong, <span style="font-weight: bolder; color: #f5810c">you will lose all of money you have won.</span> </p>
    <p>You can <span style="font-weight: bolder; color: #f5810c">exchange question once</span> and <span style="font-weight: bolder; color: #f5810c">ask for audience once</span> when you confuse.</p>
    <br>
    <div class="center">
    <form>
         <input type="submit" formaction="login.php" value="Let's Play">
    </form>
    </div>
    
    
    </body>
</html>