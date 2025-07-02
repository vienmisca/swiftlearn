import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './resources/js/**/*.vue',
  ],
  
  safelist: [
  'bg-green-500',
  'bg-blue-500',
  'bg-cyan-500',
  'bg-pink-500',
  'bg-orange-500',
  'bg-purple-500',
  'text-white',
  'bg-gradient-to-r',
  'from-green-400', 'to-green-600',
  'from-blue-400', 'to-blue-600',
  'from-cyan-400', 'to-teal-500',
  'from-rose-500', 'to-pink-600',
  'from-orange-500', 'to-amber-600',
  'from-purple-500', 'to-indigo-600',
  'text-white',
],


  theme: {
    extend: {
      
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        dm: ['"DM Sans"', 'sans-serif'],
        poppins: ['Poppins', 'sans-serif'],
      },
      colors: {
        // contoh warna custom jika perlu
        primary: '#5C5CFF',
        secondary: '#4A4ADE',
        navy: '#00095B',
      },
       width: {
        '36': '9rem',     // 144px
        '44': '11rem',    // 176px
        '52': '13rem',    // 208px
        '60': '15rem',    // 240px
        '68': '17rem',    // 272px
        '76': '19rem',    // 304px
        '84': '21rem',    // 336px
        '92': '23rem',    // 368px
        '100': '25rem',   // 400px
        '108': '27rem'    // 432px
      },
      
    },
  },

  plugins: [forms],
}
