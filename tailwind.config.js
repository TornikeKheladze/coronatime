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
                343: "343px",
            },
            height: {
                600: "600px",
            },
            colors: {
                gr: "#E6E6E7",
            },
        },
    },
    plugins: [],
};
