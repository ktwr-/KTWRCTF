<?php
	function h($str) {
		return htmlspecialchars($str,ENT_QUOTES, 'UTF-8');
	}
header("Content-type: text/plain; charset=UTF-8");
if (isset($_POST['flag']))
{
    //ここに何かしらの処理を書く（DB登録やファイルへの書き込みなど）
	require '../db_set.php';
	$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

	// エラー処理
	try {
		$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		$ans = $_POST['flag'];
		$proid = h($_POST['id']);
		$userid = $_POST['login'];
		#$point = (int)$_POST['point'];
		// 問題番号に対応する答えを引っ張ってくる
		$stmt = $pdo->prepare('SELECT * FROM flagdb WHERE id = ?');
		$stmt->bindValue(1,$proid);
		$stmt->execute();
			
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$point = (int)$row['point'];
			if(hash("sha256",$ans) == $row['flaghash']){
				if(isset($userid)){
					#$flagnum = "flag".$id;
					// 個人のflag管理でポイント追加を行う
					$stmt = $pdo->prepare('SELECT * FROM solveFlag WHERE id = ?');
					$stmt->execute(array($userid));
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					if($row[$proid] == 0){
						$stmt = $pdo->prepare('UPDATE solveFlag SET '.h($proid).' = 1 WHERE id = ?');
						$stmt->execute(array($userid));
						$stmt = $pdo->prepare('SELECT allpoint FROM solveFlag WHERE id = ?');
						$stmt->execute(array($userid));
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						$newpoint = (int)$row['allpoint'] + $point;
						$stmt = $pdo->prepare('UPDATE solveFlag SET allpoint = ? WHERE id = ?');
						$stmt->execute(array($newpoint, $userid));
					}
				}
				echo "correct";
			}else{
				echo "incorrect";
			}
		}
	}catch (PDOException $e){
		$errorMessage ='データベースエラー';
		var_dump($e->getMessage());
	}
	
}
else
{
    echo 'The parameter of "request" is not found.';
}
?>
