<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Kantor Hukum & Partners')</title>
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Layanan hukum profesional dan terpercaya.')">
    
    <!-- We can use tailwind cdn for quick testing if npm build is not ready, but we'll use vite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'law-primary': '#1e3a8a',
                        'law-accent': '#b45309',
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen">

    <header class="bg-law-primary text-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-wider">
                LAW<span class="text-law-accent">FIRM</span>
            </a>
            <nav class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('home') }}" class="hover:text-law-accent transition">Beranda</a>
                <a href="/#layanan" class="hover:text-law-accent transition">Layanan</a>
                <a href="/#tim" class="hover:text-law-accent transition">Tim</a>
                <a href="{{ route('posts.index') }}" class="hover:text-law-accent transition">Artikel Hukum</a>
                <a href="/#konsultasi" class="bg-law-accent text-white px-5 py-2 rounded-md shadow hover:bg-yellow-600 transition font-semibold">Konsultasi Gratis</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-300 py-10 text-sm">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Law Firm & Partners</h3>
                <p>Memberikan solusi hukum terbaik dan terpercaya untuk Anda dan bisnis Anda.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Layanan</h3>
                <ul class="space-y-2">
                    <li>Hukum Pidana & Perdata</li>
                    <li>Hukum Bisnis & Perusahaan</li>
                    <li>Hukum Ketenagakerjaan</li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Hubungi Kami</h3>
                <p>Jl. Sudirman No. 123, Jakarta</p>
                <p>Email: info@lawfirm.com</p>
            </div>
        </div>
        <div class="text-center mt-8 border-t border-gray-700 pt-4 text-gray-500">
            &copy; {{ date('Y') }} Law Firm & Partners. All rights reserved.
        </div>
    </footer>
</body>
</html>
