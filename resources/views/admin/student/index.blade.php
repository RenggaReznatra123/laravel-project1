<x-admin.layout>
    <x-slot name="title">Student Management</x-slot>

    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-3 w-full max-w-md">
            <input type="text" id="searchStudent" placeholder="Search student..."
                class="w-full rounded-lg border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <button id="openModalStudent"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow">
            + Add Student
        </button>
    </div>

    <div class="overflow-x-auto relative">
        <table id="studentTable" class="min-w-full divide-y divide-gray-600 text-sm text-white overflow-visible">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-200">No</th>
                    <th class="px-4 py-3 text-left text-gray-200">Nama Siswa</th>
                    <th class="px-4 py-3 text-left text-gray-200">Kelas</th>
                    <th class="px-4 py-3 text-left text-gray-200">Wali</th>
                    <th class="px-4 py-3 text-center text-gray-200">Action</th>
                </tr>
            </thead>

            <tbody class="bg-gray-900 divide-y divide-gray-700">
                @forelse ($students as $student)
                    <tr class="hover:bg-blue-900 transition">
                        <td class="px-4 py-3">{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $student->name }}</td>
                        <td class="px-4 py-3">{{ $student->classroom->name ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $student->guardian->name ?? '-' }}</td>

                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">

                                <!-- EDIT -->
                                <button
                                    onclick="openUpdateModalStudent(
                                        {{ $student->id }},
                                        '{{ $student->name }}',
                                        '{{ $student->email }}',
                                        {{ $student->classroom_id }},
                                        {{ $student->guardian_id ?? 'null' }},
                                        '{{ $student->address }}',
                                        '{{ $student->gender }}',
                                        '{{ $student->date_of_birth }}'
                                    )"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg">
                                    Edit
                                </button>

                                <!-- DELETE -->
                                <button onclick="openDeleteModalStudent({{ $student->id }}, '{{ $student->name }}')"
                                    class="px-3 py-1 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg">
                                    Hapus
                                </button>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-400">
                            Tidak ada data siswa
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        {{ $students->links() }}
    </div>


    <!-- ================== MODAL TAMBAH ================== -->
    <div id="modalStudent"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">
        <div class="bg-gray-900 text-white rounded-2xl shadow-2xl w-full max-w-lg p-6 relative border border-gray-700 max-h-[90vh] overflow-y-auto">
            <button id="closeModalStudent"
                class="absolute top-3 right-4 text-gray-400 hover:text-white text-2xl font-bold">&times;</button>

            <h2 class="text-xl font-semibold mb-4 border-b border-gray-700 pb-2">Tambah Siswa</h2>

            <form action="{{ route('admin.student.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block mb-1">Nama Lengkap</label>
                    <input type="text" name="name" required
                        class="w-full rounded-lg bg-gray-800 border-gray-700 p-2" />
                </div>

                <div>
                    <label class="block mb-1">Email</label>
                    <input type="email" name="email" required
                        class="w-full rounded-lg bg-gray-800 border-gray-700 p-2" />
                </div>

                <div>
                    <label class="block mb-1">Kelas</label>
                    <select name="classroom_id" class="w-full rounded-lg bg-gray-800 border-gray-700 p-2" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($classrooms as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1">Wali</label>
                    <select name="guardian_id" class="w-full rounded-lg bg-gray-800 border-gray-700 p-2">
                        <option value="">-- Pilih Wali --</option>
                        @foreach ($guardians as $g)
                            <option value="{{ $g->id }}">{{ $g->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1">Jenis Kelamin</label>
                    <div class="flex gap-4">
                        <label><input type="radio" name="gender" value="Laki-laki" required> Laki-laki</label>
                        <label><input type="radio" name="gender" value="Perempuan" required> Perempuan</label>
                    </div>
                </div>

                <div>
                    <label class="block mb-1">Tanggal Lahir</label>
                    <input type="date" name="date_of_birth"
                        class="w-full rounded-lg bg-gray-800 border-gray-700 p-2" required />
                </div>

                <div>
                    <label class="block mb-2">Alamat</label>
                    <textarea name="address" rows="3" class="w-full rounded-lg bg-gray-800 border-gray-700 p-2"></textarea>
                </div>

                <div class="mt-5 flex justify-end gap-3">
                    <button type="button" onclick="modalStudent.classList.add('hidden')"
                        class="px-4 py-2 bg-gray-700 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>


    <!-- ================== MODAL UPDATE ================== -->
    @include('admin.student.update')


    <!-- ================== MODAL DELETE ================== -->
    @include('admin.student.delete')


    <!-- ================== JAVASCRIPT ================== -->
    <script>
        const modalStudent = document.getElementById('modalStudent');

        document.getElementById('openModalStudent').onclick = () => modalStudent.classList.remove('hidden');
        document.getElementById('closeModalStudent').onclick = () => modalStudent.classList.add('hidden');


        // OPEN UPDATE MODAL
        function openUpdateModalStudent(id, name, email, classroomId, guardianId, address, gender, dob) {

            document.getElementById('update_student_name').value = name;
            document.getElementById('update_student_email').value = email;
            document.getElementById('update_student_classroom').value = classroomId;
            document.getElementById('update_student_guardian').value = guardianId || '';
            document.getElementById('update_student_address').value = address || '';
            document.getElementById('update_student_dob').value = dob || '';

            if (gender === 'Laki-laki') {
                document.getElementById('update_gender_male').checked = true;
            } else {
                document.getElementById('update_gender_female').checked = true;
            }

            document.getElementById('updateFormStudent').action = `/admin/student/${id}`;

            const modal = document.getElementById('updateModalStudent');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }


        // DELETE MODAL
        function openDeleteModalStudent(id, name) {
            document.getElementById('deleteStudentName').textContent = name;
            document.getElementById('deleteFormStudent').action = `/admin/student/${id}`;

            const modal = document.getElementById('deleteModalStudent');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }


        // SEARCH
        document.getElementById('searchStudent').addEventListener('keyup', function() {
            let value = this.value.toLowerCase();
            document.querySelectorAll('#studentTable tbody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(value) ? '' : 'none';
            });
        });
    </script>

</x-admin.layout>