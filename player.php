<html>
<head><title>KBO 선수 비교</title>
<meta http-equiv = 'content-type' content = 'text.html'; charset="utf-8"></head>

<style>
table { border-collapse: collapse; width:100%}
table, td, th{ border:solid 1px #cccccc text-align:center;}
tr{ height:30px; text-align:center;}
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
<!--
<div>
<h1 class = 'logo'><img src="KBO_logo.png" alt></img></h1></div>
<div>
<nav id="topMenu" >

<ul>
<li><a class="menuLink" href="player.php">전체 선수 조회</a></li><li>|</li>
<li><a class="menuLink" href="insert.php">선수 등록</a></li><li>|</li>
<li><a class="menuLink" href="delete.php">선수 삭제</a></li><li>|</li>
<li><a class="menuLink" href="basket_result.php">관심 선수 조회</a></li><li></li>
</ul>
</nav>
</div><div style='clear:both:'></div>
-->
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
<div class="view_used">
      <div class="view_con">
        <ul>

          <li><strong>팀</strong><span>
          <select name='class0'><option value>전체</option>
          <?php
	$options = array('KIA','KT','LG','NC','SSG','두산','롯데','삼성','키움','한화');
	foreach($options as $option){
	echo "<option value='$option'>$option</option>";
	}
	?>

<!--
<option value='KIA'>KIA</option>
<option value='KT'>KT</option>
<option value='LG'>LG</option>
<option value='NC'>NC</option>
<option value='SSG'>SSG</option>
<option value='두산'>두산</option>
<option value='롯데'>롯데</option>
<option value='삼성'>삼성</option>
<option value='키움'>키움</option>
<option value='한화'>한화</option>
-->
</select>
          </span></li>

          <li><strong>포지션</strong><span>
          <input type='checkbox' name='pos' value='투수'><span>투수</span>
          <input type='checkbox' name='pos' value='내야수'><span>내야수</span>
          <input type='checkbox' name='pos' value='외야수'><span>외야수</span>
          <input type='checkbox' name='pos' value='포수'><span>포수</span>
</span></li>

          <li><strong>투구 유형</strong><span>
          <input type='checkbox' name='PitchType' value='좌투'><span>좌투</span>
          <input type='checkbox' name='PitchType' value='우투'><span>우투</span>
          <input type='checkbox' name='PitchType' value='좌언'><span>좌언</span>
          <input type='checkbox' name='PitchType' value='우언'><span>우언</span>
</span></li>

          <li><strong>타격 유형</strong><span>
          <input type='checkbox' name='BatType' value='좌타'><span>좌타</span>
          <input type='checkbox' name='BatType' value='우타'><span>우타</span>
</span></li>

          <li><strong>연봉</strong><span>
<input type='text' name='salaryU'> 만원 이상 <input type='text' name='salaryD'> 만원 이하</span></li>







<form action='' method = 'GET'>
 	<li><strong>이름</strong><span>
	<input type='text' name='Name' value = "<?php if(isset($_GET['Name'])){echo $_GET['Name'];} ?>"></span></li>
	<li><strong>에이전시</strong> <span>
	<input type='text' name='Agency' value="<?php if(isset($_GET['Agency'])){echo $_GET['Agency'];} ?>"></span></li>


 <li><strong>투/타</strong><span>
<select name='Pitbat'>
<option value='WAR'>타자 WAR</option>
<option value='G'>G</option>
<option value='OPS'>OPS</option>
<option value='wOBA'>wOBA</option>
<option value='wRC+'>wRC+</option>
<option value='WPA'>타자 WPA</option>
<option value='BB/K'>BB/K</option>
<option value='IsoP'>IsoP</option>
<option value='IsoD'>IsoD</option>
<option value='BABIP'>BABIP</option>
<option value='Spd'>Spd</option>
<option value='pLI'>pLI</option>
<option value='Clutch'>Clutch</option>
<option value='P/PA'>P/PA</option>

<option value='war_p'>투수 WAR</option>
<option value='ERA'>ERA</option>
<option value='WHIP'>WHIP</option>
<option value='wpa_p'>투수 WPA</option>
<option value='K-BB%'>K-BB%</option>
<option value='BABIP'>BABIP</option>
<option value='LOB%'>LOB%</option>
<option value='IP/G'>IP/G</option>
<option value='P/PA'>P/PA</option>
<option value='RAA'>RAA</option>
<option value='RAR'>RAR</option>
<option value='WAA'>WAA</option>
<option value='FastballPV'>FastballPV</option>
<option value='SliderPV'>SliderPV</option>
<option value='CurvePV'>CurvePV</option>
<option value='ChangeupPV'>ChangeupPV</option>
<option value='SplitterPV'>SplitterPV</option>
<option value='SinkerPV'>SinkerPV</option>
<option value='KnucklePV'>KnucklePV</option>
<?php $option = $_GET['Pitbat'] ?>
</select>
<span>
<input type='text' name='PitbatU' value="<?php if(isset($_GET['PitbatU'])){echo $_GET['PitbatU'];} ?>"></span> 이상 <span><input type='text' name='PitbatD' value="<?php if(isset($_GET['PitbatD'])){echo $_GET['PitbatD'];} ?>"></span> 이하</span></li>






<!--
 <li><strong>투구</strong><span>
          <select name='Pitcher'>

<option value='war_p'>투수 WAR</option>
<option value='ERA'>ERA</option>
<option value='WHIP'>WHIP</option>
<option value='wpa_p'>투수 WPA</option>
<option value='K-BB%'>K-BB%</option>
<option value='BABIP'>BABIP</option>
<option value='LOB%'>LOB%</option>
<option value='IP/G'>IP/G</option>
<option value='P/PA'>P/PA</option>
<option value='RAA'>RAA</option>
<option value='RAR'>RAR</option>
<option value='WAA'>WAA</option>
<option value='FastballPV'>FastballPV</option>
<option value='SliderPV'>SliderPV</option>
<option value='CurvePV'>CurvePV</option>
<option value='ChangeupPV'>ChangeupPV</option>
<option value='SplitterPV'>SplitterPV</option>
<option value='SinkerPV'>SinkerPV</option>
<option value='KnucklePV'>KnucklePV</option>
<?php $option = $_GET['Pitcher'] ?>
</select>
<input type='text' name='PitcherU' value="<?php if(isset($_GET['PitcherU'])){echo $_GET['PitcherU'];} ?>"></span> 이상 <span><input type='text' name='PitcherD' value="<?php if(isset($_GET['PitcherD'])){echo $_GET['PitcherD'];} ?>"></span> 이하</span></li>
-->

        </ul>
</div>

<button type='submit' id='btn_search' style="color: #FFFFFF;background-color: #058DD2; font-size:1.5em; padding:5px 15px;"><span>SEARCH</span></button>
</form>
</div>




<br>
<form method = 'post' action = 'basket_result.php'>
<TABLE><thead>
<TR id = 'title'><TH>ID</TH><TH>이름</TH><TH>팀</TH><TH>포지션</TH><TH>투</TH>
<TH>타</TH><TH>군</TH><TH>계약금</TH><TH>연봉</TH><TH>데뷔년도</TH><TH>데뷔팀</TH><TH>관심여부</TH></TR></thead>
<tbody>
<?php
	$con = mysqli_connect("localhost", "root", "1234", "kbo") or die("Mysql 접속실패");
	$access = isset($_GET['Agency']) || isset($_GET['Name']) || isset($_GET['Pitbat']) || isset($_GET['PitbatU']) || isset($_GET['PitbatD']);
//	$access = isset($_GET['Agency']) || isset($_GET['Name']);
	//$access = isset($_GET['Agency']) || isset($_GET['Name']) || isset($_GET['Pitcher']) || isset($_GET['PitcherU']) || isset($_GET['PitcherD']);
	if($access){
	$filter1 = $_GET['Agency'];
	$filter2 = $_GET['Name'];
	$filter3 = $_GET['Pitbat'];
	$filter4 = $_GET['PitbatU'];
	$filter5 = $_GET['PitbatD'];


	$sql = "select * from player as p left outer join batter as b on(p.PlayerID = b.ID) left outer join pitcher as pit on (p.Playerid = pit.ID) left outer join agency as a on (p.AgencyId = a.AgencyID) where a.agencyname LIKE '%$filter1%' and p.name LIKE '%$filter2%' and $filter3 between '$filter4' and '$filter5'";

	$ret = mysqli_query($con, $sql);
	echo "선수 : ", mysqli_num_rows($ret), "명";

	if(mysqli_num_rows($ret) > 0){
	foreach($ret as $row){
	?>
	<tr>
	<td><?=$row['PlayerID']; ?></td>
	<td><?=$row['Name']; ?></td>
	<td><?=$row['Team']; ?></td>
	<td><?=$row['Position']; ?></td>
	<td><?=$row['PitchType']; ?></td>
	<td><?=$row['BatType']; ?></td>
	<td><?=$row['League']; ?></td>
	<td><?=$row['Payment']; ?></td>
	<td><?=$row['Salary']; ?></td>
	<td><?=$row['DebutYear']; ?></td>
	<td><?=$row['DebutTeam']; ?></td>
	
	<td><input type = 'checkbox' name = 'check[]' value='<?=$row['PlayerID']; ?>' checked /></td>
	</tr>
	
<?php
}
}
}?>
<input type='submit' name='compare' value = '관심 선수 비교' style = "color: #FFFFFF; background-color: #058DD2; padding: 2px 10px;"><br><br></form>

	</tbody>
</table>
</body>
</html>