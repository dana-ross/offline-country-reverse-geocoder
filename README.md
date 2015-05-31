# offline-country-reverse-geocoder

Essentially a PHP fork of https://raw.githubusercontent.com/bencampion/reverse-country-code

##Dataset

This library uses the world borders dataset from [thematicmapping.org](http://thematicmapping.org/downloads/world_borders.php). The data is stored in a properties file within the jar file that maps country codes to Well Known Text format polygons and multi-polygons. The dataset was converted to Well Known Text format by [GIS Stack Exchange user, elrobis](http://gis.stackexchange.com/a/17441).

##Algorithms

Determining if a point lies with in a polygon is performed using the algorithm from [PNPOLY](http://www.ecse.rpi.edu/Homepages/wrf/Research/Short_Notes/pnpoly.html). Bounding box checks are used to eliminate polygons that definitely cannot contain the the point.

##License

This library is released under a [Creative Commons Attribution-Share Alike License](http://creativecommons.org/licenses/by-sa/3.0/).
