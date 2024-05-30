<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div class="container flex items-center justify-end h-full px-6 mx-auto text-red-600 dark:text-red-300">
        <nav>
        </nav>
        <div class="flex flex-1">
            <p>
                <a class="inline-flex items-center text-sm mr-5 font-semibold transition-colors duration-150 "
                    href="{{ url('user') }}">
                    Dashboard
                </a>
            </p>
            <p>
                <a class="inline-flex items-center text-sm mr-5 font-semibold transition-colors duration-150 "
                    href="{{ url('pengaduan/detail') }} ">
                    Pengaduan
                </a>
            </p>
        </div>

        <ul class="flex items-center flex-shrink-2 space-x-6">
            <!-- Theme toggler -->
            <li class="flex">
                <button class="rounded-md focus:outline-none focus:shadow-outline-red" @click="toggleTheme"
                    aria-label="Toggle color mode">
                    <template x-if="!dark">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </template>
                    <template x-if="dark">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </template>
                </button>
            </li>
            <li class="flex">
                <p>Welcome, <a href="{{ route('profile.edit') }}" target="__blank">{{ Auth::user()->name }} </a></p>
            </li>
            <!-- Profile menu -->
            <li class="relative">
                <i class="far fa-sign-out"></i>
            </li>
        </ul>
    </div>
</header>
