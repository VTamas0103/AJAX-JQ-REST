<?php
require_once 'MySqlDB.php';

parse_str(file_get_contents('php://input'), $adatom);

$mySql = new MySqlDB();
$id = $adatom["ID"];
$nev = $adatom["nev"];
$tel = $adatom["tel"];
$kep = $adatom["kep"];

$updateString = "id='" . $id . "', nev='" . $nev . "', tel='" . $tel . "',kep='" . $kep . "'";
$mySql->frissit("telefonkonyvem",$updateString,"ID=".$id);