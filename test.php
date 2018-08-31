<!DOCTYPE html>
<html> 
<head>
   <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false" 
           type="text/javascript"></script>
</head> 
<body onunload="GUnload()">
   <div id="map" style="width: 400px; height: 300px"></div> 

   <script type="text/javascript"> 
      var map = new GMap2(document.getElementById("map"));
      map.setCenter(new GLatLng(51.49, -0.12), 8);
   </script> 
</body> 
</html>