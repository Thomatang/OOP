<?php
class newCLass extends parentClass {
   function print_data(){
       return $this->data;
   }
    }
    
class newForm {
    echo $form = new Form();
echo $form->create($action); // create the start of the form
echo $form->text('name',$name); // create an input of type text and as default value $name
echo $form->text('first_name',$first_name); // create an input of type text and as default value $first_name
echo $form->submit('Update'); //create a button to submit the form called Update
echo $form->end(); //Close the form
}


?>