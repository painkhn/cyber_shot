module.exports = {
  content: [
    "./src/**/*.{html,js}",
    "./*.html",
    "./pages/*.html"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')({
        charts: true,
    }),
    // ... other plugins
  ]
}