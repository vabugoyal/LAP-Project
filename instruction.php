<?php session_start();
include 'config.php';
error_reporting(0);
if(!isset($_SESSION['uid']) || $_SESSION['consent'] != 'true') {
?>

<?php include 'head.php';?>
<body>
    <!--header -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="row"> <div class=col-md-1> <a href="index.php"><embed height="50" width="50" src="21.png"></a></div>
            <div class="col-md-11">
            <div class="navbar-header">
                
                <a href="index.php" class="navbar-brand kalam">Phishing Email Detection Game</a>
            </div>
            <!-- Menu Items -->
            <div class="collapse navbar-collapse" id="mainNavBar">
                <ul class="nav navbar-nav">
                    <li> <a href="index.php" class="kalam">Home</a> </li>
                    <li  class="active" class="kalam"> <a href="instruction.php">Instructions</a> </li> 
                    <li> <a href="contact.php" class="kalam">Contact Us</a> </li> 
                </ul>
            </div>
            </div></div></div>
    </nav><br><br><br><br>
    
    <!--body -->
    <div class="container-fluid">
<div class="jumbotron"><h1 class="text-center">INSTRUCTIONS</h1></div>
        
        <div class="jumbotron">
<p>Imagine yourself to be Miss Lily. You have an email account where you receive emails of different kinds related to your personal or professional life. <b>Your objective is to read emails in your inbox and suggest the likelihood of them being genuine (from senders with good intentions) or phishing (from senders with malicious intentions).</b> The task is shown in Figure 1 below.</p><br><br>
<center><div id="ing1" class="step" data-x="3500" data-y="-850" data-rotate="270" data-scale="6">
        <embed src="message_day/email1.jpg" height="400" width="900">
    </div>
<h4><b>Figure 1.</b> Interface to read and decide on emails.</h4></center>

<br><br><p>To indicate the likelihood of an email being genuine or phishing, you need to move the slider in Q1 right or left, respectively (<b>the slider is placed in the middle and it shows an undecided response</b>). Next, in Q2, you need to indicate the confidence level of your response you made in Q1 (<b>the slider is placed in the middle and it shows a response that is intermediate confidence</b>). In Q3, you need to indicate what features of the email (sender, date, subject, or body) made you decide your response in Q1. Finally, Q4 asks you for your reaction to the email shown. 

<br><br><b>Once you are done responding to Q1 to Q4 for the email shown, you need to click the “Submit” button</b>, present you with the next email. You may be shown several emails in this task and you need to follow the above procedure for every email displayed.
  <br><br>
There might be attention checks in the experiment. Please stay attentive throughout the study.<br><br>

The score in this task is weighted. If you keep the slider at 50% (neutral) for an email then your score will be 0. If the likelihood marked by you for an email is more than 50% in the correct direction (genuine or phishing) or if the likelihood marked by you for an email is more than 50% in the incorrect direction (genuine or phishing), then you will gain or lose points, respectively. Thus, your score for each email you decide will be calculated based on the following formula:
<b><center><h3>Score = 0.02 * |50 - slider position| * direction</h3></center>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;where, direction = { 1, for the correct direction,
                    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;-1, for the incorrect direction}

</b>

</p>
<br><p>You will be given the base payment as indicated in the job advertisement on MTurk. <b>In addition, your score will be totaled across all emails judged by you and top-10 scorers will enter a lucky draw for a INR 1000 Amazon gift card.</b> You will only be paid if you have fully completed the study and responded to attention check questions.

<br><br>Please note <b>your objective is to read emails in your inbox and suggest the likelihood of them being genuine (from senders with good intentions) or phishing (from senders with malicious intentions).</b>
<br><br><br>
<strong>BEST OF LUCK!</strong></p>
<!-- instructions end-->        
</p></div>
        </div>
<?php include 'footer.php'; ?>
</body>
</html>

<?php
} else {
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
};
if(!empty($_POST['mturk']) && !empty($_POST['age']) && !empty($_POST['gender']) && !empty($_POST['ed']) && !empty($_POST['occ']) && !empty($_POST['major']))
    {  
        $mturk = test_input($_POST['mturk']);
        $_SESSION['mturk'] = $mturk;
        $age = test_input($_POST['age']);
        $gender = test_input($_POST['gender']);
        $ed = test_input($_POST['ed']);
        $occ = test_input($_POST['occ']);
        $major = test_input($_POST['major']);
      //  $email = $_POST['email'];
    }
    $unqid = $_SESSION['uid'];
    $_SESSION['name'] = 'Guest';
    $conn = new mysqli('localhost','root','','u978805288_PEDV3');;
    $sql = "INSERT INTO demographic (id, mturk_id, Age, Gender, Education, Occupation, Major) 
