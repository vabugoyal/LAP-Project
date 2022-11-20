<?php
include 'config.php';
session_start();
error_reporting(0);

if(!isset($_SESSION['uid'])) {
	$_SESSION['process'] = 'false';
	//header('Location: http://pratik.acslab.org/index.php');

	header('Location: ./index.php');
		die();

} 

 else{
	//echo "I am in process.php uid is true";
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		#echo $data;
		return $data;
	}

//	if(!empty($_POST['reaction'])) {
//		$reaction = test_input($_POST['reaction']);
//		$_SESSION['reaction'] = $reaction;
//	} else {  
//		$reaction = test_input($_POST['reaction']);
//		$_SESSION['reaction'] = $reaction;
//	}
	if(!empty($_POST['reaction'])){
	    $reac = $_POST['reaction'];
        $box="";  
        foreach($reac as $box1){  
            $box .= $box1.",";}
            $reaction = $box;
	    $_SESSION['reaction'] = $box;
	} else {  
	    $reac = $_POST['reaction'];
        $box="";  
        foreach($reac as $box1){  
            $box .= $box1.",";}
            $reaction = $box;
		$_SESSION['reaction'] = $box;
	}
	
	
	
	if(!empty($POST['myRange'])){
		$confid = test_input($POST['myRange']);
		$_SESSION['myRange'] = $confid;
	} else {  
		$confid = test_input($_POST['myRange']);
		$_SESSION['myRange'] = $confid;}
//	if(!empty($POST['Reason1']||$POST['Reason2']||$POST['Reason3'])){
    if(!empty($_POST['reason'])){
	   // $_reason1 = test_input($_POST['Reason1']);
	    //$_reason2 = test_input($_POST['Reason2']);
	    //$_reason3 = test_input($_POST['Reason3']);
	    $reas = $_POST['reason'];
        $chk="";  
        foreach($reas as $chk1){  
            $chk .= $chk1.",";}
            $reason = $chk;
	    //$reason = $reason1 . ", " . $reason2. ", "."$reason3";
	    $_SESSION['reason'] = $chk;
	} else {  
	   // $_reason1 = test_input($_POST['Reason1']);
	    //$_reason2 = test_input($_POST['Reason2']);
	    //$_reason3 = test_input($_POST['Reason3']);
	    //$reason = $reason1 . ", " . $reason2. ", "."$reason3";
	    $reas = $_POST['reason'];
        $chk="";  
        foreach($reas as $chk1){  
            $chk .= $chk1.",";}
            $reason = $chk;
		$_SESSION['reason'] = $chk;
	    
	}
		//document.form2.Checkbox1.checked || document.form2.Checkbox2.checked || document.getElementById('myRange').checked || document.getElementById('reaction').checked || document.getElementById('reason').checked
//	$reason = $reason1 . ", " . $reason2. ", "."$reason3";
//	$_SESSION['reason'] = $reason;
	$chkque =  test_input($_POST['ques']);
	$chkOne = test_input($_POST['checkOne']);
	$chkTwo = test_input($_POST['checkTwo']);
	$q1time = test_input($_POST['q1time']);
	$q2time = test_input($_POST['q2time']);
	$q3time = test_input($_POST['q3time']);
	$q4time = test_input($_POST['q4time']);

	//$chkThree = test_input($_POST['checkThree']);
	//$tspan=$_SESSION['time_span'];
	// Insurance check button
	$_SESSION['checkOne'] = $chkOne;
	$_SESSION['checkTwo'] = $chkTwo;
	$_SESSION['q1time'] = $q1time;
	$_SESSION['q2time'] = $q2time;
	$_SESSION['q3time'] = $q3time;
	$_SESSION['q4time'] = $q4time;

	//$_SESSION['checkThree'] = $chkThree;

	$phish=$chkOne;
	$genu=$chkTwo;
