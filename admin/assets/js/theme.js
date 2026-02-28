tailwind.config = {
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                accent: "var(--accent)",
                'accent-dark': "var(--accent-dark)",
                'accent-light': "var(--accent-light)",
                secondary: "var(--secondary)",
                highlight: "var(--highlight)",
                brown: '#92400e',
                text: '#1f2937',
                'text-muted': "var(--text-muted)",
                'text-light': "var(--text-light)",
                background: "var(--background)",
                'bg-alt': "var(--bg-alt)",
                surface: "var(--surface)",
                success: "var(--success)",
                warning: "var(--warning)",
                error: "var(--error)",
                bgError: "var(--bgError)",
                textError: "var(--textError)",
                textSuccess: "var(--textSuccess)",
            },
            fontFamily: {
                'poppins': [ 'Poppins', 'sans-serif' ],
                'quicksand': [ 'Quicksand', 'sans-serif' ],
            },
        }
    }
}