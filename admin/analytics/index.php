<?php
require_once __DIR__ . '/../path.php';
require_once ROOT_PATH . '/components/header.php';
?>

<!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">
    <?php
    require_once ROOT_PATH . '/components/topbar.php';
    ?>

    <!-- Content -->
    <main class="flex-1 overflow-y-auto py-6 px-3">
        <!-- Analytics Dashboard -->
        <div id="analytics" class="dashboard-section max-w-7xl mx-auto">
            <!-- Header with Date Range -->
            <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
                <h3 class="text-2xl font-bold text-accent-dark">Analytics Overview</h3>
                <div class="flex gap-2">
                    <button class="btn-secondary border border-accent text-accent px-4 py-2 text-sm flex items-center gap-2">
                        <i class="fi fi-rr-calendar"></i>
                        <span>Last 30 Days</span>
                        <i class="fi fi-rr-angle-small-down"></i>
                    </button>
                    <button class="btn-primary bg-accent text-white px-4 py-2 text-sm flex items-center gap-2">
                        <i class="fi fi-rr-download"></i>
                        <span>Export Report</span>
                    </button>
                </div>
            </div>

            <!-- Key Metrics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Views Card -->
                <div class="bg-white card p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Total Views</span>
                        <span class="w-10 h-10 bg-accent-light flex items-center justify-center">
                            <i class="fi fi-rr-eye text-accent"></i>
                        </span>
                    </div>
                    <div class="flex items-end justify-between">
                        <h4 class="text-3xl font-bold text-gray-900">124.8K</h4>
                        <span class="text-green-600 text-sm flex items-center gap-1">
                            <i class="fi fi-rr-arrow-up"></i>
                            12.5%
                        </span>
                    </div>
                    <p class="text-gray-400 text-xs mt-2">vs previous period</p>
                </div>

                <!-- Unique Visitors Card -->
                <div class="bg-white card p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Unique Visitors</span>
                        <span class="w-10 h-10 bg-accent-light flex items-center justify-center">
                            <i class="fi fi-rr-users text-accent"></i>
                        </span>
                    </div>
                    <div class="flex items-end justify-between">
                        <h4 class="text-3xl font-bold text-gray-900">45.2K</h4>
                        <span class="text-green-600 text-sm flex items-center gap-1">
                            <i class="fi fi-rr-arrow-up"></i>
                            8.2%
                        </span>
                    </div>
                    <p class="text-gray-400 text-xs mt-2">vs previous period</p>
                </div>

                <!-- Avg. Session Duration Card -->
                <div class="bg-white card p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Avg. Session</span>
                        <span class="w-10 h-10 bg-accent-light flex items-center justify-center">
                            <i class="fi fi-rr-clock text-accent"></i>
                        </span>
                    </div>
                    <div class="flex items-end justify-between">
                        <h4 class="text-3xl font-bold text-gray-900">3:42</h4>
                        <span class="text-red-600 text-sm flex items-center gap-1">
                            <i class="fi fi-rr-arrow-down"></i>
                            2.1%
                        </span>
                    </div>
                    <p class="text-gray-400 text-xs mt-2">vs previous period</p>
                </div>

                <!-- Bounce Rate Card -->
                <div class="bg-white card p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Bounce Rate</span>
                        <span class="w-10 h-10 bg-accent-light flex items-center justify-center">
                            <i class="fi fi-rr-arrow-right text-accent"></i>
                        </span>
                    </div>
                    <div class="flex items-end justify-between">
                        <h4 class="text-3xl font-bold text-gray-900">42.3%</h4>
                        <span class="text-green-600 text-sm flex items-center gap-1">
                            <i class="fi fi-rr-arrow-down"></i>
                            3.5%
                        </span>
                    </div>
                    <p class="text-gray-400 text-xs mt-2">vs previous period</p>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <!-- Traffic Overview Chart (spans 2 columns) -->
                <div class="lg:col-span-2 bg-white card p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="font-bold text-gray-900">Traffic Overview</h4>
                        <div class="flex gap-3">
                            <span class="flex items-center gap-1 text-xs">
                                <span class="w-3 h-3 bg-accent"></span>
                                <span class="text-gray-500">Views</span>
                            </span>
                            <span class="flex items-center gap-1 text-xs">
                                <span class="w-3 h-3 bg-accent-light"></span>
                                <span class="text-gray-500">Visitors</span>
                            </span>
                        </div>
                    </div>
                    <!-- Chart Placeholder -->
                    <div class="h-64 bg-gray-50 flex items-center justify-center border-2 border-dashed border-gray-200">
                        <span class="text-gray-400 flex flex-col items-center gap-2">
                            <i class="fi fi-rr-chart-line text-3xl"></i>
                            <span class="text-sm">Traffic chart visualization</span>
                        </span>
                    </div>
                </div>

                <!-- Top Pages Card -->
                <div class="bg-white card p-6">
                    <h4 class="font-bold text-gray-900 mb-4">Top Pages</h4>
                    <div class="space-y-4">
                        <!-- Page Item 1 -->
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Home Page</p>
                                <div class="w-full bg-gray-200 h-2 mt-1 overflow-hidden">
                                    <div class="bg-accent h-2" style="width: 100%"></div>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600 ml-3">24.5K</span>
                        </div>
                        <!-- Page Item 2 -->
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Products</p>
                                <div class="w-full bg-gray-200 h-2 mt-1 overflow-hidden">
                                    <div class="bg-accent h-2" style="width: 78%"></div>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600 ml-3">18.2K</span>
                        </div>
                        <!-- Page Item 3 -->
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">About Us</p>
                                <div class="w-full bg-gray-200 h-2 mt-1 overflow-hidden">
                                    <div class="bg-accent h-2" style="width: 65%"></div>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600 ml-3">15.8K</span>
                        </div>
                        <!-- Page Item 4 -->
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Blog</p>
                                <div class="w-full bg-gray-200 h-2 mt-1 overflow-hidden">
                                    <div class="bg-accent h-2" style="width: 52%"></div>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600 ml-3">12.4K</span>
                        </div>
                        <!-- Page Item 5 -->
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Contact</p>
                                <div class="w-full bg-gray-200 h-2 mt-1 overflow-hidden">
                                    <div class="bg-accent h-2" style="width: 31%"></div>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600 ml-3">7.6K</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Row -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <!-- Traffic Sources -->
                <div class="bg-white card p-6">
                    <h4 class="font-bold text-gray-900 mb-4">Traffic Sources</h4>
                    <div class="space-y-3">
                        <!-- Source Item -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 bg-accent-light flex items-center justify-center">
                                    <i class="fi fi-brands-google text-accent"></i>
                                </span>
                                <span class="text-sm text-gray-700">Organic Search</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium">45%</span>
                                <span class="text-xs text-green-600">+12%</span>
                            </div>
                        </div>
                        <!-- Source Item -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 bg-accent-light flex items-center justify-center">
                                    <i class="fi fi-brands-facebook text-accent"></i>
                                </span>
                                <span class="text-sm text-gray-700">Social Media</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium">28%</span>
                                <span class="text-xs text-green-600">+5%</span>
                            </div>
                        </div>
                        <!-- Source Item -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 bg-accent-light flex items-center justify-center">
                                    <i class="fi fi-rr-envelope text-accent"></i>
                                </span>
                                <span class="text-sm text-gray-700">Email</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium">15%</span>
                                <span class="text-xs text-red-600">-2%</span>
                            </div>
                        </div>
                        <!-- Source Item -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 bg-accent-light flex items-center justify-center">
                                    <i class="fi fi-rr-link text-accent"></i>
                                </span>
                                <span class="text-sm text-gray-700">Direct</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium">12%</span>
                                <span class="text-xs text-green-600">+3%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Geographic Distribution -->
                <div class="bg-white card p-6">
                    <h4 class="font-bold text-gray-900 mb-4">Top Countries</h4>
                    <div class="space-y-3">
                        <!-- Country Item -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="text-lg">🇺🇸</span>
                                <span class="text-sm text-gray-700">United States</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium">32.5K</span>
                                <span class="text-xs text-gray-400">42%</span>
                            </div>
                        </div>
                        <!-- Country Item -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="text-lg">🇬🇧</span>
                                <span class="text-sm text-gray-700">United Kingdom</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium">18.2K</span>
                                <span class="text-xs text-gray-400">23%</span>
                            </div>
                        </div>
                        <!-- Country Item -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="text-lg">🇨🇦</span>
                                <span class="text-sm text-gray-700">Canada</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium">12.8K</span>
                                <span class="text-xs text-gray-400">16%</span>
                            </div>
                        </div>
                        <!-- Country Item -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="text-lg">🇦🇺</span>
                                <span class="text-sm text-gray-700">Australia</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium">8.4K</span>
                                <span class="text-xs text-gray-400">11%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Device Breakdown -->
                <div class="bg-white card p-6">
                    <h4 class="font-bold text-gray-900 mb-4">Device Type</h4>
                    <div class="space-y-4">
                        <!-- Device Item -->
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-sm text-gray-700">Mobile</span>
                                <span class="text-sm font-medium">58%</span>
                            </div>
                            <div class="w-full bg-gray-200 h-2 overflow-hidden">
                                <div class="bg-accent h-2" style="width: 58%"></div>
                            </div>
                        </div>
                        <!-- Device Item -->
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-sm text-gray-700">Desktop</span>
                                <span class="text-sm font-medium">32%</span>
                            </div>
                            <div class="w-full bg-gray-200 h-2 overflow-hidden">
                                <div class="bg-accent h-2" style="width: 32%"></div>
                            </div>
                        </div>
                        <!-- Device Item -->
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-sm text-gray-700">Tablet</span>
                                <span class="text-sm font-medium">10%</span>
                            </div>
                            <div class="w-full bg-gray-200 h-2 overflow-hidden">
                                <div class="bg-accent h-2" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <div class="bg-white card p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-bold text-gray-900">Recent Activity</h4>
                    <button class="text-accent text-sm flex items-center gap-1 hover:gap-2 transition-all">
                        <span>View All</span>
                        <i class="fi fi-rr-arrow-small-right"></i>
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-2 text-xs font-medium text-gray-500">Page</th>
                                <th class="text-left py-3 px-2 text-xs font-medium text-gray-500">Views</th>
                                <th class="text-left py-3 px-2 text-xs font-medium text-gray-500">Unique Views</th>
                                <th class="text-left py-3 px-2 text-xs font-medium text-gray-500">Avg. Time</th>
                                <th class="text-left py-3 px-2 text-xs font-medium text-gray-500">Bounce Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-3 px-2 text-sm text-gray-900">/products/new-packaging</td>
                                <td class="py-3 px-2 text-sm text-gray-600">4,832</td>
                                <td class="py-3 px-2 text-sm text-gray-600">3,245</td>
                                <td class="py-3 px-2 text-sm text-gray-600">2:45</td>
                                <td class="py-3 px-2 text-sm text-gray-600">42%</td>
                            </tr>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-3 px-2 text-sm text-gray-900">/blog/sustainability-trends</td>
                                <td class="py-3 px-2 text-sm text-gray-600">3,921</td>
                                <td class="py-3 px-2 text-sm text-gray-600">2,847</td>
                                <td class="py-3 px-2 text-sm text-gray-600">3:12</td>
                                <td class="py-3 px-2 text-sm text-gray-600">38%</td>
                            </tr>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-3 px-2 text-sm text-gray-900">/about/company</td>
                                <td class="py-3 px-2 text-sm text-gray-600">2,847</td>
                                <td class="py-3 px-2 text-sm text-gray-600">2,103</td>
                                <td class="py-3 px-2 text-sm text-gray-600">1:58</td>
                                <td class="py-3 px-2 text-sm text-gray-600">51%</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-2 text-sm text-gray-900">/contact</td>
                                <td class="py-3 px-2 text-sm text-gray-600">1,934</td>
                                <td class="py-3 px-2 text-sm text-gray-600">1,567</td>
                                <td class="py-3 px-2 text-sm text-gray-600">1:23</td>
                                <td class="py-3 px-2 text-sm text-gray-600">63%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
require_once ROOT_PATH . '/components/footer.php';
?>