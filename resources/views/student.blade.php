<x-layout>
  <x-slot:judul>{{ $title }}</x-slot:judul>
  
  <h3 class="text-3xl font-bold text-gray-800 mb-6 border-l-4 border-indigo-500 pl-4">
    STUDENT
  </h3>

  <div class="overflow-hidden rounded-xl shadow-lg border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kelas</th>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Address</th>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Gender</th>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Birthday</th>

        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($students as $index => $student)
          <tr class="hover:bg-gray-100 transition-colors duration-200">
            <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->name }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->classroom->name }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->name }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->address }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->email }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->gender }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $student->date_of_birth }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-layout>
