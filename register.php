<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full ">
        <div class="space-y-4 md:space-y-6 sm:p-2 bg-white  dark:bg-gray-800">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                Registrasi Akun Petugas
            </h1>
            <form class="space-y-4 md:space-y-6" action="?page=auth" method="POST" onsubmit="return validatePassword()">
                <input type="hidden" name="action" value="register">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example" required>
                    </div> -->
                    <div>
                        <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi</label>
                        <input type="text" name="instansi" id="instansi" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example" required>
                    </div>
                    <div>
                        <label for="notelp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
                        <div class="flex shadow-sm rounded-lg">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-lg dark:bg-gray-600 dark:text-white dark:border-gray-500">
                                +62
                            </span>
                            <input type="text" name="notelp" id="notelp" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="812xxxxxxx" required>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">e-Mail</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@example.com" required>
                    </div>
                    <!-- <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example" required>
                    </div> -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <!-- Indicator -->
                        <div id="password-strength-text" class="mt-4 text-sm font-medium"></div>
                        <div class="w-full h-2 bg-gray-200 rounded-full mt-1">
                            <div id="password-strength-bar" class="h-2 rounded-full transition-all duration-300 ease-in-out"></div>
                        </div>
                    </div>
                    <div>
                        <label for="repassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
                        <input type="password" name="repassword" id="repassword" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Show Password</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button> 
            </form>
        </div>
    </div>
</div>
<script>
    const passwordInput = document.getElementById('password');
    const repasswordInput = document.getElementById('repassword');
    const showPasswordCheckbox = document.getElementById('remember');
    const strengthText = document.getElementById('password-strength-text');
    const strengthBar = document.getElementById('password-strength-bar');

    function checkPasswordStrength(password) {
        let strength = 0;
        let rules = [];

        if (password.length >= 8) strength++;
        else rules.push("Minimal 8 karakter");

        if (/[a-z]/.test(password)) strength++;
        else rules.push("Huruf kecil");

        if (/[A-Z]/.test(password)) strength++;
        else rules.push("Huruf besar");

        if (/[0-9]/.test(password)) strength++;
        else rules.push("Angka");

        if (/[\W_]/.test(password)) strength++;
        else rules.push("Simbol");

        return { strength, rules };
    }

    passwordInput.addEventListener('input', function () {
        const val = passwordInput.value;
        const result = checkPasswordStrength(val);

        let color = 'bg-red-500';
        let label = 'Lemah';

        if (result.strength >= 4) {
            color = 'bg-yellow-400';
            label = 'Sedang';
        }
        if (result.strength >= 5) {
            color = 'bg-green-500';
            label = 'Kuat';
        }

        strengthBar.className = `h-2 rounded-full transition-all duration-300 ease-in-out ${color}`;
        strengthBar.style.width = `${(result.strength / 5) * 100}%`;
        strengthText.textContent = `${label} - Gunakan huruf besar, kecil, angka & simbol`;
    });

    showPasswordCheckbox.addEventListener('change', function () {
        const type = this.checked ? 'text' : 'password';
        passwordInput.type = type;
        repasswordInput.type = type;
    });

    function validatePassword() {
        const password = passwordInput.value;
        const confirmPassword = repasswordInput.value;
        const result = checkPasswordStrength(password);

        if (result.strength < 4) {
            alert("Password terlalu lemah. Gunakan huruf besar, kecil, angka, dan simbol minimal 8 karakter.");
            passwordInput.focus();
            return false; 
        }

        if (password !== confirmPassword) {
            alert("Password dan konfirmasi password tidak cocok.");
            repasswordInput.focus();
            return false;
        }

        return true; 
    }
</script>

