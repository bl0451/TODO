<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>TODO List Create List in Database</title>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8"/>
    <?php $list_name=$_GET['name'];?>
  </head>
  <body>
    <?php $username="Greg";$password="Orion23belt";?>
    <?php $con = mysqli_connect("localhost",$username,$password) or die("Connection Problem" . mysqli_errno($con));
    $database_name="todo_list";
    $database = mysqli_select_db($con,$database_name) or die("SQL Problem" . mysqli_error($con));

    $query="INSERT INTO list_table (list_name) VALUES ('" . $list_name . "')";
    if (mysqli_query($con, $query)) {
        echo "<p>The new list was created.</p><br>";
    } else {
        echo "Error occurred: " . mysqli_error($con);
    }
    mysqli_close($con);?>

    <?php $addr="location.href='select_list.php?name=" . $list_name . "'";?>
    <?php echo '<input type="button" value="Return" onClick="' . $addr . '">';?>
   </body>
</html>