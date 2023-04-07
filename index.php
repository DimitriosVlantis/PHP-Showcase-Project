<?php

    include('config/db_connect.php');

    // query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    // make query & get results
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rown as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);

    // close connection

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?> 
    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza){ ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="img/pizza.svg" class="pizza">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingredients']) as $ing){?>
                                    <li><?php echo htmlspecialchars($ing); ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include('templates/footer.php'); ?>
</html>