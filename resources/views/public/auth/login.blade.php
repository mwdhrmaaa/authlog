<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|outfit:400,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap');
            
            :root {
                --primary: #f53003;
                --primary-dark: #cc2902;
            }

            body {
                font-family: 'Outfit', 'Instrument Sans', sans-serif;
            }

            .glass {
                background: rgba(255, 255, 255, 0.03);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            }

            .gradient-bg {
                background: radial-gradient(circle at top left, #1a1a1a, #0a0a0a);
            }

            .animate-blob {
                animation: blob 7s infinite;
            }

            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }

            .animation-delay-2000 { animation-delay: 2s; }
            .animation-delay-4000 { animation-delay: 4s; }
        </style>
    @endif
</head>
<body class="gradient-bg text-gray-100 min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
    
    <!-- Decorative Blobs -->
    <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute top-0 -right-4 w-72 h-72 bg-red-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

    <div class="w-full max-w-md relative z-10">
        <div class="glass rounded-3xl p-8 lg:p-12 text-center">
            <div class="mb-8">
                <div class="w-16 h-16 bg-gradient-to-tr from-[#f53003] to-orange-500 rounded-2xl mx-auto flex items-center justify-center shadow-lg shadow-orange-900/20 mb-4 rotate-3 hover:rotate-0 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A10.003 10.003 0 0012 3c1.223 0 2.39.22 3.47.618M12 12v9"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold tracking-tight mb-2">Welcome Back</h1>
                <p class="text-gray-400">Please sign in to continue</p>
            </div>

            @if(session('error'))
                <div class="bg-red-500/10 border border-red-500/20 text-red-500 px-4 py-3 rounded-xl mb-6 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="space-y-4">
                <a href="{{ route('public.auth.google.redirect') }}" 
                   class="flex items-center justify-center gap-3 w-full bg-white text-gray-900 font-semibold py-4 px-6 rounded-2xl hover:bg-gray-100 transition-all duration-300 shadow-xl shadow-white/5 active:scale-[0.98]">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Continue with Google
                </a>

                <div class="relative py-4">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-800"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-gray-950 px-2 text-gray-500">Security Verified</span>
                    </div>
                </div>

                <p class="text-sm text-gray-500">
                    By continuing, you agree to our 
                    <a href="#" class="text-gray-300 hover:text-white underline underline-offset-4">Terms of Service</a>
                </p>
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-gray-500 text-sm">
                Don't have an account? 
                <a href="#" class="text-[#f53003] font-semibold hover:text-orange-400 transition-colors">Contact Support</a>
            </p>
        </div>
    </div>
</body>
</html>
