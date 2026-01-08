<x-admin.layout>
    <x-slot name="title">Subject Management</x-slot>

    <div class="flex justify-between items-center mb-6">
        <!-- Search Bar -->
        <div class="flex items-center gap-3 w-full max-w-md">
            <input type="text" id="searchSubject" placeholder="Search subject..."
                class="w-full rounded-lg border-gray-600 bg-gray-800 text-white placeholder-gray-400 
                focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <!-- Add Button -->
        <button id="openModalSubject" 
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow">
            + Add Subject
        </button>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto relative">
        <table id="subjectTable" class="min-w-full divide-y divide-gray-600 text-sm text-white overflow-visible">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-200">No</th>
                    <th class="px-4 py-3 text-left text-gray-200">Nama Mata Pelajaran</th>
                    <th class="px-4 py-3 text-left text-gray-200">Deskripsi</th>
                    <th class="px-4 py-3 text-left text-gray-200">Guru Pengajar</th>
                    <th class="px-4 py-3 text-left text-gray-200">Aksi</th>
                </tr>
            </thead>

            <tbody class="bg-gray-900 divide-y divide-gray-700">
                @foreach ($subjects as $subject)
                    <tr class="hover:bg-blue-900 transition">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $subject->name }}</td>
                        <td class="px-4 py-3">{{ $subject->description ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $subject->teacher->name ?? '-' }}</td>

                        <td class="px-4 py-3">
                            <button onclick="openDeleteSubject({{ $subject->id }})"
                                class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- INCLUDE DELETE MODAL -->
    @include('admin.subject.delete_modal')

    <!-- MODAL TAMBAH -->
    <div id="modalSubject" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">
        <div class="bg-gray-900 text-white rounded-2xl shadow-2xl w-full max-w-lg p-6 relative border border-gray-700">
            <button id="closeModalSubject" 
                class="absolute top-3 right-4 text-gray-400 hover:text-white text-2xl font-bold">&times;</button>
            <h2 class="text-xl font-semibold mb-4 border-b border-gray-700 pb-2">Tambah Mata Pelajaran</h2>
            
            <form action="{{ route('admin.subject.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Nama Mata Pelajaran</label>
                    <input type="text" name="name" required
                        class="w-full p-2 rounded-lg bg-gray-800 border border-gray-700">
                </div>

                <div>
                    <label class="block text-sm font-medium">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full p-2 rounded-lg bg-gray-800 border border-gray-700"></textarea>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button"
                        onclick="modalSubject.classList.add('hidden')"
                        class="px-4 py-2 bg-gray-700 rounded-lg">Batal</button>

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modalSubject = document.getElementById('modalSubject');
        document.getElementById('openModalSubject').onclick = () => modalSubject.classList.remove('hidden');
        document.getElementById('closeModalSubject').onclick = () => modalSubject.classList.add('hidden');

        // Search filter
        document.getElementById('searchSubject').addEventListener('keyup', function () {
            const value = this.value.toLowerCase();
            const rows = document.querySelectorAll('#subjectTable tbody tr');
            rows.forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(value) ? '' : 'none';
            });
        });
    </script>

</x-admin.layout>
