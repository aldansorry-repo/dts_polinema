<?php

class DatabaseHelper
{

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "dts_ujian_soal2";

    var $connection;

    //koneksi
    function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password);
        if ($this->connection) {
            $opendatabase = mysqli_select_db($this->connection, $this->database);
            if (!$opendatabase) {
                die("unable to open Datatbase " . $this->database);
            }
        } else {
            die('unable connect to MySQL Server');
        }
    }

    //fungsi get data table
    public function select($table)
    {
        $sql = "select * from $table";
        $query = mysqli_query($this->connection, $sql);

        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }

        return $data;
    }

    //fungsi select data by id pada table
    public function select_id($table, $id)
    {
        $sql = "select * from $table where id='$id'";
        $query = mysqli_query($this->connection, $sql);

        return mysqli_fetch_assoc($query);
    }

    //fungsi search data
    public function select_search($table, $column, $word)
    {
        $where = "";
        foreach($column as $key => $value){
            $where .= "$value like '%$word%' OR ";
        }
        $where = substr($where,0,-3);
        $sql = "select * from $table where $where";
        $query = mysqli_query($this->connection, $sql);

        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }

        return $data;
    }

    //check apakah nik sudah digunakan
    public function check_unique($table, $column, $value)
    {
        $sql = "select * from $table where $column='$value'";
        $query = mysqli_query($this->connection, $sql);
        return (mysqli_num_rows($query) == 0 ? true : false);
    }

    //fungsi insert
    public function insert($table, $data)
    {
        $column = "";
        $values = "";
        foreach ($data as $key => $value) {
            $column .= $key . ",";
            $values .= "'" . $value . "',";
        }
        $column = substr($column, 0, -1);
        $values = substr($values, 0, -1);

        $sql = "insert into $table ($column) values ($values)";
        $query = mysqli_query($this->connection, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    //fungsi edit
    public function update($table, $id, $data)
    {
        $set_sql = "";
        foreach ($data as $key => $value) {
            $set_sql .= "$key='" . $value . "',";
        }
        $set_sql = substr($set_sql, 0, -1);


        $sql = "update $table set $set_sql where id=$id";

        $query = mysqli_query($this->connection, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    //fungsi delete
    public function delete($table, $id)
    {
        $sql = "delete from $table where id=$id";
        $query = mysqli_query($this->connection, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}

$db = new DatabaseHelper();
