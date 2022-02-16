<!DOCTYPE html>

<html>
<?php   include_once 'templates/header.php'; ?>

<h2 class="text-center mt-2 mb-2 text-secondary">Add A Meal</h2>


<form class="container mt-5">
  <div class="mb-3">
    <label for="inputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="inputMeal" class="form-label">Meal Name</label>
    <input type="text" class="form-control" id="inputMeal">
  </div>
  <div class="mb-3">
    <label for="inputQuantity" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="inputQuantity">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include_once 'templates/footer.php' ; ?>

</html>