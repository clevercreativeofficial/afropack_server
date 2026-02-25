// refreshGallery.js or in your script tag

async function refreshGallery ()
{
    const container = document.getElementById( 'heroSlidesContainer' );
    const loading = document.getElementById( 'slidesLoading' );
    const empty = document.getElementById( 'slidesEmpty' );
    const slidesError = document.getElementById( 'slidesError' );

    // Show loading, hide others
    loading.classList.remove( 'hidden' );
    container.classList.add( 'hidden' );
    empty.classList.add( 'hidden' );
    slidesError.classList.add( 'hidden' );

    try
    {
        // Make AJAX request to fetch slides
        const response = await fetch( 'api/getHeroImages.php', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        } );

        if ( !response.ok )
        {
            throw new Error( `HTTP error! status: ${ response.status }` );
        }

        const data = await response.json();

        // Hide loading
        loading.classList.add( 'hidden' );

        // Check if we have slides
        if ( data.success && data.data && data.data.length > 0 )
        {
            // Render the slides
            renderSlides( data.data );
            container.classList.remove( 'hidden' );
        } else
        {
            // Show empty state
            empty.classList.remove( 'hidden' );
        }

    } catch ( error )
    {
        console.error( 'Error refreshing gallery:', error );

        // Hide loading, show error
        loading.classList.add( 'hidden' );
        slidesError.classList.remove( 'hidden' );
    }
}

// Function to render slides
function renderSlides ( slides )
{
    const container = document.getElementById( 'heroSlidesContainer' );

    if ( !container ) return;

    // Clear container
    container.innerHTML = '';

    // Loop through slides and create HTML
    slides.forEach( ( slide, index ) =>
    {
        const slideCard = createSlideCard( slide, index + 1 );
        container.appendChild( slideCard );
    } );
}

// Function to create individual slide card
function createSlideCard ( slide, slideNumber )
{
    const div = document.createElement( 'div' );
    div.className = 'bg-white card border border-transparent hover:border-gray-200 p-3 group';
    div.setAttribute( 'data-slide-id', slide.id );

    // Use image_url for display (works for both URLs and uploaded files)
    const imageUrl = slide.image_url || '/afropack_server/assets/images/placeholder.png';

    // Determine icon and badge color based on type
    const typeIcon = slide.type === 'file' ? 'fi-rr-upload' : 'fi-rr-link';

    div.innerHTML = `
        <!-- Image Preview -->
        <div class="relative bg-gray-100 overflow-hidden aspect-video">
            <img src="${ imageUrl }" 
                alt="Slide ${ slideNumber }"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                onerror="this.src='/afropack_server/assets/images/placeholder.png'">
            
            <!-- Order Badge -->
            <div class="absolute top-2 left-2 bg-accent text-white text-xs font-bold px-2 py-1">
                #${ slideNumber }
            </div>

            <!-- Active Badge -->
            <div class="absolute top-2 left-10 bg-green-500 text-white text-xs font-bold px-2 py-1">
                    ${ slide.is_active ? `Published` : 'Unpublished' }
            </div>
            
            <!-- Upload Date -->
            <div class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1">
                ${ new Date( slide.uploaded_at ).toLocaleDateString() }
            </div>

            <!-- Action Buttons -->
            <div class="absolute top-2 right-2 space-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <div class="flex items-center justify-end gap-2">
                    <button onclick="deleteSlide(${ slide.id })" 
                        class="w-8 h-8 flex items-center justify-center text-white bg-red-500 hover:bg-red-600 transition-colors"
                        title="Delete">
                        <i class="fi fi-rr-trash text-sm"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Image Information -->
        <div class="mt-3 space-y-2">
            <!-- Display Name (File name or Domain) -->
            <div class="flex items-center text-sm font-medium text-gray-700">
                <i class="fi ${ typeIcon } mr-2 text-gray-400"></i>
                <p class="truncate" title="${ slide.display_name }">
                    ${ slide.display_name }
                </p>
            </div>
            
            <!-- Details -->
            <div class="text-xs space-y-1">
                <!-- Full URL -->
                <div class="text-gray-500 truncate" title="${ slide.image_url }">
                    <p class="font-bold text-gray-600">URL:</p> ${ slide.image_url }
                </div>
                
                <!-- File info (only for uploaded files) -->
                ${ slide.type === 'file' ? `
                    <div class="text-gray-400">
                        <p class="font-bold text-gray-600">File:</p> ${ slide.file_name || 'N/A' }
                    </div>
                    ${ slide.file_size ? `
                        <div class="text-gray-400">
                            <p class="font-bold text-gray-600">Size:</p> ${ slide.file_size }
                        </div>
                    ` : '' }
                ` : `
                    <div class="text-gray-400">
                        <p class="font-bold text-gray-600">Source:</p> External URL
                    </div>
                `}
                
                <!-- Common info -->
                <div class="text-gray-400">
                    <p class="font-bold text-gray-600">Uploaded:</p> ${ slide.uploaded_at_formatted || new Date( slide.uploaded_at ).toLocaleString() }
                </div>
                
                <div class="text-gray-400">
                    <p class="font-bold text-gray-600">By:</p> ${ slide.uploaded_by }
                </div>
            </div>
        </div>
    `;

    return div;
}

