<form id="addNewsModal" class="w-full bg-white space-y-4 py-12">
    <h2 class="text-2xl font-bold text-accent-dark">Add News Article</h2>
    
    <div id="formMessage" class="hidden"></div>

    <div>
        <label class="block text-sm font-medium mb-2">Title</label>
        <input type="text" name="title"
            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
            placeholder="Title goes here">
    </div>

    <div>
        <label class="block text-sm font-medium mb-2">Category</label>
        <select name="category" id="newsCategory" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
            placeholder="Title goes here">
            <option>Category One</option>
            <option>Category Two</option>
            <option>Category Three</option>
            <option>Category Four</option>
            <option>Category Five</option>
        </select>

    </div>
    <div class="grid grid-cols-1 gap-4">
        <div>
            <label class="block text-sm font-medium mb-2">Image URL</label>
            <input type="text" name="image" id="newsImageUrl"
                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                placeholder="https://image-url.com">

        </div>
        <div>
            <label class="block text-sm font-medium mb-2">Image File</label>
            <input type="file" name="file" id="newsImageFile"
                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                placeholder="https://image-url.com" accept="image/*">

        </div>
    </div>
    <small class="text-gray-500 block">
        <span class="font-semibold">Notice:</span> Provide either Image URL or Image File. URL
        takes
        priority if both are provided.
    </small>
    <button type="submit" name="submit" id="submitNewsBtn"
        class="block outline-none md:w-fit py-3 px-4 bg-accent text-white hover:bg-accent-dark duration-300">
        Add News
    </button>
</form>

<!-- Loading Spinner -->
<div id="loadingSpinner" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-5 flex items-center">
        <svg class="animate-spin h-8 w-8 text-accent mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span>Adding news article...</span>
    </div>
</div>