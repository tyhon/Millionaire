<?php
session_start();
$cookie_name = $username;
$cookie_value = "";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


$content = file_get_contents("questionaire.txt");
$infor = explode("\n", $content);
//print_r($infor);
$answer = file_get_contents("answer.txt");
$ans = explode("\n", $answer);
$key = array();
for($j = 0;$j<count($ans);$j++){
    $key[$j]= $ans[$j];
}



if(isset($_POST['next'])){
    $_SESSION['skipQ']+=1;
    if ($_SESSION['skipQ']<=1){
        $_SESSION['count']+=1;
    }
    if ($_SESSION['skipQ']==1){
        $skip = "<audio autoplay><source src='audio/skip.mp3'></audio>";
    }
}
if (isset($_POST['audience'])){
    $_SESSION['audience'] = $_SESSION['audience'] +  1;
    if($_SESSION['audience']==1){
        $audience = "<audio autoplay><source src='audio/audience.mp3'></audio>";
    }
}
if (isset($_POST['answer']) && $_POST['answer']!==$key[$_SESSION['count']]){
    $wrong = "<audio autoplay><source src='audio/wrong.mp3'></audio>";
    
    $_SESSION['skipQ']=0;
    $_SESSION['audience']=0;
}

?>
<!doctype html>
<html>
<head>
	<title>Who Want To Be A Millionaire?</title>
	
	<link href="css/tessarr.css" rel="stylesheet" type="text/css">
	
	<style type="text/css">
	input.audience{
	   <?php if ($_SESSION['audience']>=1) {echo"background-image: url('images/audienceused.png');";} else {echo"background-image: url('images/audience.png');";}?>
	   background-color:white;
	   width: 170px;
	   height: 100px;
	   background-size: cover;
	   float: left;
	   margin: 8px;
	   font-weight: bold;
    }
    input.skipQ{
	   <?php if ($_SESSION['skipQ']>=1) {echo"background-image: url('images/skipQused.jpg');";} else {echo"background-image: url('images/skipQ.png');";}?>
	   background-color:white;
	   width: 170px;
	   height: 100px;
	   background-size: cover;
	   float: left;
	   margin: 8px;
	   font-weight: bold;
	   
    }
    .Button3{
	-webkit-appearance: none;
	height: 50px;
	width: 100px;
	font-size: larger;
	color: #0ba418;
	font-family: serif;
	text-align: center;
	border-radius: 20px;
}
    	
}
	</style>

