import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react'; // ✅ ADD THIS

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.jsx', // ✅ use .jsx
      ],
      refresh: true,
    }),
    react(), // ✅ ADD THIS
  ],
});