//	if($_SESSION['checkOne'] == '0' && $_SESSION['checkTwo'] = 'genuine'){
//		$answer = 'genuine';
//		$_SESSION["answer"] = 'genuine';
//	}
//	else if($_SESSION['checkTwo'] == '0' && $_SESSION['checkOne'] == 'phishing'){
//		$answer = 'phishing';
//		$_SESSION["answer"] = 'phishing';
	
	if($chkque < 50){
		$answer = 'phishing';
		$_SESSION["answer"] = 'phishing';
	}
	elseif($chkque == 50){
	    		$answer = 'neutral';
		$_SESSION["answer"] = 'neutral';
	}
	else{
		$answer = 'genuine';
		$_SESSION["answer"] = 'genuine';
	}
	//if($_SESSION["answer"] == 'phishing'){
	//	$answer = 'phishing';
	//} else{
	//	$answer == 'genuine';
	//}
	//$pinsur=$chkThree;

	//$day = $_SESSION['day'];
	$unqid = $_SESSION['uid'];
	$consent = $_SESSION['consent'];
	$_SESSION['act'] = "";
	$_SESSION['detect'] = "not answered";

	if(($_SESSION['actual'] == '1' && $answer == 'phishing')||($_SESSION['actual'] == 1 && $answer == 'phishing')){
		$_SESSION['act'] == "Phishing";
		$dir = 1;
		$_SESSION['reward'] +=  0.02 * abs(50 - $chkque)*$dir;
		$_SESSION['detect'] = "Correct";
	}
	else if(($_SESSION['actual'] == '1' && $answer == 'genuine')||($_SESSION['actual'] == 1 && $answer == 'genuine')){
		$_SESSION['act'] == "Phishing";
        $dir = -1;
		$_SESSION['reward'] +=  0.02 * abs(50 - $chkque)*$dir;		
		$_SESSION['detect'] = "Wrong";
	}
	else if(($_SESSION['actual'] == '0' && $answer == 'phishing')||($_SESSION['actual'] == 0 && $answer == 'phishing')){
		$_SESSION['act'] == "Genuine";
		$dir = -1;
		$_SESSION['reward'] +=  0.02 * abs(50 - $chkque)*$dir;
		$_SESSION['detect'] = "Wrong";
	}
	else if(($_SESSION['actual'] == '0' && $answer == 'genuine')||($_SESSION['actual'] == 0 && $answer == 'genuine')){
		$_SESSION['act'] == "Genuine";	
		$dir = 1;
		$_SESSION['reward'] +=  0.02 * abs(50 - $chkque)*$dir;
		$_SESSION['detect'] = "Correct";
	}
	elseif(($_SESSION['actual'] == '0' && $answer == 'neutral')||($_SESSION['actual'] == 0 && $answer == 'neutral')){
	    $_SESSION['act'] == "Genuine";	
		$_SESSION['reward'] += 0.02 * (50 - $chkque);
		$_SESSION['detect'] = "Neutral";
	}
		elseif(($_SESSION['actual'] == '1' && $answer == 'neutral')||($_SESSION['actual'] == 1 && $answer == 'neutral')){
	    $_SESSION['act'] == "Phishing";	
		$_SESSION['reward'] += 0.02 * (50 - $chkque);
		$_SESSION['detect'] = "Neutral";
	}
	//$factor1 = $_SESSION['factor1'];
	$qus = $_SESSION['ques'];
	//$bias_a = "SELECT `Cognitive Bias` FROM `email_data` WHERE `S.No.` = '$qus'";
	$bias_a = "SELECT `Cognitive Bias` FROM `email_data` WHERE `S.No.` = '$qus'";
	$resultb=mysqli_query($conn, $bias_a);
	$rowb=mysqli_fetch_array($resultb,MYSQLI_ASSOC);
	$_SESSION['bias'] = $rowb["Cognitive Bias"];
	$bias = $_SESSION['bias'];
	//$_SESSION['rse'] = $qus.$answer.$confid.$reaction.$reason.$bias.$q1time.$q2time.$q3time.$q4time;
	//$con = $_SESSION['cond'];
	//$f1 = $_SESSION['factor1'];
	//$f2 = $_SESSION['factor2'];
    $sqlin = "INSERT INTO gameph (consent, id, Bias, quesno, ans, ansval, conf, reac, reas, Q1_time, Q2_time, Q3_time, Q4_time)
	VALUES('$consent', '$unqid', '$bias', '$qus', '$answer', '$chkque', '$confid', '$reaction', '$reason', '$q1time', '$q2time', '$q3time', '$q4time')";
	

	$resulto=mysqli_query($conn,$sqlin);

	$_SESSION['process'] = 'true';
	
  if($qus < 50) {
		$_SESSION['ques'] += 1;
		 header('Location: ./game.php');
       // header('Location: ./feedback.php');
      // echo "<a href="feedback.php"></a>";
        die();
   }
	else{
	echo "<div class='container-fluid'> <div class='row'><div class='col-md-12'><div class='jumbotron' style = 'top: 40%;'><h3><center>You have Successfully completed the game please click on submit button to go to survey page.</center></h3></div></div></div></div><br><a href='./end.php'><button class='btn btn-warning btn-md btn-primary' style ='height: 4em; position: absolute; margin: 0; background: lightgrey; top: 10%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%);'><h2><b>Submit</b></h2></button></a>";
		die();
	}


	mysqli_close($conn);
}

?>