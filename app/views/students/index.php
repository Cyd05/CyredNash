<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Records Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          'poppins': ['Poppins', 'sans-serif'],
        },
        colors: {
          navy: {
            light: '#1e293b',
            DEFAULT: '#0f172a',
            dark: '#020617',
          },
          neon: {
            cyan: '#06b6d4',
            blue: '#3b82f6',
          },
        },
        animation: {
          'fade-in': 'fadeIn 0.9s ease-in-out',
          'slide-up': 'slideUp 0.7s ease-out',
          'float': 'float 6s ease-in-out infinite',
          'pulse-glow': 'pulseGlow 2s ease-in-out infinite alternate',
        },
        keyframes: {
          fadeIn: {
            '0%': { opacity: '0', transform: 'translateY(20px)' },
            '100%': { opacity: '1', transform: 'translateY(0)' },
          },
          slideUp: {
            '0%': { transform: 'translateY(30px)', opacity: '0' },
            '100%': { transform: 'translateY(0)', opacity: '1' },
          },
          float: {
            '0%, 100%': { transform: 'translateY(0)' },
            '50%': { transform: 'translateY(-8px)' },
          },
          pulseGlow: {
            '0%': { boxShadow: '0 0 8px rgba(6, 182, 212, 0.5), 0 0 15px rgba(6, 182, 212, 0.3)' },
            '100%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.9), 0 0 40px rgba(59, 130, 246, 0.6)' },
          },
        },
      },
    },
  }
</script>

