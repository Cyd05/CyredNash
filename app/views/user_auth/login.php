<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="<?=base_url();?>public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .password-toggle {
      cursor: pointer;
      user-select: none;
    }
  </style>
</head>

<body class="min-h-screen font-sans bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center px-4 py-12">

  <!-- Main Content -->
  <div class="bg-white border border-amber-200 shadow-lg rounded-2xl p-8 w-full max-w-md">

    <!-- Header -->
    <div class="text-center mb-6">
      <div class="mx-auto w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-4">
        <i class="fas fa-sign-in-alt text-amber-600 text-2xl"></i>
      </div>
      <h1 class="text-3xl font-bold text-amber-600">Login</h1>
      <p class="text-gray-600 text-sm mt-1">Sign in to your account</p>
    </div>

    <?php if (isset($error)): ?>
      <p class="text-red-500 text-center mb-4 text-sm bg-red-50 border border-red-200 rounded-lg p-3"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="<?= site_url('login') ?>" class="space-y-6">
      <div>
        <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">Username or Email</label>
        <div class="relative">
          <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-amber-400"></i>
          <input type="text" id="username" name="username" required
                 class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors" 
                 placeholder="Enter username or email" />
        </div>
      </div>

      <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
        <div class="relative">
          <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-amber-400"></i>
          <input type="password" id="password" name="password" required
                 class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors" 
                 placeholder="Enter password" />
          <span class="password-toggle absolute right-3 top-1/2 transform -translate-y-1/2 text-amber-400 hover:text-amber-500" onclick="togglePassword()">
            <i class="fas fa-eye" id="toggleIcon"></i>
          </span>
        </div>
      </div>

      <button type="submit" class="w-full bg-amber-600 hover:bg-amber-700 text-white font-semibold py-3 rounded-lg shadow transition duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
        <i class="fas fa-sign-in-alt mr-2"></i>
        Login
      </button>
    </form>

    <p class="text-center mt-6 text-sm text-gray-600">Don't have an account? 
      <a href="<?= site_url('register') ?>" class="text-amber-600 hover:text-amber-800 font-semibold transition-colors">Register here</a>
    </p>

  </div>

  <script>
    function togglePassword() {
      var pwd = document.getElementById('password');
      var icon = document.getElementById('toggleIcon');
      if (pwd.type === 'password') {
        pwd.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        pwd.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }
  </script>

</body>
</html>