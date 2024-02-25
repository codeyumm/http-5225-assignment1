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

    $conn = ConnectDB();

    $query = "SELECT food_item_id, food_item_name, image_url FROM food_items";

    $result = mysqli_query($conn, $query);


    // for testing response from db
        // echo '<pre>';
        // echo print_r($result); 
        // echo '</pre>';
?>

    <div class="container mt-4">
        <div class="row">

            <!-- iterate through each food item in result and get the values  -->
            <?php foreach ($result as $food_item) { ?>

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">

                    <div class="card text-center mx-auto mt-3 p-0 glassmorphism mt-4">

                        <div class="card-header p-0">
                            <img src="<?php echo $food_item['image_url']; ?>" alt="" class="img-fluid">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $food_item['food_item_name']; ?></h5>
                        </div>

                        <div class="card-footer text-muted">

                        <!-- passing food_item_id to details page -->
                            <form action="./details.php" method="GET">
                                <input type="hidden" value="<?php echo $food_item['food_item_id'] ?>" name="food_item_id" />
                                <input type="submit"  value="Know more" class="btn btn-dark">
                                    
                            </form>
                        </div>

                    </div>
            </div>

            
            <?php } ?>
        </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


