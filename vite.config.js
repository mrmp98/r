import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js' , 'resources/js/404page.js' , 'resources/css/404page.css' , 'resources/css/app.css'],
            refresh: true,
        }),
    ],
});