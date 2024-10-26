<?php
    /**
     * Receives:
     * 
     * @param $conn (msqli object - the connection)
     * @param $table (string - name of the table)
     * @param $column (string - name of the column)
     * @param $value (string - the value)
     */
    function checkIfValueExists($conn, $table, $column, $value){
    
        $sql = "SELECT * FROM $table WHERE $column = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->num_rows > 0;
    }
?>