let defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    purge: {
      content: [
        './resources/**/*.antlers.html',
        './resources/**/*.blade.php',
        './content/**/*.md'
      ]
    },
    important: true,
    theme: {
      extend: {
          colors: {
              'sc-dark-blue': '#041B34',
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
