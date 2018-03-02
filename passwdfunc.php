<?php
	function createSalt(){
		$str = array_merge(range('a','z'),range('0','9'),range('A','Z'));
		$r_str = null;
		for($i = 0;$i < 12;$i++){
			$r_str.= $str[rand(0,count($str)-1)];
		}
		return $r_str;
	}

	function passwordHash($password,$salt){
		return password_hash($password.$salt,PASSWORD_DEFAULT);
	}
?>
