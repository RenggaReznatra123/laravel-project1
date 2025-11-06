<form class="space-y-5">
    <!-- Nama Guru -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Nama Guru
        </label>
        <input type="text" id="name" name="name" placeholder="Masukkan nama guru" required
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500" />
    </div>

    <!-- Mata Pelajaran -->
    <div>
        <label for="subject_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Mata Pelajaran
        </label>
        <select id="subject_id" name="subject_id" required
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500">
            <option value="">-- Pilih Mata Pelajaran --</option>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Nomor Telepon -->
    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Nomor Telepon
        </label>
        <input type="text" id="phone" name="phone" placeholder="Masukkan nomor telepon"
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500" />
    </div>

    <!-- Alamat -->
    <div>
        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            Alamat
        </label>
        <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat guru"
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 
                   dark:bg-gray-800 dark:text-gray-200 
                   focus:ring-blue-500 focus:border-blue-500"></textarea>
    </div>
</form>
