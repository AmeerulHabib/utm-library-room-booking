<!-- resources/views/guest.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTM Library Room Booking System</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Optional fallback styling if vite isn't present -->
    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    <main class="flex-1 flex flex-col items-center justify-center w-full max-w-[448px] bg-white dark:bg-[#161615] rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] p-6">
        <h1 class="text-3xl font-bold mb-4">Welcome, Guest!</h1>
        <p class="mb-6 text-lg text-[#706f6c]">This is the public landing page for the UTM Library Room Booking System.<br>
            Please log in to view, book, or manage rooms.</p>
        <div class="flex gap-4">
            <a href="{{ route('login') }}"
                class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="px-5 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                Register
            </a>
        </div>
    </main>
</body>
</html>




