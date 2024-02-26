<!-- include header from shared layout -->
<?php include('./src/layout/shared/header.php'); ?>

<!-- include nav from shared layout -->
<?php include('./src/layout/shared/nav.php'); ?>

<!-- include database connection php file -->
<?php  include("./src/connection.php"); ?>

<div class="container">

    <?php



        // connect to database
        $conn = ConnectDB();

        $query = 'SELECT food_item_id, food_item_name FROM food_items';

        // execute query on database and store the result
        $result = mysqli_query($conn, $query);

        CloseConnection($conn);

    ?>

    <div class="row">

        <div class="col-12">
            <h3>Compare two food items</h3>
        </div>

        <div class="col-12 ">

            <form action="./compare.php" method="GET" class="d-flex gap-4">

                <select  class="form-select" name="itemOne" id="itemOne">

                    <?php foreach($result as $foodItem ) { ?>

                        <option value="<?php echo $foodItem['food_item_id'] ?>">
                            <?php echo $foodItem['food_item_name'] ?> 
                        </option> 

                    <?php } ?>
                    
                </select>
                
                <h5> With </h5>

                <select class="form-select" name="itemTwo" id="itemTwo">
                    
                    <?php foreach($result as $foodItem ) { ?>

                        <option value="<?php echo $foodItem['food_item_id'] ?>">
                            <?php echo $foodItem['food_item_name'] ?> 
                        </option> 

                    <?php } ?>

                </select>

                <input type="submit" class="btn btn-dark "  value="Compare">

            </form>

        </div>

        <!-- check if request coming with comparision food id or not -->
        <?php

        // checking with isSet that iteOne and itemTwo exist in array or not
        if( isset($_GET['itemOne'])  && isset($_GET['itemTwo']) ){

            $foodItemOneID = $_GET['itemOne'];
            $foodItemTwoID = $_GET['itemTwo'];

            // connect to database
            $conn = ConnectDB();

            // get data of food item with recevied id from request
            $query = 'SELECT * FROM food_items 
                            JOIN food_item_data 
                            ON food_items.food_item_id = food_item_data.food_item_id
                            WHERE food_items.food_item_id =' . $foodItemOneID . '
                                OR food_items.food_item_id =' . $foodItemTwoID;





            // execute the query and store the result
            $result = mysqli_query($conn, $query);

            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Print the entire array
            print_r($rows);
            // for testing response from db
            // echo '<pre>';
            // echo print_r($result); 
            // echo '</pre>';
            ?> 
            
            
            <div class="table-responsive">
                    <table class="table table-striped fa-check text-successtable-border border-light">
                        <thead class="border-light">
                            <tr>
                                <th scope="col"></th>
                                <?php foreach( $result as $item) {?>

                                <th scope="col"><strong><?php echo $item['food_item_name'] ?></strong></th>
                                <?php } ?>

                            </tr>
                        </thead>
                        
                    <tbody>


                            <tr>
                                <th scope="row">Lorem Ipsum</th>
                                <td><i class="fas fa-check text-success"></i></td>
                                <td><i class="fas fa-times text-danger"></i></td>
                            </tr>
                            <tr>
                            <th scope="row">Lorem Ipsum</th>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                            <tr>
                            <th scope="row">Lorem Ipsum</th>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-times text-danger"></i></td>
                            </tr>

                    </tbody>

                    </table>
            </div>




          

        
        
<!-- end of if -->
            <?php } ?>



                        
    </div>

</div>
