<html>
<head><title>선수 등록 결과</title>
<meta http-equiv = 'content-type' content = 'text.html'; charset="utf-8"></head>
<body>
<?php
	$con = mysqli_connect("localhost", "root", "1234", "kbo") or die("Mysql 접속실패");
	$PlayerID = $_POST['PlayerID'];
	$Name = $_POST['Name'];
	$Team = $_POST['Team'];
	$Position =$_POST['Position'];
	$PitchType = $_POST['PitchType'];
	$BatType = $_POST['BatType'];
	$League = $_POST['League'];
	$Payment = $_POST['Payment'];
	$Salary = $_POST['Salary'];
	$DebutYear = $_POST['DebutYear'];
	$DebutTeam = $_POST['DebutTeam']; 

	$sql ="INSERT INTO player VALUES('".$PlayerID."', '".$Name."', '".$Team."', '".$Position."', '".$PitchType."', '".$BatType."', '".$League."', '".$Payment."', '".$Salary."', '".$DebutYear."', '".$DebutTeam."', '0')";

	$ret = mysqli_query($con, $sql);
	if($ret) {
	echo $PlayerID, " 등록 완료";
	}
	else{
	echo "등록 실패 : ".mysqli_error($con);
	}

	mysqli_close($con);
?>
<br>
<a href = 'insert.php'>Back to Insert</a>
</body>
</html>