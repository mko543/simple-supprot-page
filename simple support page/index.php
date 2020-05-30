<!doctype html>
<html dir="ltr">
	<head>
		<meta charset="utf-8" http-equiv="Content-Type" />
		<link href="style.css" rel="stylesheet"/>
		<title>Support page</title>
	</head>
	<form method="post" id="myform" >
	<input name="username" id="name" type="text" placeholder="your name"/><br>
	<textarea name="subject" id="subject" placeholder="write your message ..."></textarea>
	<br>
	<button id="insert" name="mkmk">send</button>
		<?php
		require("mkohash.php");
		if(isset($_POST["mkmk"])){
			if (!empty($_POST['username']) && !empty($_POST['subject'])){
				$name = $_POST['username'];
				$subject = $_POST['subject'];
				$jsonn = array("name"=>$name , "subject"=>$subject);
				$json[] = $jsonn;
				if(file_exists("database.json")){
					$temp = json_decode(hassh(file_get_contents("database.json"),true));
					array_push($temp,$json);
					file_put_contents("database.json",hassh(json_encode($temp),false));
					echo("done");
				}else{
				$fopen = fopen("database.json",'w');
				fwrite($fopen , hassh(json_encode($json),false));
				fclose($fopen);
				echo("done");
				}
			}
			
		}
		
		?>
		</form>
</html>