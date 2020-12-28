<?php  include('server.php'); ?>
<?php include ('topnav.php'); ?>
<?php include ('sidenav.php');?>
<?php 
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $update = true;
    $record = mysqli_query($db, "SELECT * FROM expense WHERE id=$id");

    if ($record)  {
      $n = mysqli_fetch_array($record);
      $name = $n['name'];
      $amount = $n['amount'];
      $date = $n['date'];
    }else{
echo "nothing";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  

<form method="post" action="server.php" class="form">
    
    <div class="input-group">
      <input type="hidden" name="id"  value="<?php echo $id; ?>" >
      <label>Name</label>
      <input type="text" name="name" required="" value="<?php echo $name; ?>">
    </div>
    <div class="input-group">
      <label>amount spent</label>
      <input type="text" name="amount" required="" value="<?php echo $amount ?> ">
    </div>
    <div class="input-group">
      <label>date YY-MM-DD</label>
      <input type="text" name="date_" required="" value="<?php echo $date ?>">
    </div>
    <div class="input-group">
      <?php if ($update == true): ?>
  <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
  <button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
    </div>
  </form>

</body>
</html>

