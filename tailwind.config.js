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
                'miniphone': { 'min': '1px', 'max': '319px' },  // Feature phones, very small screens
                'phone-sm': { 'min': '320px', 'max': '479px' }, // Small smartphones (iPhone SE, old Android)
                'phone': { 'min': '480px', 'max': '639px' }, // Regular smartphones
                'tablet-sm': { 'min': '640px', 'max': '767px' }, // Small tablets (iPad Mini, Galaxy Tab Mini)
                'tablet': { 'min': '768px', 'max': '1023px' }, // Standard tablets
                'laptop-sm': { 'min': '1024px', 'max': '1279px' }, // Small laptops (MacBook Air, basic ultrabooks)
                'laptop': { 'min': '1280px', 'max': '1535px' }, // Regular laptops
                'desktop': { 'min': '1536px', 'max': '1919px' }, // Large desktops & monitors
                'ultrawide': { 'min': '1920px' }, // Ultra-wide monitors, 4K screens
            },

        },
    },
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
