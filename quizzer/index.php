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
			<h2>TEST YOUR PHP KNOWLEDGE</h2>
			<p>This is a multiple choice to test your knowledge of PHP </p>

			<ul>
				<li><strong>Number of Questions:</strong>5</li>
				<li><strong>Type of Quize</strong> Multiple Choice</li>
				<li><strong>Estimated time:</strong>4 minutes</li>


			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
		</div>
	</main>
	<footer>
		<div class="container">
			copyright &copy; <?php print(Date("Y")); ?>
		</div>
	</footer>
</body>
</html>