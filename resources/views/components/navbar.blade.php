<div>
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <x-nav-link href="/home" :active="request()->is('home')">Home</x-nav-link>
              <x-nav-link href="/profil" :active="request()->is('profil')">Profil</x-nav-link>
              <x-nav-link href="/kontak" :active="request()->is('kontak')">Kontak</x-nav-link>
              <x-nav-link href="/students" :active="request()->is('students')">Siswa</x-nav-link>
              <x-nav-link href="/guardians" :active="request()->is('guardians')">Wali Murid</x-nav-link>
              <x-nav-link href="/classrooms" :active="request()->is('classrooms')">Kelas</x-nav-link>
              <x-nav-link href="/subjects" :active="request()->is('subjects')">Mata Pelajaran</x-nav-link>
              <x-nav-link href="/teachers" :active="request()->is('teachers')">Guru</x-nav-link>
            </div>
          </div>
        </div>

        <!-- Right Side (Auth Profile/Login) -->
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6 gap-3">
            
            @guest
              <!-- Login Button (when NOT logged in) -->
              <button 
                onclick="openLoginModal()"
                class="rounded-md px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                Login
              </button>
            @endguest

            @auth
              <!-- User Profile Dropdown (when logged in) -->
              <div class="relative">
                <button 
                  onclick="toggleDropdown()"
                  class="relative flex items-center gap-2 focus:outline-none">
                  <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold hover:bg-blue-700 transition">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                  </div>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdown-menu" class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                  <div class="px-4 py-3 border-b border-gray-100">
                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                  </div>
                  
                  <div class="py-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                      <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                      </svg>
                      go to Admin Dashboard
                    </a>
                    
                    <button 
                      onclick="openLogoutModal()"
                      class="w-full flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                      <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                      </svg>
                      Logout
                    </button>
                  </div>
                </div>
              </div>
            @endauth
          </div>
        </div>

        <!-- Mobile menu button -->
        <div class="-mr-2 flex md:hidden">
          <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <x-nav-link-mobile href="/home" :active="request()->is('home')">Home</x-nav-link-mobile>
        <x-nav-link-mobile href="/profil" :active="request()->is('profil')">Profil</x-nav-link-mobile>
        <x-nav-link-mobile href="/kontak" :active="request()->is('kontak')">Kontak</x-nav-link-mobile>
        <x-nav-link-mobile href="/students" :active="request()->is('students')">Siswa</x-nav-link-mobile>
        <x-nav-link-mobile href="/guardians" :active="request()->is('guardians')">Wali Murid</x-nav-link-mobile>
        <x-nav-link-mobile href="/classrooms" :active="request()->is('classrooms')">Kelas</x-nav-link-mobile>
        <x-nav-link-mobile href="/subjects" :active="request()->is('subjects')">Mata Pelajaran</x-nav-link-mobile>
        <x-nav-link-mobile href="/teachers" :active="request()->is('teachers')">Guru</x-nav-link-mobile>
      </div>

      <div class="border-t border-gray-700 pt-4 pb-3">
        @auth
          <div class="flex items-center px-5">
            <div class="shrink-0">
              <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
              </div>
            </div>
            <div class="ml-3">
              <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
              <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
            </div>
          </div>
          <div class="mt-3 space-y-1 px-2">
            <a href="{{ route('admin.dashboard') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Back to Home</a>
            <button 
              onclick="openLogoutModal()"
              class="w-full text-left block rounded-md px-3 py-2 text-base font-medium text-red-400 hover:bg-gray-700 hover:text-red-300">
              Logout
            </button>
          </div>
        @else
          <div class="px-2">
            <button 
              onclick="openLoginModal()"
              class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
              Login
            </button>
          </div>
        @endauth
      </div>
    </el-disclosure>
  </nav>

  <!-- Logout Modal (Global) -->
  <div id="logout-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        
        <button type="button" onclick="closeLogoutModal()" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        
        <div class="p-4 md:p-5 text-center">
          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
          </svg>
          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to logout from your account?</h3>
          
          <div class="flex items-center justify-center gap-4">
            <form action="{{ route('logout') }}" method="POST" class="inline">
              @csrf
              <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                Yes, I'm sure
              </button>
            </form>
            
            <button onclick="closeLogoutModal()" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
              No, cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function toggleDropdown() {
      const dropdown = document.getElementById('dropdown-menu');
      dropdown.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
      const dropdown = document.getElementById('dropdown-menu');
      const button = event.target.closest('button[onclick="toggleDropdown()"]');
      
      if (!button && dropdown && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden');
      }
    });

    function openLogoutModal() {
      document.getElementById('logout-modal').classList.remove('hidden');
      document.getElementById('logout-modal').classList.add('flex');
      // Close dropdown
      const dropdown = document.getElementById('dropdown-menu');
      if (dropdown) dropdown.classList.add('hidden');
    }

    function closeLogoutModal() {
      document.getElementById('logout-modal').classList.add('hidden');
      document.getElementById('logout-modal').classList.remove('flex');
    }
  </script>
</div>