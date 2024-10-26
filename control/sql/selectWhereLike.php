<?php
    /**
     * This function returns all rows of a table.
     * You need pass all columns that you want see.
     * All params receives strings...
     * 
     * @param $conn (msqli object - refers the connection)
     * @param $table (string - name of the table)
     * @param $column (string - names of the columns that you want see)
     * @param $value (string - the value)
     */
    function selectWhereLike($conn, $table, $column, $value){
        include 'checkIfValueExists.php';
        checkIfValueExists($conn, $table, $column, $value);
    
        $sql= "SELECT * FROM $table WHERE $column LIKE '%$value%'";
        $result = $conn->query($sql);

        $arrayResult = array();
    
        if($result->num_rows > 0){
            $i = 0;
            while($row = $result->fetch_assoc()){
                $arrayResult[] = $row;
            }
            return $arrayResult;
        } else {
            return "Nenhum resultado encontrado!";
        }
    }

?>