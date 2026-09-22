@extends('layouts.app')
@section('title', 'Beranda - Law Firm')

@section('content')
<!-- Hero Section -->
<div class="bg-law-primary text-white py-24 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20 bg-[url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=1920')] bg-cover bg-center"></div>
    <div class="container mx-auto px-4 text-center relative z-10">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 tracking-tight">Solusi Hukum Terpercaya</h1>
        <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto">Kami siap memberikan pendampingan hukum terbaik untuk Anda dan perusahaan Anda dengan integritas dan profesionalisme tingkat tinggi.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#konsultasi" class="bg-law-accent hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg transition duration-300 shadow-lg">Konsultasi Sekarang</a>
            <a href="{{ route('posts.index') }}" class="bg-white/10 border border-white/30 hover:bg-white/20 text-white font-bold py-3 px-8 rounded-lg transition duration-300">Baca Artikel Kami</a>
        </div>
    </div>
</div>

<!-- Layanan Section -->
<div id="layanan" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-law-primary mb-2">Area Praktik Kami</h2>
            <div class="w-24 h-1 bg-law-accent mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
                <div class="w-16 h-16 bg-law-primary/10 text-law-primary rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Hukum Perdata & Pidana</h3>
                <p class="text-gray-600">Pendampingan litigasi dan non-litigasi untuk berbagai kasus perdata maupun pidana.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
                <div class="w-16 h-16 bg-law-primary/10 text-law-primary rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Hukum Bisnis & Perusahaan</h3>
                <p class="text-gray-600">Konsultasi kontrak, merger & akuisisi, restrukturisasi, dan kepatuhan regulasi perusahaan.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
                <div class="w-16 h-16 bg-law-primary/10 text-law-primary rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Hukum Ketenagakerjaan</h3>
                <p class="text-gray-600">Penyelesaian perselisihan hubungan industrial dan penyusunan peraturan perusahaan.</p>
            </div>
        </div>
    </div>
</div>

<!-- Konsultasi Section -->
<div id="konsultasi" class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-gray-900 rounded-2xl overflow-hidden shadow-2xl flex flex-col md:flex-row">
            <div class="w-full md:w-5/12 bg-law-primary text-white p-10 flex flex-col justify-between">
                <div>
                    <h2 class="text-3xl font-bold mb-4">Butuh Bantuan Hukum?</h2>
                    <p class="text-law-primary-200 mb-8 text-sm opacity-90">Tim pengacara kami siap mendengarkan masalah Anda dan memberikan solusi terbaik. Jadwalkan konsultasi gratis sekarang.</p>
                </div>
                <div class="space-y-4 text-sm font-semibold">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-law-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        (021) 123-4567
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-law-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        info@lawfirm.com
                    </div>
                </div>
            </div>
            <div class="w-full md:w-7/12 p-10 bg-white">
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-6 text-sm font-bold border-l-4 border-green-500">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('consultation.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-1 focus:ring-law-accent focus:border-law-accent outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">No. HP / WhatsApp</label>
                            <input type="text" name="phone" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-1 focus:ring-law-accent focus:border-law-accent outline-none text-sm">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-xs font-bold text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-1 focus:ring-law-accent focus:border-law-accent outline-none text-sm">
                    </div>
                    <div class="mb-4">
                        <label class="block text-xs font-bold text-gray-700 mb-1">Kategori Masalah Hukum</label>
                        <select name="category" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-1 focus:ring-law-accent focus:border-law-accent outline-none text-sm bg-white">
                            <option value="perdata">Hukum Perdata</option>
                            <option value="pidana">Hukum Pidana</option>
                            <option value="bisnis">Hukum Bisnis/Perusahaan</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="block text-xs font-bold text-gray-700 mb-1">Pesan / Penjelasan Singkat</label>
                        <textarea name="message" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-1 focus:ring-law-accent focus:border-law-accent outline-none text-sm"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-law-primary text-white font-bold py-3 rounded hover:bg-blue-900 transition shadow-md">Kirim Permintaan Konsultasi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
