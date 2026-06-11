<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $__env->yieldContent('title','WesterosGate — Panduan Universe Game of Thrones'); ?></title>
<meta name="description" content="<?php echo $__env->yieldContent('meta','Portal fandom terlengkap untuk universe Game of Thrones, House of the Dragon, A Knight of the Seven Kingdoms, dan karya George R.R. Martin.'); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;1,400&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('css/public.css')); ?>">
</head>
<body>

<nav class="nav">
  <div class="nav-wrap">
    <a href="<?php echo e(route('home')); ?>" class="nav-brand">Westeros<span>Gate</span></a>
    <ul class="nav-links">
      <li><a href="<?php echo e(route('home')); ?>?category=House+of+the+Dragon">House of the Dragon</a></li>
      <li><a href="<?php echo e(route('home')); ?>?category=A+Knight+of+the+Seven+Kingdoms">A Knight of 7K</a></li>
      <li><a href="<?php echo e(route('home')); ?>?category=Game+of+Thrones">Game of Thrones</a></li>
      <li><a href="<?php echo e(route('home')); ?>?category=Lore+%26+Sejarah">Lore</a></li>
      <li><a href="<?php echo e(route('home')); ?>?category=Naga+%26+Makhluk">Naga</a></li>
      <li><a href="<?php echo e(route('home')); ?>?category=Teori+%26+Spekulasi">Teori</a></li>
    </ul>
    <form class="nav-search" action="<?php echo e(route('home')); ?>" method="GET">
      <input type="text" name="q" placeholder="Cari lore, karakter..." value="<?php echo e(request('q')); ?>" autocomplete="off">
      <button type="submit">Cari</button>
    </form>
  </div>
</nav>

<div class="ticker">
  <div class="ticker-tag">Terbaru</div>
  <div class="ticker-scroll">
    <span>House of the Dragon Season 2 — panduan naga & penunggang lengkap &nbsp;·&nbsp; Ser Duncan the Tall: asal usul dan hubungannya dengan Baratheon &nbsp;·&nbsp; GRRM update: The Winds of Winter masih dalam proses penulisan &nbsp;·&nbsp; Teori R+L=J dan implikasi lengkapnya dalam lore buku &nbsp;·&nbsp; Doom of Valyria: semua teori yang ada sampai sekarang &nbsp;·&nbsp;</span>
    <span>House of the Dragon Season 2 — panduan naga & penunggang lengkap &nbsp;·&nbsp; Ser Duncan the Tall: asal usul dan hubungannya dengan Baratheon &nbsp;·&nbsp; GRRM update: The Winds of Winter masih dalam proses penulisan &nbsp;·&nbsp;</span>
  </div>
</div>

<main><?php echo $__env->yieldContent('content'); ?></main>

<footer>
  <div class="foot-wrap">
    <div>
      <div class="foot-brand">Westeros<span>Gate</span></div>
      <p class="foot-desc">Panduan fandom terlengkap universe George R.R. Martin — Game of Thrones, House of the Dragon, A Knight of the Seven Kingdoms, lore, dan karakter.</p>
    </div>
    <div>
      <div class="foot-h">Series</div>
      <ul class="foot-links">
        <li><a href="<?php echo e(route('home')); ?>?category=Game+of+Thrones">Game of Thrones</a></li>
        <li><a href="<?php echo e(route('home')); ?>?category=House+of+the+Dragon">House of the Dragon</a></li>
        <li><a href="<?php echo e(route('home')); ?>?category=A+Knight+of+the+Seven+Kingdoms">A Knight of 7K</a></li>
        <li><a href="<?php echo e(route('home')); ?>?category=Buku+%26+Novel">Buku & Novel</a></li>
      </ul>
    </div>
    <div>
      <div class="foot-h">Topik</div>
      <ul class="foot-links">
        <li><a href="<?php echo e(route('home')); ?>?category=Lore+%26+Sejarah">Lore & Sejarah</a></li>
        <li><a href="<?php echo e(route('home')); ?>?category=Naga+%26+Makhluk">Naga & Makhluk</a></li>
        <li><a href="<?php echo e(route('home')); ?>?category=Rumah+%26+Silsilah">Rumah & Silsilah</a></li>
        <li><a href="<?php echo e(route('home')); ?>?category=Teori+%26+Spekulasi">Teori & Spekulasi</a></li>
        <li><a href="<?php echo e(route('admin.login')); ?>">Admin</a></li>
      </ul>
    </div>
  </div>
  <div class="foot-bottom">© <?php echo e(date('Y')); ?> WesterosGate · Komunitas Fandom · Tidak berafiliasi dengan HBO atau George R.R. Martin</div>
</footer>

<script src="<?php echo e(asset('js/public.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\kipe\Downloads\westerosgate_simple\westerosgate\resources\views/layouts/public.blade.php ENDPATH**/ ?>