document.addEventListener( 'DOMContentLoaded', function ()
{
    const faqToggles = document.querySelectorAll( '.faq-toggle' );

    faqToggles.forEach( toggle =>
    {
        toggle.addEventListener( 'click', function ()
        {
            const content = this.nextElementSibling;
            const icon = this.querySelector( '.faq-icon' );

            // Close all other FAQ items
            faqToggles.forEach( otherToggle =>
            {
                if ( otherToggle !== this )
                {
                    const otherContent = otherToggle.nextElementSibling;
                    const otherIcon = otherToggle.querySelector( '.faq-icon' );
                    otherContent.style.maxHeight = '0';
                    otherIcon.style.transform = 'rotate(0deg)';
                    otherToggle.parentElement.classList.remove( 'bg-accent/5' );
                }
            } );

            // Toggle current item
            if ( content.style.maxHeight === '0px' || !content.style.maxHeight )
            {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(45deg)';
                this.parentElement.classList.add( 'bg-accent/5' );
            } else
            {
                content.style.maxHeight = '0';
                icon.style.transform = 'rotate(0deg)';
                this.parentElement.classList.remove( 'bg-accent/5' );
            }
        } );
    } );
} );