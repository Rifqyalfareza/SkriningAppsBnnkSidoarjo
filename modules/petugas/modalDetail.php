<!-- Modal Detail -->
<div id="modalDetail" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 overflow-y-auto overflow-x-hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 id="modalDetailTitle" class="text-xl font-semibold text-gray-900 dark:text-white">
                    Masukkan Kode Akses
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modalDetail">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4">
                <!-- Access Code Input -->
                <div id="accessCodeSection" class="space-y-4">
                    <div>
                        <label for="accessCode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Akses</label>
                        <input type="password" id="accessCode" placeholder="••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div id="accessCodeError" class="hidden text-sm text-red-600 dark:text-red-400">Kode akses salah. Silakan coba lagi.</div>
                    <button type="button" id="verifyAccessCode" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Verifikasi Kode
                    </button>
                </div>
                <!-- Detail Data Form (Hidden Initially) -->
                <div id="detailDataSection" class="hidden space-y-4 w-full">
                    <form class="space-y-4">
                        <div>
                            <label for="detailInstansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi</label>
                            <input type="text" id="detailInstansi" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" disabled>
                        </div>
                        <div>
                            <label for="detailEmail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="detailEmail" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" disabled>
                        </div>
                        <div>
                            <label for="detailNoTelp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telp</label>
                            <div class="flex shadow-sm rounded-lg">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-lg dark:bg-gray-600 dark:text-white dark:border-gray-500">
                                    +62
                                </span>
                                <input type="text" id="detailNoTelp" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" disabled>
                            </div>
                        </div>
                        <div>
                            <label for="detailPassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="text" id="detailPassword" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" disabled>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal footer (Shown only in detail view) -->
            <div id="detailFooter" class="hidden p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="button" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-toggle="modalDetail">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>