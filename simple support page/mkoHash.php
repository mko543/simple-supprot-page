<?php
function xorfun($s,$k){
			$r="";
			for($i= 0; $i < strlen($s); ){
				for($j = 0; ($j < strlen($k) && $i < strlen($s)); $j++,$i++){
					$r .= $s[$i] ^ $k[$j];
				}
			
		}
			return($r);
		}
		function hassh($string,$unhash){
			$rn1= rand(1,100000);
			$rn2 = rand(1,100000);
			$md5hash = md5($rn1.$rn2);
			$key = "";
			$thekeyofkey = "mkoIsHere";
			$result="";
			if($unhash !== true){
				$key = $md5hash;
				$hashKey = xorfun($md5hash,$thekeyofkey);
				$fopen = fopen("key.txt",'w');
				fwrite($fopen ,$hashKey);
				fclose($fopen);
			}else{
				$key = xorfun(file_get_contents("key.txt"),$thekeyofkey);
			}
			$result = xorfun($string,$key);
				return($result);
		}
?>
