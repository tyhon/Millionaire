<?php 
$question = file_get_contents("questionaire.txt");
$quest = explode("\n", $$question);
$infor = array();

$infor = explode(",", $question);
print_r($infor);

$answer = file_get_contents("answer.txt");



function answerCheck($u_ans){
    global $answer;
    if ($u_ans == $answer){
        return true;
    }
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Millionaire</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/grid.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<center>
    	 <img src="images/logo.png" style="max-width:100%;">
        <h1 class="gamename">Sample Game</h1>
	<a style="margin-top:10px;" href="?startover=yes" class="btn btn-default">Start This Game Over</a>
    </center>
       
        
            
		
   

	
    <div class="row">
        <div class="col-md-8">
            <div id="qbox1" class="millbox1"><?php echo $infor[0]?></div>
          <div class="row">			
            <div class="col-md-6"><div id="choice1" class="millbox2" data-toggle="modal" data-target="#myModala" onclick="PlaySound('audio/choicea.mp3');">A: <?php echo $infor[1]?></div></div>
            <div class="col-md-6"><div id="choice2" class="millbox2" data-toggle="modal" data-target="#myModalb" onclick="PlaySound('audio/choiceb.mp3');">B: <?php echo $infor[2]?></div></div>
            <div class="col-md-6"><div id="choice3" class="millbox2" data-toggle="modal" data-target="#myModalc" onclick="PlaySound('audio/choicec.mp3');">C: <?php echo $infor[3]?></div></div>
            <div class="col-md-6"><div id="choice4" class="millbox2" data-toggle="modal" data-target="#myModald" onclick="PlaySound('audio/choiced.mp3');">D: <?php echo $infor[4]?></div></div>
          </div>
        </div>
        
        <div class="col-md-4">  
            <div class="lifelines">
            <center>
            Lifelines:<br>
            <img id="ll5050" style="max-width:30%;" src="images/5050.png" onclick="PlaySound('audio/lifeline1.mp3'); FiftyFifty(); $('#urlcatcher').load('lifeline.php?type=5050'); this.src='img/5050used.png';" /><img id="llask" style="max-width:30%;" src="images/audience.png" data-toggle="modal" data-target="#myModalaudience" onclick="PlaySound('audio/lifeline2.mp3'); $('#urlcatcher').load('lifeline.php?type=audience'); this.src='img/audienceused.png';" /><img id="llskip" style="max-width:30%;" src="images/skipQ.png" onclick="PlaySound('audio/lifeline3.mp3'); SkipQ(); $('#urlcatcher').load('lifeline.php?type=skip'); this.src='img/skipused.png';" />            </center>
            </div>
            
            <div class="prizes">
            <div class="openround">Question 15&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$1 Million</span></div><div class="openround">Question 14&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$500000</span></div><div class="openround">Question 13&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$250000</span></div><div class="openround">Question 12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$125000</span></div><div class="openround">Question 11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$64000</span></div><div class="openround">Question 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$32000</span></div><div class="openround">Question 9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$16000</span></div><div class="openround">Question 8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$8000</span></div><div class="openround">Question 7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$4000</span></div><div class="openround">Question 6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$2000</span></div><div class="openround">Question 5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$1000</span></div><div class="openround">Question 4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$500</span></div><div class="openround">Question 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$300</span></div><div class="openround">Question 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoney">$200</span></div><div class="currentround">Question 1&nbsp;&nbsp;&nbsp;&nbsp;<span class="prizemoneycurrent">$100</span></div>            </div>
          
            
    	</div>
            
    </div>
    
        <div id="results" style="visibility:hidden;"><center></center></div>
	<div id="urlcatcher"></div>

<!-- Modal A -->
<div class="modal fade" id="myModala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:10px solid red; background-color:#FB5F0F;">
      <div class="modal-body" style="text-align:center; font-size:36px;">
        Is That Your Final Answer?
      </div>
      <div class="modal-footer" style="text-align:center;">
        <button type="button" class="btn-lg btn-primary" onclick="answerCheck('a')" data-dismiss="modal">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn-lg btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal B -->
<div class="modal fade" id="myModalb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:10px solid red; background-color:#FB5F0F;">
      <div class="modal-body" style="text-align:center; font-size:36px;">
        Is That Your Final Answer?
      </div>
      <div class="modal-footer" style="text-align:center;">
        <button type="button" class="btn-lg btn-primary" onclick="answerCheck('b')" data-dismiss="modal">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn-lg btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal C -->
<div class="modal fade" id="myModalc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:10px solid red; background-color:#FB5F0F;">
      <div class="modal-body" style="text-align:center; font-size:36px;">
        Is That Your Final Answer?
      </div>
      <div class="modal-footer" style="text-align:center;">
        <button type="button" class="btn-lg btn-primary" onclick="answerCheck('c')" data-dismiss="modal">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn-lg btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal D -->
<div class="modal fade" id="myModald" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:10px solid red; background-color:#FB5F0F;">
      <div class="modal-body" style="text-align:center; font-size:36px;">
        Is That Your Final Answer?
      </div>
      <div class="modal-footer" style="text-align:center;">
        <button type="button" class="btn-lg btn-primary" onclick="answerCheck('d')" data-dismiss="modal">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn-lg btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Audience -->
<div class="modal fade" id="myModalaudience" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:10px solid red; background-color:#FB5F0F;">
      <div class="modal-body" style="text-align:center; font-size:36px;">
        Ask the Audience:<br>
        <img src="img/choicea3.png" style="max-width:100%;">
      </div>
      <div class="modal-footer" style="text-align:center;">
        <button type="button" class="btn-lg btn-default" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
