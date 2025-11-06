<form class="space-y-5">
  <!-- Nama Kelas -->
  <div>
    <label for="classroom_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
      Nama Kelas
    </label>
    <input type="text" id="classroom_name" name="classroom_name" placeholder="Masukkan nama kelas" required
      class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 
             dark:bg-gray-800 dark:border-gray-700 dark:text-white">
  </div>

  <!-- Tombol Aksi -->
  <div class="flex justify-end space-x-3">
    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-all duration-200" data-modal-hide="formModal">
      Batal
    </button>
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">
      Simpan
    </button>
  </div>
</form>
