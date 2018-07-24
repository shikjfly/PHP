<?php 

if ('链接数据库') {
	try {
		// 需要在mysql创建ijdb数据库以及用户名sa，密码123456
		$pdo = new PDO('mysql:host=localhost; dbname=ijdb', 'sa', '123456');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');

	} catch (PDOException $e) {
		die( "链接失败".$e->getMessage());
	}
	$output = "ijdb数据库连接成功";
	include 'output.html.php';
	// end 链接数据库
}
if ('判断表是否存在') {
	$table = 'joke';
	$result = $pdo -> query("SHOW TABLES LIKE '". $table. "'");
	$row = $result -> fetchALL();
	//  判断表是否存在
	if ('1' == count($row)) {
		echo "创建joke表准备就绪，准备字段id、joketext、jokedate";
	}else{
		// 创建joke表
		try {
			$sql = 'CREATE TABLE joke (
		        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		        joketext TEXT,
		        jokedate DATE NOT NULL
		    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
		    $pdo->exec($sql);
		} catch (PDOException $e) {
			die("无法创建joke表".$e->getMessage());
		}
		$output = "创建成功";
		include 'output.html.php';
		// end 创建表
	}
	// end 判断表是否存在
}
if ('查') {
	try {	
		$sql = 'SELECT id, joketext, jokedate FROM joke';
		$result = $pdo->query($sql);
	} catch (PDOException $e) {
		die("查询失败".$e->getMessage());
	}
	while ($row = $result->fetch()) {
		$jokes[] = array('id'=>$row['id'], 'text'=>$row['joketext'], 'date'=>$row['jokedate']);
	}
	include 'jokes.html.php';
	// end查询joke表	
}
if ('判断    ===是否按了新增joke，如果按了，就弹出新增页面') {
	if (isset($_REQUEST['addjoke'])) {
		$btn = "Add";
		$text = "";
		$date = date("Y-m-d");
		include 'form.html.php';
		exit();
	}else{
		echo "没有点击新增";
	}	
}
if ('增') {
	// 判断    ===是否填了内容
	if (isset($_REQUEST['Add'])) {
		// 插入内容
		try {
			$sql = 'INSERT INTO joke SET
				joketext = :joketext,
				jokedate = :jokedate';
			$s = $pdo -> prepare($sql);
			$s -> bindValue(':joketext', $_REQUEST['joketext']);
			$s -> bindValue(':jokedate', $_REQUEST['jokedate']);
			$s -> execute();
		} catch (PDOException $e) {
			die("插入数据失败".$e->getMessage());
		}
		header('Location: .');
		exit();
		// end插入内容
	}
	// end 判断
}
if ('删') {
	// 判断    ===是否删除数据
	if (isset($_REQUEST['Delete'])) {
		// 删除内容
		try {
			$sql = 'DELETE FROM joke WHERE id = :id';
			$s = $pdo -> prepare($sql);
			$s -> bindValue(':id', $_REQUEST['id']);
			$s -> execute();
		} catch (PDOException $e) {
			die("删除数据失败".$e->getMessage());
		}
		header('Location: .');
		exit();
		// end删除内容
	}
	// end 判断
}
if ('判断    ===是否按了编辑内容，如果按了，就弹出编辑页面') {
	// 判断    ===是否编辑数据
	if (isset($_REQUEST['Edite'])) {
		$id =  $_REQUEST['id'];
		$text = $_REQUEST['text'];
		$date = $_REQUEST['date'];
		$btn = "Edit";
		include 'form.html.php';
		exit();
	}
	// end 判断
}
if ('改') {
	// 判断    ===是否编辑数据
	if (isset($_REQUEST['Edit'])) {
		// 编辑内容
		try {
			$sql = 'UPDATE joke SET joketext = :joketext , jokedate = :jokedate WHERE id = :id';
			$s = $pdo -> prepare($sql);
			$s -> bindValue(':id', $_REQUEST['id']);
			$s -> bindValue(':joketext', $_REQUEST['joketext']);
			$s -> bindValue(':jokedate', $_REQUEST['jokedate']);
			$s -> execute();
		} catch (PDOException $e) {
			die("编辑数据失败".$e->getMessage());
		}
		header('Location: .');
		exit();
		// end编辑内容
	}
	// end 判断	
}


if (true) {
	
}
	










	








 ?>