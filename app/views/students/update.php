<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Update Record</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 50, 0.5);
      z-index: 0;
    }
    #app {
      position: relative;
      z-index: 1;
    }
  </style>
</head>
<body
  class="min-h-screen flex items-center justify-center p-6 bg-cover bg-center relative"
  style="background-image: url('https://i.pinimg.com/originals/f0/6a/0a/f06a0a7f75c0f3f58a4624f6ebb3d8c6.gif');">

  <div id="app" class="relative w-full max-w-2xl bg-white/80 rounded-3xl shadow-2xl p-10 backdrop-blur-lg border border-white/40">
    
    <!-- Header -->
    <h1 class="text-4xl font-extrabold text-indigo-800 text-center tracking-wide drop-shadow-md mb-6">
      🔄 Update Student Record
    </h1>
 
    </h1>

    <section class="bg-indigo-50 rounded-xl p-6 shadow-md w-full">
      <form action="<?=site_url('students/update/'.$user['id']);?>" method="POST" class="space-y-4" novalidate>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <input type="text" name="first_name" placeholder="First Name" required
            value="<?=html_escape($user['first_name']);?>"
            class="w-full px-4 py-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            <input type="text" name="last_name" placeholder="Last Name" required
            value="<?=html_escape($user['last_name']);?>"
            class="w-full px-4 py-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>
        <input type="email" name="email" placeholder="Email" required value="<?=html_escape($user['email']);?>"
          class="w-full px-4 py-2 border border-indigo-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        <div class="flex justify-between items-center">
          <a href="<?=base_url('students/index');?>" 
            class="inline-block bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-400 transition duration-200">
            Cancel
          </a>
          <button type="submit"
            class="bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:bg-indigo-800 transition duration-200">
            Update
          </button>
        </div>
      </form>
    </section>
  </div>
</body>
</html>