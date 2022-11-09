<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/helpers.inc.php'; ?>
	
	<!--*************************************************************
				Don't forget to change server path
	************************************************************* -->
	
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Access Denied</title>
	<link href="../../css/style.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  </head>
  <body>
    <h1 class="a-h1">Access Denied</h1>
    <p class="a-p"><?php htmlout($error); ?></p>
  </body>
</html>
