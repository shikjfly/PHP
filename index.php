<?php 

// 链接数据库
try {
	// 需要在mysql创建ijdb数据库以及用户名sa，密码123456
	$pdo = new PDO('mysql:host=localhost; dbname=ijdb', 'sa', '123456');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');

} catch (PDOException $e) {
	$output = "链接失败".$e->getMessage();
	include 'output.html.php';
	exit();
}
$output = "链接成功";
include 'output.html.php';
// end 链接数据库

// 创建表
try {
	$sql = 'CREATE TABLE joke (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        joketext TEXT,
        jokedate DATE NOT NULL
    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
    $pdo->exec($sql);

} catch (PDOException $e) {
	$output = "无法创建joke表".$e->getMessage();
	include 'output.html.php';
	exit();
}
$output = "创建成功";
include 'output.html.php';
// end 创建表




if (!isset($_REQUEST['firstname'])) {
	# code...
	include 'form.html.php';
}else{
	$output = $_REQUEST['firstname'].$_REQUEST['lastname'] ;
	include 'output.html.php';
}


 ?>