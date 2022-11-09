<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/access.inc.php';

/*************************************************************
//Don't forget to change server path
/*************************************************************/

if (!userIsLoggedIn())
{
	include '../login.html.php';
	exit();
}

if (!userHasRole('Content Editor'))
{
	$error = 'Only Content Editors may access this page.';
	include '../accessdenied.html.php';
	exit();
}

if (isset($_GET['add']))
{
  $pageTitle = 'New Paragraph';
  $action = 'addform';
  $text = '';
  $authorid = '';
  $id = '';
  $button = 'Add paragraph';

  //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/db.inc.php';

  // Build the list of authors
  try
  {
    $result = $pdo->query('SELECT id, name FROM author');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of authors.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $authors[] = array('id' => $row['id'], 'name' => $row['name']);
  }
  
  include 'form.html.php';
  exit();
} 

if (isset($_GET['addform']))
{
  //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/db.inc.php';

  if ($_POST['author'] == '')
  {
    $error = 'You must choose an author for this paragraph.
        Click &lsquo;back&rsquo; and try again.';
    include 'error.html.php';
    exit();
  }

  try
  {
    $sql = 'INSERT INTO paragraph SET
        ptext = :ptext,
        pdate = CURDATE(),
        authorid = :authorid';
    $s = $pdo->prepare($sql);
    $s->bindValue(':ptext', $_POST['text']);
    $s->bindValue(':authorid', $_POST['author']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error adding submitted paragraph.';
    include 'error.html.php';
    exit();
  }

  $paragraphid = $pdo->lastInsertId();


  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
  //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/db.inc.php';

  try
  {
    $sql = 'SELECT id, ptext, authorid FROM paragraph WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching paragraph details.';
    include 'error.html.php';
    exit();
  }
  $row = $s->fetch();

  $pageTitle = 'Edit Paragraph';
  $action = 'editform';
  $text = $row['ptext'];
  $authorid = $row['authorid'];
  $id = $row['id'];
  $button = 'Update paragraph';

  // Build the list of authors
  try
  {
    $result = $pdo->query('SELECT id, name FROM author');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of authors.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $authors[] = array('id' => $row['id'], 'name' => $row['name']);
  }
  
  include 'form.html.php';
  exit();
}
  
  
if (isset($_GET['editform']))
{
  //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/db.inc.php';

  if ($_POST['author'] == '')
  {
    $error = 'You must choose an author for this paragraph.
        Click &lsquo;back&rsquo; and try again.';
    include 'error.html.php';
    exit();
  }

  try
  {
    $sql = 'UPDATE paragraph SET
        ptext = :ptext,
        authorid = :authorid
        WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':ptext', $_POST['text']);
    $s->bindValue(':authorid', $_POST['author']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submitted paragraph.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
  include $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/db.inc.php';


  // Delete the paragraph
  try
  {
    $sql = 'DELETE FROM paragraph WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting paragraph.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

if (isset($_GET['action']) and $_GET['action'] == 'search')
{
  //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/db.inc.php';

  // The basic SELECT statement
  $select = 'SELECT id, ptext';
  $from   = ' FROM paragraph';
  $where  = ' WHERE TRUE';

  $placeholders = array();

  if ($_GET['author'] != '') // An author is selected
  {
    $where .= " AND authorid = :authorid";
    $placeholders[':authorid'] = $_GET['author'];
  }

  if ($_GET['text'] != '') // Some search text was specified
  {
    $where .= " AND ptext LIKE :ptext";
    $placeholders[':ptext'] = '%' . $_GET['text'] . '%';
  }

  try
  {
    $sql = $select . $from . $where;
    $s = $pdo->prepare($sql);
    $s->execute($placeholders);
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching paragraph.';
    include 'error.html.php';
    exit();
  }

  foreach ($s as $row)
  {
    $paragraphs[] = array('id' => $row['id'], 'text' => $row['ptext']);
  }

  include 'history.html.php';
  exit();
}

// Display search form
//include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/kinosakihotspring.com/includes/db.inc.php';

try
{
  $result = $pdo->query('SELECT id, name FROM author');
}
catch (PDOException $e)
{
  $error = 'Error fetching authors from database!';
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $authors[] = array('id' => $row['id'], 'name' => $row['name']);
}

include 'searchform.html.php';
