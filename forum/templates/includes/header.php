<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To TalkingSpace</title>
  <!-- Latest compiled and minified CSS -->
    <!-- Custom styles for this template -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="<?php echo BASE_URI; ?>templates/css/custom.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
	<script src="<?php echo BASE_URI; ?>templates/js/ckeditor/ckeditor.js"></script>
	<?php
    //Check if title is set, if not assign it
    if(!isset($title)){
    	$title = SITE_TITLE;
    }
    ?>
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation">

      <div class="container">
          <a class="navbar-brand" href="index.php">TalkingSpace</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav navbar-right">
            <li class="nav-item active"><a  class="nav-link" href="index.php">Home</a></li>
			<?php if(!isLoggedIn()) : ?>
				<li><a class="nav-link" href="register.php">Create An Account</a></li>
			<?php else : ?>
				<li><a  class="nav-link" href="create.php">Create Topic</a></li>
			<?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left"><?php echo $title; ?></h1>
						<h4 class="pull-right">A simple PHP forum engine</h4>
						<div class="clearfix"></div>
						<hr>
						<?php displayMessage(); ?>
