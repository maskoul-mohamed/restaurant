<?php
    include 'config/db_connect.php';

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // Sql query
        $sql = "SELECT * FROM food WHERE id = $id";

        // get query result
        $result = mysqli_query($conn, $sql);

        // fetch to array
        $meal = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        print_r($meal);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'templates/header.php' ?>
    <h2 class="text-secondary text-center mt-4">Details</h2>
    <div class="container text-center mt-5">
        
    <?php if($meal): ?>
        <h4><?php echo htmlspecialchars($meal['name']) ?></h4>
        <p>Address: <?php echo htmlspecialchars($meal['address'])?></p>
    <?php else: ?>
    <?php endif; ?>
    <?php include 'templates/footer.php' ?>
    </div>
</html>