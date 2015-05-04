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
                    <select name="Place" onchange="fill(this);">
                        <?php
                            $string = file_get_contents("corfu_weather.json");
                            $json_a = json_decode($string, true);

                            foreach ($json_a["list"] as $place) {
                                echo "<option id=\"" . $place["id"] . "\">" . $place["name"] . "</option>";
                            }
                        ?>
                    </select> 
                </div>
                <!-- - - - - - - - - - - - - - -->
            </div>
            <div id="first-right">
                <div id="area-weather" class="glassbox">
                    <!-- TABLE CONTENTS HERE -->
                </div>
            </div>
        </div> <!-- CLOSES FIRST ONE -->
        <div style="width:98%; height:30%; padding:1%;">
            THIS WILL BE THE 2nd
        </div> <!-- CLOSES SECOND ONE -->
        <div style="width:98%; height:29%; padding:1%;">
            THIS WILL BE THE 3rd
        </div> <!-- CLOSES THRID ONE -->
    </div>   
</body>
</html>
