@extends('layouts.app')
@section('title', $post->title . ' - Law Firm')
@section('meta_description', Str::limit(strip_tags($post->excerpt), 150))

@section('content')
<div class="container mx-auto px-4 py-12 max-w-4xl">
    
    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6 font-medium">
        <a href="{{ route('home') }}" class="hover:text-law-primary transition">Beranda</a> 
        <span class="mx-2">/</span> 
        <a href="{{ route('posts.index') }}" class="hover:text-law-primary transition">Artikel</a> 
        <span class="mx-2">/</span> 
        <span class="text-gray-800">{{ Str::limit($post->title, 40) }}</span>
    </div>

    <!-- Judul & Meta -->
    <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">{{ $post->title }}</h1>
    
    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-8 border-b border-gray-200 pb-6">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-law-primary text-white flex items-center justify-center font-bold">
                {{ substr($post->user->name, 0, 1) }}
            </div>
            <span class="font-semibold text-gray-800">{{ $post->user->name }}</span>
        </div>
        <span class="text-gray-300">|</span>
        <div class="flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <span>{{ $post->created_at->format('d F Y') }}</span>
        </div>
        <span class="text-gray-300">|</span>
        <span class="bg-law-accent/10 text-law-accent px-3 py-1 rounded-full font-semibold text-xs tracking-wide">
            {{ $post->category?->name ?? 'Uncategorized' }}
        </span>
    </div>

    <!-- Gambar Utama -->
    <div class="mb-12 rounded-xl overflow-hidden shadow-lg border border-gray-100">
        <img src="{{ $post->featured_image ? asset('storage/'.$post->featured_image) : 'https://images.unsplash.com/photo-1505664173691-a28156635951?auto=format&fit=crop&q=80&w=1200' }}" alt="{{ $post->title }}" class="w-full object-cover max-h-[500px]">
    </div>

    <!-- Konten Artikel -->
    <div class="prose prose-lg md:prose-xl max-w-none mb-12 text-gray-800 prose-a:text-law-accent prose-headings:text-law-primary">
        {!! $post->body !!}
    </div>

    <!-- Tags & Bagikan -->
    <div class="flex flex-col md:flex-row justify-between items-center border-t border-b border-gray-200 py-6 mb-12 gap-4 bg-gray-50 px-6 rounded-lg">
        <div class="flex flex-wrap gap-2 items-center">
            <span class="text-sm font-bold text-gray-500 mr-2">TAGS:</span>
            @foreach($post->tags as $tag)
                <a href="#" class="bg-white border border-gray-300 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold hover:bg-law-primary hover:text-white transition shadow-sm">#{{ $tag->name }}</a>
            @endforeach
        </div>
        <div class="flex items-center gap-3">
            <span class="font-bold text-sm text-gray-500">BAGIKAN:</span>
            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}" target="_blank" class="bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition shadow" title="Bagikan ke WhatsApp">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            </a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}" target="_blank" class="bg-blue-700 text-white p-2 rounded-full hover:bg-blue-800 transition shadow" title="Bagikan ke LinkedIn">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
            </a>
        </div>
    </div>

    <!-- Artikel Terkait -->
    @if($relatedPosts->count() > 0)
    <div class="mb-12 bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <h3 class="text-2xl font-bold text-law-primary mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-law-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L17.5 4.5"></path></svg>
            Artikel Terkait
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedPosts as $related)
                <div class="group cursor-pointer">
                    <div class="overflow-hidden rounded-lg mb-3 shadow">
                        <img src="{{ $related->featured_image ? asset('storage/'.$related->featured_image) : 'https://images.unsplash.com/photo-1589391886645-d51941baf7fb?auto=format&fit=crop&q=80&w=400' }}" alt="{{ $related->title }}" class="w-full h-32 object-cover transform group-hover:scale-105 transition duration-500">
                    </div>
                    <h4 class="font-bold text-sm mb-1 leading-snug group-hover:text-law-accent transition">
                        <a href="{{ route('posts.show', $related->slug) }}">{{ $related->title }}</a>
                    </h4>
                    <span class="text-xs text-gray-500">{{ $related->created_at->format('d M Y') }}</span>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
