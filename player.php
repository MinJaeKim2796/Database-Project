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
<li><a class="menuLink" href="check.php">관심 선수 조회</a></li><li></li>
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
<li><a class="menuLink" href="delete.php">선수 삭제</a></li>
<li><a class="menuLink" href="check.php">관심 선수 조회</a></li>
</ul>
</nav>
</div>
<br>

<br><br>
<div class="view_used">
      <div class="view_con">
        <ul>
          <li><strong>이름</strong><span><input type='text' name='playername'></span></li>

          <li><strong>팀</strong><span>
          <select name='class0'><option value>전체</option><option value='nc'>NC</option><option value='ss'>삼성</option></select>
          </span></li>

          <li><strong>포지션</strong><span>
          <input type='checkbox' name='pos' value='1'><span>투수</span>
          <input type='checkbox' name='pos' value='2'><span>내야수</span>
          <input type='checkbox' name='pos' value='3'><span>외야수</span>
          <input type='checkbox' name='pos' value='4'><span>포수</span>
</span></li>

          <li><strong>투구 유형</strong><span>
          <input type='checkbox' name='pitch' value='좌투'><span>좌투</span>
          <input type='checkbox' name='pitch' value='우투'><span>우투</span>
          <input type='checkbox' name='pos' value='좌언'><span>좌언</span>
          <input type='checkbox' name='pos' value='우언'><span>우언</span>
</span></li>

          <li><strong>타격 유형</strong><span>
          <input type='checkbox' name='pitch' value='좌타'><span>좌타</span>
          <input type='checkbox' name='pitch' value='우타'><span>우타</span>
</span></li>

          <li><strong>연봉</strong><span>
<input type='text' name='salaryU'> 만원 이상 <input type='text' name='salaryD'> 만원 이하</span></li>

          <li><strong>에이전시</strong><span><input type='text' name='Agency'></span></li>



 <li><strong>수상경력</strong><span>
          <select name='award'><option value>전체</option><option value='kbo'>KBO</option><option value='gg'>골든글러브</option><option value='ilgu'>일구</option></select><select name='allstar'><option value>연도</option><option value='2020'>2020</option><option value='2019'>2019</option><option value='2018'>2018</option></select>
          </span></li>

          <li><strong>올스타전</strong><span>
          <select name='award'><option value>전체</option><option value='dream'>드림</option><option value='nanum'>나눔</select><select name='allstar'><option value>연도</option><option value='2020'>2020</option><option value='2019'>2019</option><option value='2018'>2018</option></select>
          </span></li>

        </ul>

      </div>


	<button type='button' id='btn_search' style="color: #FFFFFF;background-color: #058DD2; font-size:1.5em; padding:5px 15px;"
><span>SEARCH</span></button>

</div>
<br>
<?php
	$con = mysqli_connect("localhost", "root", "1234", "kbo") or die("Mysql 접속실패");

	$sql = 'select * from player';	
	$ret = mysqli_query($con, $sql);
	if($ret) {$count = mysqli_num_rows($ret);
}
	echo "선수 : ", mysqli_num_rows($ret), "명";
	
	echo "<TABLE>";
	echo "<TR id = 'title'>";
	echo "<TH>ID</TH><TH>이름</TH><TH>팀</TH><TH>포지션</TH><TH>투</TH>";
	echo "<TH>타</TH><TH>군</TH><TH>계약금</TH><TH>연봉</TH><TH>데뷔년도</TH><TH>데뷔팀</TH><TH>관심여부</TH>";
	echo "</TR>";
	while($row = mysqli_fetch_array($ret)) {
		echo "<TR>";
		echo "<TD>", $row['PlayerID'], "</TD>";
		echo "<TD>", $row['Name'], "</TD>";
		echo "<TD>", $row['Team'], "</TD>";
		echo "<TD>", $row['Position'], "</TD>";
		echo "<TD>", $row['PitchType'], "</TD>";
		echo "<TD>", $row['BatType'], "</TD>";
		echo "<TD>", $row['League'], "</TD>";
		echo "<TD>", $row['Payment'], "</TD>";
		echo "<TD>", $row['Salary'], "</TD>";
		echo "<TD>", $row['DebutYear'], "</TD>";
		echo "<TD>", $row['DebutTeam'], "</TD>";
		echo "<TD><input type = 'checkbox' name = 'check'></td>";
		#echo '<TD><DIV><button class="btn db_btn btn01 addFav" name="addFav">등록</button> <button class="btn db_btn btn01 delFav" name="delFav">해제</button></div></td>';
		echo "</TR>";
	}
	mysqli_close($con);
	echo "</TABLE>";
?>
<a href = 'main.html'>Back to main</a>
</body>
</html>