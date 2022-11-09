<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Manage History</title>
	<link href="../../css/style.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  </head>
  <body>
    <h1 class="a-h1">Manage History</h1>
    <p class="a-p"><a href="?add">Add new paragraph</a></p>
    <form class="a-s-form" action="" method="get">
      <p>View paragraphs satisfying the following criteria:</p>
      <div>
        <label for="author">By author:</label>
        <select name="author" id="author">
          <option value="">Any author</option>
          <?php foreach ($authors as $author): ?>
            <option value="<?php htmlout($author['id']); ?>"><?php
                htmlout($author['name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <label for="text">Containing text:</label>
        <input type="text" name="text" id="text">
      </div>
      <div>
        <input type="hidden" name="action" value="search">
        <input type="submit" value="Search">
      </div>
    </form>
    <p class="a-p"><a href="..">Return to History management system</a></p>
    <?php include '../logout.inc.html.php'; ?>
  </body>
</html>
