<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>TODO List Delete Item</title>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8"/>
    <?php $list_name=$_GET['name'];?>
  </head>
  <body>
    <?php $username="Greg";$password="Orion23belt";?>
    <?php $con = mysqli_connect("localhost",$username,$password) or die("Connection Problem" . mysqli_errno($con));
    $database_name="todo_list";
    $database = mysqli_select_db($con,$database_name) or die("SQL Problem" . mysqli_error($con));

    echo $query="DELETE FROM list_items_table WHERE item_id = " . $_GET["id"];
    mysqli_close($con);?>
    <p>The list item was deleted.</p><br>
    <?php $addr="location.href='select_list.php?name=" . $list_name . "'";?>
    <?php echo '<input type="button" value="Return" onClick="' . $addr . '">';?>
   </body>
</html>