<?php
session_start();
include 'config.php';

if(!isset($_SESSION['uid'])) {

//header('Location: http://pratik.acslab.org/index.php');
header('Location: ./index.php');
session_destroy();
   die();
                              
}
$uid = $_SESSION['uid'];
$t_span = $_SESSION['time_span']; 
//$conn = new mysqli("localhost", "root", "","acs_draft1");
$sql = "SELECT * FROM game WHERE id='".$uid."' AND day=".$t_span.";";
if(mysqli_query($conn,$sql)) {

header('Location: https://prolificacademic.co.uk/submissions/567ff475c5767f00051c7e40/complete?cc=S5F51ZWY');
session_destroy();
   die();
} else {
echo "You haven't completed the game yet. Please complete the game first! <a href='./game.php'>Click here to get back to the game</a>.";
}
?>