<?php
//Adatbázis kapcsoalt létrehozása és a CRUD műveletek
class MySqlDB {

    private $db_szerver;
    private $db_felhnev;
    private $db_jelszo;
    private $db_nev;
    private $kapcs;

    public function __construct() {
        $this->db_szerver = "localhost";
        $this->db_felhnev = "root";
        $this->db_jelszo = "";
        $this->db_nev = "telefonkonyv";
        $this->kapcsolat();
    }


    public function kapcsolat() {
        $this->kapcs = new mysqli($this->db_szerver, $this->db_felhnev, $this->db_jelszo, $this->db_nev);
        $this->kapcs->set_charset('utf8');
        if ($this->kapcs->connect_error) {
            die("Kapcsolódás nem sikerült: " . $this->kapcs->connect_error);
        }
    }

    /* CRUD műveletek */

    //function readData($tablaNeve, $where){
    function lekerdez($tablaNeve, $where=1) {
//        $this->kapcsolat();
        $sql = "SELECT * FROM " . $tablaNeve . " WHERE " . $where;
        $sql = $this->kapcs->query($sql);
//        $sql = $sql->fetch_assoc();
        return $sql;
    }

    //function updateData($tablaNeve, $updateErtekek, $where){
    function frissit($tablaNeve, $ujErtekek, $where) {
//        $this->kapcsolat();
        $sql = "UPDATE " . $tablaNeve . " SET " . $ujErtekek . " WHERE " . $where;
        $sql = $this->kapcs->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }

    //function createData($tablaNeve, $oszlopok, $ertekek){
    function ujRekord($tablaNeve, $oszlopok, $ertekek) {
//        $this->kapcsolat();
        $sql = "INSERT INTO " . $tablaNeve . " " . $oszlopok . " VALUES " . $ertekek;
      
        $sql = $this->kapcs->query($sql);
        
        if ($sql == true) {
            return $sql;
        } else {
            return false;
        }
    }

    //function deleteData($tablaNeve, $szuro){
    function torol($tablaNeve, $szuro) {
        $this->kapcsolat();
        $sql = "DELETE FROM " . $tablaNeve . " WHERE " . $szuro;
        $sql = $this->kapcs->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }

}
