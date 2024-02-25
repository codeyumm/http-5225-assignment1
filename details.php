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

    // get food_item_id from request
    $food_item_id = $_GET["food_item_id"];


    // connect to database
    $conn = ConnectDB();

    
    $query = 'SELECT * FROM food_item_data JOIN food_items 
                ON food_item_data.food_item_id = food_items.food_item_id  
                WHERE  food_items.food_item_id = '. $food_item_id .' ';

    
    // echo $query;
    // run query on database and get the result
    $result = mysqli_query($conn, $query);


    // for testing response from db
        // echo '<pre>';
        // echo print_r($result); 
        // echo '</pre>';
?>

<form action="./index.php" method="GET">

    <input type="submit"  value="Back" class="btn btn-dark">
                                    
</form>

<?php

    foreach ($result as $data) {
        
        echo '<h1>' . $data['food_item_name'] . '</h1>';
        echo '<h3> Unit - ' . $data['unit'] . '</h3>';
        echo '<h3> Price - $' . $data['price'] . '</h3>';
        echo '<h3> Calories - ' . $data['calories'] . '</h3>';
        echo '<h3> Protein - ' . $data['protein_g'] . '</h3>';
        echo '<h3> Calcium - ' . $data['calcium_g'] . '</h3>';
        echo '<h3> Vitamin A - ' . $data['vitamin_a_iu'] . '</h3>';
        echo '<h3> Vitamin B1 - ' . $data['vitamin_b1_mg'] . '</h3>';
        echo '<h3> Vitamin B2 -' . $data['vitamin_b2_mg'] . '</h3>';
        echo '<h3> Niacin -' . $data['niacin_mg'] . '</h3>';
        echo '<h3> Vitamin C - ' . $data['vitamin_c_mg'] . '</h3>';




    }

?>
    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


