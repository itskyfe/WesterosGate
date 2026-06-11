@extends('layouts.admin')
@section('title','Kelola Artikel')
@section('page-title','Kelola Artikel')

@section('content')
<div class="toolbar">
  <form action="{{ route('admin.articles.index') }}" method="GET" class="search-form">
    <div class="search-input-wrap">
      <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <input type="text" name="q" value="{{ $search }}" placeholder="Cari judul, penulis, kategori...">
      @if($search)<a href="{{ route('admin.articles.index') }}" class="clear-search">✕</a>@endif
    </div>
    <button type="submit" class="btn-primary">Cari</button>
  </form>
  <a href="{{ route('admin.articles.create') }}" class="btn-primary">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Artikel Baru
  </a>
</div>

<div class="mini-stats">
  <span>Total <strong>{{ $total }}</strong></span>
  <span style="color:var(--border2)">·</span>
  <span>Publish <strong class="text-green">{{ $published }}</strong></span>
  <span style="color:var(--border2)">·</span>
  <span>Draft <strong class="text-orange">{{ $draft }}</strong></span>
  @if($search)<span style="color:var(--border2)">·</span><span>Hasil "{{ $search }}": <strong>{{ $articles->total() }}</strong></span>@endif
</div>

<div class="table-wrap">
  <table class="adm-table">
    <thead>
      <tr><th>#</th><th>Artikel</th><th>Kategori</th><th>Penulis</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      @forelse($articles as $a)
      <tr>
        <td class="text-muted">{{ $articles->firstItem() + $loop->index }}</td>
        <td>
          <div class="table-article">
            <div class="table-thumb"><img src="{{ $a->image_url }}" alt=""></div>
            <div>
              <div class="table-title">{{ Str::limit($a->title,55) }}</div>
              <div class="table-excerpt">{{ Str::limit($a->excerpt,65) }}</div>
            </div>
          </div>
        </td>
        <td><span class="cat-pill">{{ $a->category }}</span></td>
        <td class="text-muted">{{ $a->author }}</td>
        <td>
          @if($a->is_published)<span class="badge-published">● Publish</span>
          @else<span class="badge-draft">● Draft</span>@endif
        </td>
        <td class="text-muted">{{ $a->created_at->format('d/m/Y') }}</td>
        <td>
          <div class="table-actions">
            <a href="{{ route('article.show',$a->slug) }}" target="_blank" class="act-btn act-view" title="Lihat">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </a>
            <a href="{{ route('admin.articles.edit',$a) }}" class="act-btn act-edit" title="Edit">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </a>
            <form action="{{ route('admin.articles.destroy',$a) }}" method="POST"
                  onsubmit="return confirm('Hapus artikel ini?')">
              @csrf @method('DELETE')
              <button type="submit" class="act-btn act-delete" title="Hapus">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr><td colspan="7">
        <div class="empty-table">
          <div class="empty-icon">📋</div>
          <p>Belum ada artikel.@if($search) Coba kata kunci lain.@endif</p>
          <a href="{{ route('admin.articles.create') }}" class="btn-primary">Buat Artikel Pertama</a>
        </div>
      </td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="pagination-wrap">{{ $articles->links('pagination') }}</div>
@endsection
