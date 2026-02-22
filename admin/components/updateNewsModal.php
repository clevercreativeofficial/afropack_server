<form class="w-full bg-white space-y-4 py-12">
    <h2 class="text-2xl font-bold text-accent-dark">Update News Article</h2>
    <div>
        <label class="block text-sm font-medium mb-2">Title</label>
        <input type="text"
            class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
            placeholder="Title goes here">

    </div>
    <div>
        <label class="block text-sm font-medium mb-2">Category</label>
        <select class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
            placeholder="Title goes here">
            <option>Category One</option>
            <option>Category Two</option>
            <option>Category Three</option>
            <option>Category Four</option>
            <option>Category Five</option>
        </select>

    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-2">Image URL</label>
            <input type="text"
                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                placeholder="https://image-url.com">

        </div>
        <div>
            <label class="block text-sm font-medium mb-2">Image File</label>
            <input type="file"
                class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
                placeholder="https://image-url.com">

        </div>
    </div>
    <small class="text-gray-500 block">
        <span class="font-semibold">Notice:</span> Provide either Image URL or Image File. URL
        takes
        priority if both are provided.
    </small>
    <button type="submit"
        class="block outline-none md:w-fit py-3 px-4 bg-accent text-white hover:bg-accent-dark duration-300">
        Update News
    </button>
</form>