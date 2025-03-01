
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Connect</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header Section -->
    <!-- Header Section -->
<header class="bg-green-600 text-white py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold">Masjid Connect</h1>
            <p class="text-sm">Connecting Communities Through Faith</p>
        </div>
        <div>
            <a href="{{ route('login') }}" class="bg-white text-green-600 px-3 py-1.5 md:px-4 md:py-2 rounded-lg font-medium hover:bg-green-50 transition whitespace-nowrap text-sm md:text-base">Imam Login</a>
        </div>
    </div>
</header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Introduction -->
        <section class="mb-10 text-center">
            <h2 class="text-2xl font-bold mb-3">Welcome to Masjid Connect</h2>
            <p class="max-w-2xl mx-auto text-gray-600">Find local masjids, prayer times, and community announcements all in one place.</p>
        </section>
        
        <!-- Masjid Cards -->
        <section class="space-y-6">
            <!-- Masjid 1 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4">Al-Noor Masjid</h2>
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700">Prayer Timings</h3>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>Fajr: 5:00 AM</li>
                        <li>Dhuhr: 1:00 PM</li>
                        <li>Asr: 4:30 PM</li>
                        <li>Maghrib: 6:45 PM</li>
                        <li>Isha: 8:15 PM</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-700">Announcements</h3>
                    <div class="mt-2">
                        <img src="https://via.placeholder.com/600x300" alt="Announcement Image" class="rounded-lg">
                        <p class="text-gray-600 mt-2">Join us for a community iftar event on Friday at 7:00 PM.</p>
                    </div>
                </div>
            </div>

            <!-- Masjid 2 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4">Masjid Al-Farooq</h2>
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700">Prayer Timings</h3>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>Fajr: 5:15 AM</li>
                        <li>Dhuhr: 1:15 PM</li>
                        <li>Asr: 4:45 PM</li>
                        <li>Maghrib: 7:00 PM</li>
                        <li>Isha: 8:30 PM</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-700">Announcements</h3>
                    <div class="mt-2">
                        <img src="https://via.placeholder.com/600x300" alt="Announcement Image" class="rounded-lg">
                        <p class="text-gray-600 mt-2">Ramadan Quran classes will begin next week. Register now!</p>
                    </div>
                </div>
            </div>

            <!-- Masjid 3 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-4">Masjid Al-Ihsan</h2>
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700">Prayer Timings</h3>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>Fajr: 5:30 AM</li>
                        <li>Dhuhr: 1:30 PM</li>
                        <li>Asr: 5:00 PM</li>
                        <li>Maghrib: 7:15 PM</li>
                        <li>Isha: 8:45 PM</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-700">Announcements</h3>
                    <div class="mt-2">
                        <img src="https://via.placeholder.com/600x300" alt="Announcement Image" class="rounded-lg">
                        <p class="text-gray-600 mt-2">Weekly Jummah Khutbah will focus on community unity.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer class="bg-green-600 text-white py-4 mt-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 Masjid Connect. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>