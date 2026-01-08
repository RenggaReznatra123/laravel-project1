<!-- Update Modal Teacher -->
<div id="updateModalTeacher" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center w-full h-full">

    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative p-6 bg-gray-800 rounded-xl shadow-xl text-white">

            <div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-600">
                <h3 class="text-lg font-semibold">Edit Guru</h3>
                <button type="button" data-modal-toggle="updateModalTeacher"
                    class="text-gray-400 hover:text-white text-xl font-bold">&times;</button>
            </div>

            <form id="updateFormTeacher" method="POST" action="">
                @csrf
                @method('PUT')

                <div class="grid gap-4 mb-4">

                    <!-- NAMA -->
                    <div>
                        <label class="block mb-1 text-sm">Nama Guru</label>
                        <input type="text" id="update_name" name="name"
                            class="w-full p-2 rounded-md bg-gray-700 text-white border border-gray-600"
                            placeholder="Masukkan nama" required>
                    </div>

                    <!-- SUBJECT -->
                    <div>
                        <label class="block mb-1 text-sm">Mata Pelajaran</label>
                        <select id="update_subject_id" name="subject_id"
                            class="w-full p-2 rounded-md bg-gray-700 text-white border border-gray-600" required>

                            <option value="">-- Pilih Mata Pelajaran --</option>

                            {{-- SUBJECT YANG BOLEH UNTUK EDIT --}}
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <!-- EMAIL -->
                    <div>
                        <label class="block mb-1 text-sm">Email</label>
                        <input type="email" id="update_email" name="email"
                            class="w-full p-2 rounded-md bg-gray-700 text-white border border-gray-600"
                            placeholder="Masukkan email" required>
                    </div>

                    <!-- PHONE -->
                    <div>
                        <label class="block mb-1 text-sm">Nomor Telepon</label>
                        <input type="text" id="update_phone" name="phone"
                            class="w-full p-2 rounded-md bg-gray-700 text-white border border-gray-600"
                            placeholder="Masukkan nomor telepon">
                    </div>

                    <!-- ADDRESS -->
                    <div>
                        <label class="block mb-1 text-sm">Alamat</label>
                        <textarea id="update_address" name="address" rows="3"
                            class="w-full p-2 rounded-md bg-gray-700 text-white border border-gray-600"
                            placeholder="Masukkan alamat"></textarea>
                    </div>

                </div>

                <div class="flex justify-end gap-3">
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 rounded-lg hover:bg-blue-700">Update</button>

                    <button type="button" data-modal-toggle="updateModalTeacher"
                        class="px-5 py-2 bg-gray-600 rounded-lg hover:bg-gray-500">Batal</button>
                </div>

            </form>

        </div>
    </div>
</div>
