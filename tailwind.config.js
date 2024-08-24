/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './App/Views/**/*.{html,php,js}',
    './Assets/Style/**/*.css'
  ],
  theme: {
    extend: {
      colors: {
        'gdt': '#00904B',
      },
    },
  },
  plugins: [],
}

