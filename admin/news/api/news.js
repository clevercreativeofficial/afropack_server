// news-management.js
const API_BASE = 'api/';

// Form submission
document.getElementById( 'addNewsModal' )?.addEventListener( 'submit', async function ( e )
{
    e.preventDefault();

    const formData = new FormData( this );
    formData.append( 'submit', '1' );

    // Validate
    const title = formData.get( 'title' );
    const category = formData.get( 'category' );
    const imageUrl = formData.get( 'image' );
    const imageFile = formData.get( 'file' );

    if ( !title || !category )
    {
        showFormMessage( 'Title and category are required', 'error' );
        return;
    }

    if ( !imageUrl && ( !imageFile || imageFile.size === 0 ) )
    {
        showFormMessage( 'Please provide either an image URL or upload a file', 'error' );
        return;
    }

    // Show loading
    document.getElementById( 'loadingSpinner' ).classList.remove( 'hidden' );
    document.getElementById( 'submitNewsBtn' ).disabled = true;

    try
    {
        const response = await fetch( API_BASE + 'addNews.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        } );

        const responseText = await response.text();
        let data;

        try
        {
            data = JSON.parse( responseText );
        } catch ( e )
        {
            console.error( 'Invalid JSON:', responseText );
            throw new Error( 'Server returned invalid response' );
        }

        document.getElementById( 'loadingSpinner' ).classList.add( 'hidden' );
        document.getElementById( 'submitNewsBtn' ).disabled = false;

        if ( data.success )
        {
            showFormMessage( data.message, 'success' );
            this.reset();

            // Refresh news grid
            refreshNews();

            // Close modal after delay
            setTimeout( () =>
            {
                closeNewsModal();
                document.getElementById( 'formMessage' ).classList.add( 'hidden' );
            }, 2000 );
        } else
        {
            showFormMessage( data.message, 'error' );
        }
    } catch ( error )
    {
        console.error( 'Error:', error );
        document.getElementById( 'loadingSpinner' ).classList.add( 'hidden' );
        document.getElementById( 'submitNewsBtn' ).disabled = false;
        showFormMessage( 'An error occurred. Please try again.', 'error' );
    }
} );

// Show form message
function showFormMessage ( message, type )
{
    const messageContainer = document.getElementById( 'formMessage' );
    messageContainer.innerHTML = `
        <div class="p-4 ${ type === 'success' ? 'bg-green-100 text-green-700 border border-green-400' : 'bg-red-100 text-red-700 border border-red-400' }">
            <small>${ message }</small>
        </div>
    `;
    messageContainer.classList.remove( 'hidden' );

    setTimeout( () =>
    {
        messageContainer.classList.add( 'hidden' );
    }, 5000 );
}

// Refresh news grid
async function refreshNews ()
{
    const container = document.getElementById( 'newsContainer' );
    const loading = document.getElementById( 'newsLoading' );
    const empty = document.getElementById( 'newsEmpty' );

    if ( loading ) loading.classList.remove( 'hidden' );
    if ( container )
    {
        container.innerHTML = '';
        container.classList.add( 'hidden' );
    }
    if ( empty ) empty.classList.add( 'hidden' );

    try
    {
        const response = await fetch( API_BASE + 'getNews.php?limit=12', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        } );

        const data = await response.json();

        loading.classList.add( 'hidden' );

        if ( data.success && data.data.length > 0 )
        {
            renderNewsArticles( data.data );
            container.classList.remove( 'hidden' );
        } else
        {
            empty.classList.remove( 'hidden' );
        }
    } catch ( error )
    {
        console.error( 'Error refreshing news:', error );
        loading.classList.add( 'hidden' );
        container.innerHTML = `
            <div class="col-span-full text-center py-8 bg-red-50">
                <i class="fi fi-rr-exclamation text-4xl text-red-400"></i>
                <p class="mt-2 text-red-500">Failed to load news articles</p>
            </div>
        `;
        container.classList.remove( 'hidden' );
    }
}

// Render news articles
function renderNewsArticles ( articles )
{
    const container = document.getElementById( 'newsContainer' );

    articles.forEach( ( article, index ) =>
    {
        const card = createNewsCard( article );
        container.appendChild( card );
    } );
}

