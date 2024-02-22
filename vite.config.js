import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";
import { glob } from 'glob'
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                ...glob.sync('resources/js/ui/vendor/**/*.js'),
                ...glob.sync('resources/css/ui/vendor/**/*.css'),
                'resources/js/ui/main.js',
                'resources/css/ui/style.css',
            ],
            refresh: true,
        }),
        vue({
            transformAssetUrls:{
                base: null,
                includeAbsolute: false
            }
        }),
    ],
});
