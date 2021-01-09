const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class', // or 'media' or 'class'
    theme: {
        extend: {
        colors: {
            russiangreen: '#679267',
            guild: {
            light: '#CD0100',
            dark: '#4B0001'
            },
            tenthunder: {
            light: '#B45900',
            dark: '#4C2400'
            },
            resser: {
            light: '#2D9534',
            dark: '#103813'
            },
            arcanist: {
            light: '#0045BB',
            dark: '#011945'
            },
            outcast: {
            light: '#B3A600',
            dark: '#433E04'
            },
            neverborn: {
            light: '#9800BC',
            dark: '#390148'
            },
            bayou: {
            light: '#685A2D',
            dark: '#2b2613'
            },
            exso: {
            light: '#179890',
            }

        }
    } },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
