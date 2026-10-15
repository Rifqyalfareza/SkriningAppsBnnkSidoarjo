<?php include_once './components/toast.php'; ?>

<div class="bg-white card-shadow  transform transition duration-500 hover:scale-[1.01] md:hover:scale-100 animate-slide-in dark:bg-gray-800">
    <div class="flex items-center justify-between pb-4 border-b-2 border-gray-200">
        <h2 class="text-2xl font-bold text-blue-700 dark:text-white">Data Petugas</h2>
        <a href="?page=register"
            type="button"
            data-modal-toggle="modalAdd"
            class="inline-flex items-center gap-2 text-blue-700 border border-blue-700 bg-white hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-3 py-1 transition-all duration-300 dark:bg-gray-800 dark:text-white dark:hover:bg-blue-600 dark:hover:text-white dark:focus:ring-blue-800">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
            </svg>
            Register
        </a>
    </div>

    <div class="mt-6">
        <table id="search-table">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            No
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            instansi
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            email
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            No telepon
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($petugas as $index => $data) { ?>
                    <tr>
                        <td class="dark:text-white "><?= $index + 1 ?></td>
                        <td class="dark:text-white"><?= htmlspecialchars($data['instansi']) ?></td>
                        <td class="dark:text-white">
                            <a href="mailto:<?= htmlspecialchars($data['email']) ?>" class="hover:underline" title="Kirim pesan via email">
                                <?= htmlspecialchars($data['email']) ?>
                            </a>
                        </td>

                        <td>
                            <a href="https://wa.me/62<?= $data['no_telp'] ?>?text=Halo%20saya%20ingin%20bertanya" target="_blank" class="text-green-600 hover:underline" title="Kirim pesan via WhatsApp">
                                0<?= $data['no_telp'] ?>
                            </a>
                        </td>
                        <td class="">
                            <button
                                data-modal-toggle="modalDetail"
                                data-modal-target="modalDetail"
                                data-id="<?= $data['id_user'] ?>"
                                data-instansi="<?= htmlspecialchars($data['instansi']) ?>"
                                data-email="<?= htmlspecialchars($data['email']) ?>"
                                data-no_telp="<?= htmlspecialchars($data['no_telp']) ?>"
                                data-password="<?= htmlspecialchars($data['password'] ?? 'N/A') ?>"
                                data-tooltip-target="tooltip-detail-<?= $data['id_user'] ?>"
                                class="bg-blue-500 hover:bg-blue-800 p-1">
                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                            <div id="tooltip-detail-<?= $data['id_user'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Detail Akun
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button
                                data-modal-toggle="modalEdit"
                                data-modal-target="modalEdit"
                                data-id="<?= $data['id_user'] ?>"
                                data-instansi="<?= htmlspecialchars($data['instansi']) ?>"
                                data-email="<?= htmlspecialchars($data['email']) ?>"
                                data-no_telp="<?= htmlspecialchars($data['no_telp']) ?>"
                                data-tooltip-target="tooltip-edit-<?= $data['id_user'] ?>"
                                class="bg-yellow-300 hover:bg-yellow-500 p-1">
                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                </svg>
                            </button>
                            <div id="tooltip-edit-<?= $data['id_user'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Edit Data
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button
                                onclick="hapus(<?= $data['id_user'] ?>)"
                                data-tooltip-target="tooltip-hapus-<?= $data['id_user'] ?>"
                                class="bg-red-500 hover:bg-red-800 p-1">
                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                            </button>
                            <div id="tooltip-hapus-<?= $data['id_user'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Hapus Data
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once 'modalDetail.php'; ?>
<?php include_once 'modalEdit.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-modal-target="modalEdit"]').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const instansi = this.getAttribute('data-instansi');
                const email = this.getAttribute('data-email');
                const no = this.getAttribute('data-no_telp');
                const modal = document.getElementById('modalEdit');

                modal.querySelector('#id').value = id;
                modal.querySelector('#instansi').value = instansi;
                modal.querySelector('#email').value = email;
                modal.querySelector('#notelp').value = no;

                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        document.querySelectorAll('[data-modal-target="modalDetail"]').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.getElementById('modalDetail');
                const accessCodeSection = document.getElementById('accessCodeSection');
                const detailDataSection = document.getElementById('detailDataSection');
                const detailFooter = document.getElementById('detailFooter');
                const modalTitle = document.getElementById('modalDetailTitle');
                const accessCodeError = document.getElementById('accessCodeError');

                accessCodeSection.classList.remove('hidden');
                detailDataSection.classList.add('hidden');
                detailFooter.classList.add('hidden');
                modalTitle.textContent = 'Masukkan Kode Akses';
                accessCodeError.classList.add('hidden');
                document.getElementById('accessCode').value = '';

                document.getElementById('detailInstansi').value = this.getAttribute('data-instansi');
                document.getElementById('detailEmail').value = this.getAttribute('data-email');
                document.getElementById('detailNoTelp').value = this.getAttribute('data-no_telp');
                document.getElementById('detailPassword').value = this.getAttribute('data-password') || 'N/A';

                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        document.getElementById('verifyAccessCode').addEventListener('click', () => {
            const accessCode = document.getElementById('accessCode').value;
            const accessCodeSection = document.getElementById('accessCodeSection');
            const detailDataSection = document.getElementById('detailDataSection');
            const detailFooter = document.getElementById('detailFooter');
            const modalTitle = document.getElementById('modalDetailTitle');
            const accessCodeError = document.getElementById('accessCodeError');

            const correctCode = '123456';

            if (accessCode === correctCode) {
                accessCodeSection.classList.add('hidden');
                detailDataSection.classList.remove('hidden');
                detailFooter.classList.remove('hidden');
                modalTitle.textContent = 'Detail Akun';
            } else {
                accessCodeError.classList.remove('hidden');
                document.getElementById('accessCode').value = '';
            }
        });


    });

    function hapus(id) {
        Swal.fire({
            title: 'Serius Mau Apus ?',
            text: "Kalo udah dihapus, gabisa dikembaliin, lo !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Serius !',
            cancelButtonText: 'Gajadi, deh'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `?page=delete-petugas&id=${id}`;
            }
        });
    }
</script>