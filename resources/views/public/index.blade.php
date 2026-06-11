@extends('layouts.public')
@section('title','WesterosGate — Panduan Universe Game of Thrones')

@section('content')
@php
$imgMap = [
  'House of the Dragon'            => asset('uploads/cover_hotd.jpg'),
  'A Knight of the Seven Kingdoms' => asset('uploads/cover_akotsk.jpg'),
  'Game of Thrones'                => asset('uploads/cover_got.jpg'),
  'Lore & Sejarah'                 => asset('uploads/cover_lore.jpg'),
  'Rumah & Silsilah'               => asset('uploads/cover_house.jpg'),
  'Karakter'                       => asset('uploads/cover_chars.jpg'),
  'Naga & Makhluk'                 => asset('uploads/cover_dragon.jpg'),
  'Buku & Novel'                   => asset('uploads/cover_buku.jpg'),
  'Teori & Spekulasi'              => asset('uploads/cover_teori.jpg'),
];
$artImgs = [
  asset('uploads/article_1.jpg'), asset('uploads/article_2.jpg'),
  asset('uploads/article_3.jpg'), asset('uploads/article_4.jpg'),
  asset('uploads/article_5.jpg'), asset('uploads/article_6.jpg'),
  asset('uploads/article_7.jpg'), asset('uploads/article_8.jpg'),
  asset('uploads/article_9.jpg'),
];
@endphp

{{-- HERO --}}
@if($featured && !$search && !$category)
<section class="hero">
  <div class="hero-wrap">
    <div>
      <div class="hero-img">
        <img src="{{ $featured->image ? $featured->image_url : ($imgMap[$featured->category] ?? $artImgs[0]) }}" alt="{{ $featured->title }}">
      </div>
      <div class="hero-cat">{{ $featured->category }}</div>
      <h1 class="hero-title"><a href="{{ route('article.show',$featured->slug) }}">{{ $featured->title }}</a></h1>
      <p class="hero-excerpt">{{ $featured->excerpt }}</p>
      <div class="hero-meta">
        <span class="avatar">{{ substr($featured->author,0,1) }}</span>
        <span style="font-weight:500;color:var(--text)">{{ $featured->author }}</span>
        <span class="sep">·</span>
        <span>{{ $featured->created_at->translatedFormat('d M Y') }}</span>
        <span class="sep">·</span>
        <span>{{ $featured->reading_time }}</span>
      </div>
      <a href="{{ route('article.show',$featured->slug) }}" class="btn">Baca Selengkapnya →</a>
    </div>

    <div class="hero-side">
      @foreach($trending->skip(1)->take(3) as $item)
      <a href="{{ route('article.show',$item->slug) }}" class="hero-side-item">
        <div class="side-cat">{{ $item->category }}</div>
        <div class="side-title">{{ $item->title }}</div>
        <div class="side-meta">{{ $item->author }} · {{ $item->created_at->diffForHumans() }}</div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- MAIN --}}
<div class="main">
  <div>
    @if($search || $category)
    <div class="filter-bar">
      <div>
        @if($category)<h2 class="filter-title">Kategori: <span>{{ $category }}</span></h2>@endif
        @if($search)<h2 class="filter-title">Hasil: <span>"{{ $search }}"</span></h2>@endif
        <div style="font-size:.75rem;color:var(--muted);margin-top:3px">{{ $articles->total() }} artikel</div>
      </div>
      <a href="{{ route('home') }}" class="clear-btn">✕ Hapus filter</a>
    </div>
    @else
    <div class="sec-label">Artikel Terbaru</div>
    @endif

    @if($articles->count())
    <div class="grid">
      @foreach($articles as $i => $article)
      @php
        $fallback = $imgMap[$article->category] ?? ($artImgs[$i % count($artImgs)]);
        $src = $article->image ? $article->image_url : $fallback;
      @endphp
      <article class="card">
        <a href="{{ route('article.show',$article->slug) }}" class="card-img">
          <img src="{{ $src }}" alt="{{ $article->title }}" loading="lazy">
          <span class="card-cat">{{ $article->category }}</span>
        </a>
        <div class="card-body">
          <h2 class="card-title"><a href="{{ route('article.show',$article->slug) }}">{{ $article->title }}</a></h2>
          <p class="card-exc">{{ $article->excerpt }}</p>
          <div class="card-meta">
            <span class="avatar sm">{{ substr($article->author,0,1) }}</span>
            <span class="name">{{ $article->author }}</span>
            <span class="sep">·</span>
            <span>{{ $article->created_at->diffForHumans() }}</span>
            <span class="sep">·</span>
            <span>{{ $article->reading_time }}</span>
          </div>
        </div>
      </article>
      @endforeach
    </div>
    <div class="pagination">{{ $articles->links('pagination') }}</div>
    @else
    <div class="empty">
      <div class="empty-icon">📜</div>
      <h3>Tidak ada artikel</h3>
      <p>Coba kata kunci lain atau pilih kategori berbeda.</p>
      <a href="{{ route('home') }}" class="btn">Kembali ke Beranda</a>
    </div>
    @endif
  </div>

  {{-- SIDEBAR --}}
  <aside class="sidebar">
    <div class="sb">
      <div class="sb-head">Trending</div>
      @foreach($trending->take(5) as $i => $item)
      <a href="{{ route('article.show',$item->slug) }}" class="tr-item">
        <span class="tr-num">{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }}</span>
        <div>
          <span class="tr-cat">{{ $item->category }}</span>
          <div class="tr-title">{{ $item->title }}</div>
        </div>
      </a>
      @endforeach
    </div>

    <div class="sb">
      <div class="sb-head">Kategori</div>
      <div class="tags">
        @foreach($categories as $cat)
        <a href="{{ route('home') }}?category={{ urlencode($cat) }}"
           class="tag {{ $category==$cat?'active':'' }}">{{ $cat }}</a>
        @endforeach
      </div>
    </div>

    <div class="sb">
      <div class="sb-head">Rumah Besar</div>
      @php $houses=[['⚔️','House Stark','Winter is Coming'],['🔥','House Targaryen','Fire and Blood'],['✦','House Lannister','Hear Me Roar'],['◆','House Baratheon','Ours is the Fury'],['⚓','House Greyjoy','We Do Not Sow']]; @endphp
      @foreach($houses as [$icon,$name,$motto])
      <a href="{{ route('home') }}?q={{ urlencode($name) }}" class="house-row">
        <span class="house-icon">{{ $icon }}</span>
        <div><div class="house-name">{{ $name }}</div><div class="house-motto">{{ $motto }}</div></div>
      </a>
      @endforeach
    </div>

    <div class="sb" style="padding:1rem">
      <div style="font-size:.82rem;font-style:italic;color:var(--text2);line-height:1.65">"Pembaca hidup seribu kehidupan sebelum ia mati."</div>
      <div style="font-size:.7rem;color:var(--amber);font-weight:600;margin-top:6px">— George R.R. Martin</div>
    </div>
  </aside>
</div>

@endsection
