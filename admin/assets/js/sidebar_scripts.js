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

} )