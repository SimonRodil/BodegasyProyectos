import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/frontend.css',
                'resources/css/admin.css',
                'resources/js/frontend.js',
                'resources/js/admin.js',
                'resources/js/login.js',
                'resources/js/filtrar-propiedades.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
