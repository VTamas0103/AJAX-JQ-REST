<?php

require_once './MySqlDB.php';
if ($_SERVER['request_method'] === 'DELETE') {
    $mySql = new MySqlDB();
    $id = $_GET['ID'];
    $mySql->torol("telefonkonyvem", "ID=" . $id);
}