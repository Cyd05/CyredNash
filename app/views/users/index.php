<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <link rel="stylesheet" href="<?=base_url();?>public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen font-sans bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center px-4">

  <!-- Main Content -->
  <div class="bg-white border border-amber-200 shadow-lg rounded-2xl p-8 w-full max-w-4xl">

    <!-- Header (Centered Title) -->
    <div class="mb-6 flex justify-between items-center">
      <h1 class="text-3xl font-bold text-amber-600">Students List</h1>
      <a href="<?=site_url('login')?>" class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-4 py-2 rounded-full shadow transition duration-200">
        Logout
      </a>
    </div>

    <!-- Server-side search form with search icon -->
    <div class="flex justify-center mb-6">
      <form action="<?= site_url('users/index'); ?>" method="get"
            class="flex items-center w-full max-w-md bg-white border border-amber-300 rounded-full shadow-sm overflow-hidden">
        
        <?php
        $q = '';
        if(isset($_GET['q'])) {
            $q = $_GET['q'];
        }
        ?>

        <!-- Icon + Input -->
        <div class="flex items-center w-full px-3">
              <!-- Search Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" 
                  fill="none" viewBox="0 0 24 24" 
                  stroke-width="2" stroke="currentColor" 
                  class="w-5 h-5 text-amber-500">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
              </svg>

              <!-- Input -->
              <input 
                type="text" 
                name="q" 
                placeholder="Search records..." 
                value="<?= html_escape($q); ?>" 
                id="searchBox"
                class="w-full px-3 py-2 text-gray-700 focus:outline-none"
              >
            </div>

            <!-- Button -->
            <button 
              type="submit" 
              class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-5 py-2 rounded-r-full transition duration-200"
            >
              Search
            </button>
        </form>
      </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg border border-amber-200">
      <table class="w-full divide-y divide-amber-200">
        <thead class="bg-amber-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-amber-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-amber-500 uppercase tracking-wider">Lastname</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-amber-500 uppercase tracking-wider">Firstname</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-amber-500 uppercase tracking-wider">Email</th>
            <?php if ($current_role === 'admin'): ?>
            <th class="px-6 py-3 text-left text-xs font-medium text-amber-500 uppercase tracking-wider">Action</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-amber-200">
          <?php foreach(html_escape($users) as $user): ?>
            <tr class="hover:bg-amber-50 transition duration-200">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-amber-700"><?=($user['id']);?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?=($user['last_name']);?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?=($user['first_name']);?></td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="bg-amber-100 text-amber-700 text-sm font-medium px-3 py-1 rounded-full">
                  <?=($user['email']);?>
                </span>
              </td>
              <?php if ($current_role === 'admin'): ?>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="<?=site_url('users/update/'.$user['id']);?>" class="text-amber-600 hover:text-amber-800 font-bold mr-2">Update</a>
                |
                <a href="<?=site_url('users/delete/'.$user['id']);?>" onclick="return confirm('Are you sure you want to delete this record?');" class="text-red-500 hover:text-red-700 font-bold ml-2">Delete</a>
              </td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination links -->
    <div class="pagination-container mt-6 flex justify-center">
      <div class="inline-flex items-center space-x-2">
        <?php if (isset($page)): ?>
          <?= str_replace(
              ['<a ', '<strong class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 hover:bg-indigo-50">', '</strong>'],
              [
                  '<a class="px-4 py-2 border border-amber-300 rounded-full text-amber-600 hover:bg-amber-50 transition duration-200" ',
                  '<span class="px-4 py-2 bg-amber-600 text-white rounded-full font-extrabold text-lg ring-2 ring-amber-300 shadow-lg">',
                  '</span>'
              ],
              $page
          ); ?>
        <?php endif; ?>
      </div>
    </div>

    <!-- Create New User Button (Below Table, Centered) -->
    <div class="mt-6 text-center">
      <?php if ($current_role === 'admin'): ?>
      <a href="<?=site_url('users/create')?>" class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-6 py-2 rounded-full shadow transition duration-200">
        + Create New Student
      </a>
      <?php endif; ?>
    </div>

  </div>

</body>
</html>