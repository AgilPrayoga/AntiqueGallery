/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/isGuest.blade.php",
    "./resources/views/isLogin.blade.php",
    "./resources/views/home.blade.php",
    "./resources/views/login.blade.php",
    "./resources/views/signup.blade.php",
    "./resources/views/admin_dashboard.blade.php",
    "./resources/views/showcase.blade.php",
    "./resources/views/detail.blade.php",
    "./resources/views/userProfile.blade.php",
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