// Create news card
function createNewsCard(article) {
    const div = document.createElement('div');
    div.className = 'bg-white card group border border-transparent hover:border-gray-200 transition-all duration-300 relative';
    div.setAttribute('data-article-id', article.id);

    const typeIcon = article.type === 'file' ? 'fi-rr-upload' : 'fi-rr-link';
    const typeBadgeColor = article.type === 'file' ? 'bg-blue-500' : 'bg-amber-500';
    
    // Determine published status display
    const publishedStatus = article.is_published ? 'Published' : 'Unpublished';
    const statusBadgeColor = article.is_published ? 'bg-green-500' : 'bg-gray-500';

    div.innerHTML = `
        <div class="relative">
            <!-- Status Badges - Top Left -->
            <div class="absolute top-4 left-4 flex gap-2 z-10">
                <small class="px-2 py-1 ${typeBadgeColor} text-white text-xs font-medium">
                    <i class="fi ${typeIcon} mr-1"></i>
                    ${article.type === 'file' ? 'Uploaded' : 'URL'}
                </small>
                <small class="${statusBadgeColor} text-white text-xs px-2 py-1">
                    ${publishedStatus}
                </small>
            </div>

            <!-- Image -->
            <img src="${article.image_url}" 
                 alt="${article.title}" 
                 class="w-full h-60 object-cover"
                 onerror="this.src='../../assets/images/placeholder.png'">

            <!-- Action Buttons - Top Right -->
            <div class="absolute top-4 right-4 flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                <button onclick="viewArticle(${article.id})" 
                    class="w-10 h-10 flex items-center justify-center text-white bg-accent hover:bg-accent-dark transition-colors"
                    title="View">
                    <i class="fi fi-rr-eye"></i>
                </button>
                <button onclick="editArticle(${article.id})" 
                    class="w-10 h-10 flex items-center justify-center text-white bg-accent hover:bg-accent-dark transition-colors"
                    title="Edit">
                    <i class="fi fi-rr-edit"></i>
                </button>
                <button onclick="deleteArticle(${article.id})" 
                    class="w-10 h-10 flex items-center justify-center text-white bg-accent hover:bg-accent-dark transition-colors"
                    title="Delete">
                    <i class="fi fi-rr-trash"></i>
                </button>
            </div>
        </div>

        <div class="px-4 pb-4">
            <!-- Category Badge -->
            <div class="my-3">
                <span class="text-xs font-medium text-accent bg-accent-light px-2 py-1">
                    ${article.category}
                </span>
            </div>

            <!-- Views -->
            <div class="flex items-center text-xs text-gray-500 mb-3">
                <i class="fi fi-rr-eye mr-1 mt-1"></i>
                <small class="text-xs">${article.views || 0} views</small>
            </div>

            <!-- Title -->
            <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-2" title="${article.title}">
                ${article.title}
            </h3>

            <!-- Date -->
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                <i class="fi fi-rr-calendar text-accent"></i>
                <span>${article.created_at_formatted || new Date(article.created_at).toLocaleDateString()}</span>
            </div>

            <!-- Preview/Excerpt -->
            <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                ${article.excerpt || article.body || 'No description available'}
            </p>
        </div>
    `;

    return div;
}

// Modal functions
function openNewsModal ()
{
    document.getElementById( 'addNewsModal' ).classList.remove( 'hidden' );
    document.body.style.overflow = 'hidden';
}

function closeNewsModal ()
{
    document.getElementById( 'addNewsModal' ).classList.add( 'hidden' );
    document.body.style.overflow = '';
    document.getElementById( 'addNewsForm' ).reset();
    document.getElementById( 'formMessage' ).classList.add( 'hidden' );
}

// Action functions
async function viewArticle ( id )
{
    window.open( `/news/article.php?id=${ id }`, '_blank' );
}

async function editArticle ( id )
{
    // Implement edit functionality
    console.log( 'Edit article:', id );
}

async function deleteArticle ( id )
{
    if ( !confirm( 'Are you sure you want to delete this article?' ) ) return;

    try
    {
        const response = await fetch( API_BASE + 'deleteNews.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify( { id: id } )
        } );

        const data = await response.json();

        if ( data.success )
        {
            showNotification( 'Article deleted successfully', 'success' );
            refreshNews();
        } else
        {
            showNotification( data.message || 'Failed to delete article', 'error' );
        }
    } catch ( error )
    {
        console.error( 'Error:', error );
        showNotification( 'An error occurred', 'error' );
    }
}

// Initialize on load
document.addEventListener( 'DOMContentLoaded', function ()
{
    refreshNews();

    // Modal close buttons
    document.getElementById( 'closeAddNewsModal' )?.addEventListener( 'click', closeNewsModal );

    // Click outside to close
    document.getElementById( 'addNewsModal' )?.addEventListener( 'click', function ( e )
    {
        if ( e.target === this ) closeNewsModal();
    } );

    // Clear file input when URL is entered
    document.getElementById( 'newsImageUrl' )?.addEventListener( 'input', function ()
    {
        if ( this.value.trim() )
        {
            document.getElementById( 'newsImageFile' ).value = '';
        }
    } );

    document.getElementById( 'newsImageFile' )?.addEventListener( 'change', function ()
    {
        if ( this.files.length > 0 )
        {
            document.getElementById( 'newsImageUrl' ).value = '';
        }
    } );
} );