# Offline Country Reverse Geocoder

[![Latest Stable Version](https://poser.pugx.org/daveross/offline-country-reverse-geocoder/v/stable)](https://packagist.org/packages/daveross/offline-country-reverse-geocoder) [![License](https://poser.pugx.org/daveross/offline-country-reverse-geocoder/license)](https://packagist.org/packages/daveross/offline-country-reverse-geocoder) [![Build Status](https://travis-ci.org/daveross/offline-country-reverse-geocoder.svg?branch=master)](https://travis-ci.org/daveross/offline-country-reverse-geocoder)

Determine which country a latitude/longitude point falls in, returning an [ISO 3166-1](https://en.m.wikipedia.org/wiki/ISO_3166-1_alpha-2) two letter country code. All processing is done locally using a dataset of country borders without needing to connect to an API.

Uses the data file from https://github.com/bencampion/reverse-country-code

## Installing

### With Composer [![Total Downloads](https://poser.pugx.org/daveross/offline-country-reverse-geocoder/downloads)](https://packagist.org/packages/daveross/offline-country-reverse-geocoder)

```
composer require daveross/offline-country-reverse-geocoder:~1.0.0
```

or add the dependency to your composer.json file manually:

```
"require": {
	"php": ">=5.3",
	"daveross/offline-country-reverse-geocoder": "~1.0.0"
}
```

## Examples

```
echo 'Washington DC is in ' . \DaveRoss\OfflineCountryReverseGeocoder\get_country(-77.0164, 38.9047) . "\n";
echo 'Chicago is in ' . \DaveRoss\OfflineCountryReverseGeocoder\get_country(-87.6847, 41.8369) . "\n";
echo 'London is in ' . \DaveRoss\OfflineCountryReverseGeocoder\get_country( -0.12750, 51.50722 ) . "\n";
echo 'New Delhi is in ' . \DaveRoss\OfflineCountryReverseGeocoder\get_country( 77.12, 28.38 ) . "\n";
echo 'Sydney is in ' . \DaveRoss\OfflineCountryReverseGeocoder\get_country( 151.2073200, -33.8678500 ) . "\n";
```

##Dataset

This library uses the world borders dataset from [thematicmapping.org](http://thematicmapping.org/downloads/world_borders.php). The data is stored in a properties file within the jar file that maps country codes to Well Known Text format polygons and multi-polygons. The dataset was converted to Well Known Text format by [GIS Stack Exchange user, elrobis](http://gis.stackexchange.com/a/17441).

##License

All code is [MIT licensed](http://daveross.mit-license.org/)

See [why I contribute to open source software](https://davidmichaelross.com/blog/contribute-open-source-software/).

The data file src/polygons.properties is available under a [Creative Commons Attribution-Share Alike License](http://creativecommons.org/licenses/by-sa/3.0/) in accordance with the license from https://github.com/bencampion/reverse-country-code
