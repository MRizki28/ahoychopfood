/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        dosisSemiBold: ['Dosis-SemiBold'],
        dosisReguler: ['Dosis-Reguler'],
        dosisBold: ['Dosis-Bold']
      }
    },
  },
  plugins: [],
}

