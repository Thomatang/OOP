<?php

class Database{
    public function __construct($host,$db, $username,$password){
        $connectDB = new PDO('mysql:host='.$host.';dbname='.$db,$username,$password);
    }
}

?>