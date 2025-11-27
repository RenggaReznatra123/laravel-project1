<x-admin.layout>
    <x-slot name="title">Classroom Management</x-slot>

    <div class="flex justify-end mb-6">
        <button id="openModalClassroom" 
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow">
            + Add Classroom
        </button>
    </div>

    <div class="overflow-x-auto relative">
        <table class="min-w-full divide-y divide-gray-600 text-sm text-white">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-200">No</th>
                    <th class="px-4 py-3 text-left text-gray-200">Nama Kelas</th>
                </tr>
            </thead>
            <tbody class="bg-gray-900 divide-y divide-gray-700">
                @foreach ($classrooms as $classroom)
                    <tr class="hover:bg-blue-900 transition">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $classroom->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- MODAL TAMBAH -->
    <div id="modalClassroom" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">
        <div class="bg-gray-900 text-white rounded-2xl shadow-2xl w-full max-w-lg p-6 relative border border-gray-700">
            <button id="closeModalClassroom" 
                class="absolute top-3 right-4 text-gray-400 hover:text-white text-2xl font-bold">&times;</button>
            <h2 class="text-xl font-semibold mb-4 border-b border-gray-700 pb-2">Tambah Kelas</h2>
            
            <form action="{{ route('admin.classroom.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="classroom_name" class="block text-sm font-medium text-gray-300">
                        Nama Kelas
                    </label>
                    <input type="text" id="classroom_name" name="classroom_name" placeholder="Masukkan nama kelas" required
                        class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 bg-gray-800 border-gray-700 text-white">
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="document.getElementById('modalClassroom').classList.add('hidden')" class="px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal Tambah
        const modalC = document.getElementById('modalClassroom');
        document.getElementById('openModalClassroom').onclick = () => modalC.classList.remove('hidden');
        document.getElementById('closeModalClassroom').onclick = () => modalC.classList.add('hidden');
    </script>
</x-admin.layout>