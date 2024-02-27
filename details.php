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



<div class="container d-flex justify-content-cetner align-items-center">
    <?php


// iter
        foreach ($result as $data) { ?>
            
            <div class="container detail-container">
                    <div class="card mb-3 p-4 bg-effect">

                        <div class="row g-4">

                            <div class="col-md-6">
                                <h1 class="card-title text-center mb-4"><?php echo $data['food_item_name']; ?></h1>
                                <img src="<?php echo $data['image_url']; ?>" class="img-fluid rounded-start" alt="...">
                            </div>

                            <div class="col-md-6">

                                <div class="card-body">
                                    <h3> <span class="sub-title"> Unit - </span> <?php echo $data['unit']; ?></h3>
                                    <h3> <span class="sub-title">Price - </span> $<?php echo $data['price']; ?></h3>
                                    <h3> <span class="sub-title">Calories - </span> <?php echo $data['calories']; ?></h3>
                                    <h3> <span class="sub-title">Protein - </span> <?php echo $data['protein_g']; ?> gm</h3>
                                    <h3> <span class="sub-title">Calcium - </span> <?php echo $data['calcium_g']; ?> gm</h3>
                                    <h3> <span class="sub-title">Vitamin A - </span> <?php echo $data['vitamin_a_iu']; ?> iu</h3>
                                    <h3> <span class="sub-title">Vitamin B1 - </span> <?php echo $data['vitamin_b1_mg']; ?> mg</h3>
                                    <h3> <span class="sub-title">Vitamin B2 - </span> <?php echo $data['vitamin_b2_mg']; ?> mg</h3>
                                    <h3> <span class="sub-title">Niacin - </span> <?php echo $data['niacin_mg']; ?> mg</h3>
                                    <h3> <span class="sub-title">Vitamin C - </span> <?php echo $data['vitamin_c_mg']; ?> mg</h3>
                                
                                    
                                    <form action="./edit.php" method="GET">

                                        <input type="hidden"  value="<?php  echo $food_item_id ?>" name="food_item_id" class="btn btn-dark">

                                        <input type="submit"  value="Edit" class="btn btn-dark">
                                                                
                                    </form> 
                                </div>

                            </div>



                        </div>

                    </div>

                </div>




       <?php } ?>

</div>    

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <!-- <form action="./index.php" method="GET">

            <input type="submit"  value="Back" class="btn btn-dark">
                                            
        </form> -->
    </div>
</div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


