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
                'admin-body-light': '#f4f7f6',
                'admin-card': '#212324',
                'primary-color': '#2794eb',
                'secondary-color-dark': '#00C894',
                'secondary-color-light': '#00AC9A',
                'secondary-color': {
                    100: '#3ED0A9',
                    200: '#3ED0A9',
                    300: '#00946C',
                    400: '#007A5A',
                    500: '#15473A',
                    600: '#004734'
                },
                'light-gray': '#E0E0E0',
                'gray-750': '#353535',
                'indigo-09': '#6382D8'
                   
            },
            boxShadow: {
                'shadow-input-search': ''
            }
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
