<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Assist Apps</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif !important;
    }

    .login-card {
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      animation: fadeInUp 0.6s ease-out;
      background-color: white;
    }

    .logo-section {
      animation: fadeInDown 0.6s ease-out;
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .blur-bg {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -2;
      width: 100%;
      height: 100%;
      background-image: url('assets/image.png');
      background-size: cover;
      background-position: center;
      filter: blur(8px) brightness(0.75);
    }

    .dark .blur-bg {
      filter: blur(8px) brightness(0.5);
    }
  </style>
</head>
<body class="bg-gray-50 dark:bg-gray-800">
  <!-- Blur Background -->
  <div class="blur-bg"></div>

  <?php
  session_start();
  if (isset($_SESSION['error'])) {
      echo "<script>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'error',
              title: 'Login Gagal',
              text: '" . $_SESSION['error'] . "',
              confirmButtonText: 'OK',
              confirmButtonColor: '#3085d6'
          });
      });
      </script>";
      unset($_SESSION['error']);
  }elseif (isset($_SESSION['success'])) {
      echo "<script>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              icon: 'success',
              title: 'Login Berhasil',
              text: '" . $_SESSION['success'] . "',
              confirmButtonText: 'OK',
              confirmButtonColor: '#3085d6'
          }).then((result) => {
                    window.location.href = 'main.php'; 
          });
      });
      </script>";
      unset($_SESSION['success']);
  }
  ?>

  <section class="min-h-screen flex items-center justify-center p-4 relative z-10">
    <div class="w-full max-w-md">
      <!-- Login Card -->
      <div class="login-card rounded-lg p-8 dark:bg-gray-900 dark:text-white">
        <div class="logo-section text-center ">
        <div class="flex items-center justify-center mb-4">
          <img class="w-28 h-28 mr-2" src="assets/bnn.png" alt="logo" />
          <!-- <span class="text-2xl font-semibold text-white ">Assist Apps</span> -->
        </div>
      </div>
      <div class="flex items-center justify-center mb-4">
          <p class="text-2xl font-semibold text-black ">Assist Apps</p>
      </div>
        <!-- <h1 class="text-xl font-semibold text-gray-900 dark:text-white text-center mb-6">Silahkan Login</h1> -->

        <form class="space-y-4" action="auth.php" method="POST">
          <input type="hidden" name="action" value="login" />

          <div>
            <label for="instansi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
              Instansi
            </label>
            <input
              type="text"
              name="instansi"
              id="instansi"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none dark:bg-gray-800 dark:border-gray-600 dark:text-white"
              placeholder="contoh : SMPN 1 "
              required
            />
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
              Kata Sandi
            </label>
            <input
              type="password"
              name="password"
              id="password"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none dark:bg-gray-800 dark:border-gray-600 dark:text-white"
              placeholder="••••••••"
              required
            />
          </div>

          <div class="flex items-center">
            <input
              id="remember"
              type="checkbox"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
            />
            <label for="remember" class="ml-2 text-sm text-gray-600 dark:text-gray-300">Tampilkan Kata Sandi</label>
          </div>

          <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg focus:ring-4 focus:ring-blue-300 transition-colors flex items-center justify-center"
          >
            <svg
              class="w-5 h-5 mr-2"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
              ></path>
            </svg>
            Masuk
          </button>
        </form>
      </div>
      </div>
    </section>
    
  <script>
    document.getElementById('remember').addEventListener('change', function () {
      document.getElementById('password').type = this.checked ? 'text' : 'password';
    });
  </script>
</body>
</html>
