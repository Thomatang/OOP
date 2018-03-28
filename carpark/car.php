<?php

class Car {
    private static $licensePlate;
    private static $releaseDate;
    private $mileage ;
    private static $model ;
    private static $brand ;
    private $color ;
    private $weight ;
    public $availability;
    public $type;
    public $origin;
    public $fatigue;
    public $age;


    public function __construct($licensePlate,$releaseDate,$mileage,$model,$brand,$color,$weight){
        self ::$licensePlate = $licensePlate;
        self ::$releaseDate = $releaseDate;
        $this->mileage = $mileage;
        self ::$model = $model;
        self ::$brand = $brand;
        $this->color = $color;
        $this->weight = $weight;
        if(self ::$brand =='Audi'){
                $this->availability = 'reserved';
            }
            else{
                $this->availability = 'free';
            
        };
        if($this->weight>3.5){
            $this->type = 'utility';
        }
            else{
            $this->type = 'commercial';
        }
        if((preg_match('#^BE#', $licensePlate) == true)){
            $this->origin ='Belgium';
        }
        elseif((preg_match('#^FR#', $licensePlate) == true)){
            $this->origin = 'France';
        }
        else{
            $this->origin = 'Germany';
        }

        if($this->mileage<100000){
            $this->fatigue = 'low';
        }
        elseif($this->mileage>200000){
            $this->fatigue = 'high';
        }
        else{
            $this->fatigue = 'middle';
        }

        $issuanceDateYear = new DateTime($releaseDate);
        $currentYear = new DateTime(strftime("%F"));
        $difference = $issuanceDateYear->diff($currentYear);
         $this->age = floor(($difference->format('%a'))/365);

    }

    public function drive($distance){
        //add distance driven to total mileage
        $this->mileage += $distance;
        //modify fatigue according to new mileage by reapplying if statement from previous function
        if($this->mileage<100000){
            $this->fatigue = 'low';
        }
        elseif($this->mileage>200000){
            $this->fatigue = 'high';
        }
        else{
            $this->fatigue = 'middle';
        }
    }

    public function display(){
        echo '<table>';
            echo '<tr>';
                echo '<th>Brand</th>';
                echo '<th>Model</th>';
                echo '<th>License Plate</th>';
                echo '<th>Color</th>';
                echo '<th>Availability</th>';
                echo '<th>Weight</th>';
                echo '<th>Origin</th>';
                echo '<th>Release Date</th>';
                echo '<th>Mileage</th>';
                echo '<th>Fatigue</th>';
                echo '<th>Age</th>';
                echo '<th>Type</th>';
                echo '<th>Image</th>';
            echo '</tr>';
                echo '<td>'.self ::$brand.'</td>';
                echo '<td>'.self ::$model.'</td>';
                echo '<td>'.self ::$licensePlate.'</td>';
                echo '<td>'.$this->color.'</td>';
                echo '<td>'.$this->availability.'</td>';
                echo '<td>'.$this->weight.'</td>';
                echo '<td>'.$this->origin.'</td>';
                echo '<td>'.self ::$releaseDate.'</td>';
                echo '<td>'.$this->mileage.'</td>';
                echo '<td>'.$this->fatigue.'</td>';
                echo '<td>'.$this->age.'</td>';
                echo '<td>'.$this->type.'</td>';
                echo '<td><img src="car.jpg" alt="car" height="" width="100" ></td>';
            echo '<tr>';
            echo '</tr>';
        echo '</table>';
    }
}

?>