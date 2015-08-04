<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cars.php";

    $app = new Silex\Application();

    $app->get("/dealership", function() {
      return "
      <!DOCTYPE html>
      <html>
      <head>
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
          <title>Get your car</title>
      </head>
      <body>
          <div class='container'>
              <h1>Car Search</h1>
              <p>Enter the desired mileage and price of your new vehicle.</p>
              <form action='/search_result'>
                  <div class='form-group'>
                    <label for='price'>Enter your desired price:</label>
                    <input id='price' name='price' class='form-control' type='number'>
                  </div>
                  <div class='form-group'>
                    <label for='miles'>Enter your desired miles:</label>
                    <input id='miles' name='miles' class='form-control' type='number'>
                  </div>
                  <button type='submit' class='btn-success'>Create</button>
              </form>
          </div>
        </body>
        </html>
        ";
    });

    $app->get("/search_result", function() {

   $batmobile = new Car("Mercedes", 200000, "images/batmobile.jpeg");
   $pinto = new Car("Ford", 500, "images/pinto.jpeg", 600);
   $flugtag = new Car("Redbull", 50, "images/flugtag.jpeg", 6);
   $daewoo = new Car("Lanos", 123456, "images/daewoo lanos.jpeg");

   $cars = array($batmobile, $pinto, $flugtag, $daewoo);

   $cars_matching_search = array();
   foreach ($cars as $car) {
     $carPrice = $car->getPrice();
     $carMiles = $car->getMiles();
     if ($carMiles < $_GET["miles"] && $carPrice < $_GET["price"]) {
       array_push($cars_matching_search, $car);
     }
   }
   $output = "";
   foreach ($cars_matching_search as $car) {
             $carModel = $car->getModel();
             $carPrice = $car->getPrice();
             $carMiles = $car->getMiles();
             $carImage = $car->getImage();


             $output =  $output . "<li>" . $carModel . "</li>
             <ul>
             <li> $" . $carPrice . "</li>
             <li>" . $carMiles . "</li>
             <li> <img src=" . $carImage . "></li>
             </ul>
             ";
           }



          if (empty($cars_matching_search)) {
            return "<li> Ain't nothin' here, yo. Try again!</li>";
          }

          return $output;



      });


    return $app;
?>
