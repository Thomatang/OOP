<?php
//GOAL: Object Oriented HTML Generation in PHP
class HTML {
    //declare private variable for construct function
    private $data;

    //create construct function
    public function __construct ($data = array()) {
        $this->data = $data;
    }

    public function getCSS($fileName){
        return '<link rel="stylesheet" href="'.$fileName.'.css">';

    }
    public function getMetatags($name='',$content='',$charset='', $http=''){
        return '<meta name="'.$name.'" content="'.$content.'" charset="'.$charset.'" http-equiv="'.$http.'">';
    }

    public function linkImages($altText, $imageSource){
        return '<img alt="'.$altText.'" src="'.$imageSource.'">';
    }

    // public function createAnchorLinks(){

    // }

    // public function linkJavaScriptFiles(){

    // }
}

?>