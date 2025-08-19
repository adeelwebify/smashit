// webpack.mix.js

let mix = require('laravel-mix');

mix
	.js('assets/source/js/script.js', 'assets/build/js/smashit-frontend.js')
	.sass(
		'assets/source/css/style.scss',
		'assets/build/css/smashit-frontend.css'
	);
