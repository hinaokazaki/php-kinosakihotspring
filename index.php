<?php

include $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/db.inc.php';

try
{
  $sql = 'SELECT paragraph.id, ptext, name, email
      FROM paragraph INNER JOIN author
        ON authorid = author.id';
  $result = $pdo->query($sql);
}
catch (PDOException $e)
{
  $error = 'Error fetching paragraphs: ' . $e->getMessage();
  include 'includes/error.html.php';
  exit();
}

foreach ($result as $row)
{
  $paragraphs[] = array(
    'id' => $row['id'],
    'text' => $row['ptext'],
    'name' => $row['name'],
    'email' => $row['email']
  );
}

include 'content/index.html';
