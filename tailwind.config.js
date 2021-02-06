let defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    purge: {
        content: [
            './app/**/*.php',
            './app/**/**/*.php',
            './resources/**/*.antlers.html',
            './resources/**/*/*.antlers.html',
            './content/**/*.md'
        ]
    },
    important: true,
    theme: {
        extend: {
            colors: {
                'sc-dark-blue': '#041B34',
                'sc-dark-light': '#00CDE0',
            },
            fontFamily: {
                'sc': ['Exo', ...defaultTheme.fontFamily.sans]
            }
        },
    },
    variants: {},
    plugins: [
        require('@tailwindcss/typography'),
    ],
}
