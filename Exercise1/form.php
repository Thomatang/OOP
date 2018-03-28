<?php
class Form {
    //declare private variable for construct function
    private $data;
    public $surround = 'p';

    //create construct function
    public function __construct ($data = array()) {
        $this->data = $data;
}
    private function surround($html){
        //what we want: return "<tag>$html</tag>"
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    private function getValue($index){
        return isset($this->data[$index])? $this->data[$index]: null;
    }

    public function input($name, $type, $text = '',$error){
        //if input type is radio button, display text after
       if($type=='radio'){
            $message = $this->surround('<input type="'.$type.'" name="'.$name.'" value= "'.$name.'">'.$text);
               
       }
       elseif($type=='checkbox'){
           $message = $this->surround('<input type="'.$type.'" name="'.$name.'" value= "'.$name.'">'.$text);
       }
       // all other button types, display text before
       else{
           $message = $this->surround($text.' : <input type="'.$type.'" name="'.$name.'" >');
       }
       if(!empty($error)){
            echo '<strong>'.$error.'</strong>';
       }
       return $message;
    }

    public function submit(){
        return $this->surround('<button type="submit">Send</button>','p');
    }

}


?>