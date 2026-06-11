<?php $__env->startSection('title',$article->title.' — WesterosGate'); ?>
<?php $__env->startSection('meta',$article->excerpt); ?>

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
$heroSrc = $article->image ? $article->image_url : ($imgMap[$article->category] ?? asset('uploads/cover_lore.jpg'));
?>

<div class="art-wrap">
  <div class="art-grid">
    <div>
      <nav class="breadcrumb">
        <a href="<?php echo e(route('home')); ?>">Beranda</a>
        <span class="bc-sep">/</span>
        <a href="<?php echo e(route('home')); ?>?category=<?php echo e(urlencode($article->category)); ?>"><?php echo e($article->category); ?></a>
        <span class="bc-sep">/</span>
        <span><?php echo e(Str::limit($article->title,45)); ?></span>
      </nav>

      <div class="art-cat"><?php echo e($article->category); ?></div>
      <h1 class="art-title"><?php echo e($article->title); ?></h1>
      <p class="art-excerpt"><?php echo e($article->excerpt); ?></p>

      <div class="art-meta-bar">
        <div style="display:flex;align-items:center;gap:.7rem">
          <span class="avatar lg"><?php echo e(substr($article->author,0,1)); ?></span>
          <div>
            <div class="meta-name"><?php echo e($article->author); ?></div>
            <div class="meta-info"><?php echo e($article->created_at->translatedFormat('d F Y')); ?> · <?php echo e($article->reading_time); ?></div>
          </div>
        </div>
        <button onclick="copyLink()" class="share-btn" id="shareBtn">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
          Salin tautan
        </button>
      </div>

      <div class="art-hero"><img src="<?php echo e($heroSrc); ?>" alt="<?php echo e($article->title); ?>"></div>

      <div class="art-body"><?php echo $article->body; ?></div>

      <div class="art-tags">
        <span>Tag:</span>
        <a href="<?php echo e(route('home')); ?>?category=<?php echo e(urlencode($article->category)); ?>" class="tag"><?php echo e($article->category); ?></a>
      </div>

      <div class="author-box">
        <span class="avatar xl"><?php echo e(substr($article->author,0,1)); ?></span>
        <div>
          <div class="author-label">Ditulis oleh</div>
          <div class="author-name"><?php echo e($article->author); ?></div>
          <div class="author-desc">Kontributor WesterosGate. Mengulas lore, karakter, dan cerita universe George R.R. Martin.</div>
        </div>
      </div>
    </div>

    <aside class="sidebar">
      <?php if($related->count()): ?>
      <div class="sb">
        <div class="sb-head">Artikel Terkait</div>
        <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $rs = $item->image ? $item->image_url : ($imgMap[$item->category] ?? asset('uploads/cover_lore.jpg')); ?>
        <a href="<?php echo e(route('article.show',$item->slug)); ?>" class="related-item">
          <div class="rel-thumb"><img src="<?php echo e($rs); ?>" alt="<?php echo e($item->title); ?>"></div>
          <div>
            <div style="font-size:.58rem;font-weight:700;letter-spacing:.8px;text-transform:uppercase;color:var(--amber);margin-bottom:2px"><?php echo e($item->category); ?></div>
            <div class="rel-title"><?php echo e(Str::limit($item->title,52)); ?></div>
            <div class="rel-date"><?php echo e($item->created_at->diffForHumans()); ?></div>
          </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php endif; ?>

      <div class="sb" style="padding:1rem">
        <div style="font-size:.82rem;font-style:italic;color:var(--text2);line-height:1.65">"Saat kamu bermain game of thrones, kamu menang atau kamu mati."</div>
        <div style="font-size:.7rem;color:var(--amber);font-weight:600;margin-top:6px">— Cersei Lannister</div>
      </div>

      <a href="<?php echo e(route('home')); ?>" class="btn btn-outline" style="width:100%;justify-content:center">← Kembali</a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\kipe\Downloads\westerosgate_simple\westerosgate\resources\views/public/show.blade.php ENDPATH**/ ?>