<html>
<head><title>선수 수정 결과</title>
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
	$AgencyID = $_POST['AgencyID'];

	$sql ="select * FROM player WHERE PlayerID='".$PlayerID."'";

	$ret = mysqli_query($con, $sql);
	if(mysqli_num_rows($ret) > 0){
		$row = mysqli_fetch_array($ret);
		$sql ="UPDATE player SET Name='".$Name."', Team='".$Team."', Position='".$Position."', PitchType='".$PitchType."', BatType='".$BatType."', League='".$League."', Payment='".$Payment."', Salary='".$Salary."', DebutYear = '".$row['DebutYear']."', DebutTeam = '".$row['DebutTeam']."', AgencyID = '".$AgencyID."' WHERE PlayerID = '".$PlayerID."'";

	$ret = mysqli_query($con, $sql);
		if($ret) {
		echo $PlayerID, " 정보 수정 완료";

		}
		else{
		echo "<br>";
		echo $PlayerID, "의 정보 수정 실패";
		}
	}
	else{
		echo $PlayerID, "는 존재하지 않는 선수입니다";
	}

	mysqli_close($con);
?>
<br>
<a href = 'update.php'>Back to Update</a>
</body>
</html>