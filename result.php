<?php
$answer = file_get_contents("answer.txt");
$u_ans = $_POST["answer"];



function answerCheck($u_ans){
    global $answer;
    if ($u_ans == $answer){
        return true;
    }
}
if(answerCheck($u_ans)){
    echo "You are correct!";
} else {
    echo "You are wrong!";
}
?>