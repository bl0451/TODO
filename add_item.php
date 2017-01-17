<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>TODO List Add Item</title>
    <meta http-equiv="content-type"
    content="text/html; charset=utf-8"/>
    <?php $list_name=$_GET['name'];?>
  </head>
  <body onload="document.itemform.desc.focus()">
    <p>Please enter a new list item to create</p>
    <?php echo '<form action="add_item2.php?name=' . $list_name . '" method="get" name="itemform">';?>
      <fieldset>
        <legend>List Item Description</legend>
        <br>Item description: <input type="text" name="desc" id="1" autofocus><br><br>
        <?php echo '<br><input type="hidden" name="name" value="' . $list_name . '">';?>
        <input type="submit" value="Submit">
      </fieldset>
    </form>
  </body>
</html>