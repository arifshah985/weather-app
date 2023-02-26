<?php
 
 $fullweather = '';



if(isset($_POST['submit']))
{
    if($_POST['city']=='')
    {
        echo "empty input,write a city name";
    }
    else
    {
        $city = $_POST['city'];

        $data = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=048d8d2d6ec662857cb7f392b1dcd085");

        $weather =json_decode($data,true);

        //   print_r( $weather['cod']);

          $tempInCel =intval( $weather['main']['temp'] - 273);

          $fullweather = "The weather in " .$city. " is ".$weather['weather'][0]['main']. " and temprature is " . $tempInCel."C";

    


 
 







    
    
    
       

    }
}


?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            overflow: hidden;
        }

        .margin {
            margin-top: 100px;
        }

        .head-margin {
            margin-top: 160px;
            margin-bottom: -80px;
        }
    </style>
    <title>Weather App</title>
</head>
<body>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center head-margin">What is the Weather Today??</h2>
                <form method="POST" class="mb-4 card p-2 margin" action="index.php">
                
                    <div class="input-group">
                      <input type="text" name="city" class="form-control" id="floatingInputValue" placeholder="City name,Karachi,lahore,islamabad.." >

                      <div class="input-group-append">
                       <button type="submit" name="submit" class="btn btn-success" type="button">Submit</button>
                      </div>
                    </div>


                    
                
                
                </form>
                <?php if($fullweather) : ?>

                    <div class="alert alert-success bg-success text-white"><?php echo $fullweather ; ?></div>

                    <?php endif; ?>
        </div>
    </div>
</div>
    
</body>
</html>