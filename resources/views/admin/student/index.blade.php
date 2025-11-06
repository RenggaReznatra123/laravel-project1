<x-admin.layout>
    <x-slot name="title">Student Management</x-slot>

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
            Student List
        </h1>

        <div class="flex items-center gap-3">
            <!-- Tombol Update & Delete -->
            <div id="actionButtons" class="hidden flex gap-2">
                <button id="updateBtn"
                    class="px-4 py-2 text-sm font-medium bg-emerald-600 hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-400 text-white rounded-lg shadow transition">
                    Update
                </button>
                <button id="deleteBtn"
                    class="px-4 py-2 text-sm font-medium bg-red-600 hover:bg-red-700 focus:ring-2 focus:ring-red-400 text-white rounded-lg shadow transition">
                    Delete
                </button>
            </div>

            <!-- Tombol Add Student -->
            <button id="openModalBtn"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-400 dark:bg-blue-500 dark:hover:bg-blue-600 rounded-lg shadow transition">
                + Add Student
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="w-full overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden rounded-xl shadow border border-gray-300 dark:border-gray-700">
            <table id="studentTable"
                class="min-w-full divide-y divide-gray-300 dark:divide-gray-700 text-sm">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Kelas</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Alamat</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Telepon</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Jenis Kelamin</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Tanggal Lahir</th>
                    </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($students as $student)
                        <tr class="student-row hover:bg-blue-100 dark:hover:bg-blue-900/30 hover:shadow-inner transition-all cursor-pointer"
                            data-id="{{ $student->id }}">
                            <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-gray-800 dark:text-gray-300">{{ $student->nama }}</td>
                            <td class="px-4 py-3 text-gray-700 dark:text-gray-400">{{ $student->email }}</td>
                            <td class="px-4 py-3 text-gray-700 dark:text-gray-400">{{ $student->classroom->name }}</td>
                            <td class="px-4 py-3 max-w-[200px] truncate text-gray-700 dark:text-gray-400" title="{{ $student->address }}">
                                {{ $student->address }}
                            </td>
                            <td class="px-4 py-3 text-gray-700 dark:text-gray-400">{{ $student->phone }}</td>
                            <td class="px-4 py-3 text-gray-700 dark:text-gray-400">{{ $student->gender }}</td>
                            <td class="px-4 py-3 text-gray-700 dark:text-gray-400">{{ $student->date_of_birth }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-2 text-xs text-gray-500 dark:text-gray-400 text-center lg:hidden">
            ← Geser ke kanan untuk melihat kolom lainnya →
        </div>
    </div>

    <!-- Modal Add Student -->
    <div id="addStudentModal"
         class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-2xl p-6 relative transform transition-all duration-300 scale-100 opacity-100 animate-fade-in">
            <button id="closeModalBtn"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 text-2xl font-bold transition">
                &times;
            </button>

            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">
                Tambah Siswa
            </h2>

            @include('admin.student.form')
        </div>
    </div>

    <script>
        const rows = document.querySelectorAll('.student-row');
        const actionButtons = document.getElementById('actionButtons');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modal = document.getElementById('addStudentModal');
        let selectedId = null;

        // Klik baris → tampil tombol aksi
        rows.forEach(row => {
            row.addEventListener('click', () => {
                rows.forEach(r => r.classList.remove('bg-blue-200/50', 'dark:bg-blue-900/50'));
                row.classList.add('bg-blue-200/50', 'dark:bg-blue-900/50');
                selectedId = row.dataset.id;
                actionButtons.classList.remove('hidden');
            });
        });

        // Buka modal
        openModalBtn.addEventListener('click', () => modal.classList.remove('hidden'));

        // Tutup modal
        closeModalBtn.addEventListener('click', () => modal.classList.add('hidden'));
        window.addEventListener('click', (e) => {
            if (e.target === modal) modal.classList.add('hidden');
        });
    </script>
</x-admin.layout>