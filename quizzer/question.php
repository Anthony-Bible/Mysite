<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Quizzer</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP QUIZER</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="current">
				Question 1 of 5
			</div>
			<p class="question">
				What does PHP stand For?
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
					<li><input name="choice" type="radio" value="1">Php hyper texxt processor</li>
					<li><input name="choice" type="radio" value="1">Private home texxt processor</li>
					<li><input name="choice" type="radio" value="1">Personal Home Page</li>
					<li><input name="choice" type="radio" value="1">personal hyper texxt processor</li>

				</ul>
				<input type="submit" value="Submit">
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			copyright &copy; <?php print(Date("Y")); ?>
		</div>
	</footer>
</body>
</html>