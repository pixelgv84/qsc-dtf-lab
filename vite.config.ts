import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";
import path from "path";

export default defineConfig({

    plugins: [
        react()
    ],

    root: "app",

    base: "",

    build: {

        outDir: "../assets/build",

        emptyOutDir: true,

        manifest: true,

        sourcemap: false,

        assetsDir: "assets",

        rollupOptions: {

            input: path.resolve(__dirname, "app/index.html")

        }

    },

    resolve: {

        alias: {

            "@": path.resolve(__dirname, "app/src")

        }

    }

});