<?php
    include 'config/db_connect.php';

    if(isset($_POST['delete'])){
        $id = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE  FROM food WHERE id = $id";

        if(mysqli_query($conn, $sql)){
            header('Location: index.php');
        }else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

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
        <p>Created At: <?php echo htmlspecialchars($meal['createdAt']) ?></p>

        <form action="" method="POST">
            <input type="hidden" name="id_to_delete" value= <?php echo $meal['id']?>>
            <input type="submit" name="delete" value="Delete" class="btn btn-secondary">
        </form>
    <?php else: ?>
        <p class="h4 text-warning">No such meal exists!</p>
    <?php endif; ?>
    <?php include 'templates/footer.php' ?>
    </div>
</html>