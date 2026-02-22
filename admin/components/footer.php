<!-- JavaScript -->
    <script>
        document.addEventListener( 'DOMContentLoaded', () =>
        {
            // Update current date and time
            function updateDateTime ()
            {
                const now = new Date();
                const date = now.toLocaleDateString( 'en-US', {
                    weekday: 'short',
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                } );
                const time = now.toLocaleTimeString( 'en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                } );

                document.getElementById( 'currentDate' ).textContent = date;
                document.getElementById( 'currentTime' ).textContent = time;
            }

            // Update every second
            updateDateTime();
            setInterval( updateDateTime, 1000 );

            // Mobile menu toggle
            document.getElementById( 'mobileMenuToggle' ).addEventListener( 'click', function ()
            {
                const sidebar = document.querySelector( '.sidebar' );
                const overlay = document.getElementById( 'overlay' );
                sidebar.classList.toggle( 'hidden' );
                sidebar.classList.toggle( 'absolute' );
                sidebar.classList.toggle( 'z-50' );
                sidebar.classList.toggle( 'h-full' );
                overlay.classList.toggle( 'translate-x-[100%]' );

                if ( window.innerWidth > 726 )
                {
                    overlay.classList.toggle( 'hidden' );
                }

            } );

            // Handle form submissions
            document.querySelectorAll( 'form' ).forEach( form =>
            {
                form.addEventListener( 'submit', function ( e )
                {
                    e.preventDefault();
                    // Show loading state
                    const submitBtn = this.querySelector( 'button[type="submit"]' );
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<div class="loading"></div>';

                    // Simulate API call
                    setTimeout( () =>
                    {
                        submitBtn.innerHTML = originalText;
                        alert( 'Changes saved successfully!' );
                    }, 1000 );
                } );
            } );

            // Handle delete actions
            document.querySelectorAll( 'button.text-red-500' ).forEach( button =>
            {
                button.addEventListener( 'click', function ()
                {
                    if ( confirm( 'Are you sure you want to delete this item?' ) )
                    {
                        // Add loading state
                        const originalHTML = this.innerHTML;
                        this.innerHTML = '<div class="loading" style="width: 16px; height: 16px;"></div>';

                        // Simulate delete
                        setTimeout( () =>
                        {
                            const row = this.closest( 'tr' ) || this.closest( '.border' );
                            if ( row )
                            {
                                row.style.opacity = '0';
                                row.style.transition = 'opacity 0.3s';
                                setTimeout( () => row.remove(), 300 );
                            }
                        }, 500 );
                    }
                } );
            } );
        } )

    </script>

    <script>
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
                        'poppins': ['Poppins', 'sans-serif'],
                        'quicksand': ['Quicksand', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</body>

</html>