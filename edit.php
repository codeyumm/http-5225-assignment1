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



<div class="container edit-section">
    <div class="row">
    <h1>Edit Food Item</h1>

    <form class="edit-form" method="POST" action="./src/components/update.php">

         <!-- hidden input field to check if request is coming from edit form or not -->
        <input type="hidden" name="isFromEditForm" value="true">
          


            <?php foreach($result as $item) { ?> 
                <div class="container">

                    <h1> <?php echo $item['food_item_name'] ?> </h1>

                    <div class="row">

                        <div class="col-md-6">
                        
                            <input type="hidden" name="food_item_id" value="<?php echo $item['food_item_id'] ?>">          

                            <div class="mb-3">

                                <label for="unit" class="form-label">Unit</label>
                                <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $item['unit']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price in $</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?php echo $item['price']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="calories" class="form-label">Calories</label>
                                <input type="text" class="form-control" id="calories" name="calories" value="<?php echo $item['calories']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="protein" class="form-label">Protein in gm</label>
                                <input type="text" class="form-control" id="protein" name="protein_g" value="<?php echo $item['protein_g']; ?> ">
                            </div>

                            <div class="mb-3">
                                <label for="calcium" class="form-label">Calcium in gm</label>
                                <input type="text" class="form-control" id="calcium" name="calcium_g" value="<?php echo $item['calcium_g']; ?> ">
                            </div>

                        </div>

                        <div class="col-md-6"> 

                            <div class="mb-3">
                                <label for="vitamin_a" class="form-label">Vitamin A in iu</label>
                                <input type="text" class="form-control" id="vitamin_a" name="vitamin_a_iu" value="<?php echo $item['vitamin_a_iu']; ?> ">
                            </div>

                            <div class="mb-3">
                                <label for="vitamin_b1" class="form-label">Vitamin B1 in mg</label>
                                <input type="text" class="form-control" id="vitamin_b1" name="vitamin_b1_mg" value="<?php echo $item['vitamin_b1_mg']; ?> ">
                            </div>

                            <div class="mb-3">
                                <label for="vitamin_b2" class="form-label">Vitamin B2 in mg</label>
                                <input type="text" class="form-control" id="vitamin_b2" name="vitamin_b2_mg" value="<?php echo $item['vitamin_b2_mg']; ?> ">
                            </div>

                            <div class="mb-3">
                                <label for="niacin" class="form-label">Niacin in mg</label>
                                <input type="text" class="form-control" id="niacin" name="niacin_mg" value="<?php echo $item['niacin_mg']; ?> ">
                            </div>

                            <div class="mb-3">
                                <label for="vitamin_c" class="form-label">Vitamin C in mg</label>
                                <input type="text" class="form-control" id="vitamin_c" name="vitamin_c_mg" value="<?php echo $item['vitamin_c_mg']; ?> ">
                            </div>

                        </div>
                        
                    </div>
                </div>

            <?php } ?>
            <input type="submit" class="btn btn-dark" value="Update" />
    </form>

    
</div>


               



        
                </form>
        </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


