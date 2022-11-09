<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php htmlout($pageTitle); ?></title>
	<link href="../../css/style.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <style type="text/css">
    textarea {
      display: block;
      width: 100%;
    }
    </style>
  </head>
  <body>
    <h1 class="a-h1"><?php htmlout($pageTitle); ?></h1>
    <form action="?<?php htmlout($action); ?>" method="post">
      <div>
        <label for="text">Type your paragraph here:</label>
        <textarea id="text" name="text" rows="3" cols="40"><?php
            htmlout($text); ?></textarea>
      </div>
      <div>
        <label for="author">Author:</label>
        <select name="author" id="author">
          <option value="">Select one</option>
          <?php foreach ($authors as $author): ?>
            <option value="<?php htmlout($author['id']); ?>"<?php
                if ($author['id'] == $authorid)
                {
                  echo ' selected';
                }
                ?>><?php htmlout($author['name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <input type="hidden" name="id" value="<?php
            htmlout($id); ?>">
        <input type="submit" value="<?php htmlout($button); ?>">
      </div>
    </form>
  </body>
</html>
