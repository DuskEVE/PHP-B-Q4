<?php
session_start();

class myDB{
    private $host = "localhost";
    private $charset = "utf8";
    private $dbname = "db15_4";
    private $user = "root";
    private $password = "";
    private $table;

    function __construct($table){
        $this->table = $table;
    }
    function dbLogin(){

    }
    function getTargetSet($target, $sep){

    }
    function search($target){

    }
    function searchAll($target=[], $option=""){

    }
    function update($target){

    }
    function delete($target){

    }
    function count($target=[]){

    }
    function sql($sql){
        
    }
}

?>