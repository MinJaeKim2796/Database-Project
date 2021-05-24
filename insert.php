<html>
<head><title>KBO 선수 등록</title>
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
<br>
<div>
<h1 class = 'logo'><img src="KBO_logo.png" alt></img></h1></div>
<nav>
<ul>
<li><a class="menuLink" href="player.php">전체 선수 조회</a></li>
<li><a class="menuLink" href="insert.php">선수 등록</a></li>
<li><a class="menuLink" href="update.php">선수 정보 수정</a></li>
<li><a class="menuLink" href="delete.php">선수 방출</a></li>
<li><a class="menuLink" href="check.php">관심 선수 조회</a></li>
</ul>
</nav>
</div>
<br>

<br><br>
<h3>등록 선수 정보 입력</h3><br>

<FORM METHOD = 'post' ACTION = 'insert_result.php'>
Player ID : <input type = 'text' name = 'PlayerID'><br>
Name : <input type = 'text' name = 'Name'><br>
Team : <input type = 'text' name = 'Team'><br>
Position : <input type = 'text' name = 'Position'><br>
PitchType : <input type = 'text' name = 'PitchType'><br>
BatType : <input type = 'text' name = 'BatType'><br>
League : <input type = 'text' name = 'League'><br>
Payment : <input type = 'text' name = 'Payment'><br>
Salary : <input type = 'text' name = 'Salary'><br>
DebutYear : <input type = 'text' name = 'DebutYear'><br>
DebutTeam : <input type = 'text' name = 'DebutTeam'><br>
<br><br>
<input type = 'submit' value='선수 등록'>
</form>
</body>
</html>