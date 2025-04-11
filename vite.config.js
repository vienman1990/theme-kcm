import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import { resolve } from 'path';

export default defineConfig({
  plugins: [
    tailwindcss()
  ],
  build: {
    manifest: 'manifest.json',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: resolve( __dirname + '/assets/main.js')
      }
    }
  },
  server: {
    cors: true,
    port: 3000,
    https: false,
    hmr: {
      host: 'localhost'
    },
  }
});