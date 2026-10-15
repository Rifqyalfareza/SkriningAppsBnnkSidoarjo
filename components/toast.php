<style>
    .toast {
        z-index: 99999 !important;
        position: fixed !important;
        top: 1rem !important;
        right: 1rem !important;
        left: auto !important;
    }
</style>

<?php if (isset($_SESSION['alert'])):
    $alert = $_SESSION['alert'];
    $type = $alert['type'];
    $message = $alert['message'];

    $icon = $type === 'success'
        ? '<svg class="w-4 h-4 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>'
        : '<svg class="w-4 h-4 text-red-500 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>';

    $bgColor = $type === 'success'
        ? 'bg-white dark:bg-gray-800 text-green-500'
        : 'bg-white dark:bg-gray-800 text-red-500';
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toasts = document.querySelectorAll('.toast');
            toasts.forEach(toast => {
                setTimeout(() => {
                    toast.remove();
                }, 3000); // Toast disappears after 3 seconds
            });
        });
    </script>
    <div id="toast-alert" class="toast fixed top-4 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-sm text-gray-500 rounded-lg shadow-sm <?= $bgColor ?>" role="alert">
        <?= $icon ?>
        <div class="ms-3 text-sm font-normal"><?= htmlspecialchars($message) ?></div>
        <button type="button" onclick="document.getElementById('toast-alert').remove();" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-gray-500 dark:hover:text-white" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
<?php unset($_SESSION['alert']);
endif; ?>