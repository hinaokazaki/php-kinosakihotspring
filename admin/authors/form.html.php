<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/helpers.inc.php'; ?>
	
	<!--*************************************************************
				Don't forget to change server path
	************************************************************* -->
	<!-- Set password - Page 303 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php htmlout($pageTitle); ?></title>
	<link href="../../css/style.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  </head>
  <body>
    <h1 class="a-h1"><?php htmlout($pageTitle); ?></h1>
    <form class="a-s-form" action="?<?php htmlout($action); ?>" method="post">
      <div>
        <label for="name">Name: <input type="text" name="name"
            id="name" value="<?php htmlout($name); ?>"></label>
      </div>
      <div>
        <label for="email">Email: <input type="text" name="email"
            id="email" value="<?php htmlout($email); ?>"></label>
      </div>
      <div>
        <label for="password">Set password: <input type="password"
            name="password" id="password"></label>
      </div>
      <fieldset>
        <legend>Roles:</legend>
		<!-- The id attribute can’t contain spaces. We therefore have to go a little 
		out of our way to generate a unique number for each role. Instead of using a 
		foreach loop to step through our array of roles, we use an old-fashioned for 
		loop - Page 304 -->
        <?php for ($i = 0; $i < count($roles); $i++): ?>
          <div>
            <label for="role<?php echo $i; ?>"><input type="checkbox"
              name="roles[]" id="role<?php echo $i; ?>"
              value="<?php htmlout($roles[$i]['id']); ?>"<?php
              if ($roles[$i]['selected'])
              {
                echo ' checked';
              }
              ?>><?php htmlout($roles[$i]['id']); ?></label>:
              <?php htmlout($roles[$i]['description']); ?>
          </div>
        <?php endfor; ?>
      </fieldset>
      <div>
        <input type="hidden" name="id" value="<?php
            htmlout($id); ?>">
        <input type="submit" value="<?php htmlout($button); ?>">
      </div>
    </form>
  </body>
</html>
