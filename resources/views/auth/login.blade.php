/resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Masjid Connect</title>
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
            
            <!-- Status Messages -->
            @if (session('status'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('status') }}
                </div>
            @endif
            
            <!-- Login Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-green-600 p-6 text-center">
                    <h2 class="text-xl text-white font-medium">Imam / Masjid Login</h2>
                </div>
                
                <form method="POST" action="{{ route('login') }}" class="p-6 space-y-6">
                    @csrf
                    
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
                    
                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Remember me
                            </label>
                        </div>
                        <a href="#" class="text-sm font-medium text-green-600 hover:text-green-500">
                            Forgot password?
                        </a>
                    </div>
                    
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Sign in
                        </button>
                    </div>
                </form>
                
                <!-- Divider -->
                <div class="px-6 pb-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Don't have an account?</span>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <a href="" class="w-full flex justify-center py-2 px-4 border border-green-600 rounded-md shadow-sm text-sm font-medium text-green-600 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Request Access
                        </a>
                    </div>
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