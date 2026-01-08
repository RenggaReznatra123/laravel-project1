<div id="addGuardianModal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">

    <div class="bg-gray-900 text-white rounded-2xl shadow-2xl w-full max-w-lg p-6 relative border border-gray-700">

        <button data-modal-toggle="addGuardianModal"
            class="absolute top-3 right-4 text-gray-400 hover:text-white text-2xl font-bold">&times;</button>

        <h2 class="text-xl font-semibold mb-4 border-b border-gray-700 pb-2">Tambah Wali</h2>

        <form action="{{ route('admin.guardian.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Nama Wali</label>
                <input type="text" name="name" required
                    class="w-full p-2 rounded-lg bg-gray-800 border-gray-700 text-white">
            </div>

            <!-- Pekerjaan -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Pekerjaan</label>
                <input type="text" name="job"
                    class="w-full p-2 rounded-lg bg-gray-800 border-gray-700 text-white">
            </div>

            <!-- Telepon -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Telepon</label>
                <input type="text" name="phone"
                    class="w-full p-2 rounded-lg bg-gray-800 border-gray-700 text-white">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <input type="email" name="email"
                    class="w-full p-2 rounded-lg bg-gray-800 border-gray-700 text-white">
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Alamat</label>
                <textarea name="address" rows="3"
                    class="w-full p-2 rounded-lg bg-gray-800 border-gray-700 text-white"></textarea>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" data-modal-toggle="addGuardianModal"
                    class="px-4 py-2 bg-gray-700 rounded-lg hover:bg-gray-600">
                    Batal
                </button>

                <button type="submit"
                    class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
