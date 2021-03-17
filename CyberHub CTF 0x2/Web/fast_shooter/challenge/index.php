<!DOCTYPE html>
<html>
<head><title>fast shooter</title></head>
<body>
	<center>
<?php
Session_start();

//get Milliseconds from timestamp 
function getMilliSecond() {
	list($s1, $s2) = explode(' ', microtime());
	return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
}

//create random session 
function getRandomString($length){
	$str = null;
	$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
	$max = strlen($strPol)-1;
	for($i=0;$i<$length;$i++){
		$str.=$strPol[rand(0,$max)];
	}
	return $str;
}
if(!isset($_SESSION['random_string'])){
	$random_string = getRandomString(16);
	$_SESSION['random_string_create_time'] = getMilliSecond();
	$_SESSION['random_string'] = $random_string;
}
$Tip = "you must [fire] the decode[bullet] fast enough to get the Flag";
header("Tip: $Tip");
$bullet = base64_encode($_SESSION['random_string']);
header("bullet: $bullet");
if(isset($_POST['fire'])){
	if($_POST['fire'] === $_SESSION['random_string']){
		$cost = getMilliSecond() - $_SESSION['random_string_create_time'];
		if ($cost < 3000){
			echo "Nice you are so fast : CYBERHUB{1337_bl00d_sh0tXD} ";
		}else{
			echo "Ooo :(,you cost [$cost] msec ,you are not fast enough! ";
		}
		session_destroy();
	}else{
		echo "<img src='cod-4-sniper-png-2-original.png'><br><br>";
		echo 'Take your gun and begin fire<br><br>';
		echo '<form action="index.php" method="POST">';
		echo '<input name="fire" type="text"><br><br>';
		echo '<input type="submit" value=">FIRE<">';
		echo '</form>';
		echo 'Wrong Target!';
	}
}else{
	echo "<img src='cod-4-sniper-png-2-original.png'><br><br>";
	echo 'Take your gun and begin fire<br><br>';
	echo '<form action="index.php" method="POST">';
	echo '<input name="fire" type="text"><br><br>';
	echo '<input type="submit" value=">FIRE<">';
	echo '</form>';
}
?>
</center>
</body>
</html>
