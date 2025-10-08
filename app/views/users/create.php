<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-50 flex flex-col">

  <!-- Top Navbar -->
  <header class="bg-white/80 backdrop-blur-md shadow-sm fixed top-0 left-0 w-full z-10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-700">Student Management</h1>
      <nav class="flex gap-6">
        <a href="<?=site_url('users/index')?>" class="hover:text-blue-600 font-medium">List</a>
        <a href="<?=site_url('users/create')?>" class="hover:text-blue-600 font-medium">Add Student</a>
        <a href="<?=site_url('login')?>" class="hover:text-blue-600 font-medium">Logout</a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-1 flex items-center justify-center px-4 pt-28 pb-10">
    <div class="w-full max-w-md bg-white/80 backdrop-blur-md rounded-2xl shadow-lg p-8 border border-blue-100">
      <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Create New Student</h2>

      <form action="<?=site_url('users/create')?>" method="POST" class="space-y-5">
        <div>
          <label for="first_name" class="block text-gray-700 mb-1 font-medium">First Name</label>
          <input 
            type="text" 
            name="first_name" 
            id="first_name" 
            required
            placeholder="Enter first name"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300"
          />
        </div>

        <div>
          <label for="last_name" class="block text-gray-700 mb-1 font-medium">Last Name</label>
          <input 
            type="text" 
            name="last_name" 
            id="last_name" 
            required
            placeholder="Enter last name"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300"
          />
        </div>

        <div>
          <label for="email" class="block text-gray-700 mb-1 font-medium">Email</label>
          <input 
            type="email" 
            name="email" 
            id="email" 
            required
            placeholder="Enter email address"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300"
          />
        </div>

        <button 
          type="submit" 
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition"
        >
          Submit
        </button>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="py-6 text-center text-sm text-gray-500">
    © <?=date('Y')?> Student Management System. All rights reserved.
  </footer>

</body>
</html>
