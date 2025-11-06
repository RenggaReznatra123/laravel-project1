<x-admin.layout>
    <x-slot name="title">Guardian Management</x-slot>

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
            Guardian List
        </h1>

        <div class="flex items-center gap-3">
            <div id="actionButtons" class="hidden flex gap-2">
                <button id="updateBtn" class="px-4 py-2 text-sm font-medium bg-emerald-600 hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-400 text-white rounded-lg shadow transition">Update</button>
                <button id="deleteBtn" class="px-4 py-2 text-sm font-medium bg-red-600 hover:bg-red-700 focus:ring-2 focus:ring-red-400 text-white rounded-lg shadow transition">Delete</button>
            </div>

            <button id="openModalBtn" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-400 dark:bg-blue-500 dark:hover:bg-blue-600 rounded-lg shadow transition">
                + Add Guardian
            </button>
        </div>
    </div>

    <div class="w-full overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden rounded-xl shadow border border-gray-300 dark:border-gray-700">
            <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700 text-sm">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Telepon</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Alamat</th>
                    </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($guardians as $guardian)
                        <tr class="guardian-row hover:bg-blue-100 dark:hover:bg-blue-900/30 hover:shadow-inner transition-all cursor-pointer" data-id="{{ $guardian->id }}">
                            <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-gray-800 dark:text-gray-300">{{ $guardian->name }}</td>
                            <td class="px-4 py-3 text-gray-700 dark:text-gray-400">{{ $guardian->phone }}</td>
                            <td class="px-4 py-3 text-gray-700 dark:text-gray-400">{{ $guardian->address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add Guardian -->
    <div id="addGuardianModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-2xl p-6 relative">
            <button id="closeModalBtn" class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 text-2xl font-bold transition">&times;</button>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Tambah Wali Murid</h2>
            @include('admin.guardian.form')
        </div>
    </div>

    <script>
        const guardianRows = document.querySelectorAll('.guardian-row');
        const guardianModal = document.getElementById('addGuardianModal');
        document.getElementById('openModalBtn').addEventListener('click', () => guardianModal.classList.remove('hidden'));
        document.getElementById('closeModalBtn').addEventListener('click', () => guardianModal.classList.add('hidden'));
        guardianRows.forEach(row => row.addEventListener('click', () => {
            guardianRows.forEach(r => r.classList.remove('bg-blue-200/50', 'dark:bg-blue-900/50'));
            row.classList.add('bg-blue-200/50', 'dark:bg-blue-900/50');
        }));
    </script>
</x-admin.layout>
