<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Manage Authors</title>
	<link href="../../css/style.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  </head>
  <body>
    <h1 class="a-h1">Manage Authors</h1>
    <p class="a-p"><a href="?add">Add new author</a></p>
    <ul>
      <?php foreach ($authors as $author): ?>
        <li>
          <form class="a-s-form" action="" method="post">
            <div>
              <?php htmlout($author['name']); ?>
              <input type="hidden" name="id" value="<?php
                  echo $author['id']; ?>">
              <input type="submit" name="action" value="Edit">
              <input type="submit" name="action" value="Delete">
            </div>
          </form>
        </li>
      <?php endforeach; ?>
    </ul>
    <p class="a-p"><a href="..">Return to Paragraph management system</a></p>
    <?php include '../logout.inc.html.php'; ?>
  </body>
</html>
