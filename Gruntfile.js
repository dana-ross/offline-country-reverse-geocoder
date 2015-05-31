module.exports = function(grunt) {

	grunt.initConfig({
		phpunit: {
			classes: {
				dir: 'tests/'
			},
			options: {
				bin: 'vendor/bin/phpunit',
				bootstrap: 'offline-country-reverse-geocoder.php',
				colors: true
			}
		},
		watch: {
			files: ['offline-country-reverse-geocoder.php', 'polygons.properties'],
			tasks: ['phpunit']
		}
	});

	grunt.loadNpmTasks('grunt-phpunit');

	grunt.registerTask('test', ['phpunit']);
	grunt.registerTask('default', ['phpunit']);

};