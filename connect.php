<?php   error_reporting(0);session_start();
if (!isset($_GET['id']) && empty($_GET['id'])) { ?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
<body>
    <div class="container">
    <h1>OOPS!</h1><br> <h3>Please go <a href="index2.php">here</a> first</h3>
    </div>
</body>
</html>

<?php   }
else {
$unqid = $_SESSION["uid"];
$cryptid = $_SESSION["cid"];
	$conn = new mysqli("localhost", "u978805288_PEDV3", "Megha@123", "u978805288_PEDV3");
	$conn = mysqli_connect("localhost", "u978805288_PEDV3", "Megha@123", "u978805288_PEDV3");

if ($conn->connect_error) {
    echo "<br><a href='index2.php'>Please try again</a> ";die("Connection failed!");
} 

echo "Connected successfully"; $_SESSION["connect"]=true;
//header('Location: http://pratik.acslab.org/demographic.php?id='.$cryptid.'&connect=true');
header('Location: ./demographic.php?id='.$cryptid.'&connect=true');
mysqli_close($conn);
    die();
    }
?>