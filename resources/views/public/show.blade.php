@extends('layouts.public')
@section('title',$article->title.' — WesterosGate')
@section('meta',$article->excerpt)

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
$heroSrc = $article->image ? $article->image_url : ($imgMap[$article->category] ?? asset('uploads/cover_lore.jpg'));
@endphp

<div class="art-wrap">
  <div class="art-grid">
    <div>
      <nav class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <span class="bc-sep">/</span>
        <a href="{{ route('home') }}?category={{ urlencode($article->category) }}">{{ $article->category }}</a>
        <span class="bc-sep">/</span>
        <span>{{ Str::limit($article->title,45) }}</span>
      </nav>

      <div class="art-cat">{{ $article->category }}</div>
      <h1 class="art-title">{{ $article->title }}</h1>
      <p class="art-excerpt">{{ $article->excerpt }}</p>

      <div class="art-meta-bar">
        <div style="display:flex;align-items:center;gap:.7rem">
          <span class="avatar lg">{{ substr($article->author,0,1) }}</span>
          <div>
            <div class="meta-name">{{ $article->author }}</div>
            <div class="meta-info">{{ $article->created_at->translatedFormat('d F Y') }} · {{ $article->reading_time }}</div>
          </div>
        </div>
        <button onclick="copyLink()" class="share-btn" id="shareBtn">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
          Salin tautan
        </button>
      </div>

      <div class="art-hero"><img src="{{ $heroSrc }}" alt="{{ $article->title }}"></div>

      <div class="art-body">{!! $article->body !!}</div>

      <div class="art-tags">
        <span>Tag:</span>
        <a href="{{ route('home') }}?category={{ urlencode($article->category) }}" class="tag">{{ $article->category }}</a>
      </div>

      <div class="author-box">
        <span class="avatar xl">{{ substr($article->author,0,1) }}</span>
        <div>
          <div class="author-label">Ditulis oleh</div>
          <div class="author-name">{{ $article->author }}</div>
          <div class="author-desc">Kontributor WesterosGate. Mengulas lore, karakter, dan cerita universe George R.R. Martin.</div>
        </div>
      </div>
    </div>

    <aside class="sidebar">
      @if($related->count())
      <div class="sb">
        <div class="sb-head">Artikel Terkait</div>
        @foreach($related as $item)
        @php $rs = $item->image ? $item->image_url : ($imgMap[$item->category] ?? asset('uploads/cover_lore.jpg')); @endphp
        <a href="{{ route('article.show',$item->slug) }}" class="related-item">
          <div class="rel-thumb"><img src="{{ $rs }}" alt="{{ $item->title }}"></div>
          <div>
            <div style="font-size:.58rem;font-weight:700;letter-spacing:.8px;text-transform:uppercase;color:var(--amber);margin-bottom:2px">{{ $item->category }}</div>
            <div class="rel-title">{{ Str::limit($item->title,52) }}</div>
            <div class="rel-date">{{ $item->created_at->diffForHumans() }}</div>
          </div>
        </a>
        @endforeach
      </div>
      @endif

      <div class="sb" style="padding:1rem">
        <div style="font-size:.82rem;font-style:italic;color:var(--text2);line-height:1.65">"Saat kamu bermain game of thrones, kamu menang atau kamu mati."</div>
        <div style="font-size:.7rem;color:var(--amber);font-weight:600;margin-top:6px">— Cersei Lannister</div>
      </div>

      <a href="{{ route('home') }}" class="btn btn-outline" style="width:100%;justify-content:center">← Kembali</a>
    </aside>
  </div>
</div>

<script>
function copyLink(){
  navigator.clipboard.writeText(window.location.href).then(()=>{
    const b=document.getElementById('shareBtn');
    const o=b.innerHTML;
    b.textContent='✓ Tersalin!';
    setTimeout(()=>{b.innerHTML=o},2000);
  });
}
</script>
@endsection
