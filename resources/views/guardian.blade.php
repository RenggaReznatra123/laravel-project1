<x-layout>
  <x-slot:judul>{{ $title }}</x-slot:judul>
  
  <h3 class="text-3xl font-bold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">
    GUARDIAN
  </h3>

  <div class="overflow-hidden rounded-xl shadow-lg border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Job</th>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Phone</th>
          <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($guardians as $index => $guardian)
          <tr class="hover:bg-gray-100 transition-colors duration-200">
            <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $guardian->name }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $guardian->job }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $guardian->phone }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $guardian->email }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-layout>
