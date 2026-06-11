<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $__env->yieldContent('title','Admin'); ?> — WesterosGate</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
</head>
<body class="admin-body">

<aside class="adm-sidebar" id="sidebar">
  <div class="adm-sidebar-top">
    <div class="adm-logo">W<span class="logo-mag">G</span> <span class="adm-label">Admin</span></div>
  </div>
  <nav class="adm-nav">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="adm-nav-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
      <span class="sidebar-text">Dashboard</span>
    </a>
    <a href="<?php echo e(route('admin.articles.index')); ?>" class="adm-nav-item <?php echo e(request()->routeIs('admin.articles.index') ? 'active' : ''); ?>">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/></svg>
      <span class="sidebar-text">Kelola Artikel</span>
    </a>
    <a href="<?php echo e(route('admin.articles.create')); ?>" class="adm-nav-item <?php echo e(request()->routeIs('admin.articles.create') ? 'active' : ''); ?>">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      <span class="sidebar-text">Artikel Baru</span>
    </a>
    <div class="adm-nav-divider"></div>
    <a href="<?php echo e(route('home')); ?>" target="_blank" class="adm-nav-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
      <span class="sidebar-text">Lihat Website</span>
    </a>
    <form action="<?php echo e(route('admin.logout')); ?>" method="POST" style="margin-top:auto">
      <?php echo csrf_field(); ?>
      <button type="submit" class="adm-nav-item logout-btn" style="width:100%">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        <span class="sidebar-text">Keluar</span>
      </button>
    </form>
  </nav>
  <div class="adm-user-badge">
    <div class="adm-avatar"><?php echo e(substr(Auth::guard('admin')->user()->name, 0, 1)); ?></div>
    <div style="min-width:0" class="adm-user-info">
      <div class="adm-uname"><?php echo e(Auth::guard('admin')->user()->name); ?></div>
      <div class="adm-uemail"><?php echo e(Auth::guard('admin')->user()->email); ?></div>
    </div>
  </div>
</aside>

<div class="adm-main" id="adm-main">
  <header class="adm-topbar">
    <button class="sidebar-toggle" onclick="toggleSidebar()">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
    </button>
    <h1 class="adm-page-title"><?php echo $__env->yieldContent('page-title','Dashboard'); ?></h1>
    <span class="adm-topbar-date"><?php echo e(now()->translatedFormat('d F Y')); ?></span>
  </header>

  <?php if(session('success')): ?>
  <div class="flash flash-success">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
    <?php echo e(session('success')); ?>

    <button onclick="this.parentElement.remove()">✕</button>
  </div>
  <?php endif; ?>
  <?php if($errors->any()): ?>
  <div class="flash flash-error">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/></svg>
    <div style="flex-grow:1">
      <strong style="display:block;margin-bottom:0.25rem">Terjadi kesalahan input:</strong>
      <ul style="margin:0;padding-left:1.25rem;font-size:0.9rem">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    <button onclick="this.parentElement.remove()">✕</button>
  </div>
  <?php endif; ?>

  <?php if(session('error')): ?>
  <div class="flash flash-error">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/></svg>
    <?php echo e(session('error')); ?>

    <button onclick="this.parentElement.remove()">✕</button>
  </div>
  <?php endif; ?>

  <div class="adm-content"><?php echo $__env->yieldContent('content'); ?></div>
</div>

<script>
function toggleSidebar(){
  const sb=document.getElementById('sidebar');
  const mn=document.getElementById('adm-main');
  const c=sb.classList.toggle('collapsed');
  mn.style.marginLeft=c?'54px':'var(--sidebar-w)';
  localStorage.setItem('wg-sb',c?'1':'0');
}
document.addEventListener('DOMContentLoaded',()=>{
  if(localStorage.getItem('wg-sb')==='1'){
    document.getElementById('sidebar').classList.add('collapsed');
    document.getElementById('adm-main').style.marginLeft='54px';
  }
  setTimeout(()=>{
    document.querySelectorAll('.flash').forEach(el=>{
      el.style.transition='opacity .3s';el.style.opacity='0';
      setTimeout(()=>el.remove(),300);
    });
  },4000);
});
</script>
</body>
</html>
<?php /**PATH C:\Users\kipe\Documents\perkuliahan\Semester 4\PBW\westerosgate\resources\views/layouts/admin.blade.php ENDPATH**/ ?>