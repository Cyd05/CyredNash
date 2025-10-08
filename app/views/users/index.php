<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students List</title>
  <link rel="stylesheet" href="<?= base_url(); ?>public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen font-sans bg-gradient-to-br from-blue-100 via-white to-blue-50 flex items-center justify-center px-4">

  <!-- Main Content -->
  <div class="bg-white/80 backdrop-blur-md border border-blue-100 shadow-lg rounded-2xl p-8 w-full max-w-5xl">

    <!-- Header -->
    <div class="mb-6 flex justify-between items-center">
      <h1 class="text-3xl font-bold text-blue-700">Students List</h1>
      <a href="<?= site_url('login') ?>" 
         class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 py-2 rounded-full shadow transition duration-200">
        Logout
      </a>
    </div>

    <!-- Search Form -->
    <div class="flex justify-center mb-6">
      <form action="<?= site_url('users/index'); ?>" method="get"
            class="flex items-center w-full max-w-md bg-white border border-blue-200 rounded-full shadow-sm overflow-hidden">
        
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>

        <div class="flex items-center w-full px-3">
          <!-- Search Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="2" stroke="currentColor" class="w-5 h-5 text-blue-500">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
          </svg>

          <input 
            type="text" 
            name="q" 
            placeholder="Search students..." 
            value="<?= html_escape($q); ?>" 
            id="searchBox"
            class="w-full px-3 py-2 text-gray-700 focus:outline-none"
          >
        </div>

        <button 
          type="submit" 
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-r-full transition duration-200">
          Search
        </button>
      </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg border border-blue-200">
      <table class="w-full text-center border-collapse">
        <thead>
          <tr class="bg-blue-200 text-black text-lg">
            <th class="py-3 px-4 border border-blue-300">ID</th>
            <th class="py-3 px-4 border border-blue-300">Lastname</th>
            <th class="py-3 px-4 border border-blue-300">Firstname</th>
            <th class="py-3 px-4 border border-blue-300">Email</th>
            <?php if ($current_role === 'admin'): ?>
              <th class="py-3 px-4 border border-blue-300">Action</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach (html_escape($users) as $user): ?>
            <tr class="hover:bg-blue-50 transition duration-200 border-b border-blue-100">
              <td class="py-3 px-4 font-semibold text-blue-800 border border-blue-100"><?= $user['id']; ?></td>
              <td class="py-3 px-4 text-gray-700 border border-blue-100"><?= $user['last_name']; ?></td>
              <td class="py-3 px-4 text-gray-700 border border-blue-100"><?= $user['first_name']; ?></td>
              <td class="py-3 px-4 border border-blue-100">
                <span class="bg-blue-100 text-blue-700 text-sm font-medium px-3 py-1 rounded-full">
                  <?= $user['email']; ?>
                </span>
              </td>
              <?php if ($current_role === 'admin'): ?>
              <td class="py-3 px-4 border border-blue-100">
                <a href="<?= site_url('users/update/'.$user['id']); ?>" 
                   class="text-blue-600 hover:text-blue-800 font-semibold mr-3">Update</a>
                |
                <a href="<?= site_url('users/delete/'.$user['id']); ?>" 
                   onclick="return confirm('Are you sure you want to delete this record?');" 
                   class="text-red-500 hover:text-red-700 font-semibold ml-3">Delete</a>
              </td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="pagination-container mt-6 flex justify-center">
      <div class="inline-flex items-center space-x-2">
        <?php if (isset($page)): ?>
          <?= str_replace(
              ['<a ', '<strong class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 hover:bg-indigo-50">', '</strong>'],
              [
                  '<a class="px-4 py-2 border border-blue-300 rounded-full text-blue-600 hover:bg-blue-100 transition duration-200" ',
                  '<span class="px-4 py-2 bg-blue-600 text-white rounded-full font-extrabold text-lg ring-2 ring-blue-300 shadow-lg">',
                  '</span>'
              ],
              $page
          ); ?>
        <?php endif; ?>
      </div>
    </div>

    <!-- Create New User Button -->
    <?php if ($current_role === 'admin'): ?>
    <div class="mt-6 text-center">
      <a href="<?= site_url('users/create') ?>" 
         class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2 rounded-full shadow transition duration-200">
        + Create New Student
      </a>
    </div>
    <?php endif; ?>

  </div>

</body>
</html>
