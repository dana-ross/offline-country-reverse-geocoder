<?php

class CountryCodeTests extends PHPUnit_Framework_TestCase {

	function test_get_country() {

		// Washington DC
		$this->assertEquals( 'US', DaveRoss\OfflineCountryReverseGeocoder\get_country( - 77.0164, 38.9047 ) );

		// Chicago
		$this->assertEquals( 'US', DaveRoss\OfflineCountryReverseGeocoder\get_country( - 87.6847, 41.8369 ) );

		// London
		$this->assertEquals( 'GB', DaveRoss\OfflineCountryReverseGeocoder\get_country( - 0.12750, 51.50722 ) );

		// New Dehli
		$this->assertEquals( 'IN', DaveRoss\OfflineCountryReverseGeocoder\get_country( 77.12, 28.38 ) );

		// Sydney
		$this->assertEquals( 'AU', DaveRoss\OfflineCountryReverseGeocoder\get_country( 151.2073200, - 33.8678500 ) );

	}

	function test_invalid_latlong() {

		$this->assertEmpty( DaveRoss\OfflineCountryReverseGeocoder\get_country( 400, 38.9047 ) );
		$this->assertEmpty( DaveRoss\OfflineCountryReverseGeocoder\get_country( - 77.0164, 400 ) );
		$this->assertEmpty( DaveRoss\OfflineCountryReverseGeocoder\get_country( - 400, 38.9047 ) );
		$this->assertEmpty( DaveRoss\OfflineCountryReverseGeocoder\get_country( - 77.0164, - 400 ) );

		$this->assertEmpty( DaveRoss\OfflineCountryReverseGeocoder\get_country( 'ABC', 'DEF' ) );
		$this->assertEmpty( DaveRoss\OfflineCountryReverseGeocoder\get_country( array(), array() ) );

	}
}