<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - NeuroCMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
       
        <div id="sidebar" class="mobile-sidebar fixed md:sticky top-0 z-40 w-64 brand-gradient text-white h-screen md:h-screen py-6 px-4 flex-shrink-0 flex flex-col md:translate-x-0">
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
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 font-medium' : 'sidebar-item-hover transition' }}">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.masjids') }}" class="block py-2.5 px-4 rounded {{ request()->routeIs('admin.masjids*') ? 'bg-white/20 font-medium' : 'sidebar-item-hover transition' }}">
                    <i class="fas fa-mosque mr-2"></i> Manage Masjids
                </a>
                <a href="{{ route('admin.imams') }}" class="block py-2.5 px-4 rounded {{ request()->routeIs('admin.imams*') ? 'bg-white/20 font-medium' : 'sidebar-item-hover transition' }}">
                    <i class="fas fa-users mr-2"></i> Manage Imams
                </a>
                <a href="{{ route('home') }}" class="block py-2.5 px-4 rounded sidebar-item-hover transition" target="_blank">
                    <i class="fas fa-home mr-2"></i> Visit Homepage
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="mt-10">
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
                    <h2 class="text-xl font-semibold text-gray-800">@yield('header', 'Admin Panel')</h2>
                </div>
                <div class="flex items-center mt-3 sm:mt-0">
                    <div class="text-sm text-gray-500 hidden sm:block">
                        <i class="fas fa-clock mr-1"></i> 
                        <span id="current-time">{{ date('h:i A') }}</span>
                    </div>
                    <div class="h-8 w-px bg-gray-200 mx-3 hidden sm:block"></div>
                    <span class="text-gray-700 font-medium">Welcome, {{ auth()->user()->name }}</span>
                </div>
            </header>
            
            <!-- Main Content Area -->
            <main class="flex-1 p-4 md:p-6 overflow-auto">
                @yield('content')
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
            
            if (mobileMenuButton && sidebar && menuIcon) {
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
            }
        });
        
        setInterval(updateTime, 60000);
        updateTime();
    </script>
</body>
</html>