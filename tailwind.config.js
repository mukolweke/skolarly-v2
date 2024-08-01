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
                primary: "#333646",
                "primary-lighter": "#424657",
                "primary-darker": "#252734",
                secondary: "#FFAF29",
                "secondary-lighter": "#FFC25C",
            },
        },
        fontFamily: {
            karla: ["Karla", "Montserrat", "Helvetica", "Arial", "sans-serif"],
        },
    },
    plugins: [],
};
