<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>form</title>
</head>
<body>
	<form action="?" method="get">
		<div>
			<label for="joketext">Type your joke here:	</label><br>
			<textarea name="joketext" id="joketext" cols="40" rows="3"><?php echo $text ?></textarea> <br>
			<input type="date" name="jokedate" id="jokedate" value="<?php echo $date ?>">
		</div>

		<div>
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="submit" name="<?php echo $btn ?>" value="<?php echo $btn ?>">
		</div>
	</form>
</body>
</html>