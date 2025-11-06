<form class="space-y-5">
    <!-- Nama Mata Pelajaran -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Nama Mata Pelajaran
        </label>
        <input type="text" id="name" name="name" placeholder="Masukkan nama mata pelajaran" required
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500" />
    </div>

    <!-- Deskripsi -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Deskripsi
        </label>
        <textarea id="description" name="description" rows="3" placeholder="Masukkan deskripsi mata pelajaran"
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500"></textarea>
    </div>
</form>
