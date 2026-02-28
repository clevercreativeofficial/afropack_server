function openModal ( id, fetchUrl = null )
{
    modal = document.getElementById( id );
    if ( !fetchUrl )
    {
        modal.classList.remove( 'hidden' ); // plain open, no fetch
        return;
    }

    fetch( fetchUrl )
        .then( res => res.json() )
        .then( data =>
        {
            populateModal( modal, data );
            modal.classList.remove( 'hidden' ); // opens AFTER data ready
        } );
    modal.classList.remove( 'hidden' );
}

function closeModal ( id )
{
    document.getElementById( id ).classList.add( 'hidden' );
}

// Auto-bind all close buttons
document.querySelectorAll( '[id^="close"]' ).forEach( btn =>
{
    btn.addEventListener( 'click', () =>
    {
        const modalId = btn.id.replace( 'close', '' );
        closeModal( modalId );
    } );
} );

function populateModal ( modal, data )
{
    Object.entries( data ).forEach( ( [ key, value ] ) =>
    {
        modal.querySelectorAll( `[data-bind="${ key }"]` ).forEach( el =>
        {
            if ( el.type === 'checkbox' )
            {
                el.checked = value == 1;
            } else if ( el.tagName === 'TEXTAREA' )
            {
                el.textContent = value ?? '';
            } else if ( el.tagName === 'INPUT' || el.tagName === 'SELECT' )
            {
                el.value = value ?? '';
            } else
            {
                el.textContent = value ?? '';
            }
        } );
    } );

    // Handle image preview
    const preview = modal.querySelector( '#edit_image_preview' );
    const noImage = modal.querySelector( '#edit_no_image' );

    if ( preview )
    {
        const src = data.image_url?.trim()
            ? data.image_url
            : data.image_path?.trim()
                ? `${ BASE_URL }uploads/events/${ data.image_path }`
                : '';

        if ( src )
        {
            preview.src = src;
            preview.classList.remove( 'hidden' );
            if ( noImage ) noImage.classList.add( 'hidden' );
        } else
        {
            preview.classList.add( 'hidden' );
            if ( noImage ) noImage.classList.remove( 'hidden' );
        }
    }
}
