<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 20-Jan-17
 * Time: 10:54
 */
class mysql
{// class begin
    // class variables
    var $conn = false; // connection to database server
    var $host = false; // database server name/ip
    var $user = false; // database server user name
    var $pass = false; // database server user password
    var $dbname = false; // one of user databases
    var $history = array(); //database lost object array
    // class methods
    // construct
    function __construct($h, $u, $p, $dbn){
        $this->host = $h; // real database server name
        $this->user = $u; // real database server user name
        $this->pass = $p; // real database server user password
        $this->dbname = $dbn; // database server user database
        $this->connect(); // connect to real database server
    }//construct
    // connection to database server
    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(mysqli_connect_error()){
            echo 'Viga andmebaasi ühendamisega<br />';
            exit;
        } // if problem with connection
    }// connect

    //query time control
    function getMicrotime(){
        list($user, $sec) = explode(" ", microtime());
        return ((float)$usec +(float)$sec));
    }
    // query to database
    function query($sql){
        $res = mysqli_query($this->conn, $sql);
        if($res === FALSE){
            echo 'Viga päringuga <b>'.$sql.'</b><br />';
            echo mysqli_error($this->conn).'<br />';
            exit;
        }
        $time = $this->getMicrotime() - $begin;
        $this ->history()= array(
            'sql'=>
            'time'=>
        )

        return $res;
    }//query
    // data query from database
    function getArray($sql){
        $res = $this->query($sql);
        $data = array();
        while ($record = mysqli_fetch_assoc($res)){
            $data[] = $record;
        }
        if(count($data) == 0){
            return false;
        }
        return $data;
    }// getArray
}// class end
?>