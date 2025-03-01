
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Connect - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        <aside class="bg-green-700 text-white w-full md:w-64 md:min-h-screen p-4">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-xl font-bold">Masjid Connect</h1>
                <button class="block md:hidden text-white" id="mobile-menu-button">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
           <!-- Sidebar Navigation - Update this section -->
<nav id="sidebar-menu" class="hidden md:block">
    <ul class="space-y-2">
        <li>
            <a href="#" class="flex items-center p-2 rounded-lg bg-green-600 hover:bg-green-800 transition">
                <i class="fas fa-tachometer-alt mr-3"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-green-800 transition">
                <i class="fas fa-mosque mr-3"></i>
                <span>Masjid Profile</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-green-800 transition">
                <i class="fas fa-clock mr-3"></i>
                <span>Prayer Times</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-green-800 transition">
                <i class="fas fa-bullhorn mr-3"></i>
                <span>Announcements</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-green-800 transition">
                <i class="fas fa-calendar-alt mr-3"></i>
                <span>Events</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-green-800 transition opacity-60">
                <i class="fas fa-hand-holding-heart mr-3"></i>
                <span>Donations</span>
                <span class="ml-auto bg-yellow-500 text-xs px-2 py-1 rounded text-white">Coming Soon</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-green-800 transition opacity-60">
                <i class="fas fa-users mr-3"></i>
                <span>Community</span>
                <span class="ml-auto bg-yellow-500 text-xs px-2 py-1 rounded text-white">Coming Soon</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center p-2 rounded-lg hover:bg-green-800 transition">
                <i class="fas fa-cog mr-3"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</nav>
            <div class="mt-auto pt-8">
                <a href="#" class="flex items-center p-2 rounded-lg hover:bg-green-800 transition">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm p-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Dashboard</h2>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-bell text-lg"></i>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                            </button>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-700">Imam Abdullah</span>
                            <img src="https://via.placeholder.com/40" alt="Profile" class="w-8 h-8 rounded-full">
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Stats Overview -->
                <!-- Stats Overview - Update this section -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Keep the first 3 widgets, remove Prayer Attendance -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Visitors</p>
                <h3 class="text-2xl font-bold">1,254</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <i class="fas fa-mosque text-green-600"></i>
            </div>
        </div>
        <p class="text-green-500 text-sm mt-4"><span>↑ 12%</span> <span class="text-gray-400">from last month</span></p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Upcoming Events</p>
                <h3 class="text-2xl font-bold">7</h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <i class="fas fa-calendar-alt text-purple-600"></i>
            </div>
        </div>
        <p class="text-purple-500 text-sm mt-4"><span>↑ 3</span> <span class="text-gray-400">from last month</span></p>
    </div>
    <div class="bg-white rounded-lg shadow p-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 bg-yellow-500 text-white text-xs px-2 py-1 rounded-bl">Coming Soon</div>
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Community Features</p>
                <h3 class="text-lg font-medium mt-1">Member Management</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <i class="fas fa-users text-blue-600"></i>
            </div>
        </div>
        <p class="text-gray-400 text-sm mt-4">Connect with your community members</p>
    </div>
