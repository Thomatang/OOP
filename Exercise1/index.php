<?php
    include'form.php';
    include'html.php';
    include'validation.php';
 $form = new Form($_POST);
 $POOHTML= new HTML ();
 $validation = new Validator();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    echo $POOHTML->getMetatags('','','UTF-8','');
    echo $POOHTML->getMetatags('viewport','width=device-width, initial-scale=1.0');
    echo $POOHTML->getMetatags('','ie=edge','','X-UA-Compatible');
    echo $POOHTML-> getCSS("style");
    ?>
    <title>Document</title>
</head>
<body>
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <?php
    echo $validation->valiData();
    //3 parameters; the first for input name, the second for input type, the third for text area
    echo $form->input('username','text','Username', $validation->userNameErr);
    
    echo $form->input('password','password','Password',$validation->passwordErr);
    echo $form->input('gender','radio','Male',$validation->genderErr);
    echo $form->input('gender','radio','Female','');
    echo $form->input('gender','radio','Unknown','');
    echo $form->input('checkbox','checkbox','I agree with the terms and conditions',$validation->checkboxErr);
    echo $form->submit();
    
    ?>
   </form>

   <?php
   echo $POOHTML-> linkImages('Traffic Surfer','Trafficsurfer.jpg');
   ?>
</body>
</html>