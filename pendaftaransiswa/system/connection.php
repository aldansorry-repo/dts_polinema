<?php 

class DatabaseHelper{

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "dts_pendaftaransiswa";

    var $connection;

    function __construct() {
        $this->connection = mysqli_connect($this->host,$this->username,$this->password);
        if($this->connection){
            $opendatabase = mysqli_select_db($this->connection,$this->database);
            if(!$opendatabase){
                die("unable to open Datatbase ".$this->database);
            }
        }else{
            die('unable connect to MySQL Server');
        }
    }

    public function select($table)
    {
        $sql = "select * from $table";
        $query = mysqli_query($this->connection,$sql);
        
        $data = [];
        while($row = mysqli_fetch_assoc($query)){
            array_push($data,$row);
        }

        return $data;
    }

    public function select_id($table,$id)
    {
        $sql = "select * from $table where id='$id'";
        $query = mysqli_query($this->connection,$sql);
    
        return mysqli_fetch_assoc($query);
    }

    public function insert($table,$data)
    {
        $column = "";
        $values = "";
        foreach($data as $key => $value){
            $column .= $key.",";
            $values .= "'".$value."',";
        }
        $column = substr($column,0,-1);
        $values = substr($values,0,-1);
        
        $sql = "insert into $table ($column) values ($values)";
        $query = mysqli_query($this->connection,$sql);

        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function update($table,$id,$data)
    {
        $set_sql = "";
        foreach($data as $key => $value){
            $set_sql .= "$key='".$value."',";
        }
        $set_sql = substr($set_sql,0,-1);

        
        $sql = "update $table set $set_sql where id=$id";
        
        $query = mysqli_query($this->connection,$sql);

        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function delete($table,$id)
    {
        $sql = "delete from $table where id=$id";
        $query = mysqli_query($this->connection,$sql);

        if($query){
            return true;
        }else{
            return false;
        }
    }
}

$db = new DatabaseHelper();

function base_url($string = "")
{
    return "http://localhost/dts_polinema/pendaftaransiswa/".$string;
}