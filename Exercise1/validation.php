<?php
    class Validator{
        //firstly, pass all variables through PHP's htmlspecialchars function.
        // define variables and set to empty values
    private $username = "";
    private $password = "";
    private $gender = "";
    private $checkbox = "";

    //error variables
    public $userNameErr ="";
    public $passwordErr = "";
    public $genderErr = "";
    public $checkboxErr = "";



   

    public function valiData(){

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;      
        }
    
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            if(empty($_POST['username'])){
                 $this->userNameErr = "Username is required";
            }
            else {
                $this->username = test_input($_POST["username"]);
            }

            if(empty($_POST['password'])){
                $this->passwordErr = "Password is required";
            }
            else {
                $this->password = test_input($_POST["password"]);
            }
            if(empty($_POST["gender"])){
                $this->genderErr = "Please Choose a gender, I know you have one";
            }
            else{
                $this->gender= test_input($_POST["gender"]);
            }
            if(empty($_POST["checkbox"])){
                $this->checkboxErr ="You must agree with the terms of service to continue using our platform.";
            }
            else{
                $this->checkbox = test_input($_POST["checkbox"]);
            }
    }


    }
      
}

    
?>