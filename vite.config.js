import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [
    tailwindcss()
  ],
  server: {
    cors: true,
    port: 3000,
    https: false,
    hmr: {
      host: 'localhost'
    },
  }
});