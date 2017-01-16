<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>TODO List Display</title>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8"/>
  </head>
  <body>
   <?php $list_name=$_POST['name'];?>   <!- Temporary pre-set value for unit testing ->
   <p>You may add items to or delete items from your list here</p>
    <table style="width:100%">
      <caption>TODO List Contents</caption>
      <tr>
        <th align="left">ID</th>
        <th align="left">Item</th>
      </tr>

<!-    Load data from database here ->
      <?php $username="Greg";$password="Orion23belt";
      $con = mysqli_connect("localhost",$username,$password) or die("Connection Problem" . mysqli_errno($con));
      $database_name="todo_list";
      $database = mysqli_select_db($con,$database_name) or die("SQL Problem" . mysqli_error($con));

      $query="SELECT list_id FROM list_table WHERE list_name = '" . $list_name . "\n' limit 1";$result=mysqli_query($con,$query);
      $list_num=mysqli_fetch_object($result);
#      var_dump($list_num);

      $query="SELECT * FROM list_items_table WHERE list_id = " . $list_num->list_id;$result=mysqli_query($con,$query);

      $num=mysqli_num_rows($result);mysqli_close($con);
      $i=0;
      while ($i < $num) {$row=mysqli_fetch_array($result,MYSQLI_ASSOC);$field1_name=$row["item_id"];
      $field2_name=$row["item_desc"];
      echo "<tr><td>
      $field1_name $field2_name
      </td></tr>";$i++;}?>

    </table>
  </body>
</html>