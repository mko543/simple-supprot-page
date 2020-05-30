<!doctype html>
<html dir="ltr">
<head>
<meta charset="utf-8">
<title>control panel</title>
	<link href="style.css" rel="stylesheet"/>
</head>

<body>
	<h1 id="title">Control panel</h1>
	<?php
	session_start();
	if(!isset($_SESSION['accessKey'])){
			?>
	<form method="post" id="logform">
	<input name="accesskey" id="accesskey" type="password" placeholder="your access key"><br><br>
	<button name="login" id="insert">login</button>
		<?php
		if(isset($_POST['login'])){
		$key = "mko23";
		if($_POST['accesskey'] == $key){
			$_SESSION['accessKey'] = $key;
			echo("<meta http-equiv='Refresh' content='0'>");
		}
		}
		?>
		</form>
	<?php
	}else{
	require("mkoHash.php");
	$fileOpen = json_decode(hassh(file_get_contents("database.json"),true));
		echo("<table style='white-space: pre-line' id='table'>");
		echo("<tr><th>name</th><th>message</th></tr>");
		echo("<tr><td>".$fileOpen[0]->name."</td><td>".$fileOpen[0]->subject."</td></tr>");
		
		for($i=1; $i < sizeof($fileOpen); $i++){
			echo("<tr><td>".$fileOpen[$i][0]->name."</td><td>".$fileOpen[$i][0]->subject."</td></tr>");
		}
		echo("</table>");
		session_destroy();
	}
	?>
</body>
</html>