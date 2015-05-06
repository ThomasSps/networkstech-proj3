<?php

//Handler of requests
if( $_GET['req'] == 'place' )
    place($_GET['place']);
elseif( $_GET['req'] == 'coord' )
    coord( $_GET['x1'],  $_GET['y1'],  $_GET['x2'],  $_GET['y2']);
elseif( !isset($_GET['']) )
    echo "ERROR: no args";


function place ($location){

    $string = file_get_contents("corfu_weather.json");
    $json_a = json_decode($string, true);

    foreach ($json_a["list"] as $place) {

        if ($place['name'] == $location){


            echo '<table id="data">';

            echo '<tr id="name"><th style="text-align: left;">Place</th><th style="text-align: left;">' . $place['name'] . '</th></tr>';

            echo '<tr id="temprature"><td>Temprature</td><td>' . $place['main']['temp'] . '</td></tr>';
            echo '<tr id="temp_min"><td>Minimum Temprature</td><td>' . $place['main']['temp_min'] . '</td></tr>';
            echo '<tr id="temp_max"><td>Maximum Temprature</td><td>' . $place['main']['temp_max'] . '</td></tr>';
            echo '<tr id="sea"><td>Sea Level</td><td>' . $place['main']['sea_level'] . '</td></tr>';
            echo '<tr id="ground"><td>Ground Level</td><td>' . $place['main']['grnd_level'] . '</td></tr>';
            echo '<tr id="humidity"><td>Humidity</td><td>' . $place['main']['humidity'] . '</td></tr>';
            echo '<tr id="pressure"><td>Pressure</td><td>' . $place['main']['pressure'] . '</td></tr>';

            echo '<tr id="w_speed"><td>Wind Speed</td><td>' . $place['wind']['speed'] . '</td></tr>';
            echo '<tr id="w_deg"><td>Wind Degree</td><td>' . $place['wind']['deg'] . '</td></tr>';

            foreach ($place['weather'] as $weather) {
                echo '<tr id="weather_d"><td colspan="2" style="text-align:center;"">' . $weather['description'] . '</td></tr>';
            }

            echo '</table>';
        }
    }
}

// TODO: Implement the coord transform and get the in between coords locations
function coord ($lon1, $lat1, $lon2, $lat2){
    
    if ($lon1 > $lon2 ){
        
        $max_lon = $lon1;
        $min_lon = $lon2;
        
    }
    else{
        
        $max_lon = $lon2;
        $min_lon = $lon1;
        
    }
    
    if ($lat1 > $lat2 ){
        
        $max_lat = $lat1;
        $min_lat = $lat2;
        
    }
    else{
        
        $max_lat = $lat2;
        $min_lat = $lat1;
        
    }
    

    $string = file_get_contents("corfu_weather.json");
    $json_a = json_decode($string, true);

    foreach ($json_a["list"] as $place) {

        if (($place['coord']['lon'] <= $max_lon) && ($place['coord']['lon'] >= $min_lon) && ($place['coord']['lat'] <= $max_lat) && ($place['coord']['lat'] >= $min_lat)){


            echo '<table id="data" style="text-align: left;">';

            echo '<tr id="name"><th style="text-align: left;">Place</th><th style="text-align: left;">' . $place['name'] . '</th></tr>';

            echo '<tr id="temprature"><td>Temprature</td><td>' . $place['main']['temp'] . '</td></tr>';
            echo '<tr id="temp_min"><td>Minimum Temprature</td><td>' . $place['main']['temp_min'] . '</td></tr>';
            echo '<tr id="temp_max"><td>Maximum Temprature</td><td>' . $place['main']['temp_max'] . '</td></tr>';
            echo '<tr id="sea"><td>Sea Level</td><td>' . $place['main']['sea_level'] . '</td></tr>';
            echo '<tr id="ground"><td>Ground Level</td><td>' . $place['main']['grnd_level'] . '</td></tr>';
            echo '<tr id="humidity"><td>Humidity</td><td>' . $place['main']['humidity'] . '</td></tr>';
            echo '<tr id="pressure"><td>Pressure</td><td>' . $place['main']['pressure'] . '</td></tr>';

            echo '<tr id="w_speed"><td>Wind Speed</td><td>' . $place['wind']['speed'] . '</td></tr>';
            echo '<tr id="w_deg"><td>Wind Degree</td><td>' . $place['wind']['deg'] . '</td></tr>';

            foreach ($place['weather'] as $weather) {
                echo '<tr id="weather_d"><td colspan="2" style="text-align:center;"">' . $weather['description'] . '</td></tr>';
            }

            echo '</table>';
            echo '<br>';
        }
    }
}


?>