<div id="updateModalStudent"
    class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-sm items-center justify-center">

    <div class="bg-gray-900 text-white rounded-2xl shadow-xl w-full max-w-lg p-6 border border-gray-700">
        <h2 class="text-xl font-semibold mb-4">Update Data Siswa</h2>

        <form id="updateFormStudent" method="POST">
            @csrf
            @method("PUT")

            <div class="grid gap-4">

                <div>
                    <label>Nama Lengkap</label>
                    <input id="update_student_name" name="name" type="text"
                        class="w-full rounded-lg bg-gray-800 border-gray-700 p-2" required>
                </div>

                <div>
                    <label>Email</label>
                    <input id="update_student_email" name="email" type="email"
                        class="w-full rounded-lg bg-gray-800 border-gray-700 p-2" required>
                </div>

                <div>
                    <label>Kelas</label>
                    <select id="update_student_classroom" name="classroom_id"
                        class="w-full rounded-lg bg-gray-800 border-gray-700 p-2" required>
                        @foreach ($classrooms as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Wali</label>
                    <select id="update_student_guardian" name="guardian_id"
                        class="w-full rounded-lg bg-gray-800 border-gray-700 p-2">
                        <option value="">-- Pilih Wali --</option>
                        @foreach ($guardians as $g)
                            <option value="{{ $g->id }}">{{ $g->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Jenis Kelamin</label>
                    <div class="flex gap-4">
                        <label><input id="update_gender_male" type="radio" name="gender"
                                value="Laki-laki"> Laki-laki</label>
                        <label><input id="update_gender_female" type="radio" name="gender"
                                value="Perempuan"> Perempuan</label>
                    </div>
                </div>

                <div>
                    <label>Tanggal Lahir</label>
                    <input id="update_student_dob" name="date_of_birth" type="date"
                        class="w-full rounded-lg bg-gray-800 border-gray-700 p-2">
                </div>

                <div class="col-span-2">
                    <label>Alamat</label>
                    <textarea id="update_student_address" name="address" rows="3"
                        class="w-full rounded-lg bg-gray-800 border-gray-700 p-2"></textarea>
                </div>
            </div>

            <div class="mt-4 flex gap-4 justify-end">
                <button data-modal-toggle="updateModalStudent" type="button"
                    class="px-5 py-2 bg-gray-600 rounded-lg">
                    Batal
                </button>

                <button type="submit" class="px-5 py-2 bg-blue-600 rounded-lg">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
