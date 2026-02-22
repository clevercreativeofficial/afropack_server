<form class="w-full bg-white space-y-4 py-6">
    <h2 class="text-2xl font-bold text-accent-dark">Update Event</h2>

    <div class="grid grid-cols-1 gap-4">
        <div>
            <label class="block text-sm font-medium mb-2">Event Name</label>
            <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="Enter event name">
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">Event Description</label>
            <textarea class="outline-none w-full min-h-24 py-3 px-4 border focus:border-accent duration-300" placeholder="250 char max."></textarea>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-2">Date</label>
                <input type="date" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Location</label>
                <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="City, Country">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">More Info URL</label>
            <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="https://example.com/event-details">
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
        <small class="text-gray-500">
            <span class="font-semibold">Notice:</span> Provide either Image URL or Image File. URL
            takes
            priority if both are provided.
        </small>
    </div>
    <button type="submit"
        class="outline-none md:w-fit py-3 px-4 bg-accent text-white hover:bg-accent-dark duration-300">
        Update Event
    </button>
</form>