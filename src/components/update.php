<?php 

    // to connect to database
    include("../connection.php");
        
    // check if request is coming from right source or not
    if( isset($_POST['isFromEditForm']) ){

    // get connection object 
    $conn = ConnectDB();

    // get data from request
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $calories = $_POST['calories'];
    $protein_g = $_POST['protein_g'];
    $calcium_g = $_POST['calcium_g'];
    $vitamin_a_iu = $_POST['vitamin_a_iu'];
    $vitamin_b1_mg = $_POST['vitamin_b1_mg'];
    $vitamin_b2_mg = $_POST['vitamin_b2_mg'];
    $niacin_mg = $_POST['niacin_mg'];
    $vitamin_c_mg = $_POST['vitamin_c_mg'];
    $food_item_id = $_POST['food_item_id'];


    // query
    $query = "UPDATE `food_item_data` SET 
                        `unit` = '$unit',
                        `price` = '$price',
                        `calories` = '$calories',
                        `protein_g` = '$protein_g',
                        `calcium_g` = '$calcium_g',
                        `vitamin_a_iu` = '$vitamin_a_iu',
                        `vitamin_b1_mg` = '$vitamin_b1_mg',
                        `vitamin_b2_mg` = '$vitamin_b2_mg',
                        `niacin_mg` = '$niacin_mg',
                        `vitamin_c_mg` = '$vitamin_c_mg' 
                WHERE `food_item_id` = '$food_item_id'";


    // execute query and get the result
    $result = mysqli_query( $conn, $query);

    if($result) {

        // if update is successsful redirect to detail page
        $detailPage = '/../http-5225-assignment1/details.php?food_item_id='. $food_item_id;
        header('Location: '.$detailPage);
        // echo "Update successful.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    

} else {

echo "Invalid request";

}

