<form class="space-y-5">

    <!-- Nama Lengkap -->
    <div>
        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Nama Lengkap
        </label>
        <input type="text" id="nama" name="nama" required
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500" />
    </div>

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Email
        </label>
        <input type="email" id="email" name="email" required
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500" />
    </div>

    <!-- Kelas -->
    <div>
        <label for="classroom_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Kelas
        </label>
        <select id="classroom_id" name="classroom_id" required
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500">
            <option value="">-- Pilih Kelas --</option>
            @foreach ($classrooms as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Alamat -->
    <div>
        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Alamat
        </label>
        <textarea id="address" name="address" rows="3"
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500"></textarea>
    </div>

    <!-- Nomor Telepon -->
    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Nomor Telepon
        </label>
        <input type="text" id="phone" name="phone"
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500" />
    </div>

    <!-- Jenis Kelamin -->
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Jenis Kelamin
        </label>
        <div class="flex gap-6">
            <label class="inline-flex items-center">
                <input type="radio" name="gender" value="Laki-laki" 
                       class="text-blue-600 focus:ring-blue-500" required>
                <span class="ml-2 text-gray-700 dark:text-gray-300">Laki-laki</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="gender" value="Perempuan" 
                       class="text-blue-600 focus:ring-blue-500" required>
                <span class="ml-2 text-gray-700 dark:text-gray-300">Perempuan</span>
            </label>
        </div>
    </div>

    <!-- Tanggal Lahir -->
    <div>
        <label for="date_of_birth" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Tanggal Lahir
        </label>
        <input type="date" id="date_of_birth" name="date_of_birth" required
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500" />
    </div>

    <!-- Tombol Simpan -->
    <div class="flex justify-end mt-6">
        <button type="submit"
            class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium 
                   rounded-lg shadow focus:ring-2 focus:ring-blue-400 transition">
            Simpan
        </button>
    </div>
</form>
