import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),

        viteStaticCopy({
            targets: [
                {
                    src: 'resources/assets/admin/css',
                    dest: 'admin'
                },
                {
                    src: 'resources/assets/admin/data',
                    dest: 'admin'
                },
                {
                    src: 'resources/assets/admin/fonts',
                    dest: 'admin'
                },
                {
                    src: 'resources/assets/admin/images',
                    dest: 'admin'
                },
                {
                    src: 'resources/assets/admin/js',
                    dest: 'admin'
                },
            ]
        })
    ]
});
