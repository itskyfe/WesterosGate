@extends('layouts.admin')
@section('title','Edit Artikel')
@section('page-title','Edit Artikel')

@section('content')
<form action="{{ route('admin.articles.update',$article) }}" method="POST" enctype="multipart/form-data" id="aForm">
@csrf @method('PUT')
<div class="form-layout">
  <div class="form-main">
    <div class="form-group-f">
      <label class="form-label">Judul <span class="required">*</span></label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
             value="{{ old('title',$article->title) }}" required>
      @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>
    <div class="form-group-f">
      <label class="form-label">Ringkasan <span class="required">*</span></label>
      <textarea name="excerpt" rows="3" class="form-control @error('excerpt') is-invalid @enderror"
                required>{{ old('excerpt',$article->excerpt) }}</textarea>
      @error('excerpt')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>
    <div class="form-group-f">
      <label class="form-label">Isi Artikel <span class="required">*</span></label>
      <div class="editor-toolbar">
        <button type="button" onclick="fmt('bold')"><b>B</b></button>
        <button type="button" onclick="fmt('italic')"><i>I</i></button>
        <button type="button" onclick="fmt('underline')"><u>U</u></button>
        <span class="tb-sep"></span>
        <button type="button" onclick="fmtBlock('h3')">H3</button>
        <button type="button" onclick="fmt('insertUnorderedList')">• List</button>
        <button type="button" onclick="fmt('insertOrderedList')">1. List</button>
        <span class="tb-sep"></span>
        <button type="button" onclick="fmt('insertHorizontalRule')">— HR</button>
      </div>
      <div id="editor" class="editor-area" contenteditable="true">{!! old('body',$article->body) !!}</div>
      <textarea name="body" id="bHidden" style="display:none">{{ old('body',$article->body) }}</textarea>
      @error('body')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>
  </div>

  <aside class="form-sidebar">
    <div class="form-card">
      <div class="form-card-header">Publikasi</div>
      <div class="form-card-body">
        <label class="toggle-label">
          <input type="checkbox" name="is_published" id="isPub"
                 {{ old('is_published',$article->is_published)?'checked':'' }}>
          <span class="toggle-switch"></span>
          <span id="pubLbl">{{ $article->is_published?'Dipublikasikan':'Draft' }}</span>
        </label>
        <div class="form-actions">
          <a href="{{ route('admin.articles.index') }}" class="btn-ghost">Batal</a>
          <button type="submit" class="btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/></svg>
            Update
          </button>
        </div>
      </div>
    </div>

    <div class="form-card">
      <div class="form-card-header">Kategori <span class="required">*</span></div>
      <div class="form-card-body">
        <select name="category" class="form-control @error('category') is-invalid @enderror" required>
          <option value="">— Pilih —</option>
          @foreach($categories as $c)
          <option value="{{ $c }}" {{ old('category',$article->category)==$c?'selected':'' }}>{{ $c }}</option>
          @endforeach
        </select>
        @error('category')<span class="invalid-feedback">{{ $message }}</span>@enderror
      </div>
    </div>

    <div class="form-card">
      <div class="form-card-header">Penulis <span class="required">*</span></div>
      <div class="form-card-body">
        <input type="text" name="author" class="form-control @error('author') is-invalid @enderror"
               value="{{ old('author',$article->author) }}" required>
        @error('author')<span class="invalid-feedback">{{ $message }}</span>@enderror
      </div>
    </div>

    <div class="form-card">
      <div class="form-card-header">Gambar</div>
      <div class="form-card-body">
        <div class="image-upload-area" onclick="document.getElementById('imgIn').click()">
          <div class="image-placeholder" id="imgPh" style="{{ $article->image ? 'display:none' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            <p>Klik untuk upload</p>
            <small>JPG, PNG — maks. 2MB</small>
          </div>
          <img id="imgPrev" src="{{ $article->image ? $article->image_url : '' }}" alt="" style="{{ $article->image ? 'display:block;' : 'display:none;' }}width:100%;border-radius:5px">
          @if($article->image)
            <div class="current-image-label" id="imgLbl" style="text-align:center;font-size:0.85rem;color:var(--text-muted);margin-top:0.5rem">Klik gambar untuk mengganti</div>
          @endif
        </div>
        <input type="file" name="image" id="imgIn" accept="image/*" style="display:none" onchange="prevImg(this)">
        @error('image')<span class="invalid-feedback">{{ $message }}</span>@enderror
      </div>
    </div>

  </aside>
</div>
</form>

<div style="max-width:320px;margin-left:auto;margin-top:1rem">
  <div class="form-card danger-card">
    <div class="form-card-header">Hapus Artikel</div>
    <div class="form-card-body">
      <form action="{{ route('admin.articles.destroy',$article) }}" method="POST"
            onsubmit="return confirm('Hapus artikel ini? Tidak bisa dibatalkan.')">
        @csrf @method('DELETE')
        <button type="submit" class="btn-danger">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
          Hapus Artikel
        </button>
      </form>
    </div>
  </div>
</div>

<script>
const ed=document.getElementById('editor'),bh=document.getElementById('bHidden');
ed.addEventListener('input',()=>{bh.value=ed.innerHTML});
function fmt(c){document.execCommand(c,false,null);ed.focus();bh.value=ed.innerHTML}
function fmtBlock(t){document.execCommand('formatBlock',false,t);bh.value=ed.innerHTML}
function prevImg(i){if(!i.files[0])return;const r=new FileReader();r.onload=e=>{document.getElementById('imgPh').style.display='none';const p=document.getElementById('imgPrev');p.src=e.target.result;p.style.display='block';const lbl=document.getElementById('imgLbl');if(lbl)lbl.textContent='Gambar baru terpilih (Klik untuk ganti)'};r.readAsDataURL(i.files[0])}
document.getElementById('isPub').addEventListener('change',function(){document.getElementById('pubLbl').textContent=this.checked?'Dipublikasikan':'Draft'});
document.getElementById('aForm').addEventListener('submit',()=>{bh.value=ed.innerHTML});
</script>
@endsection
