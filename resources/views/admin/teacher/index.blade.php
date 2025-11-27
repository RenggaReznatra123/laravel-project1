<x-admin.layout>
    <x-slot name="title">Teacher Management</x-slot>

    <div class="flex justify-between items-center mb-6">
        <!-- Search Bar -->
        <div class="flex items-center gap-3 w-full max-w-md">
            <input type="text" id="searchTeacher" placeholder="Search teacher..."
                class="w-full rounded-lg border-gray-600 bg-gray-800 text-white placeholder-gray-400 
                focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <!-- Add Button -->
        <button id="openModalTeacher" 
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow">
            + Add Teacher
        </button>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto relative">
        <table id="teacherTable" class="min-w-full divide-y divide-gray-600 text-sm text-white overflow-visible">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-200">No</th>
                    <th class="px-4 py-3 text-left text-gray-200">Nama Guru</th>
                    <th class="px-4 py-3 text-left text-gray-200">Mata Pelajaran</th>
                    <th class="px-4 py-3 text-left text-gray-200">Telepon</th>
                    <th class="px-4 py-3 text-center text-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-900 divide-y divide-gray-700">
                @foreach ($teachers as $teacher)
                    <tr class="hover:bg-blue-900 transition">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $teacher->name }}</td>
                        <td class="px-4 py-3">{{ $teacher->subject->name ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $teacher->phone }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <!-- Edit Button -->
                                <button 
                                    onclick="openUpdateModalTeacher({{ $teacher->id }}, '{{ $teacher->name }}', {{ $teacher->subject_id }}, '{{ $teacher->phone }}', '{{ $teacher->address }}', '{{ $teacher->email }}')"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg">
                                    Edit
                                </button>
                                <!-- Delete Button -->
                                <button 
                                    onclick="openDeleteModalTeacher({{ $teacher->id }}, '{{ $teacher->name }}')"
                                    class="px-3 py-1 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- MODAL TAMBAH -->
    <div id="modalTeacher" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">
        <div class="bg-gray-900 text-white rounded-2xl shadow-2xl w-full max-w-lg p-6 relative border border-gray-700">
            <button id="closeModalTeacher" 
                class="absolute top-3 right-4 text-gray-400 hover:text-white text-2xl font-bold">&times;</button>
            <h2 class="text-xl font-semibold mb-4 border-b border-gray-700 pb-2">Tambah Guru</h2>
            
            <form action="{{ route('admin.teacher.store') }}" method="POST" class="space-y-5">
                @csrf
                <!-- Nama Guru -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-1">
                        Nama Guru
                    </label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama guru" required
                        class="w-full rounded-lg border-gray-700 bg-gray-800 text-white focus:ring-blue-500 focus:border-blue-500 p-2" />
                </div>

                <!-- Mata Pelajaran -->
                <div>
                    <label for="subject_id" class="block text-sm font-medium text-gray-300 mb-1">
                        Mata Pelajaran
                    </label>
                    <select id="subject_id" name="subject_id" required
                        class="w-full rounded-lg border-gray-700 bg-gray-800 text-white focus:ring-blue-500 focus:border-blue-500 p-2">
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">
                        Email
                    </label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email" required
                        class="w-full rounded-lg border-gray-700 bg-gray-800 text-white focus:ring-blue-500 focus:border-blue-500 p-2" />
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-300 mb-1">
                        Nomor Telepon
                    </label>
                    <input type="text" id="phone" name="phone" placeholder="Masukkan nomor telepon"
                        class="w-full rounded-lg border-gray-700 bg-gray-800 text-white focus:ring-blue-500 focus:border-blue-500 p-2" />
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-300 mb-1">
                        Alamat
                    </label>
                    <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat guru"
                        class="w-full rounded-lg border-gray-700 bg-gray-800 text-white focus:ring-blue-500 focus:border-blue-500 p-2"></textarea>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="document.getElementById('modalTeacher').classList.add('hidden')" class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL UPDATE -->
    @include('admin.teacher.update')

    <!-- MODAL DELETE -->
    @include('admin.teacher.delete')

    <!-- SCRIPT -->
    <script>
        // Modal Tambah
        const modalT = document.getElementById('modalTeacher');
        document.getElementById('openModalTeacher').onclick = () => modalT.classList.remove('hidden');
        document.getElementById('closeModalTeacher').onclick = () => modalT.classList.add('hidden');

        // Modal Update
        function openUpdateModalTeacher(id, name, subjectId, phone, address, email) {
            document.getElementById('update_name').value = name;
            document.getElementById('update_subject_id').value = subjectId;
            document.getElementById('update_email').value = email || '';
            document.getElementById('update_phone').value = phone || '';
            document.getElementById('update_address').value = address || '';
            document.getElementById('updateFormTeacher').action = `/admin/teacher/${id}`;
            document.getElementById('updateModalTeacher').classList.remove('hidden');
            document.getElementById('updateModalTeacher').classList.add('flex');
        }

        // Close Update Modal
        document.querySelectorAll('[data-modal-toggle="updateModalTeacher"]').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('updateModalTeacher').classList.add('hidden');
                document.getElementById('updateModalTeacher').classList.remove('flex');
            });
        });

        // Modal Delete
        function openDeleteModalTeacher(id, name) {
            document.getElementById('deleteTeacherName').textContent = name;
            document.getElementById('deleteFormTeacher').action = `/admin/teacher/${id}`;
            document.getElementById('deleteModalTeacher').classList.remove('hidden');
            document.getElementById('deleteModalTeacher').classList.add('flex');
        }

        // Close Delete Modal
        document.querySelectorAll('[data-modal-toggle="deleteModalTeacher"]').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('deleteModalTeacher').classList.add('hidden');
                document.getElementById('deleteModalTeacher').classList.remove('flex');
            });
        });

        // Search functionality
        document.getElementById('searchTeacher').addEventListener('keyup', function () {
            const value = this.value.toLowerCase();
            document.querySelectorAll('#teacherTable tbody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(value) ? '' : 'none';
            });
        });
    </script>
</x-admin.layout>