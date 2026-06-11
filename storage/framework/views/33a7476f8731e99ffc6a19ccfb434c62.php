<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Masuk — WesterosGate Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
</head>
<body class="login-body">
<div class="login-box">
  <div class="login-left">
    <div class="login-logo">Westeros<span>Gate</span></div>
    <h2>Panel Admin</h2>
    <p>Kelola artikel dan konten fandom universe Game of Thrones.</p>
    <div class="login-stats">
      <div class="lstat"><span>9</span><small>Kategori</small></div>
      <div class="lstat"><span>9+</span><small>Artikel</small></div>
    </div>
  </div>
  <div class="login-right">
    <h1>Masuk</h1>
    <p>Akses panel admin WesterosGate</p>

    <?php if($errors->any()): ?>
    <div class="flash flash-error" style="border-radius:6px;margin-bottom:1rem">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
      <?php echo e($errors->first()); ?>

    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.login.post')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="admin@westerosgate.id" required autofocus>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <div class="form-check">
        <input type="checkbox" name="remember" id="rem">
        <label for="rem">Ingat saya</label>
      </div>
      <button type="submit" class="btn-login">Masuk</button>
    </form>

    <div class="login-hint" style="margin-top:1rem">
      Demo: <code>admin@westerosgate.id</code> / <code>password123</code>
    </div>
  </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\kipe\Downloads\westerosgate_simple\westerosgate\resources\views/admin/login.blade.php ENDPATH**/ ?>