// upload.js or inline script
document.addEventListener( 'DOMContentLoaded', function ()
{
    const uploadForm = document.getElementById( 'uploadForm' );
    const submitBtn = document.getElementById( 'submitBtn' );
    const messageContainer = document.getElementById( 'messageContainer' );
    const loadingSpinner = document.getElementById( 'loadingSpinner' );
    const imageUrlInput = document.getElementById( 'imageUrl' );
    const imageFileInput = document.getElementById( 'imageFile' );


    // Prevent form from submitting normally
    uploadForm.addEventListener( 'submit', function ( e )
    {
        e.preventDefault();

        // Validate form
        if ( !validateForm() )
        {
            return;
        }

        // Submit via AJAX
        submitForm();
    } );

    // Form validation
    function validateForm ()
    {
        const url = imageUrlInput.value.trim();
        const file = imageFileInput.files[ 0 ];

        if ( !url && !file )
        {
            showMessage( 'Please provide either an image URL or upload a file.', 'error' );
            return false;
        }

        // Optional: Validate URL format if provided
        if ( url && !isValidUrl( url ) )
        {
            showMessage( 'Please enter a valid URL.', 'error' );
            return false;
        }

        // Optional: Validate file type if provided
        if ( file )
        {
            const allowedTypes = [ 'image/jpeg', 'image/png', 'image/gif', 'image/webp' ];
            if ( !allowedTypes.includes( file.type ) )
            {
                showMessage( 'Invalid file type. Allowed: JPG, PNG, GIF, WEBP', 'error' );
                return false;
            }

            // Check file size (5MB max)
            const maxSize = 5 * 1024 * 1024; // 5MB
            if ( file.size > maxSize )
            {
                showMessage( 'File is too large. Maximum size is 5MB.', 'error' );
                return false;
            }
        }

        return true;
    }

    // URL validation helper
    function isValidUrl ( string )
    {
        try
        {
            new URL( string );
            return true;
        } catch ( _ )
        {
            return false;
        }
    }

    // Submit form via AJAX
    function submitForm ()
    {
        // Show loading spinner
        loadingSpinner.classList.remove( 'hidden' );
        submitBtn.disabled = true;

        // Create FormData object
        const formData = new FormData( uploadForm );
        formData.append( 'submit', '1' ); // Add submit button value

        // Send AJAX request
        fetch( 'api/upload.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest' // Important: identifies as AJAX request
            }
        } )
            .then( response => response.json() )
            .then( data =>
            {
                // Hide loading spinner
                loadingSpinner.classList.add( 'hidden' );
                submitBtn.disabled = false;

                // Show message
                if ( data.success )
                {
                     // Call the modal close function
                    setTimeout( () =>
                    {
                        closeAddSlideModal();
                    }, 3000 ); // Wait 3 seconds so user can see success message


                    showMessage( data.message, 'success' );
                    // Reset form on success
                    uploadForm.reset();

                    // Optional: Refresh image gallery if exists
                    if ( typeof refreshGallery === 'function' )
                    {
                        refreshGallery();
                    }
                    
                } else
                {
                    showMessage( data.message, 'error' );
                }
            } )
            .catch( error =>
            {
                // Hide loading spinner
                loadingSpinner.classList.add( 'hidden' );
                submitBtn.disabled = false;

                console.error( 'Error:', error );
                showMessage( 'An error occurred. Please try again.', 'error' );
            } );
    }

    // Function to close the modal
    function closeAddSlideModal ()
    {
        const modal = document.getElementById( 'addSlideModal' );
        if ( modal )
        {
            modal.classList.add( 'hidden' );
        }
    }

    // Display message
    function showMessage ( message, type )
    {
        messageContainer.innerHTML = `
            <div class="p-4 ${ type === 'success' ? 'bg-green-100 text-green-700 border border-green-400' : 'bg-red-100 text-red-700 border border-red-400' }">
                <small>${ message }</small>
            </div>
        `;
        messageContainer.classList.remove( 'hidden' );

        // Auto-hide after 5 seconds
        setTimeout( () =>
        {
            messageContainer.classList.add( 'hidden' );
        }, 3000 );
    }

    // Optional: Clear file input when URL is entered and vice versa
    imageUrlInput.addEventListener( 'input', function ()
    {
        if ( this.value.trim() !== '' )
        {
            imageFileInput.value = ''; // Clear file input
        }
    } );

    imageFileInput.addEventListener( 'change', function ()
    {
        if ( this.files.length > 0 )
        {
            imageUrlInput.value = ''; // Clear URL input
        }
    } );
} );