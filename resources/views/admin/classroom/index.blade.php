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
                    <th class="px-4 py-3 text-left text-gray-200">Aksi</th>
                </tr>
            </thead>

            <tbody class="bg-gray-900 divide-y divide-gray-700">
                @forelse ($classrooms as $classroom)
                    <tr class="hover:bg-blue-900 transition">
                        <td class="px-4 py-3">{{ ($classrooms->currentPage() - 1) * $classrooms->perPage() + $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $classroom->name }}</td>

                        <td class="px-4 py-3">
                            <button onclick="openDeleteClassroom({{ $classroom->id }}, '{{ $classroom->name }}')"
                                class="px-3 py-1 bg-red-600 rounded-lg hover:bg-red-700">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-8 text-center text-gray-400">
                            Tidak ada data kelas
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        {{ $classrooms->links() }}
    </div>

    @include('admin.classroom.delete_modal')

    <!-- MODAL TAMBAH -->
    <div id="modalClassroom" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm">
        <div class="bg-gray-900 text-white rounded-2xl shadow-2xl w-full max-w-lg p-6 relative border border-gray-700">
            <button id="closeModalClassroom" 
                class="absolute top-3 right-4 text-gray-400 hover:text-white text-2xl font-bold">&times;</button>

            <h2 class="text-xl font-semibold mb-4 border-b border-gray-700 pb-2">Tambah Kelas</h2>

            <form action="{{ route('admin.classroom.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium">Nama Kelas</label>
                    <input type="text" name="classroom_name" required
                        class="w-full p-2 rounded-lg bg-gray-800 border border-gray-700">
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button"
                        onclick="modalClassroom.classList.add('hidden')"
                        class="px-4 py-2 bg-gray-700 rounded-lg">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 rounded-lg">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modalClassroom = document.getElementById('modalClassroom');
        document.getElementById('openModalClassroom').onclick = () => modalClassroom.classList.remove('hidden');
        document.getElementById('closeModalClassroom').onclick = () => modalClassroom.classList.add('hidden');
    </script>

</x-admin.layout>