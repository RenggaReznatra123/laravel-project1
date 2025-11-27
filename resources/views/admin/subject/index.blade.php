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
                </tr>
            </thead>
            <tbody class="bg-gray-900 divide-y divide-gray-700">
                @foreach ($subjects as $subject)
                    <tr class="hover:bg-blue-900 transition">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $subject->name }}</td>
                        <td class="px-4 py-3">{{ $subject->description ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $subject->teacher->name ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- MODAL TAMBAH -->
    <div id="modalSubject" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">
        <div class="bg-gray-900 text-white rounded-2xl shadow-2xl w-full max-w-lg p-6 relative border border-gray-700">
            <button id="closeModalSubject" 
                class="absolute top-3 right-4 text-gray-400 hover:text-white text-2xl font-bold">&times;</button>
            <h2 class="text-xl font-semibold mb-4 border-b border-gray-700 pb-2">Tambah Mata Pelajaran</h2>
            
            <form action="{{ route('admin.subject.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nama Mata Pelajaran -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">
                        Nama Mata Pelajaran
                    </label>
                    <input type="text" name="name" placeholder="Masukkan nama mata pelajaran" required
                        class="w-full rounded-lg border-gray-700 bg-gray-800 text-white
                               focus:ring-blue-500 focus:border-blue-500 p-2" />
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">
                        Deskripsi
                    </label>
                    <textarea name="description" rows="3" placeholder="Masukkan deskripsi mata pelajaran"
                        class="w-full rounded-lg border-gray-700 bg-gray-800 text-white
                               focus:ring-blue-500 focus:border-blue-500 p-2"></textarea>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" 
                        onclick="document.getElementById('modalSubject').classList.add('hidden')"
                        class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        // Modal Tambah
        const modal = document.getElementById('modalSubject');
        document.getElementById('openModalSubject').onclick = () => modal.classList.remove('hidden');
        document.getElementById('closeModalSubject').onclick = () => modal.classList.add('hidden');

        // Search filter
        document.getElementById('searchSubject').addEventListener('keyup', function () {
            const value = this.value.toLowerCase();
            const rows = document.querySelectorAll('#subjectTable tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(value) ? '' : 'none';
            });
        });
    </script>
</x-admin.layout>
