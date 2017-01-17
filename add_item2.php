<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>TODO List Create Item in Database</title>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8"/>
    <?php $list_name=$_GET['name'];?>
    <?php $item_desc=$_GET['desc'];?>
  </head>
  <body>
    <?php $username="Greg";$password="Orion23belt";?>
    <?php $con = mysqli_connect("localhost",$username,$password) or die("Connection Problem" . mysqli_errno($con));
    $database_name="todo_list";
    $database = mysqli_select_db($con,$database_name) or die("SQL Problem" . mysqli_error($con));

    $query="SELECT list_id FROM list_table WHERE list_name = '" . $list_name . "' limit 1";$result=mysqli_query($con,$query);
    $list_num=mysqli_fetch_object($result);

    $query="INSERT INTO list_items_table (item_desc, list_id) VALUES ('" . $item_desc . "'," . $list_num->list_id . ")";
    if (mysqli_query($con, $query)) {
        echo "<p>The new list item was created.</p><br>";
    } else {
        echo "Error occurred: " . mysqli_error($con);
    }
    mysqli_close($con);?>

    <?php $addr="location.href='select_list.php?name=" . $list_name . "'";?>
    <?php echo '<input type="button" value="Return" onClick="' . $addr . '">';?>
   </body>
</html>