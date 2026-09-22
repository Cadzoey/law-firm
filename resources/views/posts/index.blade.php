@extends('layouts.app')
@section('title', 'Artikel Hukum - Law Firm')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-law-primary mb-4">Artikel & Publikasi Hukum</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">Informasi terbaru seputar regulasi dan analisis kasus dari para ahli kami.</p>
    </div>

    <div class="flex flex-col md:flex-row gap-8">
        <!-- Sidebar Filter & Search -->
        <div class="w-full md:w-1/4">
            <div class="bg-white p-6 rounded shadow border-t-4 border-law-accent">
                <form action="{{ route('posts.index') }}" method="GET" class="mb-6">
                    <input type="text" name="search" placeholder="Cari artikel..." value="{{ request('search') }}" 
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-law-accent focus:outline-none">
                    <button type="submit" class="mt-3 w-full bg-law-primary text-white py-2 rounded hover:bg-blue-900 transition">Cari</button>
                </form>

                <h3 class="font-bold text-lg mb-4 text-gray-800 border-b pb-2">Kategori</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('posts.index') }}" class="{{ !request('category') ? 'text-law-accent font-bold' : 'text-gray-600 hover:text-law-primary' }}">Semua Kategori</a></li>
                    @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('posts.index', ['category' => $cat->slug]) }}" 
                               class="{{ request('category') == $cat->slug ? 'text-law-accent font-bold' : 'text-gray-600 hover:text-law-primary' }}">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Grid Artikel -->
        <div class="w-full md:w-3/4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($posts as $post)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 flex flex-col">
                    <img src="{{ $post->featured_image ? asset('storage/'.$post->featured_image) : 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=600' }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    <div class="p-5 flex-grow flex flex-col">
                        <span class="text-xs text-law-accent font-bold uppercase tracking-wider mb-2">{{ $post->category?->name ?? 'Uncategorized' }}</span>
                        <h2 class="text-xl font-bold mb-3 text-gray-900 leading-tight">
                            <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-law-primary transition">{{ $post->title }}</a>
                        </h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-grow">{{ $post->excerpt }}</p>
                        <div class="flex justify-between items-center text-xs text-gray-500 pt-4 border-t">
                            <span>{{ $post->created_at->format('d M Y') }}</span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                {{ $post->views_count }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded shadow text-gray-500">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada artikel</h3>
                    <p class="mt-1 text-sm text-gray-500">Belum ada artikel yang diterbitkan untuk kategori ini.</p>
                </div>
            @endforelse
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-10">
        {{ $posts->links() }}
    </div>
</div>
@endsection
