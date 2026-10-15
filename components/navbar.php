<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <!-- Kiri: Toggle Sidebar + Logo -->
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
          type="button"
          class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
          <span class="sr-only">Open sidebar</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
              d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
          </svg>
        </button>
        <a href="#" class="flex ms-2 md:me-24">
          <img src="../assets/bnn.png" class="h-8 me-3" alt="FlowBite Logo" />
          <span
            class="self-center text-sm font-semibold sm:text-lg whitespace-nowrap dark:text-white">Form Assist v3.1</span>
        </a>
      </div>

      <!-- Kanan: Info User -->
      <div class="flex items-center">
        <div class="flex items-center ms-3 space-x-3">
          <!-- Nama petugas (tampil hanya di md ke atas) -->
          <h4 class="hidden md:block text-sm font-semibold text-gray-700 dark:text-white">
            <?= $instansi; ?>
          </h4>

          <!-- Icon User -->
          <button type="button"
            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-600"
            aria-expanded="false" data-dropdown-toggle="dropdown-user">
            <span class="sr-only">Open user menu</span>
            <?php if ($id == 1) { ?>
              <img src="../assets/bnn.png" alt="User Icon"
                class="w-8 h-8 rounded-full object-cover">
            <?php } else { ?>
              <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold uppercase text-sm">
                <?= substr($instansi, 0, 2); ?>
              </div>
            <?php } ?>
          </button>
          <!-- Logout hanya untuk md ke atas -->
          <button onclick="logout()"
            class="hidden md:inline-flex items-center p-2 text-sm text-white bg-red-500 rounded-full hover:bg-red-600 transition duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1" />
            </svg>
          </button>
        </div>

        <!-- Dropdown user -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600"
          id="dropdown-user">
          <div class="px-4 py-3" role="none">
            <!-- Nama petugas tampil hanya di mobile -->
            <p class="text-sm text-gray-900 dark:text-white block md:hidden">
              <?= $instansi; ?>
            </p>
            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
              <?= $ptgs; ?>
            </p>
          </div>
          <ul class="py-1" role="none">
            <?php if ($id == 1) { ?>
              <li><a href="?page=dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a></li>
            <?php } ?>
            <li><a href="?page=settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Pengaturan</a></li>
            <li>
              <button onclick="logout()" class="w-full text-start block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:text-red-400 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

<script>
  function logout() {
    Swal.fire({
      title: 'Logout',
      text: "Apakah anda yakin ingin logout?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Logout',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "destroy.php";
      }
    });
  }
</script>