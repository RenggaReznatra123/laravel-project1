<x-admin.layout>
    <x-slot name="title">Guardian Management</x-slot>

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <!-- Search -->
        <div class="flex items-center gap-3 w-full max-w-md">
            <input type="text" id="searchGuardian" placeholder="Search guardian..."
                class="w-full rounded-lg border-gray-600 bg-gray-800 text-white placeholder-gray-400 
                focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Button Add -->
        <button id="openModalGuardian"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow">
            + Add Guardian
        </button>
    </div>

    <!-- Tabel -->
    <div class="overflow-x-auto relative">
        <table id="guardianTable" class="min-w-full divide-y divide-gray-600 text-sm text-white overflow-visible">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-200">No</th>
                    <th class="px-4 py-3 text-left text-gray-200">Nama Wali</th>
                    <th class="px-4 py-3 text-left text-gray-200">Telepon</th>
                    <th class="px-4 py-3 text-left text-gray-200">Pekerjaan</th>
                    <th class="px-4 py-3 text-left text-gray-200">Alamat</th>
                    <th class="px-4 py-3 text-center text-gray-200">Action</th>
                </tr>
            </thead>

            <tbody class="bg-gray-900 divide-y divide-gray-700">
                @foreach ($guardians as $guardian)
                    <tr class="hover:bg-blue-900 transition">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $guardian->name }}</td>
                        <td class="px-4 py-3">{{ $guardian->phone ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $guardian->job ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $guardian->address ?? '-' }}</td>

                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">

                                <!-- Edit -->
                                <button onclick="
                                    openUpdateModalGuardian(
                                        {{ $guardian->id }},
                                        '{{ $guardian->name }}',
                                        '{{ $guardian->job }}',
                                        '{{ $guardian->phone }}',
                                        '{{ $guardian->email }}',
                                        '{{ $guardian->address }}'
                                    )"
                                    class="px-3 py-1 text-xs font-medium text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg">
                                    Edit
                                </button>

                                <!-- Delete -->
                                <button onclick="openDeleteModalGuardian({{ $guardian->id }}, '{{ $guardian->name }}')"
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

    <!-- Modal Tambah -->
    @include('admin.guardian.form')

    <!-- Modal Update -->
    @include('admin.guardian.update')

    <!-- Modal Delete -->
    @include('admin.guardian.delete')


    <!-- SCRIPT SEMUA MODAL -->
    <script>
        /* ===========================
            MODAL ADD
        =========================== */
        document.getElementById('openModalGuardian').onclick = () => {
            document.getElementById('addGuardianModal').classList.remove('hidden');
        };


        /* ===========================
            MODAL UPDATE
        =========================== */
        function openUpdateModalGuardian(id, name, job, phone, email, address) {

            document.getElementById('update_guardian_name').value = name;
            document.getElementById('update_guardian_job').value = job || '';
            document.getElementById('update_guardian_phone').value = phone || '';
            document.getElementById('update_guardian_email').value = email || '';
            document.getElementById('update_guardian_address').value = address || '';

            document.getElementById('updateFormGuardian').action = `/admin/guardian/${id}`;

            const modal = document.getElementById('updateModalGuardian');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        document.querySelectorAll('[data-modal-toggle="updateModalGuardian"]').forEach(btn => {
            btn.addEventListener('click', () => {
                const modal = document.getElementById('updateModalGuardian');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        });


        /* ===========================
            MODAL DELETE
        =========================== */
        function openDeleteModalGuardian(id, name) {
            document.getElementById('deleteGuardianName').textContent = name;
            document.getElementById('deleteFormGuardian').action = `/admin/guardian/${id}`;

            const modal = document.getElementById('deleteModalGuardian');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        document.querySelectorAll('[data-modal-toggle="deleteModalGuardian"]').forEach(btn => {
            btn.addEventListener('click', () => {
                const modal = document.getElementById('deleteModalGuardian');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        });


        /* ===========================
            SEARCH TABLE
        =========================== */
        document.getElementById('searchGuardian').addEventListener('keyup', function () {
            const value = this.value.toLowerCase();
            const rows = document.querySelectorAll('#guardianTable tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(value) ? '' : 'none';
            });
        });
    </script>

</x-admin.layout>
