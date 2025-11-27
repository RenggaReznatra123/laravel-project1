<!-- ================= UPDATE MODAL GUARDIAN ================= -->
<div id="updateModalGuardian"
     class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/60">

    <div class="bg-gray-900 p-6 rounded-xl w-full max-w-lg">

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl text-white font-bold">Edit Data Wali</h3>
            <button data-modal-toggle="updateModalGuardian"
                    class="text-gray-300 hover:text-white text-2xl">&times;</button>
        </div>

        <form id="updateFormGuardian" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <label class="block text-gray-300 mb-1">Nama Lengkap</label>
            <input id="update_guardian_name" name="name"
                   class="w-full p-2 rounded bg-gray-800 text-white">

            <!-- Pekerjaan -->
            <label class="block mt-3 mb-1 text-gray-300">Pekerjaan</label>
            <input id="update_guardian_job" name="job"
                   class="w-full p-2 rounded bg-gray-800 text-white">

            <!-- Telepon -->
            <label class="block mt-3 mb-1 text-gray-300">Nomor Telepon</label>
            <input id="update_guardian_phone" name="phone"
                   class="w-full p-2 rounded bg-gray-800 text-white">

            <!-- Email -->
            <label class="block mt-3 mb-1 text-gray-300">Email</label>
            <input id="update_guardian_email" name="email"
                   class="w-full p-2 rounded bg-gray-800 text-white">

            <!-- Alamat -->
            <label class="block mt-3 mb-1 text-gray-300">Alamat</label>
            <textarea id="update_guardian_address" name="address"
                      rows="3" class="w-full p-2 rounded bg-gray-800 text-white"></textarea>

            <!-- Submit -->
            <button type="submit"
                class="mt-4 w-full py-2 bg-yellow-600 hover:bg-yellow-700 rounded text-white">
                Update Data
            </button>
        </form>
    </div>
</div>
