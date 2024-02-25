<!-- PHP file to connect to database -->
<?php 

    // function to connect database
    function ConnectDB() {

        // database host, user, password and db name
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPassword = "root";
        $dbName = "food";

        $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

        // if connection is failed display error
        if ($conn -> connect_errno) {
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
        } else {

            return $conn;
        }
    }

    // function to close the connection
    function CloseConnection( $conn){
        $conn -> close();
    }