</head>
<body>
	<?php if($audience){
	echo $audience;
	} else if($wrong){
	echo $wrong;
	} else if($skip){
	    echo $skip;
	}else {
	    echo "<audio autoplay><source src='audio/main_theme.mp3'></audio>";
	}?>
	
	<ul>
     
        <li><a href="logout.php"> Log Out</a></li>
        
    </ul>
	<div class="logo"><img src="images/logo.png" atl="Millionaire">
	</div>
       
  		<h1>Who Want To Be A Millionaire?</h1>
  	
  	<?php 
  	function checkAnser($i,$u){
  	    if (isset($i) && $i== $u){
  	        return true;
  	    }
  	}
  	
  	if (isset($_POST['answer']) && $_POST['answer']==$key[$_SESSION['count']]){
  	    $_SESSION['score'] = $_SESSION['score'] +  5;
  	    $_SESSION['count']+=1;
  	} 
  	else if (!isset($_POST['answer'])){
  	    
  	} else if (isset($_POST['answer']) && $_POST['answer']!==$key[$_SESSION['count']]){
  	    $_SESSION['score']=0;
  	    $_SESSION['count']=0;
  	    $_SESSION['skipQ']=0;
  	    $_SESSION['audience']=0;
  	    $wrong = "<audio autoplay><source src='audio/wrong.mp3'></audio>";
  	    
  	} 
  	
  	
  	//echo "Your score is: ",$_SESSION['score'];?>
  	
  	<div class = "overall">
  	  		
  		<div class = "score">
  		<div id="progress" style = "width: 100%;height: 30px;padding: 3px;">
		<div id="100"   class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=5) { echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q1: $100</div>
		<div id="200"   class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=10){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q2: $200</div>
		<div id="300"   class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=15){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q3: $400</div>
		<div id="500"   class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=20){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q4: $800</div>
		<div id="1000"  class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=25){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q5: $1600</div>
		<div id="5000"  class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=30){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q6: $3200</div>
		<div id="10000" class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=35){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q7: $10000</div>
		<div id="25000" class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=40){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q8: $25000</div>
		<div id="50000" class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=45){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q9: $50000</div>
		<div id="100000"class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=50){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q10: $100000</div> 
		<div id="50000" class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']>=55){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q11: $500000</div>
		<div id="100000"class="progress--step" style ="width: 30%;height: auto;float: left;	margin: 4px;padding: 0.8em;background-color: <?php if ($_SESSION['score']==60){ echo "yellow";} else echo "blue";?>;background-size: cover;background-position: center center;color: #e7e72c;border-radius: 10px;border: 4px solid #059bf8;font-size: large;font-weight: bolder;font-family: monospace;">Q12: $1 MILLION</div>  
		</div>
		<div>
			<form method='post' action=''>
				<input class='skipQ' type='submit' name='next' value='Next Question'>
			</form>
		</div>
		<div>
			<form method='post' action=''>
				<input class='audience' type='submit' name='audience' value='Ask Audience' >
			</form>
		</div>
  		</div>
  		<div class = "QA">
  			<?php display1($infor[$_SESSION['count']]);
  			
  			if (!isset($_POST['answer'])){
  			    echo "";
  			}else if(checkAnser($_POST['answer'],$key[$_SESSION['count']-1])){
  			    echo "<div class='center win'><p>CONGRATULATION!!! YOU WIN!!!</p></div><div class='center'><img src='images/congrat.gif' alt='Congratulation!!!'></div>";
  			} else {
  			    
  			    echo "<div class='center lose'><p>SORRY!!! YOU LOSE!!!</p></div><div class='center'><img src='images/lose.gif' alt='You are loser!!!'><div>";
  			}
            ?>
  		</div>

  	</div>

<?php 
function display1($infor){
    $arr = explode(",", $infor);
    echo "<form action='' method='post'>
    
    <div class='Qbox'>{$arr[0]}</div>
    <div class='box'><input type='radio' name='answer' class='answer-value-1' value='{$arr[1]}'><span>A: {$arr[1]}</span></div>
    <div class='box'><input type='radio' name='answer' class='answer-value-1' value='{$arr[2]}'><span>B: {$arr[2]}</span></div>
    <div class='box'><input type='radio' name='answer' class='answer-value-1' value='{$arr[3]}'><span>C: {$arr[3]}</span></div>
    <div class='box'><input type='radio' name='answer' class='answer-value-1' value='{$arr[4]}'><span>D: {$arr[4]}</span></div>
    <div style='clear: left'></div>
    <div class='button'><input name='Submit' type='submit' value='Submit' class='Button3'></div>
    </form>";
    
	
}


if(isset($_POST['audience']) && $_SESSION['audience']==1){
    echo "<br><br><div class='audience_ans'><img src='images/audience_ans.png' alt=''></div>";
}

function takeMoney($score){
    switch ($score) {
        case 5:
            return 100;
            break;
        case 10:
            return 200;
            break;
        case 15:
            return 400;
            break;
        case 20:
            return 800;
            break;
        case 25:
            return 1600;
            break;
        case 30:
            return 3200;
            break;
        case 35:
            return 10000;
            break;
        case 40:
            return 25000;
            break;
        case 45:
            return 50000;
            break;
        case 50:
            return 100000;
            break;
        case 55:
            return 500000;
            break;
        case 60:
            return 1000000;
            break;
    }
    
}



?>

</body>
</html>


