<?php
    /**
     * This function returns all rows of a table.
     * You need pass all columns that you want see.
     * All params receives strings...
     * 
     * @param $conn (msqli object - refers the connection)
     * @param $table (string - name of the table)
     * @param $keys (array of strings - names of the columns that you want see)
     */
    function selectAllFrom($conn, $table, ...$keys){
    
        $arrayOfKeys = $keys;
        $tupleOfTime = array();
        $allTable = array();
    
        $sqlCommand = "SELECT * FROM $table";
        $resultCommand = $conn->query($sqlCommand);
    
    
        if($resultCommand->num_rows > 0){
            $i = 0;
            while($row = $resultCommand->fetch_assoc()){
                foreach($arrayOfKeys as $keyOfArray){
                    $tupleOfTime[$keyOfArray] = $row[$keyOfArray];
                }
                $allTable[$i] = $tupleOfTime;
                $i++;
            }
            return $allTable;
        } else {
            return "Nenhum resultado encontrado!";
        }
    }

?>