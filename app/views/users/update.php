<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen flex items-center justify-center font-sans bg-gradient-to-br from-amber-50 to-orange-50 px-4 py-12">

  <!-- Main Card -->
  <div class="bg-white border border-amber-200 shadow-lg rounded-2xl px-8 py-10 w-full max-w-xl">

    <!-- Header -->
    <div class="flex flex-col items-center mb-8">
      <div class="mx-auto w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-4">
        <i class="fas fa-user-edit text-amber-600 text-2xl"></i>
      </div>
      <h2 class="text-3xl font-bold text-amber-600 text-center">Update Record</h2>
      <p class="text-gray-600 mt-2 text-center text-sm">Edit your information below</p>
    </div>

    <!-- Form -->
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-6">
      
      <!-- First Name -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
        <input type="text" name="first_name" value="<?= html_escape($user['first_name'])?>" required 
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors" 
               placeholder="Enter first name">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
        <input type="text" name="last_name" value="<?= html_escape($user['last_name'])?>" required 
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors" 
               placeholder="Enter last name">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required 
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors" 
               placeholder="Enter email address">
      </div>

      <!-- Button -->
      <button type="submit" class="w-full bg-amber-600 hover:bg-amber-700 text-white font-semibold py-3 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
        <span class="inline-flex items-center justify-center gap-2">
          <i class="fas fa-check"></i>
          Update
        </span>
      </button>
    </form>
  </div>
</body>
</html>