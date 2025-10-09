<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-amber-50 to-orange-50 py-12 px-4">
  <div class="max-w-md w-full space-y-8">
    <!-- Header -->
    <div class="text-center">
      <div class="mx-auto w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-4">
        <i class="fas fa-user-plus text-amber-600 text-2xl"></i>
      </div>
      <h2 class="text-3xl font-bold text-gray-900">Create User</h2>
      <p class="mt-2 text-sm text-gray-600">Add a new user with essential details</p>
    </div>

    <!-- Form -->
    <form action="<?=site_url('users/create')?>" method="POST" class="bg-white rounded-xl shadow-sm border border-amber-200 p-8 space-y-6">
      <!-- First Name -->
      <div>
        <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
        <input type="text" name="first_name" id="first_name" required 
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors" 
               placeholder="Enter first name">
      </div>

      <!-- Last Name -->
      <div>
        <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
        <input type="text" name="last_name" id="last_name" required 
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors" 
               placeholder="Enter last name">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
        <input type="email" name="email" id="email" required 
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors" 
               placeholder="Enter email address">
      </div>

      <!-- Submit Button -->
      <button type="submit" 
              class="w-full bg-amber-600 hover:bg-amber-700 text-white font-semibold py-3 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
        Create User
      </button>
    </form>
  </div>
</body>
</html>