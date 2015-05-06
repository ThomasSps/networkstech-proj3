function toxml () {
    
    
    var j2x = new X2JS ();
    
    var myItems;

    $.getJSON('/test/corfu_weather.json', function(data) {
        
        var j = j2x.json2xml_str(data);
        document.getElementById('xml').value = data;
    });
    
}