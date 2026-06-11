<?php $__env->startSection('title','Artikel Baru'); ?>
<?php $__env->startSection('page-title','Artikel Baru'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('admin.articles.store')); ?>" method="POST" enctype="multipart/form-data" id="aForm">
<?php echo csrf_field(); ?>
<div class="form-layout">
  <div class="form-main">
    <div class="form-group-f">
      <label class="form-label">Judul <span class="required">*</span></label>
      <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
             value="<?php echo e(old('title')); ?>" placeholder="Judul artikel..." required>
      <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group-f">
      <label class="form-label">Ringkasan <span class="required">*</span></label>
      <textarea name="excerpt" rows="3" class="form-control <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                placeholder="Deskripsi singkat..." required><?php echo e(old('excerpt')); ?></textarea>
      <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
      <div id="editor" class="editor-area" contenteditable="true"><?php echo old('body'); ?></div>
      <textarea name="body" id="bHidden" style="display:none"><?php echo e(old('body')); ?></textarea>
      <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
  </div>

  <aside class="form-sidebar">
    <div class="form-card">
      <div class="form-card-header">Publikasi</div>
      <div class="form-card-body">
        <label class="toggle-label">
          <input type="checkbox" name="is_published" id="isPub" <?php echo e(old('is_published',true)?'checked':''); ?>>
          <span class="toggle-switch"></span>
          <span id="pubLbl">Publish sekarang</span>
        </label>
        <div class="form-actions">
          <a href="<?php echo e(route('admin.articles.index')); ?>" class="btn-ghost">Batal</a>
          <button type="submit" class="btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/></svg>
            Simpan
          </button>
        </div>
      </div>
    </div>

    <div class="form-card">
      <div class="form-card-header">Kategori <span class="required">*</span></div>
      <div class="form-card-body">
        <select name="category" class="form-control <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
          <option value="">— Pilih —</option>
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($c); ?>" <?php echo e(old('category')==$c?'selected':''); ?>><?php echo e($c); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>

    <div class="form-card">
      <div class="form-card-header">Penulis <span class="required">*</span></div>
      <div class="form-card-body">
        <input type="text" name="author" class="form-control <?php $__errorArgs = ['author'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               value="<?php echo e(old('author', Auth::guard('admin')->user()->name)); ?>" required>
        <?php $__errorArgs = ['author'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>

    <div class="form-card">
      <div class="form-card-header">Gambar</div>
      <div class="form-card-body">
        <div class="image-upload-area" onclick="document.getElementById('imgIn').click()">
          <div class="image-placeholder" id="imgPh">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            <p>Klik untuk upload</p>
            <small>JPG, PNG — maks. 2MB</small>
          </div>
          <img id="imgPrev" src="" alt="" style="display:none;width:100%;border-radius:5px">
        </div>
        <input type="file" name="image" id="imgIn" accept="image/*" style="display:none" onchange="prevImg(this)">
        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>
  </aside>
</div>
</form>

<script>
const ed=document.getElementById('editor'),bh=document.getElementById('bHidden');
ed.addEventListener('input',()=>{bh.value=ed.innerHTML});
function fmt(c){document.execCommand(c,false,null);ed.focus();bh.value=ed.innerHTML}
function fmtBlock(t){document.execCommand('formatBlock',false,t);bh.value=ed.innerHTML}
function prevImg(i){if(!i.files[0])return;const r=new FileReader();r.onload=e=>{document.getElementById('imgPh').style.display='none';const p=document.getElementById('imgPrev');p.src=e.target.result;p.style.display='block'};r.readAsDataURL(i.files[0])}
document.getElementById('isPub').addEventListener('change',function(){document.getElementById('pubLbl').textContent=this.checked?'Publish sekarang':'Simpan sebagai draft'});
document.getElementById('aForm').addEventListener('submit',()=>{bh.value=ed.innerHTML});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\kipe\Documents\perkuliahan\Semester 4\PBW\westerosgate\resources\views/admin/articles/create.blade.php ENDPATH**/ ?>