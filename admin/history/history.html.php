<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Manage Histories: Search Results</title>
	<link href="../../css/style.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  </head>
  <body>
    <h1 class="a-h1">Search Results</h1>
    <?php if (isset($paragraphs)): ?>
      <table>
        <tr><th>History Text</th><th>Options</th></tr>
        <?php foreach ($paragraphs as $paragraph): ?>
        <tr valign="top">
          <td><?php markdownout($paragraph['text']); ?></td>
          <td>
            <form class="a-form-n" action="?" method="post">
              <div>
                <input type="hidden" name="id" value="<?php
                    htmlout($paragraph['id']); ?>">
                <input type="submit" name="action" value="Edit">
                <input type="submit" name="action" value="Delete">
              </div>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>
    <p class="a-p"><a href="?">New search</a></p>
    <p class="a-p"><a href="..">Return to History management system</a></p>
    <?php include '../logout.inc.html.php'; ?>
  </body>
</html>
