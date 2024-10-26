<?php
    /**
     * You nedd to pass: 'connection', 'name table', 'name column', 'name value' and 'columns and values' that you want to update...
     * @param $conn (msqli connection)
     * @param $table (string)
     * @param $columnPK (string)
     * @param $valuePK (string)
     * @param $columnsAndValues (...string)
     */
    function updateMyValues($conn, $table, $columnPK, $valuePK, ...$columnsAndValues){
        include 'checkIfValueExists.php';
        if(!checkIfValueExists($conn, $table, $columnPK, $valuePK)){
            echo "Essa chave primária não existe!";
            return false;
        }

        $values = array();

        for($i=0; $i < count($columnsAndValues); $i++){
            if($i % 2 > 0){
                $values[] = '\'' . $columnsAndValues[$i] . '\''; 
            } else {
                $values[] = $columnsAndValues[$i]; 
            }
        }

        $preparedStringSet = '';

        for($i=0; $i < count($values); $i++){
            if($i % 2 > 0){
                $preparedStringSet .= ' = ' . $values[$i];
            } else {
                if($i != 0){
                    $preparedStringSet .= ', ' . $values[$i];
                } else {
                    $preparedStringSet .= $values[$i];
                }
            }
        }

        $sql = "UPDATE $table SET $preparedStringSet WHERE $columnPK = '$valuePK'";
    
        if(mysqli_query($conn, $sql)){
            echo "Registro atualizado com sucesso!";
            return true;
        } else {
            echo "Erro ao registrar a atualização: " . mysqli_error($conn);
            return false;
        }
    }
?>