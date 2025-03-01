/resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Masjid Connect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Logo and Branding -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-green-600">Masjid Connect</h1>
                <p class="text-gray-500 text-sm mt-1">Powered by <span class="font-medium">NeuroCMS</span></p>
            </div>
            
            <!-- Registration Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-green-600 p-6 text-center">
                    <h2 class="text-xl text-white font-medium">Register for Masjid Connect</h2>
                </div>
                
                <form method="POST" action="{{ route('register') }}" class="p-6 space-y-6">
                    @csrf
                    
                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 border p-2.5 @error('name') border-red-500 @enderror" placeholder="John Doe" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 border p-2.5 @error('email') border-red-500 @enderror" placeholder="email@masjid.com" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Phone Input (Optional) -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number (Optional)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 border p-2.5 @error('phone') border-red-500 @enderror" placeholder="(555) 123-4567">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password" name="password" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 border p-2.5 @error('password') border-red-500 @enderror" placeholder="••••••••" required>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 border p-2.5" placeholder="••••••••" required>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Register
                        </button>
                    </div>
                    
                    <p class="text-sm text-gray-500 text-center">
                        Note: Your account will require approval before you can login.
                    </p>
                </form>
                
                <!-- Already have account -->
                <div class="px-6 pb-6 text-center">
                    <p class="text-sm text-gray-600">Already have an account? 
                        <a href="{{ route('login') }}" class="text-green-600 hover:text-green-500 font-medium">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-gray-500">
                <p>&copy; 2025 NeuroBytes. All rights reserved.</p>
                <p class="mt-1">
                    <a href="#" class="text-green-600 hover:text-green-700">Terms of Service</a>
                    <span class="mx-2">|</span>
                    <a href="#" class="text-green-600 hover:text-green-700">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>