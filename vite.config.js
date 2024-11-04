import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { fileURLToPath, URL } from "node:url";

import autoprefixer from "autoprefixer";
import tailwind from "tailwindcss";

export default defineConfig({
    plugins: [
        laravel({
            input: ["frontend/assets/css/app.css", "frontend/app.js"],
            refresh: true,
        }),
        vue(),
    ],
    css: {
        postcss: {
            plugins: [tailwind(), autoprefixer()],
        },
    },
    resolve: {
        alias: {
            "@": fileURLToPath(new URL("./frontend", import.meta.url)),
        },
    },
});
