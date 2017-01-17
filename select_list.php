<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>TODO List Display</title>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8"/>
    <?php $list_name=$_GET['name'];?>
    <?php $username="Greg";$password="Orion23belt";?>
    <script type="text/javascript">
        <!--
          function getConfirmDelete(id) {
              var retVal = confirm("Do you want to delete the item ?");
              if( retVal == true ){
                <?php echo 'del_page = "delete_item.php?id=" + id + "&name=' . $list_name . '";'?>
                window.location.assign(del_page);
                return true;
              }
              else{
                return false;
              }
          }

          function getNewList() {
              <?php echo 'var retVal = confirm("List ' . $list_name . ' does not exist. Do you want to create it ?");';?>
              if( retVal == true ){
                <?php echo 'create_page = "create_list.php?name=' . $list_name . '";'?>
                window.location.assign(create_page);
                return true;
              }
              else{
                window.location.assign("index.php");
                return false;
              }
          }
        //-->
    </script>
  </head>
  <body>
   <p>You may add items to or delete items from your list here</p>
    <table style="width:50%">
<!-    Load data from database here ->
      <?php $con = mysqli_connect("localhost",$username,$password) or die("Connection Problem" . mysqli_errno($con));
      $database_name="todo_list";
      $database = mysqli_select_db($con,$database_name) or die("SQL Problem" . mysqli_error($con));

      $query="SELECT list_id FROM list_table WHERE list_name = '" . $list_name . "' limit 1";$result=mysqli_query($con,$query);
      $list_num=mysqli_fetch_object($result);
      if($list_num){
        echo "<caption>TODO List Contents for: $list_name</caption>";
        echo "<tr>
           <th align='left'>ID</th>
           <th align='left'>Item</th>
           </tr>";

        $query="SELECT * FROM list_items_table WHERE list_id = " . $list_num->list_id;$result=mysqli_query($con,$query);

        $num=mysqli_num_rows($result);mysqli_close($con);
        $i=0;
        while ($i < $num) {$row=mysqli_fetch_array($result,MYSQLI_ASSOC);$field1_value=$row["item_id"];
        $field2_value=$row["item_desc"];
        echo "<tr>
        <td>$field1_value</td>
        <td>$field2_value</td>
        <td><input type='button' value='Delete' id='$field1_value' onclick='getConfirmDelete($field1_value);'></td>
        </tr>";$i++;}
        $index_page = '"index.php"';
        echo "</table>",
          "<br><br><input type='button' value='Add Item to List'><br><br><input type='button' value='Pick Another List' onclick='window.location.assign(" . $index_page . ")'>";
      }
      else echo "There is no list by the name of " . $list_name . ", click the button to create it or hit your back button to try again.<br><br>",
            "<button onclick='getNewList()'>Generate a New List</button>";
      ?>

  </body>
</html>