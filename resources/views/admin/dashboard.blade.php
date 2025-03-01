
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | NeuroCMS by NeuroBytes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .brand-gradient {
            background: linear-gradient(135deg, #21aa47 0%, #0d8a34 100%);
        }
        .sidebar-item-hover:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        @media (max-width: 768px) {
            .mobile-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .mobile-sidebar.open {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Mobile Sidebar Toggle -->
        <div class="md:hidden fixed bottom-4 right-4 z-50">
            <button id="mobile-menu-button" class="p-3 bg-green-600 text-white rounded-full shadow-lg">
                <i id="menu-icon" class="fas fa-bars"></i>
            </button>
        </div>
        
        <!-- Sidebar -->
        <div id="sidebar" class="mobile-sidebar fixed md:static md:flex z-40 w-64 brand-gradient text-white h-full py-6 px-4 flex-shrink-0 flex flex-col md:translate-x-0">
            <div class="mb-8 flex flex-col items-center text-center">
                <div class="p-3 bg-white rounded-full mb-2">
                    <i class="fas fa-brain text-green-600 text-3xl"></i>
                </div>
                <h1 class="text-2xl font-bold mt-2">NeuroCMS</h1>
                <p class="text-xs text-green-100 tracking-wider uppercase font-medium">by NeuroBytes</p>
                <div class="mt-2 text-xs px-3 py-1 bg-white/10 rounded-full">
                    <span>Admin Panel</span>
                </div>
            </div>
            
            <nav class="space-y-1.5">
                <a href="#" class="block py-2.5 px-4 rounded bg-white/20 font-medium">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="#" class="block py-2.5 px-4 rounded sidebar-item-hover transition">
                    <i class="fas fa-mosque mr-2"></i> Manage Masjids
                </a>
                <a href="#" class="block py-2.5 px-4 rounded sidebar-item-hover transition">
                    <i class="fas fa-users mr-2"></i> Manage Imams
                </a>
                <a href="#" class="block py-2.5 px-4 rounded sidebar-item-hover transition">
                    <i class="fas fa-home mr-2"></i> Visit Homepage
                </a>
                
                <form method="POST" action="#" class="mt-10">
                    @csrf
                    <button type="submit" class="w-full text-left block py-2.5 px-4 rounded sidebar-item-hover transition">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </nav>
            
            <!-- Branding Footer -->
            <div class="mt-auto pt-10 text-center text-xs text-green-100 opacity-75 hidden md:block">
                <p>NeuroCMS v1.0</p>
                <p class="mt-1">© 2025 NeuroBytes</p>
                <p class="mt-1">Elevating Digital Experiences</p>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col md:ml-0">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm py-4 px-6 flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-gray-200">
                <div class="flex items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Dashboard Overview</h2>
                </div>
                <div class="flex items-center mt-3 sm:mt-0">
                    <div class="text-sm text-gray-500 hidden sm:block">
                        <i class="fas fa-clock mr-1"></i> 
                        <span id="current-time">{{ date('h:i A') }}</span>
                    </div>
                    <div class="h-8 w-px bg-gray-200 mx-3 hidden sm:block"></div>
                    <span class="text-gray-700 font-medium">Welcome, Admin User</span>
                </div>
            </header>
            
            <!-- Main Content Area -->
            <main class="flex-1 p-4 md:p-6 overflow-auto">

               <!-- Statistics Cards - Complete all 3 cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition">
        <div class="flex items-center">
            <div class="p-3 brand-gradient rounded-full text-white">
                <i class="fas fa-mosque text-lg md:text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-xs md:text-sm font-medium">Total Masjids</h3>
                <p class="text-xl md:text-3xl font-semibold text-gray-800">{{ $masjidCount ?? 0 }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition">
        <div class="flex items-center">
            <div class="p-3 brand-gradient rounded-full text-white">
                <i class="fas fa-users text-lg md:text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-xs md:text-sm font-medium">Active Imams</h3>
                <p class="text-xl md:text-3xl font-semibold text-gray-800">{{ $imamCount ?? 0 }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition">
        <div class="flex items-center">
            <div class="p-3 brand-gradient rounded-full text-white">
                <i class="fas fa-bell text-lg md:text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-xs md:text-sm font-medium">Announcements</h3>
                <p class="text-xl md:text-3xl font-semibold text-gray-800">0</p>
            </div>
        </div>
    </div>
</div>
    
              <!-- Recent Masjids - Add proper table structure -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
    <div class="py-3 px-4 md:px-6 border-b border-gray-200 flex flex-col sm:flex-row sm:justify-between sm:items-center">
        <h3 class="text-lg font-semibold text-gray-800">Recently Added Masjids</h3>
        <a href="#" class="text-sm text-green-600 hover:underline mt-1 sm:mt-0">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imams</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($recentMasjids as $masjid)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $masjid->name }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $masjid->location ?? 'Not specified' }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $masjid->imams->count() }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm">
                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                        <a href="#" class="text-green-600 hover:text-green-900">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-3 whitespace-nowrap text-sm text-center text-gray-500">No masjids found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>  
                
                
                <!-- Recent Imams - Add proper table structure -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="py-3 px-4 md:px-6 border-b border-gray-200 flex flex-col sm:flex-row sm:justify-between sm:items-center">
        <h3 class="text-lg font-semibold text-gray-800">Active Imams</h3>
        <a href="#" class="text-sm text-green-600 hover:underline mt-1 sm:mt-0">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Masjids</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($recentImams as $imam)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $imam->name }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $imam->email }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $imam->masjids->count() }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm">
                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                        <a href="#" class="text-green-600 hover:text-green-900">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-3 whitespace-nowrap text-sm text-center text-gray-500">No imams found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

            </main>
            
            <!-- Footer with branding -->
            <footer class="bg-white py-3 px-4 md:py-4 md:px-6 border-t border-gray-200 text-xs md:text-sm text-center text-gray-500">
                Powered by <span class="text-green-600 font-medium">NeuroCMS</span> - Designed with ❤️ by NeuroBytes
            </footer>
        </div>
    </div>
    
    <script>
        // Update the current time
        function updateTime() {
            const now = new Date();
            const timeElement = document.getElementById('current-time');
            if (timeElement) {
                timeElement.textContent = now.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true });
            }
        }
        
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');
            const menuIcon = document.getElementById('menu-icon');
            
            mobileMenuButton.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                
                if (sidebar.classList.contains('open')) {
                    menuIcon.classList.remove('fa-bars');
                    menuIcon.classList.add('fa-times');
                } else {
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                }
            });
            
            // Close sidebar when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInside = sidebar.contains(event.target) || mobileMenuButton.contains(event.target);
                
                if (!isClickInside && sidebar.classList.contains('open')) {
                    sidebar.classList.remove('open');
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                }
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('open');
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                }
            });
        });
        
        setInterval(updateTime, 60000);
        updateTime();
    </script>
</body>
</html>