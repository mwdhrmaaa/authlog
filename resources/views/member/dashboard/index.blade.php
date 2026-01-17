<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .gradient-bg {
            background: radial-gradient(circle at top left, #1a1a1a, #0a0a0a);
        }
    </style>
</head>
<body class="gradient-bg text-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="glass rounded-3xl p-8 lg:p-12 mb-8">
            <div class="flex items-center gap-6">
                @if($user->avatar)
                    <img src="{{ $user->avatar }}" alt="Avatar" class="w-24 h-24 rounded-2xl border-2 border-orange-500 shadow-xl shadow-orange-500/20">
                @else
                    <div class="w-24 h-24 rounded-2xl bg-gradient-to-tr from-orange-500 to-red-600 flex items-center justify-center text-3xl font-bold">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                @endif
                <div>
                    <h1 class="text-4xl font-bold tracking-tight">Halo, {{ $user->name }}!</h1>
                    <p class="text-gray-400 mt-1">Anda berhasil login menggunakan Google.</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="glass rounded-2xl p-6">
                <h3 class="text-gray-400 text-sm font-semibold uppercase tracking-wider mb-2">Email</h3>
                <p class="text-xl">{{ $user->email }}</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-gray-400 text-sm font-semibold uppercase tracking-wider mb-2">Google ID</h3>
                <p class="text-xl font-mono text-gray-300">{{ $user->google_id }}</p>
            </div>
            <div class="glass rounded-2xl p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-gray-400 text-sm font-semibold uppercase tracking-wider mb-2">Status</h3>
                    <p class="text-xl text-green-400 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                        Authenticated
                    </p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm bg-red-500/10 hover:bg-red-500/20 text-red-500 px-4 py-2 rounded-xl transition-all">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
