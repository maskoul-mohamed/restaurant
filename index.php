<?php
    // connect to database
    $conn = mysqli_connect('localhost', 'maskoul', 'test123', 'soli_food');

    // check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error(); 
    }

    // write query for all food
    $sql = 'SELECT  id, name, address, createdAt from food';

    // make query & get result
    $resutl = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $food = mysqli_fetch_all($resutl, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($resutl);

    // close the connection
    mysqli_close($conn);

    print_r($food);
?>

<!DOCTYPE html>

<html>
<?php   include_once 'templates/header.php'; ?>

<h2 class="text-secondary text-center mt-4">Meals!</h2>

<div class="container">
    <div class="row">

        <?php foreach($food as $meal){ ?>
        <div class="col col-sm-6 col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($meal['name']) ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($meal['address'])?></p>
                    <a href="#" class="btn btn-primary text-end">more info</a>
                </div>
            </div>
        </div>
    <?php }?>
    </div>
</div>
<?php include_once 'templates/footer.php' ; ?>

</html>