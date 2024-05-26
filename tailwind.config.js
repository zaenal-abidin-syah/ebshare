/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/*.php",
    "./app/Views/dashboard/*.php",
    "./app/Views/layouts/*.php",
  ],
  theme: {
    fontFamily: {
      sans: ["Open Sans"],
      serif: [
        'SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace',
        "serif",
      ],
      body: ["Roboto", "sans-serif"],
    },
  },
  plugins: [],
};
