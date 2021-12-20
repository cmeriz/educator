const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {

        screens: {
			'xxs': '20rem',
			'xs': '30rem',
			'sm': '40rem',
			'md': '48rem',
			'ml': '56rem',
			'lg': '64rem',
			'xl': '80rem',
			'2xl': '96rem',
		},

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    '50': '#f3fcf9', 
                    '100': '#e7f8f2', 
                    '200': '#c3eee0', 
                    '300': '#9fe3cd', 
                    '400': '#58cea7', 
                    '500': '#10b981', 
                    '600': '#0ea774', 
                    '700': '#0c8b61', 
                    '800': '#0a6f4d', 
                    '900': '#085b3f'
                },
                'secondary': {
                    '50': '#f5f5f5', 
                    '100': '#ebebeb', 
                    '200': '#cccccc', 
                    '300': '#aeaeae', 
                    '400': '#717171', 
                    '500': '#343434', 
                    '600': '#2f2f2f', 
                    '700': '#272727', 
                    '800': '#1f1f1f', 
                    '900': '#191919'
                },
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
