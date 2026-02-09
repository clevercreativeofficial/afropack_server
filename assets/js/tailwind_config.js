tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        accent: "var(--accent)",
                        "accent-dark": "var(--accent-dark)",
                        "accent-light": "var(--accent-light)",
                        secondary: "var(--secondary)",
                        highlight: "var(--highlight)",
                        brown: "var(--brown)",
                        text: "var(--text-color)",
                        "text-muted": "var(--text-muted)",
                        "text-light": "var(--text-light)",
                        background: "var(--background)",
                        "bg-alt": "var(--bg-alt)",
                        surface: "var(--surface)",
                        success: "var(--success)",
                        warning: "var(--warning)",
                        error: "var(--error)",
                    },
                    boxShadow: {
                        soft: "0 4px 10px var(--shadow-color)",
                        DEFAULT: "0 2px 4px var(--shadow-color)",
                    },
                    borderColor: {
                        DEFAULT: "var(--border-color)",
                    },
                },
            }
        };