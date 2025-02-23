<?php
    include "db_conn.php";

    for ($i = 0; $i <= 4; $i++ ){

        $start=$i;
        $end= $i+4;

        $query= "SELECT COUNT(*) as count FROM record_s WHERE MONTH(Date)BETWEEN $start AND $end";
    }
?>
