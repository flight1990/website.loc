/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./Modules/**/*.{js,vue}",
        'node_modules/preline/dist/*.js',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                // 'primary': {
                //     '50': '#f3fbfe',
                //     '100': '#e7f6fd',
                //     '200': '#c3e9fa',
                //     '300': '#9fdbf6',
                //     '400': '#56c0f0',
                //     '500': '#0ea5e9',
                //     '600': '#0d95d2',
                //     '700': '#0b7caf',
                //     '800': '#08638c',
                //     '900': '#075172'
                // },
                'primary': {
                    '50': '#fbf3f2',
                    '100': '#f6e7e6',
                    '200': '#e9c3c0',
                    '300': '#dc9f9a',
                    '400': '#c2564e',
                    '500': '#a80e02',
                    '600': '#970d02',
                    '700': '#7e0b02',
                    '800': '#650801',
                    '900': '#520701'
                }
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('preline/plugin'),
    ],
}
