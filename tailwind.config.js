/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/isGuest.blade.php",
    "./resources/views/home.blade.php",
    "./resources/views/login.blade.php",
    "./resources/views/signin.blade.php",
    "./resources/views/admin_dashboard.blade.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        'montserrat': ["'Montserrat'", 'sans-serif'],
      },
    },
  },
  plugins: [],
}
