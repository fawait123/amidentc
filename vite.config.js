import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { fileURLToPath, URL } from "node:url";

import autoprefixer from "autoprefixer";
import tailwind from "tailwindcss";

export default defineConfig({
    plugins: [
        laravel({
            input: ["frontend/assets/css/app.css", "frontend/app.js", 'resources/css/app.css', 'resources/js/app.js',],
            refresh: true,
        }),
        vue(),
    ],
    optimizeDeps: {
        include: ['pdfjs-dist'],
    },
    build: {
        commonjsOptions: {
            include: [/pdfjs-dist/, /node_modules/],
        },
    },
    css: {
        postcss: {
            plugins: [tailwind(), autoprefixer()],
        },
    },
    resolve: {
        alias: {
            "@": fileURLToPath(new URL("./frontend", import.meta.url)),
            "ziggy-vue": "/vendor/tightenco/ziggy/src/js",
        },
    },
});
