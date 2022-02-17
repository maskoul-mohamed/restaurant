<?php


  include 'config/db_connect.php';

  $mealName = '';
  $address = '';
  $errors = array('mealName'=>'', 'address'=>'');

  if(isset($_POST['submit'])){
    // check mealName
    if(empty($_POST['mealName'])){
      $errors['mealName'] = 'A meal name is required <br/>';
    } else {
      $mealName = $_POST['mealName'];
      if(!preg_match('/^[a-zA-z\s]+$/', $mealName)){
        $errors['mealName'] = 'The meal name must be letters and spaces only';
      }
    }
      // check address
      if(empty($_POST['address'])){
        $errors['address'] = 'Address is required <br/>';
      } else {
        $address = $_POST['address'];
        if(!preg_match('/^[a-zA-z\s]+$/', $address)){
          $errors['address'] = 'The address  must be letters and spaces only';
        }
      }
  



  if(array_filter($errors)){
    echo var_dump($errors);
  } else {
    $mealName = mysqli_real_escape_string($conn, $_POST['mealName']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // create sql query
    $sql = "INSERT INTO food(name, address) VALUES('$mealName', '$address')";
    echo $sql;
    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
    } else {
      echo 'query error: ' . mysqli_error($conn);
    }


  }
} 
?>


<!DOCTYPE html>

<html>
<?php   include_once 'templates/header.php'; ?>

<h2 class="text-center mt-2 mb-2 text-secondary">Add A Meal</h2>


<form class="container mt-5" method="POST" action="add.php">

  <div class="mb-3">
    <label for="mealName" class="form-label">Meal Name</label>
    <input type="text" name="mealName" class="form-control" id="mealName">
    <div class="text-danger"><?php echo $errors['mealName']?></div>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="address">
    <div class="text-danger"><?php echo $errors['address']?></div>

  </div>
  <input name="submit" type="submit" class="btn btn-primary" value="submit">
</form>

<?php include_once 'templates/footer.php' ; ?>

</html>