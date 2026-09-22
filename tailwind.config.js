/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            'law-primary': '#1e3a8a',
            'law-accent': '#b45309',
        }
    },
  },
  plugins: [],
}
