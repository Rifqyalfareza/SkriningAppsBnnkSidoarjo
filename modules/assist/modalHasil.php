<div id="modalHasil" tabindex="-1" aria-hidden="true" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <div class="flex items-center justify-between p-3 md:p-4 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h4 id="tittle" class="text-lg font-semibold text-gray-900 dark:text-white">
                    Hasil Assist 
                </h4>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modalHasil">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="modal-body p-5 ">
            <table class="result-table w-full text-sm">
                <thead>
                    <tr>
                        <th class="py-1 text-left">Kategori</th>
                        <th class="text-center py-1">Resiko</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-1 text-left">Tembakau</td>
                        <td class="text-center py-1 flex items-center justify-center gap-1" id="hasilTembakau">-</td>
                    </tr>
                    <tr>
                        <td class="py-1 text-left">Alkohol</td>
                        <td class="text-center py-1 flex items-center justify-center gap-1" id="hasilAlkohol">-</td>
                    </tr>
                    <tr>
                        <td class="py-1 text-left">Kanabis</td>
                        <td class="text-center py-1 flex items-center justify-center gap-1" id="hasilKanabis">-</td>
                    </tr>
                    <tr>
                        <td class="py-1 text-left">Kokain</td>
                        <td class="text-center py-1 flex items-center justify-center gap-1" id="hasilKokain">-</td>
                    </tr>
                    <tr>
                        <td class="py-1 text-left">Amfetamin</td>
                        <td class="text-center py-1 flex items-center justify-center gap-1" id="hasilAmfetamin">-</td>
                    </tr>
                    <tr>
                        <td class="py-1 text-left">Inhalansia</td>
                        <td class="text-center py-1 flex items-center justify-center gap-1" id="hasilInhalansia">-</td>
                    </tr>
                    <tr>
                        <td class="py-1 text-left">Sedativa</td>
                        <td class="text-center py-1 flex items-center justify-center gap-1" id="hasilSedativa">-</td>
                    </tr>
                    <tr>
                        <td class="py-1 text-left">Halusinogens</td>
                        <td class="text-center py-1 flex items-center justify-center gap-1" id="hasilHalusinogens">-</td>
                    </tr>
                    <tr>
                        <td class="py-1 text-left">Opioid</td>
                        <td class="text-center py-1 flex items-center justify-center gap-1" id="hasilOpioid">-</td>
                    </tr>
                </tbody>
            </table>
            <div class="modal-footer mt-4 flex flex-shrink-0 flex-wrap items-center justify-end p-2 border-t border-gray-200 rounded-b-md dark:border-gray-600">
                <button class="bg-gray-500 mt-2 text-sm hover:bg-gray-700 text-white font-bold py-1 px-2 rounded" data-modal-toggle="modalHasil">
                    Tutup
                </button>
            </div>
        </div>
        </div>
    </div>
</div>