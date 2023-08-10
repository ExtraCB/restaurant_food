<?php

class database {

    public $mysqli;
    public $query;


    function __construct(){
        $this -> mysqli = new mysqli("localhost","root","","restaurant_db");
        mysqli_query($this -> mysqli,"SET NAMES utf8");
        date_default_timezone_set("Asia/Bangkok");
    }


    function select($table,$row = "*",$where = null){
        $sql = $where != null ? "SELECT $row FROM $table  $where" : "SELECT $row FROM $table";

        $this -> query = $this -> mysqli -> query($sql);
        return;
    }


    function selectgb($table,$row = "*",$gb = null){
        $sql = $gb != null ? "SELECT $row FROM $table  $gb" : "SELECT $row FROM $table";

        $this -> query = $this -> mysqli -> query($sql);
        return;
    }

    function selectjoin($table,$row="*",$join,$jointable,$on,$where){
        $sql = "SELECT $row FROM $table  $join $jointable ON $on WHERE $where ";
        $this -> query = $this -> mysqli -> query($sql);
        return;
    }

    function update($table,$par = array(),$id){
        $args = [];

        foreach($par as $key => $value){
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE $table SET ".implode(",",$args);
        $sql .= " WHERE $id";

        $this -> query = $this -> mysqli -> query($sql);
        return;
    }


    function insert ($table,$para = []){
        $key = implode(",",array_keys($para)); 
        $value = implode("','",$para); 


        $sql = "INSERT INTO $table ($key) VALUES ('$value')";

        $this -> query = $this -> mysqli -> query($sql);
        return;
    }

    function insertWhere($table,$para = [],$where){
        $key = implode(",",array_keys($para));
        $value = implode("','",$para);
        $sql = "INSERT INTO $table ($key) SELECT '$value' WHERE NOT EXISTS $where";

        $this -> query = $this -> mysqli -> query($sql);
        return;
    }

    function delete($table,$id){
        $sql = "DELETE FROM $table WHERE $id";

        $this -> query = $this -> mysqli -> query($sql);
        return;
    }

    function uploadFile($file){
        $ext = explode(".",$file['name']);
        $fileExt = strtolower(end($ext));
        $fileNew = rand().".".$fileExt;

        $filePath = './../../_system/upload/'.$fileNew;

        move_uploaded_file($file['tmp_name'],$filePath);
        return $fileNew;
    }

    function uploadFile2($file){
        $ext = explode(".",$file['name']);
        $fileExt = strtolower(end($ext));
        $fileNew = rand().".".$fileExt;

        $filePath = './../../../_system/upload/'.$fileNew;

        move_uploaded_file($file['tmp_name'],$filePath);
        return $fileNew;
    }

    function secureCheck(){
        if(!isset($_SESSION['userid'])){
            $_SESSION['alert'] = "โปรดเข้าสู่ระบบก่อนใช้งาน !";
            header('location:./../../../index.php');
            return;
        }else{
            return;
        }
    }

    function checkAdmin(){
        if($_SESSION['type'] != 'admin'){
            header('location:./../../Ex1.php');
            return;
        }else{
            return;
        }
    }

}