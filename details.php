<!DOCTYPE html>
<html lang="en">

<!-- inclue header from shared layout -->
    <?php include('./src/layout/shared/header.php'); ?>

<body>
    
<?php

    // include database connection php file
    include("./src/connection.php");

    // include nav bar from layout
    include("./src/layout/shared/nav.php");

    // get food_item_id

    $conn = ConnectDB();

    $query = "SELECT food_item_id, food_item_name, image_url FROM food_items";

    $result = mysqli_query($conn, $query);


    // for testing response from db
        // echo '<pre>';
        // echo print_r($result); 
        // echo '</pre>';
?>

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


