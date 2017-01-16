<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>TODO List Creation</title>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8"/>
    <?php $list_name=$_GET['name'];?>
  </head>
  <body onload="document.listform.name.focus()">
    <p>Please enter a user or list name to create</p>
    <form action="create_list2.php" method="get" name="listform">
      <fieldset>
        <legend>List / User Information</legend>
        <?php echo '<br>List name: <input type="text" value="' . $list_name . '" name="name" id="1" autofocus><br><br>';?>
        <input type="submit" value="Submit">
      </fieldset>
    </form>
  </body>
</html>