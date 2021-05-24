<html>
<head><title>관심 선수 조회</title>
<meta http-equiv = 'content-type' content = 'text.html'; charset="utf-8"></head>

<style>
table { border-collapse: collapse; width:100%}
table, td, th{ border:solid 1px #cccccc text-align:center;}
tr{ height:70px; text-align:center;}
#title{ height:50px; background-color: #058DD2; color:#FFFFFF;}
.view_used {
	border: 1px solid;
	display: flex;
}
.view_con {
        border: 1px solid;
        width: 100%;
}
.view_con ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        height: 100%;
      }
.view_con li {
        padding: 4px;
        flex: 1;
}
.view_con li strong {
        display: inline-block;
        width: 30%;
}

#topMenu {         
height:30px;width: 100%;}
                #topMenu ul li {                     
                        list-style: none;          
                        color: white;               
                        background-color: #058DD2;  
                        float: left;                
                        line-height: 30px;       
                        vertical-align: middle;     
                        text-align: center;      
                }
                #topMenu .menuLink {                            
                        text-decoration:none;                   
                        color: white;                             
                        display: block;
                        width: 150px;
                        font-size: 12px;
                        font-weight: bold;
                        font-family: "Trebuchet MS", Dotum, Arial; 
                }
                #topMenu .menuLink:hover {
                        color: red; 
                        background-color: #4d4d4d;
                }


<!--
*{margin:0; padding:0;}
li{list-style:none;}
a{text-decoration:none;}
.wrapper{margin:0; auto;}
.clearfix{content:''; display:block; clear:both;}-->

header{height:75px; width:100%; position:fixed;z-index:9999; top:0;left:0;}

h1{color:white; line-height:75px; float:left;}

div{width:100%; margin:0 auto;}
nav{ float:right;}
nav li{background-color: #058DDE;text-align:center;line-height:50px; margin-right:5px;width:150px;float:left;}
nav a{color:white;}
</style>

<body>

<br>
<div>
<h1 class = 'logo'><img src="KBO_logo.png" alt></img></h1></div>
<nav>
<ul>
<li><a class="menuLink" href="player.php">전체 선수 조회</a></li>
<li><a class="menuLink" href="insert.php">선수 등록</a></li>
<li><a class="menuLink" href="update.php">선수 정보 수정</a></li>
<li><a class="menuLink" href="delete.php">선수 방출</a></li>
<li><a class="menuLink" href="basket_result.php">관심 선수 조회</a></li>
</ul>
</nav>
</div>
<br>

<br><br>

<TABLE><thead>
<TR id = 'title'><!--<TH>ID</TH>-->
<TH>이름</TH><TH>팀</TH><TH>포지션</TH><TH>투타유형</TH><TH>주요기록</TH><TH>수상경력</TH><TH>올스타전</TH><TH>에이전시</TH><TH>계약</TH></TR></thead>
<tbody>
<?php
	$check = $_POST['check'];

	echo "관심 선수 : ", count($check), "명";
	echo "<BR>";

	$con = mysqli_connect("localhost", "root", "1234", "kbo") or die("Mysql 접속실패");
//	$sql = "select * from player as p left outer join batter as b on(p.PlayerID = b.ID) left outer //join pitcher as pit on (p.Playerid = pit.ID) left outer join agency as a on (p.AgencyId = a.AgencyID) //where p.PlayerID in ('".implode("','", $check)."')";

	$sql = "select * from kbo.player as p left outer join kbo.batter as b on(p.PlayerID = b.ID) left outer join kbo.pitcher as pit on (p.playerid = pit.ID) left outer join kbo.agency as a on (p.agencyId = a.agencyID) left outer join kbo.awardplayer as aw on(p.PlayerID = aw.PlayerID)  left outer join kbo.awardlist as l on (aw.awardno = l.awardno) left outer join kbo.allstarplayer as al on (p.PlayerID = al.PlayerID) where p.PlayerID in ('".implode("','", $check)."') group by p.PlayerID, aw.awardyear";




	$ret = mysqli_query($con, $sql);
//	echo mysqli_num_rows($ret);
	if(mysqli_num_rows($ret) > 0){
	foreach($ret as $row){
	?>
	<tr>
<!--	<td><?=$row['PlayerID']; ?></td>-->
	<td><?=$row['Name']; ?></td>
	<td><?=$row['Team']; ?></td>
	<td><?=$row['Position']; ?></td>
	<td><?=$row['PitchType']; ?><?=$row['BatType']; ?></td>
<?php
	if($row['Position'] == '투수'){?>
	<td>WAR : <?=$row['war_p']; ?> / ERA: <?=$row['ERA']; ?> / WHIP: <?=$row['WHIP']; ?>  / IP/G: <?=$row['IP/G']; ?><br>Fastball 가치: <?=$row['FastballPV']; ?> / Curve 가치: <?=$row['CurvePV']; ?> / Slider 가치: <?=$row['SliderPV']; ?>  / Changeup 가치: <?=$row['ChangeUpPV']; ?></td>
<?php
	}
	else{?>
	<td>WAR : <?=$row['WAR']; ?> / OPS: <?=$row['OPS']; ?> / wOBA: <?=$row['wOBA']; ?> / BABIP : <?=$row['BABIP']; ?><br>Spd: <?=$row['Spd']; ?> / IsoP: <?=$row['IsoP']; ?> / pLI: <?=$row['pLI']; ?> / Clutch: <?=$row['Clutch']; ?></td>
<?php
	}?>



<?php
	if(empty($row['AwardName'])){?>
	<td></td>
<?php
	}
	else{?>
	<td><?=$row['AwardName']; ?> 시상식 <?=$row['AwardPos']; ?></td>
<?php
	}?>


<?php
	if(empty($row['AllstarYear'])){?>
	<td></td>
<?php
	}
	else{?>
	<td><?=$row['AllstarYear']; ?>년 <?=$row['AllstarTeam']; ?>팀 <?=$row['AllstarPos']; ?></td>
<?php
	}?>

	<td><?=$row['AgencyName']; ?></td>

<?php
	if($row['AgencyID'] == '0'){?>
	<td><button onclick="alert('<?=$row['Name']; ?> 선수는 소속 Agency가 없습니다. 선수와 직접 계약을 진행합니다.')">계약 진행</button></td>
<?php
	}
	else{?>
	<td><button onclick="alert('<?=$row['Name']; ?> 선수가 속한 <?=$row['AgencyName']; ?>의 <?=$row['Agent']; ?> 대표와 계약을 진행합니다.')">계약 진행</button></td>
<?php
	}?>

	</tr>
<?php	}
}
	mysqli_close($con);
?>

</body>
</html>