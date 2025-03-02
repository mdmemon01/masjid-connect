
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasjidConnect | Find Prayer Times & Announcements</title>
    <meta name="description" content="Find masjids, prayer times, and community events in your area.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#10B981', // Green-500
                        secondary: '#064E3B', // Green-900
                        light: '#ECFDF5', // Green-50
                    }
                }
            }
        }
    </script>
    <style>
    .pattern-bg {
        background-image: url('https://i.imgur.com/3Jk5E5H.png');
        background-size: 300px;
        background-repeat: repeat;
        opacity: 0.04;
    }
    
    .parallax {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
        transform: translateZ(-1px) scale(1.5);
    }
    
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
        100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }
</style>
</head>
<body class="bg-light font-sans">
    <!-- Header Section -->
    <header class="bg-primary text-white py-4 shadow-md">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center">
                <div class="mr-3">
                    <i class="fas fa-mosque text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold">MasjidConnect</h1>
                    <p class="text-xs md:text-sm">Connecting Communities Through Faith</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="#" class="hidden md:inline-block text-white hover:text-green-100">About</a>
                <a href="#" class="hidden md:inline-block text-white hover:text-green-100">Contact</a>
                <a href="{{ route('login') }}" class="bg-white text-primary px-3 py-1.5 md:px-4 md:py-2 rounded-lg font-medium hover:bg-green-50 transition whitespace-nowrap text-sm md:text-base">
                    Imam Login <i class="fas fa-sign-in-alt ml-1"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-secondary text-white py-12 md:py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-5xl font-bold mb-4">Find Masjids Near You</h2>
                <p class="text-lg md:text-xl mb-8">Access prayer times, announcements, and community events all in one place</p>
                <div class="bg-white p-4 rounded-lg shadow-lg max-w-2xl mx-auto">
                    <div class="flex flex-col md:flex-row">
                        <input type="text" placeholder="Enter city, postal code or masjid name" class="flex-1 p-3 rounded-md border border-gray-300 focus:ring focus:ring-primary focus:ring-opacity-50 focus:border-primary mb-3 md:mb-0 md:mr-3">
                        <button class="bg-primary text-white p-3 rounded-md hover:bg-green-600 transition">Find Masjids</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Add this just below the hero section -->


        <!-- Featured Masjids Section -->
        <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Featured Masjids</h2>
                <p class="text-lg text-gray-600">Popular masjids in your community</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Masjid Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-[1.02] hover:shadow-lg">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&h=500&q=80" alt="Islamic Center" class="object-cover w-full h-full">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent text-white p-4">
                            <h3 class="text-xl font-bold">Islamic Center</h3>
                            <p class="text-sm">New York, NY</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                <span class="ml-2 text-sm text-gray-600">3.2 miles away</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-users text-primary"></i>
                                <span class="ml-2 text-sm text-gray-600">Large community</span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <h4 class="text-lg font-semibold mb-2">Today's Prayer Times</h4>
                            <div class="grid grid-cols-3 gap-2">
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Fajr</p>
                                    <p class="text-sm font-medium">5:22 AM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Dhuhr</p>
                                    <p class="text-sm font-medium">1:15 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Asr</p>
                                    <p class="text-sm font-medium">4:45 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Maghrib</p>
                                    <p class="text-sm font-medium">7:23 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Isha</p>
                                    <p class="text-sm font-medium">8:45 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Jummah</p>
                                    <p class="text-sm font-medium">1:30 PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="block text-center bg-primary text-white py-2 rounded-md hover:bg-green-600 transition">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Masjid Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-[1.02] hover:shadow-lg">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1564769626751-814b0a950399?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&h=500&q=80" alt="Masjid Al-Noor" class="object-cover w-full h-full">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent text-white p-4">
                            <h3 class="text-xl font-bold">Masjid Al-Noor</h3>
                            <p class="text-sm">Chicago, IL</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                <span class="ml-2 text-sm text-gray-600">1.5 miles away</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-users text-primary"></i>
                                <span class="ml-2 text-sm text-gray-600">Medium community</span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <h4 class="text-lg font-semibold mb-2">Today's Prayer Times</h4>
                            <div class="grid grid-cols-3 gap-2">
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Fajr</p>
                                    <p class="text-sm font-medium">5:30 AM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Dhuhr</p>
                                    <p class="text-sm font-medium">1:20 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Asr</p>
                                    <p class="text-sm font-medium">4:50 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Maghrib</p>
                                    <p class="text-sm font-medium">7:25 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Isha</p>
                                    <p class="text-sm font-medium">8:50 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Jummah</p>
                                    <p class="text-sm font-medium">1:15 PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="block text-center bg-primary text-white py-2 rounded-md hover:bg-green-600 transition">View Details</a>
                        </div>
                    </div>
                </div>

                                <!-- Masjid Card 3 -->
                                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-[1.02] hover:shadow-lg">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1545197493-fa5c0e4c6327?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&h=500&q=80" alt="Masjid Al-Rahman" class="object-cover w-full h-full">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent text-white p-4">
                            <h3 class="text-xl font-bold">Masjid Al-Rahman</h3>
                            <p class="text-sm">Houston, TX</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                <span class="ml-2 text-sm text-gray-600">2.8 miles away</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-users text-primary"></i>
                                <span class="ml-2 text-sm text-gray-600">Small community</span>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <h4 class="text-lg font-semibold mb-2">Today's Prayer Times</h4>
                            <div class="grid grid-cols-3 gap-2">
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Fajr</p>
                                    <p class="text-sm font-medium">5:25 AM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Dhuhr</p>
                                    <p class="text-sm font-medium">1:18 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Asr</p>
                                    <p class="text-sm font-medium">4:48 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Maghrib</p>
                                    <p class="text-sm font-medium">7:28 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Isha</p>
                                    <p class="text-sm font-medium">8:52 PM</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Jummah</p>
                                    <p class="text-sm font-medium">1:20 PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="block text-center bg-primary text-white py-2 rounded-md hover:bg-green-600 transition">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <a href="#" class="inline-flex items-center text-primary hover:text-green-700 font-medium">
                    View all masjids <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Why Use MasjidConnect?</h2>
                <p class="text-lg text-gray-600">Making it easier to stay connected with your local masjids</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 mx-auto bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Accurate Prayer Times</h3>
                    <p class="text-gray-600">Always know when prayers are scheduled at your local masjids</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 mx-auto bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-bullhorn text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Latest Announcements</h3>
                    <p class="text-gray-600">Stay informed about important news and events from your masjid</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 mx-auto bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-calendar-alt text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Event Calendar</h3>
                    <p class="text-gray-600">Find upcoming classes, lectures, and community events</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 mx-auto bg-primary/10 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-map-marked-alt text-2xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Find Nearby Masjids</h3>
                    <p class="text-gray-600">Discover masjids in your area or when traveling to a new city</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">What Our Users Say</h2>
                <p class="text-lg text-gray-600">Trusted by communities across the country</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">5.0</span>
                    </div>
                    <p class="text-gray-600 italic mb-6">"MasjidConnect has made it so easy to check prayer times when I'm on the go. I use it every day and love how simple it is."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-300 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User">
                        </div>
                        <div>
                            <h4 class="font-medium">Ahmed K.</h4>
                            <p class="text-sm text-gray-500">Community Member</p>
                        </div>
                    </div>
                </div>
                                <!-- Testimonial 2 -->
                                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">5.0</span>
                    </div>
                    <p class="text-gray-600 italic mb-6">"As an imam, this platform has simplified how we communicate with our community. Updating prayer times and posting announcements is now effortless."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-300 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/men/85.jpg" alt="User">
                        </div>
                        <div>
                            <h4 class="font-medium">Imam Yusuf</h4>
                            <p class="text-sm text-gray-500">Masjid Administrator</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="ml-2 text-sm text-gray-500">4.5</span>
                    </div>
                    <p class="text-gray-600 italic mb-6">"When traveling for work, I can easily find masjids in new cities. This app has connected me with local communities wherever I go."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-300 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User">
                        </div>
                        <div>
                            <h4 class="font-medium">Aisha M.</h4>
                            <p class="text-sm text-gray-500">Business Traveler</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-primary">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h2 class="text-3xl font-bold mb-6">Ready to Connect with Your Local Masjid?</h2>
                <p class="text-xl mb-8">Join thousands of community members who stay connected with their masjids every day.</p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#" class="bg-white text-primary px-8 py-3 rounded-lg font-medium hover:bg-gray-100 transition">
                        Find a Masjid
                    </a>
                    <a href="{{ route('login') }}" class="bg-secondary text-white px-8 py-3 rounded-lg font-medium hover:bg-green-800 transition">
                        Imam Login
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- NeuroBytes Promotion Section -->
    <!-- NeuroBytes Promotion Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <!-- Left Column (Logo/Branding) -->
                <div class="md:w-1/3 bg-gradient-to-br from-primary to-green-700 p-8 text-white flex flex-col justify-center items-center text-center">
                    <div class="w-20 h-20 rounded-full bg-white/20 flex items-center justify-center mb-4">
                        <i class="fas fa-code text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">NeuroBytes</h3>
                    <p class="text-green-100 mb-4">Web Development Agency</p>
                    <div class="flex space-x-4">
                        <a href="https://neurobytes.io" target="_blank" class="bg-white/20 hover:bg-white/30 h-10 w-10 rounded-full flex items-center justify-center transition">
                            <i class="fas fa-globe"></i>
                        </a>
                        <a href="https://neurocms.io" target="_blank" class="bg-white/20 hover:bg-white/30 h-10 w-10 rounded-full flex items-center justify-center transition">
                            <i class="fas fa-cubes"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Right Column (Content) -->
                <div class="md:w-2/3 p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Like what you see?</h3>
                    <p class="text-gray-600 mb-6">MasjidConnect is built by NeuroBytes, a web development agency specializing in creating custom web applications and content management systems.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="flex items-start">
                            <div class="mt-1 mr-3 text-primary">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800">Custom Web Apps</h4>
                                <p class="text-sm text-gray-600">Tailored to your specific needs</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="mt-1 mr-3 text-primary">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800">Modern Design</h4>
                                <p class="text-sm text-gray-600">Beautiful & responsive interfaces</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="mt-1 mr-3 text-primary">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800">Expert Development</h4>
                                <p class="text-sm text-gray-600">Full-stack development services</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="mt-1 mr-3 text-primary">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800">NeuroCMS</h4>
                                <p class="text-sm text-gray-600">Easy content management</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="https://neurobytes.io/contact" target="_blank" class="inline-block bg-primary hover:bg-green-600 text-white font-medium py-3 px-6 rounded-lg transition">
                        Contact Us for Your Project
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-mosque text-2xl text-primary mr-3"></i>
                        <h3 class="text-xl font-bold">MasjidConnect</h3>
                    </div>
                    <p class="text-gray-400 mb-4">Connecting communities through faith and technology.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary">Find Masjids</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary">Prayer Times</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary">Announcements</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary">Contact Us</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Subscribe</h4>
                    <p class="text-gray-400 mb-4">Stay updated with the latest features and announcements.</p>
                    <form class="flex">
                        <input type="email" placeholder="Your email" class="px-3 py-2 rounded-l-md w-full text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary">
                        <button type="submit" class="bg-primary text-white px-4 py-2 rounded-r-md hover:bg-green-600">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="pt-8 border-t border-gray-800 text-center text-gray-500 text-sm">
                <div class="mb-4">
                    <span>Powered by</span>
                    <a href="https://neurobytes.io" class="text-primary font-medium ml-1">NeuroBytes</a>
                    <span class="mx-1">|</span>
                    <a href="https://neurocms.io" class="text-primary font-medium">NeuroCMS</a>
                </div>
                <p>&copy; {{ date('Y') }} MasjidConnect. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Optional: Add JavaScript for interactive features
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality, geolocation, etc. could be added here
        });
    </script>
</body>
</html>