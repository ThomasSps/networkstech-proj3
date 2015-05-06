<!DOCTYPE html>
<html>
<head>
 	<meta charset="UTF-8">
	<title>Wettervorhersage</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="js/fill.js"></script>
</head>
<body>
    <div class="wrapper" style="width:100%; height :100%;">
        <div style="width:98%; height:30%; padding:1%;">
            <!-- CREATING THE DROP DOWN MENU -->
            <div id="first-left">
                <div id="dropdown-menu" class="glassbox">
                    <p>Επιλογή περιοχής</p>
                    <select name="Place" onchange="fillPlace(this);">
                        <?php
                            $string = file_get_contents("corfu_weather.json");
                            $json_a = json_decode($string, true);

                            foreach ($json_a["list"] as $place) {
                                echo "<option id=\"" . $place["id"] . "\">" . $place["name"] . "</option>";
                            }
                        ?>
                    </select> 
                </div>
            </div>
            <!-- - - - - - - - - - - - - - -->
            <div id="first-right">
                <div id="area-weather" class="glassbox">
                    <!-- TABLE CONTENTS HERE -->
                    <h2>Choose a metropolis to show weather</h2>
                </div>
            </div>
        </div> <!-- CLOSES FIRST ONE -->
        <div style="width:98%; height:30%; padding:1%;">
            <div id="coords" class="glassbox">
                <div id="coords-array">

                </div>
                <div id="coords-form">
                    <form id="coordsform" action="javascript:fillCoords();" onsubmit="document.getElementById("coordsform").submit();">
                        Longitudes - Latitudes (1)
                        <br>
                        <input type="text" name="x1" id="x1">
                        <input type="text" name="y1" id="y1">
                        <br><br>
                        Longitudes - Latitudes (2)
                        <br>
                        <input type="text" name="x2" id="x2">
                        <input type="text" name="y2" id="y2">
                        <br><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div> <!-- CLOSES SECOND ONE -->
        <div style="width:98%; height:29%; padding:1%;">
            THIS WILL BE THE 3rd
        </div> <!-- CLOSES THRID ONE -->
    </div>   
</body>
</html>
