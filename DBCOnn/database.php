<?php

class Database{
    public $connectDB;
    public function __construct($host,$db, $username,$password){
        $this->connectDB = new PDO('mysql:host='.$host.';dbname='.$db,$username,$password. '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }
}

?>