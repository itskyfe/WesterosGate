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
        <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email" required autofocus>
      </div>
      <div class="form-group">
        <label>Password</label>
        <div class="password-input-wrapper" style="position: relative;">
          <input type="password" name="password" id="password" placeholder="Password" required style="padding-right: 2.8rem;">
          <button type="button" id="toggle-password" style="position: absolute; right: 0.65rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--muted); display: flex; align-items: center; justify-content: center; padding: 0.25rem;">
            <svg id="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px;">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
      </div>
      <div class="form-check">
        <input type="checkbox" name="remember" id="rem">
        <label for="rem">Ingat saya</label>
      </div>
      <button type="submit" class="btn-login">Masuk</button>
    </form>
  </div>
</div>

<script>
document.getElementById('toggle-password').addEventListener('click', function() {
  const passwordInput = document.getElementById('password');
  const eyeIcon = document.getElementById('eye-icon');
  
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    // Change eye icon to eye-off (crossed eye)
    eyeIcon.innerHTML = `
      <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
      <line x1="1" y1="1" x2="23" y2="23"/>
    `;
  } else {
    passwordInput.type = 'password';
    // Change back to regular eye icon
    eyeIcon.innerHTML = `
      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
      <circle cx="12" cy="12" r="3"/>
    `;
  }
});
</script>
</body>
</html>
<?php /**PATH C:\Users\kipe\Documents\perkuliahan\Semester 4\PBW\westerosgate\resources\views/admin/login.blade.php ENDPATH**/ ?>