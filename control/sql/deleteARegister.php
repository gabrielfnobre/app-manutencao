<?php
    function deleteARegister($conn, $table, $columnPK, $valuePK){
        include 'checkIfValueExists.php';
        if(!checkIfValueExists($conn, $table, $columnPK, $valuePK)){
            echo "Essa chave primária não existe!";
            return false;
        }

        $sql = "DELETE FROM $table WHERE $columnPK = $valuePK";

        if($conn->query($sql)){
            echo "Registro apagado!";
            return true;
        } else {
            echo "Erro ao deletar o registro! <br> " . $conn->error;
            return false;
        }
    }
?>