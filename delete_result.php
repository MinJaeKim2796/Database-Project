<html>
<head><title>선수 방출 결과</title>
<meta http-equiv = 'content-type' content = 'text.html'; charset="utf-8"></head>
<body>
<?php
	$con = mysqli_connect("localhost", "root", "1234", "kbo") or die("Mysql 접속실패");
	$PlayerID = $_POST['PlayerID'];

	$sql ="select * FROM player WHERE PlayerID='".$PlayerID."'";

	$ret = mysqli_query($con, $sql);
	if(mysqli_num_rows($ret) > 0){
		$sql ="delete FROM player WHERE PlayerID='".$PlayerID."'";
		$ret = mysqli_query($con, $sql);
	echo $PlayerID, " 방출 완료";
	}
	else{
	echo $PlayerID, "는 존재하지 않는 선수입니다";
	}

	mysqli_close($con);
?>
<br>
<a href = 'delete.php'>Back to Delete</a>
</body>
</html>