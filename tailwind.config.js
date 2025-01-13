import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // './resources/**/*.blade.php',
        // './storage/framework/views/*.php',
        // './resources/**/*.{js,jsx,ts,tsx,vue}',
        // '!./node_modules/**',
        './resources/views/**/*.blade.php', // Blades no diretório views
        './resources/js/**/*.vue',         // Apenas arquivos Vue necessários
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
