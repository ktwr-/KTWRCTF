<?php
	function h($str) {
		return htmlspecialchars($str,ENT_QUOTES, 'UTF-8');
	}
header("Content-type: text/plain; charset=UTF-8");
if (isset($_POST['request']) && isset($_POST['num']))
{
    //ここに何かしらの処理を書く（DB登録やファイルへの書き込みなど）
	require '/db_set.php';
	$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

	// エラー処理
	try {
		$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		$ans = $_POST['request'];
		$id = $_POST['id'];
		$userid = $_POST['login'];
		$point = $_POST['point'];
		$stmt = $pdo->prepare('SELECT * FROM flagdb WHERE id = ?');
		$stmt->execute(array($id));
			
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if(hash("sha256",$ans) == $row['flaghash']){
				if(isset($userid)){
					$flagnum = "flag".$id;
					$stmt = $pdo->prepare('SELECT ? FROM solveFlag WHERE id = ?');
					$stmt->execute(array($flagnum,$userid));
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					if($row[$flagnum] < 5){
						$stmt = $pdo->prepare('UPDATE solveFlag SET '.h($flagnum).' = ? WHERE id = ?');
						$stmt->execute(array($point,$userid));
						$stmt = $pdo->prepare('SELECT point FROM solveFlag WHERE id = ?');
						$stmt->execute(array($userid));
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						$allpoint = $row['point'] + $point;
						$stmt = $pdo->prepare('UPDATE solveFlag SET point = ? WHERE id = ?');
						$stmt->execute(array($allpoint,$userid));
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
