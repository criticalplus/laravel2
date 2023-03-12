const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    
    safelist: process.env.NODE_ENV === "development" ? [
        { pattern: /.*/ } ] : [ ],

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/css/safeList.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue: {
                    '50':'#eef7fb',
                    '100':'#dcf0f9',
                    '200': '#7ccff3',
                    '300': '#75c3e5',
                    '400': '#6DB6D6',
                    '500': '#6196bf',
                    '600': '#497a8f',
                    '700': '#355868',
                    '800': '#213640',
                    '900': '#101b20',
                },
                gray: {
                    '50': '#fafafa',
                    '100': '#f5f5f5',
                    '200': '#eeeeee',
                    '300': '#e0e0e0',
                    '400': '#bdbdbd',
                    '500': '#9e9e9e',
                    '600': '#757575',
                    '700': '#616161',
                    '800': '#313131',
                    '900': '#111111',
                }
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },
    
    corePlugins: {
        aspectRatio: false,
      },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio')
    ],
    darkMode: 'class',
};