// View function that works for both types
function viewSlide ( slideId )
{
    // Find the slide data from your collection
    fetch( `/api/getHeroImages.php` )
        .then( response => response.json() )
        .then( data =>
        {
            const slide = data.data.find( s => s.id === slideId );
            if ( slide )
            {
                // Open the image URL in a new tab
                window.open( slide.image_url, '_blank' );
            }
        } )
        .catch( error =>
        {
            console.error( 'Error finding slide:', error );
        } );
}

// View slide function
function viewSlide ( slideId )
{
    // Find the slide data
    const slide = document.querySelector( `[data-slide-id="${ slideId }"]` );
    if ( slide )
    {
        const img = slide.querySelector( 'img' );
        if ( img )
        {
            // Open image in modal or new tab
            window.open( img.src, '_blank' );
        }
    }
}

// Delete slide function
async function deleteSlide ( slideId )
{
    if ( !confirm( 'Are you sure you want to delete this slide?' ) )
    {
        return;
    }

    try
    {
        const response = await fetch( 'api/deleteImage.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify( { id: slideId } )
        } );

        const data = await response.json();

        if ( data.success )
        {
            // Show success message
            showNotification( 'Slide deleted successfully', 'success' );

            // Refresh the gallery
            refreshGallery();
        } else
        {
            showNotification( data.message || 'Failed to delete slide', 'error' );
        }
    } catch ( error )
    {
        console.error( 'Error deleting slide:', error );
        showNotification( 'An error occurred', 'error' );
    }
}

// Set active slide function
async function setActiveSlide ( slideId )
{
    try
    {
        const response = await fetch( 'api/setActiveImage.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify( { id: slideId } )
        } );

        const data = await response.json();

        if ( data.success )
        {
            showNotification( 'Active slide updated successfully', 'success' );

            // Refresh the gallery
            refreshGallery();
        } else
        {
            showNotification( data.message || 'Failed to update active slide', 'error' );
        }
    } catch ( error )
    {
        console.error( 'Error setting active slide:', error );
        showNotification( 'An error occurred', 'error' );
    }
}

// Show notification function
function showNotification ( message, type = 'info' )
{
    // Check if notification container exists, if not create it
    let notificationContainer = document.getElementById( 'notificationContainer' );
    if ( !notificationContainer )
    {
        notificationContainer = document.createElement( 'div' );
        notificationContainer.id = 'notificationContainer';
        notificationContainer.className = 'fixed top-4 right-4 z-50 space-y-2';
        document.body.appendChild( notificationContainer );
    }

    // Create notification
    const notification = document.createElement( 'div' );
    const bgColor = type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';

    notification.className = `${ bgColor } text-white px-4 py-3 rounded-lg shadow-lg flex items-center transform transition-all duration-300 translate-x-0 opacity-100`;
    notification.innerHTML = `
        <i class="fi ${ type === 'success' ? 'fi-rr-check' : type === 'error' ? 'fi-rr-exclamation' : 'fi-rr-info' } mr-2"></i>
        <span>${ message }</span>
    `;

    notificationContainer.appendChild( notification );

    // Remove after 3 seconds
    setTimeout( () =>
    {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100%)';
        setTimeout( () =>
        {
            notification.remove();
        }, 300 );
    }, 3000 );
}

// Initialize on page load
document.addEventListener( 'DOMContentLoaded', function ()
{
    refreshGallery();
} );

// Optional: Auto-refresh every 30 seconds
setInterval( refreshGallery, 30000 );