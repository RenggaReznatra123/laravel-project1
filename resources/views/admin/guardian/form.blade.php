<form class="space-y-4">
    <!-- Nama Lengkap -->
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Nama Lengkap
        </label>
        <input type="text" placeholder="Masukkan nama lengkap"
            class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 
                   dark:bg-gray-800 dark:border-gray-700 dark:text-white">
    </div>

    <!-- Pekerjaan -->
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Pekerjaan
        </label>
        <input type="text" placeholder="Masukkan pekerjaan"
            class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 
                   dark:bg-gray-800 dark:border-gray-700 dark:text-white">
    </div>

    <!-- Nomor Telepon -->
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Nomor Telepon
        </label>
        <input type="text" placeholder="Masukkan nomor telepon"
            class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 
                   dark:bg-gray-800 dark:border-gray-700 dark:text-white">
    </div>

    <!-- Email -->
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Email
        </label>
        <input type="email" placeholder="Masukkan email"
            class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 
                   dark:bg-gray-800 dark:border-gray-700 dark:text-white">
    </div>

    <!-- Alamat -->
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Alamat
        </label>
        <textarea rows="3" placeholder="Masukkan alamat"
            class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 
                   dark:bg-gray-800 dark:border-gray-700 dark:text-white"></textarea>
    </div>

    <!-- Tombol -->
    <div class="flex justify-end gap-2 pt-4 border-t border-gray-200 dark:border-gray-700">
        <button type="button" id="closeModalBtn2"
            class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200
            bg-gray-200 text-gray-700 hover:bg-gray-300 hover:text-gray-900
            dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white
            focus:ring-2 focus:ring-gray-400 focus:outline-none">
            Batal
        </button>

        <button type="button"
            class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
            Simpan
        </button>
    </div>
</form>

<script>
    // Tombol batal menutup modal
    document.getElementById('closeModalBtn2')?.addEventListener('click', () => {
        document.getElementById('addGuardianModal').classList.add('hidden');
    });
</script>
