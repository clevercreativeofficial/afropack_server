/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    // PHP files everywhere (excluding node_modules by default)
    "./**/*.php",
    
    // HTML files everywhere
    "./**/*.html",
    
    // JS files ONLY in specific folders, not node_modules
    "./assets/js/**/*.js",
    "./js/**/*.js",
    "!./node_modules/**",  // Explicitly exclude node_modules
  ],
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
        "muted": "var(--text-muted)",
        dimmed: "var(--dimmed)",
        background: "var(--background)",
        "bg-alt": "var(--bg-alt)",
        surface: "var(--surface)",
        success: "var(--success)",
        warning: "var(--warning)",
        error: "var(--error)",
        bgError: "var(--bg-error)",
        textError: "var(--text-error)",
        textSuccess: "var(--text-success)",
      },
      boxShadow: {
        soft: "0 4px 10px var(--shadow-color)",
        DEFAULT: "0 2px 4px var(--shadow-color)",
      },
      borderColor: {
        DEFAULT: "var(--border-color)",
      },
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif'],
        'quicksand': ['Quicksand', 'sans-serif'],
      },
      backgroundColor: {
        'main': 'var(--background)',
        'alt': 'var(--bg-alt)',
        'surface': 'var(--surface)',
      },
    },
  },
  plugins: [],
}