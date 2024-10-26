<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LCB-Manutencão</title>
</head>
<body>
    <?php

        include './control/sql/db_connect.php';
        $conn = getDataBaseConnection('manutencao-db');

        include './control/sql/insertIfIsAutoincrement.php';
        include './control/sql/selectWhereLike.php';

        $conn->close();

    ?>
</body>
</html>