
// Single validation function that works for any form
function validateEventForm ( form )
{
    clearErrors();

    // Determine if this is the add form (has image_file field)
    const isAddForm = form.image_file !== undefined;

    const fields = {
        name: { el: form.name, label: 'Event Name', required: true },
        description: { el: form.description, label: 'Description', required: true },
        event_date: { el: form.event_date, label: 'Date', required: true },
        location: { el: form.location, label: 'Location', required: true },
        more_info: { el: form.more_info, label: 'More Info', required: true },
        image_url: { el: form.image_url, label: 'Image URL', required: false },
    };

    let valid = true;

    // Check required fields
    for ( let [ key, field ] of Object.entries( fields ) )
    {
        if ( field.el && field.required && !field.el.value.trim() )
        {
            showError( field.el, `${ field.label } is required` );
            valid = false;
        }
    }

    // Description length
    if ( form.description && form.description.value.trim().length > 250 )
    {
        showError( form.description, 'Description max 250 characters' );
        valid = false;
    }

    // Date validation
    if ( form.event_date && form.event_date.value )
    {
        const selected = new Date( form.event_date.value );
        const today = new Date();
        today.setHours( 0, 0, 0, 0 );
        if ( selected < today )
        {
            showError( form.event_date, 'Date must be today or future' );
            valid = false;
        }
    }

    // URL validation
    if ( form.more_info && form.more_info.value.trim() )
    {
        if ( !isValidURL( form.more_info.value.trim() ) )
        {
            showError( form.more_info, 'Invalid URL format' );
            valid = false;
        }
    }

    // Image validation (only for add form)
    if ( isAddForm )
    {
        const hasImageUrl = form.image_url && form.image_url.value.trim();
        const hasImageFile = form.image_file && form.image_file.files.length > 0;

        if ( !hasImageUrl && !hasImageFile )
        {
            showError( form.image_file || form.image_url, 'Please provide an image' );
            valid = false;
        }
    }

    // File type validation (for both forms)
    if ( form.image_file && form.image_file.files.length > 0 )
    {
        const file = form.image_file.files[ 0 ];
        const allowedTypes = [ 'image/jpeg', 'image/png', 'image/webp', 'image/gif' ];
        if ( !allowedTypes.includes( file.type ) )
        {
            showError( form.image_file, 'Please upload a valid image (JPG, PNG, WEBP, GIF)' );
            valid = false;
        }
    }

    return valid;
}

// Attach validation to all forms
document.addEventListener( 'DOMContentLoaded', function ()
{
    // Add form
    const addForm = document.querySelector( '#add_form' );
    if ( addForm )
    {
        addForm.addEventListener( 'submit', function ( e )
        {
            e.preventDefault();
            if ( validateEventForm( this ) )
            {
                this.submit();
            }
        } );
    }

    // Update form
    const updateForm = document.querySelector( '#edit_form' );
    if ( updateForm )
    {
        updateForm.addEventListener( 'submit', function ( e )
        {
            e.preventDefault();
            if ( validateEventForm( this ) )
            {
                this.submit();
            }
        } );
    }
} );

// Helper functions
function isValidURL ( str )
{
    try
    {
        new URL( str );
        return true;
    } catch
    {
        return false;
    }
}

function showError ( el, msg )
{
    el.classList.add( 'border-red-500' );
    const error = document.createElement( 'p' );
    error.className = 'error-msg text-red-500 text-xs mt-1';
    error.textContent = msg;
    el.insertAdjacentElement( 'afterend', error );
}

function clearErrors ()
{
    document.querySelectorAll( '.error-msg' ).forEach( e => e.remove() );
    document.querySelectorAll( '.border-red-500' ).forEach( e => e.classList.remove( 'border-red-500' ) );
}
