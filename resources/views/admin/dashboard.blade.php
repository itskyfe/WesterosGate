@extends('layouts.admin')
@section('title','Dashboard')
@section('page-title','Dashboard')

@section('content')
<div class="stat-cards">
  <div class="stat-card stat-total">
    <div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
    <div><div class="stat-number">{{ $totalArticles }}</div><div class="stat-label">Total Artikel</div></div>
  </div>
  <div class="stat-card stat-published">
    <div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg></div>
    <div><div class="stat-number">{{ $published }}</div><div class="stat-label">Dipublikasikan</div></div>
  </div>
  <div class="stat-card stat-draft">
    <div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
    <div><div class="stat-number">{{ $draft }}</div><div class="stat-label">Draft</div></div>
  </div>
  <div class="stat-card stat-cat">
    <div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg></div>
    <div><div class="stat-number">{{ $categories->count() }}</div><div class="stat-label">Kategori</div></div>
  </div>
</div>

<div class="dash-grid">
  <div class="dash-block">
    <div class="dash-block-header">
      <h3>Artikel Terbaru</h3>
      <a href="{{ route('admin.articles.index') }}" class="btn-sm">Lihat Semua</a>
    </div>
    <table class="adm-table">
      <thead><tr><th>Judul</th><th>Kategori</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr></thead>
      <tbody>
        @foreach($recentArticles as $a)
        <tr>
          <td><div class="table-title">{{ Str::limit($a->title,52) }}</div></td>
          <td><span class="cat-pill">{{ $a->category }}</span></td>
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
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="dash-block">
    <div class="dash-block-header"><h3>Aksi Cepat</h3></div>
    <div class="quick-actions">
      <a href="{{ route('admin.articles.create') }}" class="quick-btn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Tulis Artikel Baru
      </a>
      <a href="{{ route('admin.articles.index') }}" class="quick-btn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        Semua Artikel
      </a>
      <a href="{{ route('home') }}" target="_blank" class="quick-btn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
        Buka Website
      </a>
    </div>
    <div class="dash-block-header" style="margin-top:.5rem"><h3>Sebaran Kategori</h3></div>
    <div class="cat-dist">
      @php
        $cc=\App\Models\Article::published()->selectRaw('category,count(*) as total')->groupBy('category')->orderByDesc('total')->get();
        $mx=$cc->max('total')?:1;
      @endphp
      @foreach($cc as $c)
      <div class="cat-dist-item">
        <div class="cat-dist-label"><span>{{ Str::limit($c->category,26) }}</span><span>{{ $c->total }}</span></div>
        <div class="cat-dist-bar"><div class="cat-dist-fill" style="width:{{ ($c->total/$mx)*100 }}%"></div></div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
