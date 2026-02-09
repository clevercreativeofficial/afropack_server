function toggleMobile ( btn )
{
    const list = btn.nextElementSibling;

    // Close all other accordions
    const allBtns = document.querySelectorAll( '#navItems li.lg\\:hidden button' );
    allBtns.forEach( otherBtn =>
    {
        if ( otherBtn !== btn )
        {
            const otherList = otherBtn.nextElementSibling;
            if ( !otherList.classList.contains( "hidden" ) )
            {
                otherList.classList.add( "hidden" );
            }
        }
    } );

    // Toggle the clicked one
    list.classList.toggle( "hidden" );
}