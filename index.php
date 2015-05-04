<!DOCTYPE html>
<html>
<head>
 	<meta charset="UTF-8">
	<title>DA WETHA</title>
    <script type="text/javascript" src="js/fill.js"></script>

	
</head>
<body>
    <header>
        <select name="Place" onchange="fill(this);">
        <?php

            $string = file_get_contents("corfu_weather.json");
            $json_a = json_decode($string, true);

            foreach ($json_a["list"] as $place) {
                echo "<option id=\"" . $place["id"] . "\">" . $place["name"] . "</option>";
            }

        ?>
        </select>

    </header>   
    
</body>

</html>
