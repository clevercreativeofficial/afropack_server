<form class="w-full bg-white space-y-4 py-6">
    <h2 class="text-2xl font-bold text-accent-dark">Update Video</h2>

    <div class="grid grid-cols-1 gap-4">
        <div>
            <label class="block text-sm font-medium mb-2">Title</label>
            <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="Enter event name">
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">Description</label>
            <textarea class="outline-none w-full min-h-24 py-3 px-4 border focus:border-accent duration-300" placeholder="250 char max."></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">Youtube URL</label>
            <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="https://youtu.be/DlMAIYd7-J4">
        </div>
    </div>
    <button type="submit"
        class="outline-none md:w-fit py-3 px-4 bg-accent text-white hover:bg-accent-dark duration-300">
        Update Video
    </button>
</form>