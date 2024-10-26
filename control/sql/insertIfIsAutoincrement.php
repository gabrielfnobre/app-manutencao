<?php
    /**
     * This function receives...
     * @param $conn (msqli object - connection)
     * @param $table (string - name of the table)
     * @param $columnTest (string - name of the column used as test)
     * @param $valueTest (string - name of the value used as test)
     * @param $columnsAndValues (array - receives an array with columns and values, sequentially, for example: [column, value, column...])
     */
    function insertIfIsAutoIncrement($conn, $table, $columnTest, $valueTest, ...$columnsAndValues){
        include 'checkIfValueExists.php';
        if(checkIfValueExists($conn, $table, $columnTest, $valueTest)){
            echo "Erro: Não será possível criar um novo registro, por que o $columnTest: \"$valueTest\" já existe!";
            return false;
        }
    
        $columns = '';
        $values = '';

        for ($i=0; $i < count($columnsAndValues); $i+=2) {
            if($i != 0){
                $columns .= ', ' . $columnsAndValues[$i];
            } else {
                $columns .= $columnsAndValues[$i];
            }
        }

        for ($i=1; $i < count($columnsAndValues); $i+=2) {
            if($i != 1){
                $values .= ', \'' . $columnsAndValues[$i] . '\'';
            } else {
                $values .= '\'' . $columnsAndValues[$i] . '\'';
            }
        }

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        echo $sql;

        if(mysqli_query($conn, $sql)){
            echo "Valor incluso com sucesso!";
            return true;
        } else {
            echo "Erro ao inserir o valor: " . mysqli_error($conn);
            return false;
        }
    }
?>