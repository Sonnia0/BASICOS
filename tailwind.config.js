/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./presentacion/paginas/**/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),],
}