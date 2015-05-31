<?php

namespace com\davidmichaelross\country_reverse_geocoder;

function countries_array() {

	static $country_data;

	if ( ! isset( $country_data ) ) {

		$country_data = array();

		$fh = fopen( __DIR__ . '/polygons.properties', 'r' );
		while ( ! feof( $fh ) ) {

			$row = fgets( $fh );
			if(0 === strlen($row)) {
				continue;
			}

			$row = trim($row);
			list( $country_code, $data ) = explode( '=', $row, 2 );
			list( $polygon_type, $data ) = explode( ' ', $data, 2 );
			$data = trim( $data );
			$data = trim( $data, '(' );
			$data = trim( $data, ')' );

			if ( 'POLYGON' === strtoupper( $polygon_type ) ) {

				$country_data[] = array( $country_code, $data );

			} else if ( 'MULTIPOLYGON' === strtoupper( $polygon_type ) ) {

				$polygons = explode( ')),((', $data );
				array_walk( $polygons, function ( $polygon ) use ( $country_code, &$country_data ) {
					$country_data[] = array( $country_code, $polygon );
				} );

			}

		}

	}

	return $country_data;

}

/**
 *  The function will return YES if the point x,y is inside the polygon, or
 *  NO if it is not.  If the point is exactly on the edge of the polygon,
 *  then the function may return YES or NO.
 *
 *  Note that division by zero is avoided because the division is protected
 *  by the "if" clause which surrounds it.
 *
 * @param double $targetX
 * @param double $targetY
 * @param string $points_string
 *
 * @see http://alienryderflex.com/polygon/
 */
function pointInPolygon( $targetX, $targetY, $points_string, $country_code ) {

	$points      = explode( ',', $points_string );
	$polyCorners = count( $points );
	$polyX       = array();
	$polyY       = array();

	foreach ( $points as $point ) {

		list( $pointX, $pointY ) = explode( ' ', $point );
		$polyX[] = doubleval( $pointX );
		$polyY[] = doubleval( $pointY );

	}

	$j        = $polyCorners - 1;
	$oddNodes = false;

	for ( $i = 0; $i < $polyCorners; $i ++ ) {
		if ( ( $polyY[ $i ] < $targetY && $polyY[ $j ] >= $targetY
		       || $polyY[ $j ] < $targetY && $polyY[ $i ] >= $targetY )
		     && ( $polyX[ $i ] <= $targetX || $polyX[ $j ] <= $targetX )
		) {
			$oddNodes ^= ( $polyX[ $i ] + ( $targetY - $polyY[ $i ] ) / ( $polyY[ $j ] - $polyY[ $i ] ) * ( $polyX[ $j ] - $polyX[ $i ] ) < $targetX );
		}
		$j = $i;
	}

	return $oddNodes;
}

/**
 * Get the country code for a pair of lat/long coordinates
 *
 * @param double $targetX
 * @param double $targetY
 *
 * @return string
 */
function get_country( $targetX, $targetY ) {

	$countries = countries_array();

	foreach ( $countries as $country ) {
		list( $country_code, $country_boundary ) = $country;
		if ( pointInPolygon( $targetX, $targetY, $country_boundary, $country_code ) ) {
			return $country_code;
		}
	}

	return '';

}