VALUES ('$unqid','$mturk','$age','$gender','$ed','$occ','$major')";












if ($conn->query($sql) === TRUE) 
	{    
	$_SESSION['question']=1;
	$_SESSION['reward']= 0;
?> 

<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="row"> <div class=col-md-1> <embed height="50" width="50" src="21.png"></div>
            <div class="col-md-11">
            <div class="navbar-header">
                <a class="navbar-brand kalam">Phishing Email Detection Game</a>
            </div>
                </div></div></div>
    </nav> <br><br><br><br>
    <div class="container">
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Good to go!</strong> Entry Submitted Successfully.
    </div>
        <div class="jumbotron">
    <h1 class="text-center">Welcome!</h1><br><br><br><br>
    <p class="text-justify">
       
	
<p>Imagine yourself to be Miss Lily. You have an email account where you receive emails of different kinds related to your personal or professional life. <b>Your objective is to read emails in your inbox and suggest the likelihood of them being genuine (from senders with good intentions) or phishing (from senders with malicious intentions).</b> The task is shown in Figure 1 below.</p><br><br>
<center><div id="ing1" class="step" data-x="3500" data-y="-850" data-rotate="270" data-scale="6">
        <embed src="message_day/email1.jpg" height="400" width="900">
    </div>
<h4><b>Figure 1.</b> Interface to read and decide on emails.</h4></center>

<br><br><p>To indicate the likelihood of an email being genuine or phishing, you need to move the slider in Q1 right or left, respectively (<b>the slider is placed in the middle and it shows an undecided response</b>). Next, in Q2, you need to indicate the confidence level of your response you made in Q1 (<b>the slider is placed in the middle and it shows a response that is intermediate confidence</b>). In Q3, you need to indicate what features of the email (sender, date, subject, or body) made you decide your response in Q1. Finally, Q4 asks you for your reaction to the email shown. 

<br><br><b>Once you are done responding to Q1 to Q4 for the email shown, you need to click the “Submit” button</b>, present you with the next email. You may be shown several emails in this task and you need to follow the above procedure for every email displayed.
  <br><br>
There might be attention checks in the experiment. Please stay attentive throughout the study.<br><br>

The score in this task is weighted. If you keep the slider at 50% (neutral) for an email then your score will be 0. If the likelihood marked by you for an email is more than 50% in the correct direction (genuine or phishing) or if the likelihood marked by you for an email is more than 50% in the incorrect direction (genuine or phishing), then you will gain or lose points, respectively. Thus, your score for each email you decide will be calculated based on the following formula:
<b><center><h3>Score = 0.02 * |50 - slider position| * direction</h3></center>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;where, direction = { 1, for the correct direction,
                    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;-1, for the incorrect direction}

</b>

</p>
<br><p>You will be given the base payment as indicated in the job advertisement on MTurk. <b>In addition, your score will be totaled across all emails judged by you and top-10 scorers will enter a lucky draw for a INR 1000 Amazon gift card.</b> You will only be paid if you have fully completed the study and responded to attention check questions.

<br><br>Please note <b>your objective is to read emails in your inbox and suggest the likelihood of them being genuine (from senders with good intentions) or phishing (from senders with malicious intentions).</b>
<br><br><br>
<strong>BEST OF LUCK!</strong></p>
        
    
    <a href="game.php"><button type="button" class="btn btn-primary btn-lg" style="position:relative;left:50%">PLAY</button></a>
    </div></div>
    <?php include 'footer.php'; ?>
        <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
</body>
</html>

<?php

} else {
?>
<?php echo $_SESSION['uid'].$_SESSION['consent'].$sql; ?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
<body>
    <div class="container">
    <h1>Sorry!</h1><br><br><h3>Entry could not submitted. Please <a href="index.php">try again</a> after sometime.</h3>
    </div>

</body>
</html>

<?php
}
}
?>