/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./node_modules/flowbite/**/*.js"
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        "red-primary": {
          "50": "#ff4f57",
          "100": "#ff454d",
          "200": "#ff3b43",
          "300": "#ff3139",
          "400": "#f6272f",
          "500": "#ec1d25",
          "600": "#e2131b",
          "700": "#d80911",
          "800": "#ce0007",
          "900": "#c40000"
        },
        "blue-primary": {
          "50": "#32aef2",
          "100": "#28a4e8",
          "200": "#1e9ade",
          "300": "#1490d4",
          "400": "#0a86ca",
          "500": "#007cc0",
          "600": "#0072b6",
          "700": "#0068ac",
          "800": "#005ea2",
          "900": "#005498"
        },
        "dark-bg": "#12151b",
      }
    },
    fontFamily: {
      sans: ['Optima Bold', 'Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
    },
    plugins: [
      require('flowbite/plugin')
    ],
  }
}