<style>
  body {
    background: radial-gradient(circle at top left, #0f172a, #020617 70%);
    min-height: 100vh;
    margin: 0;
    font-family: 'Poppins', sans-serif;
    color: #e2e8f0;
    overflow-x: hidden;
  }

  body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: transparent url('https://www.transparenttextures.com/patterns/stardust.png') repeat;
    opacity: 0.15;
    z-index: -1;
  }

  .glass-effect {
    background: rgba(15, 23, 42, 0.9);
    border: 1px solid rgba(56, 189, 248, 0.2);
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: 0 0 25px rgba(56, 189, 248, 0.2);
    transition: all 0.3s ease;
  }

  .glass-effect:hover {
    box-shadow: 0 0 35px rgba(56, 189, 248, 0.5);
    transform: translateY(-2px);
  }

  .table-row-hover:hover {
    background-color: rgba(30, 58, 138, 0.3);
    transition: 0.3s;
  }

  .gradient-text {
    background: linear-gradient(90deg, #06b6d4, #38bdf8, #60a5fa);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
  }

  .pagination {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    flex-wrap: wrap;
  }

  .pagination a, .pagination span {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 2.5rem;
    height: 2.5rem;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 0.9rem;
  }

  .pagination a {
    background: rgba(30, 41, 59, 0.9);
    border: 1px solid rgba(56, 189, 248, 0.3);
    color: #e2e8f0;
  }

  .pagination a:hover {
    background: linear-gradient(135deg, #06b6d4, #3b82f6);
    color: white;
    box-shadow: 0 0 15px rgba(56, 189, 248, 0.7);
  }

  .pagination .current {
    background: linear-gradient(135deg, #06b6d4, #3b82f6);
    color: white;
    border: none;
    box-shadow: 0 0 20px rgba(56, 189, 248, 0.9);
    animation: pulse 1.5s infinite;
  }

  @keyframes pulse {
    0% { transform: scale(1); box-shadow: 0 0 10px rgba(56, 189, 248, 0.6); }
    50% { transform: scale(1.05); box-shadow: 0 0 25px rgba(56, 189, 248, 0.9); }
    100% { transform: scale(1); box-shadow: 0 0 10px rgba(56, 189, 248, 0.6); }
  }

  ::-webkit-scrollbar { width: 8px; }
  ::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, #06b6d4, #3b82f6);
    border-radius: 10px;
  }
  ::-webkit-scrollbar-track { background: #0f172a; }
</style>

</head>
<body class="min-h-screen font-poppins flex items-center justify-center p-4 md:p-8">

  <div id="app" class="relative w-full max-w-7xl glass-effect rounded-3xl p-8 md:p-10 flex flex-col gap-10 animate-fade-in">
    
    <!-- HEADER SECTION -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
      <div class="flex items-center gap-4">
        <!-- NEW LOGO -->
        <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-5 rounded-2xl shadow-xl floating-element">
          <i class="fas fa-database text-white text-3xl"></i>
        </div>
        <div>
          <h1 class="text-3xl md:text-4xl font-bold gradient-text">Student Records</h1>
          <p class="text-slate-400 text-sm mt-1">Efficiently manage and organize your student database</p>
        </div>
      </div>
      
      <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
        <form method="get" action="<?=site_url()?>" class="relative flex w-full md:w-auto">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search students by name, email..." 
            class="pl-12 pr-4 py-3 bg-white/80 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent w-full md:w-80 transition-all duration-300 shadow-sm">
          <button type="submit" class="absolute left-0 top-0 h-full px-4 text-gray-500 hover:text-cyan-600 transition-colors">
            <i class="fas fa-search"></i>
          </button>
        </form>
        
        <!-- NEW CREATE BUTTON -->
        <a href="<?=site_url('students/create');?>"
           class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-600 text-white font-semibold px-7 py-3 rounded-full shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300">
          <i class="fas fa-plus-circle text-lg"></i>
          <span>Create Student</span>
        </a>
      </div>
    </div>

    <!-- TABLE SECTION -->
    <div class="overflow-hidden border border-gray-200/50 rounded-2xl shadow-lg animate-slide-up">
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white">
              <th class="px-6 py-5 text-sm font-semibold uppercase tracking-wider rounded-tl-2xl">ID</th>
              <th class="px-6 py-5 text-sm font-semibold uppercase tracking-wider">First Name</th>
              <th class="px-6 py-5 text-sm font-semibold uppercase tracking-wider">Last Name</th>
              <th class="px-6 py-5 text-sm font-semibold uppercase tracking-wider">Email</th>
              <th class="px-6 py-5 text-sm font-semibold uppercase tracking-wider text-center rounded-tr-2xl">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200/50">
            <?php foreach (html_escape($users) as $index => $user): ?>
            <tr class="bg-white/70 hover:bg-white transition-all duration-300 table-row-hover <?= $index % 2 === 0 ? 'bg-blue-50/20' : '' ?>">
              <td class="px-6 py-5 text-sm font-bold text-purple-700">#<?= $user['id']; ?></td>
              <td class="px-6 py-5 text-slate-800"><?= $user['first_name']; ?></td>
              <td class="px-6 py-5 text-slate-800"><?= $user['last_name']; ?></td>
              <td class="px-6 py-5 text-slate-600"><?= $user['email']; ?></td>
              <td class="px-6 py-5 text-sm flex justify-center gap-3">
                <a href="<?=site_url('students/update/'.$user['id']);?>"
                   class="px-4 py-2.5 bg-blue-50 text-blue-700 rounded-xl border border-blue-200 hover:bg-blue-100 hover:shadow-md transition-all duration-200">
                   <i class="fas fa-edit text-xs"></i> Edit
                </a>
                <a href="<?=site_url('students/delete/'.$user['id']);?>"
                   onclick="return confirm('Are you sure you want to delete this student record?');"
                   class="px-4 py-2.5 bg-red-50 text-red-600 rounded-xl border border-red-200 hover:bg-red-100 hover:shadow-md transition-all duration-200">
                   <i class="fas fa-trash-alt text-xs"></i> Delete
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <!-- PAGINATION -->
    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4 bg-gradient-to-r from-blue-50 to-purple-50 p-5 rounded-2xl border border-blue-100">
      <div class="text-sm text-slate-600 font-medium">
        Showing page <?= isset($current_page) ? $current_page : '1' ?> of student records
      </div>
      <div class="pagination"><?= $page ?? ''; ?></div>
      <div class="text-sm text-slate-600 font-medium hidden sm:block">Navigate through pages</div>
    </div>
    
    <!-- FOOTER -->
    <div class="text-center text-sm text-slate-500 pt-6 border-t border-gray-200/50">
      <div class="flex flex-col md:flex-row items-center justify-between">
        <p>Student Records Management System &copy; <?= date('Y'); ?> | All rights reserved</p>
        <div class="flex gap-4 mt-2 md:mt-0">
          <a href="#" class="hover:text-cyan-400"><i class="fab fa-twitter"></i></a>
          <a href="#" class="hover:text-cyan-400"><i class="fab fa-linkedin"></i></a>
          <a href="#" class="hover:text-cyan-400"><i class="fab fa-github"></i></a>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const paginationLinks = document.querySelectorAll('.pagination a');
      paginationLinks.forEach(link => {
        link.classList.add('flex', 'items-center', 'justify-center');
        if (link.textContent.includes('Next') || link.textContent.includes('»')) {
          link.innerHTML = '<i class="fas fa-chevron-right"></i>';
        } else if (link.textContent.includes('Previous') || link.textContent.includes('«')) {
          link.innerHTML = '<i class="fas fa-chevron-left"></i>';
        }
      });
    });
  </script>
</body>
</html>
