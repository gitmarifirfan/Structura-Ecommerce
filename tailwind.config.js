import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    theme: {
        extend: {
            fontFamily: {
                Changa: ['Changa'],
                Montserrat: ['Montserrat'],
            },
            colors: {
                darkblue: '#213555',
                smoothblue: '#3E5879',
                hardcream: '#D8C4B6',
                smoothcream: '#F5EFE7',
            },
            screens: {
                'miniphone': { 'min': '1px', 'max': '399px' },
                'phone': { 'min': '0px', 'max': '639px' },
                'tablet': { 'min': '640px', 'max': '1023px' },
                'laptop': { 'min': '1024px', 'max': '1279px' },
                'desktop': { 'min': '1280px' },
            },
        },
    },
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
