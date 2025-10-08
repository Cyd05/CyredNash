<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .error { color: #e11d48; }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-50">

  <div class="w-full max-w-sm bg-white/80 backdrop-blur-md rounded-2xl shadow-lg p-8 border border-blue-100">
    <h1 class="text-2xl font-bold text-center text-blue-700 mb-6">Sign In</h1>

    <?php if (isset($error)): ?>
      <p class="error text-center mb-4 text-sm"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="<?= site_url('login') ?>" class="space-y-5">
      <div>
        <label for="username" class="block text-gray-700 mb-1 font-medium">Username or Email</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          required
          placeholder="Enter your username or email"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300"
        />
      </div>

      <div>
        <label for="password" class="block text-gray-700 mb-1 font-medium">Password</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          required
          placeholder="Enter your password"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300"
        />
      </div>

      <button 
        type="submit" 
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition"
      >
        Login
      </button>
    </form>

    <p class="text-center mt-6 text-gray-600 text-sm">
      Don’t have an account?
      <a href="<?= site_url('register') ?>" class="text-blue-700 hover:underline font-semibold">Register</a>
    </p>
  </div>

</body>
</html>
