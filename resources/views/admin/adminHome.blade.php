<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as admin!") }}
                </div>
                <div class="row">
                    <button class="p-6" style="background-color: darkgray">
                        <a href="{{ route('pengumuman') }}">Pengumuman</a>
                    </button>
                    <button class="p-6" style="background-color: darkgray">
                        <a href="{{ route('berita') }}">Berita</a>
                    </button>
                    <button class="p-6" style="background-color: darkgray">
                        <a href="{{ route('tender') }}">Data Tender</a>
                    </button>
                    <button class="p-6" style="background-color: darkgray">
                        <a href="{{ route('non_tender') }}">Data Non Tender</a>
                    </button>
                    <button class="p-6" style="background-color: darkgray">
                        <a href="{{ route('e_purchasing') }}">Data E-Purchasing</a>
                    </button>
                    <button class="p-6" style="background-color: darkgray">
                        <a href="{{ route('penyedia') }}">Data Penyedia</a>
                    </button>
                    <button class="p-6" style="background-color: darkgray">
                        <a href="{{ route('swakelola') }}">Data Swakelola</a>
                    </button>
                    <button class="p-6" style="background-color: darkgray">
                        <a href="{{ route('gallery') }}">Gallery</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>