</div>

                <!-- Prayer Times & Announcements -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Prayer Times -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">Today's Prayer Times</h3>
                            <button class="text-sm text-green-600 hover:text-green-800">Edit</button>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                                <span class="font-medium">Fajr</span>
                                <span>5:15 AM</span>
                            </div>
                            <div class="flex justify-between items-center p-2">
                                <span class="font-medium">Dhuhr</span>
                                <span>1:15 PM</span>
                            </div>
                            <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                                <span class="font-medium">Asr</span>
                                <span>4:45 PM</span>
                            </div>
                            <div class="flex justify-between items-center p-2">
                                <span class="font-medium">Maghrib</span>
                                <span>7:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                                <span class="font-medium">Isha</span>
                                <span>8:30 PM</span>
                            </div>
                            <div class="flex justify-between items-center p-2">
                                <span class="font-medium">Jummah</span>
                                <span>1:30 PM (Friday)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Announcements -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">Recent Announcements</h3>
                            <button class="text-sm text-green-600 hover:text-green-800">Add New</button>
                        </div>
                        <div class="space-y-4">
                            <div class="border-b pb-4">
                                <h4 class="font-medium">Ramadan Preparations</h4>
                                <p class="text-sm text-gray-600 my-1">We need volunteers to help prepare for upcoming Ramadan events.</p>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-xs text-gray-500">Posted 2 days ago</span>
                                    <div class="flex space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700 text-sm">Edit</button>
                                        <button class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b pb-4">
                                <h4 class="font-medium">Weekly Quran Classes</h4>
                                <p class="text-sm text-gray-600 my-1">Registration is now open for the weekly Quran classes starting next month.</p>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-xs text-gray-500">Posted 5 days ago</span>
                                    <div class="flex space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700 text-sm">Edit</button>
                                        <button class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-medium">Community Iftar</h4>
                                <p class="text-sm text-gray-600 my-1">Join us for a community iftar event on Friday at 7:00 PM.</p>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-xs text-gray-500">Posted 1 week ago</span>
                                    <div class="flex space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700 text-sm">Edit</button>
                                        <button class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Upcoming Events</h3>
                        <button class="text-sm text-green-600 hover:text-green-800">Add New Event</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attendees</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Community Iftar</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Mar 12, 2025</td>
                                    <td class="px-6 py-4 whitespace-nowrap">7:00 PM</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Main Hall</td>
                                    <td class="px-6 py-4 whitespace-nowrap">185 / 200</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                        <a href="#" class="text-red-600 hover:text-red-900">Cancel</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Quran Competition</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Mar 18, 2025</td>
                                    <td class="px-6 py-4 whitespace-nowrap">10:00 AM</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Main Hall</td>
                                    <td class="px-6 py-4 whitespace-nowrap">45 / 50</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                        <a href="#" class="text-red-600 hover:text-red-900">Cancel</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Islamic Studies Class</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Mar 20, 2025</td>
                                    <td class="px-6 py-4 whitespace-nowrap">6:30 PM</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Room 103</td>
                                    <td class="px-6 py-4 whitespace-nowrap">28 / 30</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                        <a href="#" class="text-red-600 hover:text-red-900">Cancel</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Add a Coming Soon Section at the bottom -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 mt-8">
    <!-- Coming Soon: Donations -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold flex items-center">
                <i class="fas fa-hand-holding-heart text-yellow-500 mr-2"></i>
                Donations Management
                <span class="ml-3 bg-yellow-500 text-white text-xs px-2 py-1 rounded">Coming Soon</span>
            </h3>
        </div>
        <p class="text-gray-600 mb-4">Our donation management system will help you track and manage contributions from community members.</p>
        <ul class="text-gray-500 text-sm space-y-2 mb-4">
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Online donation collection
            </li>
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Donation tracking and reporting
            </li>
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Automated receipts for donors
            </li>
        </ul>
    </div>
    
    <!-- Coming Soon: Community -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold flex items-center">
                <i class="fas fa-users text-yellow-500 mr-2"></i>
                Community Management
                <span class="ml-3 bg-yellow-500 text-white text-xs px-2 py-1 rounded">Coming Soon</span>
            </h3>
        </div>
        <p class="text-gray-600 mb-4">Engage with your community members and manage congregation activities efficiently.</p>
        <ul class="text-gray-500 text-sm space-y-2 mb-4">
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Member registration and profiles
            </li>
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Group management for various activities
            </li>
            <li class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                Communication tools for community updates
            </li>
        </ul>
    </div>
</div>
            </main>
        </div>
    </div>


    <!-- JavaScript for mobile menu toggle -->
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebarMenu = document.getElementById('sidebar-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            sidebarMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>