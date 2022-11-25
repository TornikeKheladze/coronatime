/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      width: {
        '2888': '28vw',
        'half': '50vh'
      },
      colors: {
        'gr': '#E6E6E7'
      }
    },
  },
  plugins: [],
}
