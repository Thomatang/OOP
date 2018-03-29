<?php
class User{
    //Define variables
       public $id;
       public $username;
       public $email;
       public $password;
       public $connected = 0; // when connected = 0, logged out, when =1, logged in
       private $dtb;


    //construct function
        public function __construct($username,$password, $email){
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

    //add user function
        public function addUser(){
            global $database;
            $this->dtb = $database;
            $sqlRequest = "INSERT INTO users SET
            username = :username
            password = :password
            email = :email";
        //prepare sqql request
            $addUser = $database->connect->prepare($sqlRequest);
        //bind parameters
            $addUser->bindParam($username,$this->username,PDO::PARAM_STR);
            $addUser->bindParam($password,$this->password,PDO::PARAM_STR);
            $addUser->bindParam($email,$this->email,PDO::PARAM_STR);

        //execute
            $addUser->execute();
        }

    //login or change $connected to 1
        public function loginUser($inputPassword){
            if($inputPassword == $this->password){
                $this->connected = 1;
            }
        }

    //logout
        public function logoutUser(){
            $this->connected=0;
        }
    //update username
        public function updateUsername($newUsername){
            $this->username = $newUsername;
            $sqlRequestUpdateName = "UPDATE users SET
            username = :updateName
            WHERE id= :id";
            $updateUsername = $this->ddb->connect->prepare($sqlRequestUpdateName);

            $updateUsername->bindParam(':updateName,$newUsername,PDO::PARAM_STR');
            $updateUsername->bindParam(':id,$this->id, PDO::PARAM_STR');

            $sqlRequestUpdateName->execute();
        }

    //update email
        public function updateEmail($newEmail){
            $this->email = $newEmail;
            $sqlRequestUpdateEmail = "UPDATE users SET
            email = :email
            WHERE id= :id";
            $updateEmail = $this->ddb->connect->prepare($sqlRequestUpdateEmail);

            $updateUserEmail->bindParam(':email,$newEmail,PDO::PARAM_STR');
            $updateUserEmail->bindParam(':id,$this->id, PDO::PARAM_STR');

            $sqlRequestUpdateEmail->execute();
        }
    //delete user from DB
        public function deleteUser(){
            $sqlRequestDelete = "DELETE FROM users
            WHERE id= :id";
             $deleteName = $this->ddb->connect->prepare($sqlRequestDelete);
             $deleteName->bindParam(':id', $this->id, PDO::PARAM_INT);
             $deleteName->execute();
        }
}

?>