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

   
<?php include_once 'templates/footer.php' ; ?>

</html>