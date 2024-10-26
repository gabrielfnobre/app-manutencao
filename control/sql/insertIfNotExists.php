<?php
    /**
     * This function receives...
     * @param $conn (msqli object - connection)
     * @param $table (string - name of the table)
     * @param $primaryKey (string - name of the primary key column)
     * @param $primaryValue (string - the value to input on primary key column)
     * @param $columnsAndValues (array - receives an array with columns and values, sequentially, for example: [column, value, column...])
     */
    function insertIfNotExists($conn, $table, $primaryKey, $primaryValue, ...$columnsAndValues){
        include 'checkIfValueExists.php';

        if(checkIfValueExists($conn, $table, $primaryKey, $primaryValue)){
            echo "Erro: O valor $primaryValue já existe!";
            return false;
        }
    
        $columns = $primaryKey;
        $values = '\'' . $primaryValue . '\'';
        $number = count($columnsAndValues) / 2;

        for ($i=0; $i < count($columnsAndValues); $i+=2) { 
            $columns .= ', ' . $columnsAndValues[$i];
        }
        for ($i=1; $i < count($columnsAndValues); $i+=2) { 
            $values .= ', \'' . $columnsAndValues[$i] . '\'';
        }

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        if(mysqli_query($conn, $sql)){
            echo "Valor incluso com sucesso!";
            return true;
        } else {
            echo "Erro ao inserir o valor: " . mysqli_error($conn);
            return false;
        }
    }
?>