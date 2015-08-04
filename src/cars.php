<?php
class Car {
    private $make_model;
    private $price;
    private $miles;
    private $image_path;

    function __construct($make_model, $price, $image_path, $miles = 5000)
    {
      $this->make_model = $make_model;
      $this->price = $price;
      $this->miles = $miles;
      $this->image_path = $image_path;
    }
    // setters
    function setModel ($modelName) {
      $this->make_model = $modelName;
    }
    function setPrice ($setPrice) {
      $this->price = $setPrice;
    }
    function setMiles ($setMiles) {
      $this->miles = $setMiles;
    }
    function setImage ($imagePath) {
      $this->image_path = $imagePath;
    }
    // getters
    function getModel() {
      return $this->make_model;
    }
    function getPrice() {
      return $this->price;
    }
    function getMiles() {
      return $this->miles;
    }
    function getImage () {
      return $this->image_path;
    }



}
?>
