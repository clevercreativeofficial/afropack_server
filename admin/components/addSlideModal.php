<form class="w-full bg-white space-y-4 py-12">
    <!-- Simple Notice Message -->
    <div class="bg-gray-100 border border-gray-300 p-4 mb-4">
        <p class="text-sm text-gray-700">
            <span class="font-semibold">Notice:</span> Provide either Image URL or Image File. URL takes
            priority if both are provided.
        </p>
    </div>

    <!-- Rest of the form remains the same -->
    <div>
        <label class="block text-sm font-medium mb-2">Image URL</label>
        <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
            placeholder="https://image-url.com">

    </div>
    <div>
        <label class="block text-sm font-medium mb-2">Image File</label>
        <input type="file" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300"
            placeholder="https://image-url.com">

    </div>

    <button type="submit"
        class="outline-none md:w-fit py-3 px-4 bg-accent text-white hover:bg-accent-dark duration-300">
        <i class="fi fi-rr-cloud-upload inline-block translate-y-0.5"></i>
        Upload Image
    </button>
</form>