import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
				'resources/sass/bootstrap.scss',
                'resources/sass/app.scss',
				'resources/js/jquery_fix.js',
                'resources/js/app.js',
				'resources/js/color_mode.js'
            ],
            refresh: true,
        })
    ],
    resolve: {
        alias: {
            '$': 'jquery',
            'jQuery': 'jquery',
        },
    }
});
