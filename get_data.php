<?php

function place ($location){

    $string = file_get_contents("corfu_weather.json");
    $json_a = json_decode($string, true);

    foreach ($json_a["list"] as $place) {

        if ($place['name'] == $location){


            echo '<table id="data">';

            echo '<tr id="name"> <td>' . $place['name'] . '</td></tr>';

            echo '<tr id="temprature"><td>' . $place['main']['temp'] . '</td></tr>';
            echo '<tr id="temp_min"><td>' . $place['main']['temp_min'] . '</td></tr>';
            echo '<tr id="temp_max"><td>' . $place['main']['temp_max'] . '</td></tr>';
            echo '<tr id="sea"><td>' . $place['main']['sea_level'] . '</td></tr>';
            echo '<tr id="ground"><td>' . $place['main']['grnd_level'] . '</td></tr>';
            echo '<tr id="humidity"><td>' . $place['main']['humidity'] . '</td></tr>';
            echo '<tr id="pressure"><td>' . $place['main']['pressure'] . '</td></tr>';

            echo '<tr id="w_speed"><td>' . $place['wind']['speed'] . '</td></tr>';
            echo '<tr id="w_deg"><td>' . $place['wind']['deg'] . '</td></tr>';

            foreach ($place['weather'] as $weather) {
                echo '<tr id="weather_m"><td>' . $weather['main'] . '</td></tr>';
                echo '<tr id="weather_d"><td>' . $weather['description'] . '</td></tr>';
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


            echo '<table id="data">';

            echo '<tr id="name"> <td>' . $place['name'] . '</td></tr>';

            echo '<tr id="temprature"><td>' . $place['main']['temp'] . '</td></tr>';
            echo '<tr id="temp_min"><td>' . $place['main']['temp_min'] . '</td></tr>';
            echo '<tr id="temp_max"><td>' . $place['main']['temp_max'] . '</td></tr>';
            echo '<tr id="sea"><td>' . $place['main']['sea_level'] . '</td></tr>';
            echo '<tr id="ground"><td>' . $place['main']['grnd_level'] . '</td></tr>';
            echo '<tr id="humidity"><td>' . $place['main']['humidity'] . '</td></tr>';
            echo '<tr id="pressure"><td>' . $place['main']['pressure'] . '</td></tr>';

            echo '<tr id="w_speed"><td>' . $place['wind']['speed'] . '</td></tr>';
            echo '<tr id="w_deg"><td>' . $place['wind']['deg'] . '</td></tr>';

            foreach ($place['weather'] as $weather) {
                echo '<tr id="weather_m"><td>' . $weather['main'] . '</td></tr>';
                echo '<tr id="weather_d"><td>' . $weather['description'] . '</td></tr>';
            }

            echo '</table>';
        }
    }
}


?>