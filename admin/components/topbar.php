<!-- Top Bar -->
<header class="bg-white border-b border-borderColor px-6 py-4">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-accent-dark">Dashboard</h2>
            <p class="text-sm text-gray-600">Welcome back, Admin</p>
        </div>
        <div class="flex items-center space-x-4">
            <button id="mobileMenuToggle"
                class="md:hidden w-10 h-10 bg-white flex items-center justify-center z-20">
                <i class="fi fi-rr-menu-burger translate-y-0.5"></i>
            </button>
            <div class="hidden md:block">
                <div class="text-right">
                    <p class="font-medium"><span id="currentDate" class="text-accent"></span></p>
                    <p id="currentTime" class="text-sm text-gray-600"></p>
                </div>
            </div>
        </div>
    </div>
</header>