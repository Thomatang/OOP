<?php
class User{
    //Define variables
       public $id;
       public $username;
       public $email;
       public $password;
       public $connected = 0; // when connected = 0, logged out, when =1, logged in
       public $dtb;


    //construct function
        public function __construct($username,$password, $email){
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

    //add user function
        public function addUser(){
            global $dbconnect;
            $this->dtb = $dbconnect;
            $sqlRequest = "INSERT INTO users SET
            username = :username,
            password = :password,
            email = :email";
        //prepare sqql request
            $addUser = $dbconnect->connectDB->prepare($sqlRequest);
        //bind parameters
            $addUser->bindParam(':username',$this->username,PDO::PARAM_STR);
            $addUser->bindParam(':password',$this->password,PDO::PARAM_STR);
            $addUser->bindParam(':email',$this->email,PDO::PARAM_STR);

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
            username = :updatename;
            WHERE id= :id";
            $updateUsername = $this->dtb->connectDB->prepare($sqlRequestUpdateName);

            $updateUsername->bindParam(':updatename',$newUsername,PDO::PARAM_STR);
            $updateUsername->bindParam(':id',$this->id, PDO::PARAM_STR);

            $updateUsername->execute();
        }

    //update email
        public function updateEmail($newEmail, $id){
            $this->id = $id;
            $this->email = $newEmail;
            $sqlRequestUpdateEmail = "UPDATE users SET
            email = :updateEmail
            WHERE id= :id";
            $updateUserEmail = $this->dtb->connectDB->prepare($sqlRequestUpdateEmail);

            $updateUserEmail->bindParam(':updateEmail',$newEmail,PDO::PARAM_STR);
            $updateUserEmail->bindParam(':id',$this->id, PDO::PARAM_STR);

            $updateUserEmail->execute();
        }
    //delete user from DB
        public function deleteUser($id){
            $this->id = $id;
            $sqlRequestDelete = "DELETE FROM users
            WHERE id= :id";
             $deleteName = $this->dtb->connectDB->prepare($sqlRequestDelete);
             $deleteName->bindParam(':id', $this->id, PDO::PARAM_INT);
             $deleteName->execute();
        }
}

?>