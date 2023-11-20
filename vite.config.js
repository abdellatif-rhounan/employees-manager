import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/scss/pages/index_view.scss',
                'resources/scss/pages/show_view.scss',
                'resources/scss/pages/edit_add_view.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
