@extends('layouts.admin')
@section('title', 'Ubah Password')
@section('page-title', 'Ubah Password')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
  <form action="{{ route('admin.password.update') }}" method="POST">
    @csrf
    <div class="form-card">
      <div class="form-card-header">Formulir Ubah Password</div>
      <div class="form-card-body" style="display: flex; flex-direction: column; gap: 1.25rem;">
        
        <div class="form-group-f">
          <label class="form-label">Password Saat Ini <span class="required">*</span></label>
          <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Masukkan password saat ini" required>
          @error('current_password')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        <div class="form-group-f">
          <label class="form-label">Password Baru <span class="required">*</span></label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password baru (minimal 8 karakter)" required>
          @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        <div class="form-group-f">
          <label class="form-label">Konfirmasi Password Baru <span class="required">*</span></label>
          <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru" required>
        </div>

        <div class="form-actions" style="margin-top: 0.5rem; display: flex; gap: 0.5rem;">
          <button type="submit" class="btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/></svg>
            Simpan Perubahan
          </button>
          <a href="{{ route('admin.dashboard') }}" class="btn-ghost">Batal</a>
        </div>

      </div>
    </div>
  </form>
</div>
@endsection
