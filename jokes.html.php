<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<hr>
	<p>Here are all the jokes in the database:</p>
	<?php foreach ($jokes as $joke): ?>
		<form action="" method="get">
			<blockquote>
				<p>
					<?php echo $joke['id']; ?> &nbsp;&nbsp;&nbsp;
					<?php echo $joke['text']; ?> &nbsp;&nbsp;&nbsp;
					<?php echo $joke['date']; ?>&nbsp;&nbsp;
					<input type="hidden" name="id" value="<?php echo $joke['id']; ?>" >
					<input type="hidden" name="text" value="<?php echo $joke['text']; ?>" >
					<input type="hidden" name="date" value="<?php echo $joke['date']; ?>" >
					<input type="submit" value="Delete" name="Delete"> 
					<input type="submit" value="Edite" name="Edite"> 
				</p>
			</blockquote>			
		</form>
	<?php endforeach; ?>
	<p><a href="?addjoke">Add your own joke</a></p>
	<hr>
</body>
</html>