<?php
    /**
     * Receives with param the name of the data base...
     * @param $db_name (string - name of data base)
     */
    function getDataBaseConnection($db_name){

        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = $db_name;

        $conn = new mysqli($host, $user, $password, $dbname);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;

    }

?>