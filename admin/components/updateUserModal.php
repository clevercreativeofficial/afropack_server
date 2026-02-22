<form class="w-full bg-white space-y-4 py-6">
    <h2 class="text-2xl font-bold text-accent-dark">Update User</h2>

    <div class="grid grid-cols-1 gap-4">
        <div>
            <label class="block text-sm font-medium mb-2">Full Name</label>
            <input type="text" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="Enter full name">
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">Email</label>
            <input type="email" class="outline-none w-full py-3 px-4 border focus:border-accent duration-300" placeholder="Enter Email">
        </div>
        <div>
            <label class="block text-sm font-medium mb-2">User Role</label>
            <select class="outline-none w-full py-3 px-4 bg-white border focus:border-accent duration-300">
                <option value="editor">Editor</option>
                <option value="admin">Admin</option>
            </select>
        </div>
    </div>
    <button type="submit"
        class="outline-none md:w-fit py-3 px-4 bg-accent text-white hover:bg-accent-dark duration-300">
        Update User
    </button>
</form>