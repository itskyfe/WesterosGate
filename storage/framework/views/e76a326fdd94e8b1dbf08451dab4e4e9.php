<?php $__env->startSection('title','WesterosGate — Panduan Universe Game of Thrones'); ?>

<?php $__env->startSection('content'); ?>
<?php
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
?>


<?php if($featured && !$search && !$category): ?>
<section class="hero">
  <div class="hero-wrap">
    <div>
      <div class="hero-img">
        <img src="<?php echo e($featured->image ? $featured->image_url : ($imgMap[$featured->category] ?? $artImgs[0])); ?>" alt="<?php echo e($featured->title); ?>">
      </div>
      <div class="hero-cat"><?php echo e($featured->category); ?></div>
      <h1 class="hero-title"><a href="<?php echo e(route('article.show',$featured->slug)); ?>"><?php echo e($featured->title); ?></a></h1>
      <p class="hero-excerpt"><?php echo e($featured->excerpt); ?></p>
      <div class="hero-meta">
        <span class="avatar"><?php echo e(substr($featured->author,0,1)); ?></span>
        <span style="font-weight:500;color:var(--text)"><?php echo e($featured->author); ?></span>
        <span class="sep">·</span>
        <span><?php echo e($featured->created_at->translatedFormat('d M Y')); ?></span>
        <span class="sep">·</span>
        <span><?php echo e($featured->reading_time); ?></span>
      </div>
      <a href="<?php echo e(route('article.show',$featured->slug)); ?>" class="btn">Baca Selengkapnya →</a>
    </div>

    <div class="hero-side">
      <?php $__currentLoopData = $trending->skip(1)->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route('article.show',$item->slug)); ?>" class="hero-side-item">
        <div class="side-cat"><?php echo e($item->category); ?></div>
        <div class="side-title"><?php echo e($item->title); ?></div>
        <div class="side-meta"><?php echo e($item->author); ?> · <?php echo e($item->created_at->diffForHumans()); ?></div>
      </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>
<?php endif; ?>


<div class="main">
  <div>
    <?php if($search || $category): ?>
    <div class="filter-bar">
      <div>
        <?php if($category): ?><h2 class="filter-title">Kategori: <span><?php echo e($category); ?></span></h2><?php endif; ?>
        <?php if($search): ?><h2 class="filter-title">Hasil: <span>"<?php echo e($search); ?>"</span></h2><?php endif; ?>
        <div style="font-size:.75rem;color:var(--muted);margin-top:3px"><?php echo e($articles->total()); ?> artikel</div>
      </div>
      <a href="<?php echo e(route('home')); ?>" class="clear-btn">✕ Hapus filter</a>
    </div>
    <?php else: ?>
    <div class="sec-label">Artikel Terbaru</div>
    <?php endif; ?>

    <?php if($articles->count()): ?>
    <div class="grid">
      <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $fallback = $imgMap[$article->category] ?? ($artImgs[$i % count($artImgs)]);
        $src = $article->image ? $article->image_url : $fallback;
      ?>
      <article class="card">
        <a href="<?php echo e(route('article.show',$article->slug)); ?>" class="card-img">
          <img src="<?php echo e($src); ?>" alt="<?php echo e($article->title); ?>" loading="lazy">
          <span class="card-cat"><?php echo e($article->category); ?></span>
        </a>
        <div class="card-body">
          <h2 class="card-title"><a href="<?php echo e(route('article.show',$article->slug)); ?>"><?php echo e($article->title); ?></a></h2>
          <p class="card-exc"><?php echo e($article->excerpt); ?></p>
          <div class="card-meta">
            <span class="avatar sm"><?php echo e(substr($article->author,0,1)); ?></span>
            <span class="name"><?php echo e($article->author); ?></span>
            <span class="sep">·</span>
            <span><?php echo e($article->created_at->diffForHumans()); ?></span>
            <span class="sep">·</span>
            <span><?php echo e($article->reading_time); ?></span>
          </div>
        </div>
      </article>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="pagination"><?php echo e($articles->links('pagination')); ?></div>
    <?php else: ?>
    <div class="empty">
      <div class="empty-icon">📜</div>
      <h3>Tidak ada artikel</h3>
      <p>Coba kata kunci lain atau pilih kategori berbeda.</p>
      <a href="<?php echo e(route('home')); ?>" class="btn">Kembali ke Beranda</a>
    </div>
    <?php endif; ?>
  </div>

  
  <aside class="sidebar">
    <div class="sb">
      <div class="sb-head">Trending</div>
      <?php $__currentLoopData = $trending->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route('article.show',$item->slug)); ?>" class="tr-item">
        <span class="tr-num"><?php echo e(str_pad($i+1,2,'0',STR_PAD_LEFT)); ?></span>
        <div>
          <span class="tr-cat"><?php echo e($item->category); ?></span>
          <div class="tr-title"><?php echo e($item->title); ?></div>
        </div>
      </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="sb">
      <div class="sb-head">Kategori</div>
      <div class="tags">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('home')); ?>?category=<?php echo e(urlencode($cat)); ?>"
           class="tag <?php echo e($category==$cat?'active':''); ?>"><?php echo e($cat); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    <div class="sb">
      <div class="sb-head">Rumah Besar</div>
      <?php $houses=[['⚔️','House Stark','Winter is Coming'],['🔥','House Targaryen','Fire and Blood'],['✦','House Lannister','Hear Me Roar'],['◆','House Baratheon','Ours is the Fury'],['⚓','House Greyjoy','We Do Not Sow']]; ?>
      <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$icon,$name,$motto]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route('home')); ?>?q=<?php echo e(urlencode($name)); ?>" class="house-row">
        <span class="house-icon"><?php echo e($icon); ?></span>
        <div><div class="house-name"><?php echo e($name); ?></div><div class="house-motto"><?php echo e($motto); ?></div></div>
      </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="sb" style="padding:1rem">
      <div style="font-size:.82rem;font-style:italic;color:var(--text2);line-height:1.65">"Pembaca hidup seribu kehidupan sebelum ia mati."</div>
      <div style="font-size:.7rem;color:var(--amber);font-weight:600;margin-top:6px">— George R.R. Martin</div>
    </div>
  </aside>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\kipe\Documents\perkuliahan\Semester 4\PBW\westerosgate\resources\views/public/index.blade.php ENDPATH**/ ?>