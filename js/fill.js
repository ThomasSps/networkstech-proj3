function fillPlace(e, url){
	getOutput( 'get_data.php?req=place&place=' + e.value, 0 );
}

function fillCoords(e){
	x1 = document.getElementById('x1').value;
	x2 = document.getElementById('x2').value;
	y1 = document.getElementById('y1').value;
	y2 = document.getElementById('y2').value;

	getOutput( 'get_data.php?req=coord&x1=' + x1 + '&x2=' + x2 + '&y1=' + y1 + '&y2=' + y2, 1 );
}

// handles the click event for link 1, sends the query
function getOutput( url, status ) {
  
  if( status == 0 ) {
  	getRequest(
       url, // URL for the PHP file
       drawOutputPlace,  // handle successful request
       drawError    // handle error
  ); }
  else if ( status == 1) 
  {
  	getRequest(
       url, // URL for the PHP file
       drawOutputCoord,  // handle successful request
       drawError    // handle error
  ); 
  }
  return false;
}  
// handles drawing an error message
function drawError() {
    var container = document.getElementById('output');
    container.innerHTML = 'Bummer: there was an error!';
}
// handles the response, adds the html
function drawOutputPlace(responseText) {
    var container = document.getElementById('area-weather');
    container.innerHTML = responseText;
}
// handles the response, adds the html
function drawOutputCoord(responseText) {
    var container = document.getElementById('coords-array');
    container.innerHTML = responseText;
}
// helper function for cross-browser request object
function getRequest(url, success, error) {
    var req = false;
    try{
        // most browsers
        req = new XMLHttpRequest();
    } catch (e){
        // IE
        try{
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
            // try an older version
            try{
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != 'function') success = function () {};
    if (typeof error!= 'function') error = function () {};
    req.onreadystatechange = function(){
        if(req.readyState == 4) {
            return req.status === 200 ? 
                success(req.responseText) : error(req.status);
        }
    }
    req.open("GET", url, true);
    req.send(null);
    return req;
}