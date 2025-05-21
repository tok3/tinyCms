
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/filament/admin/theme.css',
                'resources/css/filament/dashboard/theme.css',
                'resources/js/app.js',
                'resources/scss/theme.scss',
                'resources/scss/theme-serif.scss',
                'resources/scss/tinyMCEtheme.scss',
            ],
            refresh:  true,
        }),
    ],
});


