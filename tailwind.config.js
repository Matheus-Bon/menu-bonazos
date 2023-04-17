const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'admin-body': '#1d1f20',
                'admin-card': '#212324',
                'primary-color': '#2794eb',
                'secondary-color-dark': '#00C894',
                'secondary-color-light': '#00AC9A',
                'gray-gray': '#495057'
                
                
            }
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
