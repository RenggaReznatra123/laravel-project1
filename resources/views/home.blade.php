<x-layout>
  <x-slot:judul>{{ $title }}</x-slot:judul>
  
  <div class="flex flex-col items-center justify-center min-h-[60vh]">
    
    @guest
      <!-- Welcome Section for Guest -->
      <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to School Management System</h1>
        <p class="text-lg text-gray-600 mb-8">Login right now</p>
        
        <!-- Login Button (Opens Modal) -->
        <button 
          onclick="openLoginModal()"
          class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3 focus:outline-none"
          type="button">
          Login to Dashboard
        </button>
      
      </div>
    @endguest

    @auth
      <!-- Welcome Section for Authenticated User -->
      <div class="text-center">
        <div class="mb-6">
          <div class="w-24 h-24 mx-auto rounded-full bg-blue-600 flex items-center justify-center text-white text-4xl font-bold shadow-lg">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
          </div>
        </div>
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="text-lg text-gray-600 mb-8">{{ Auth::user()->email }}</p>
        
        <div class="flex gap-4 justify-center">
          <a href="{{ route('admin.dashboard') }}" 
             class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3 focus:outline-none">
            Go to Admin Dashboard
          </a>
          
          <button 
            onclick="openLogoutModal()"
            class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-6 py-3 focus:outline-none"
            type="button">
            Logout
          </button>
        </div>
      </div>
    @endauth

  </div>

  <!-- Login Modal -->
  <div id="login-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
        
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Sign in to your account
          </h3>
          <button type="button" onclick="closeLoginModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        
        <!-- Modal body -->
        <div class="p-4 md:p-5">
          
          <!-- Error Messages -->
          @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form class="space-y-4" action="{{ route('login') }}" method="POST">
            @csrf
            
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
              <input 
                type="email" 
                name="email" 
                id="email" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                placeholder="name@company.com" 
                value="{{ old('email') }}"
                required 
              />
            </div>
            
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
              <input 
                type="password" 
                name="password" 
                id="password" 
                placeholder="••••••••" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" 
                required 
              />
            </div>
            
            <div class="flex justify-between">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input 
                    id="remember" 
                    name="remember" 
                    type="checkbox" 
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800" 
                  />
                </div>
                <div class="ml-3 text-sm">
                  <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                </div>
              </div>
              <a href="#" class="text-sm font-medium text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
            </div>
            
            <button 
              type="submit" 
              class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Login to your account
            </button>
            
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
              Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Logout Confirmation Modal -->
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
    function openLoginModal() {
      document.getElementById('login-modal').classList.remove('hidden');
      document.getElementById('login-modal').classList.add('flex');
    }

    function closeLoginModal() {
      document.getElementById('login-modal').classList.add('hidden');
      document.getElementById('login-modal').classList.remove('flex');
    }

    function openLogoutModal() {
      document.getElementById('logout-modal').classList.remove('hidden');
      document.getElementById('logout-modal').classList.add('flex');
    }

    function closeLogoutModal() {
      document.getElementById('logout-modal').classList.add('hidden');
      document.getElementById('logout-modal').classList.remove('flex');
    }

    // Auto-open login modal jika ada error
    @if ($errors->any())
      openLoginModal();
    @endif
  </script>

</x-layout>