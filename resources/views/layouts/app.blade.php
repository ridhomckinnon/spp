<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <!-- Scripts -->
    <script defer src="{{ asset('js/alpine.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/flowbite.js') }}"></script>

    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script></script>

</head>

<body class="font-sans antialiased">
    <div class="flex min-h-screen bg-gray-100">
        <aside class="fixed shadow-sm inset-y-0 z-20 flex-shrink-0 w-64 top-0 overflow-y-auto dark:bg-gray-800">

            <div class="h-full bg-white rounded dark:bg-gray-800">
                <div class="shrink-0 flex px-3 mb-2 h-16">
                    <a href="{{ route('dashboard') }}" class="flex no-underline items-center text-black">
                        <div>
                            <x-application-logo class="block h-4 w-auto fill-current text-gray-600" />
                        </div>
                        <div class="font-bold ml-4">SMKS JAMBI Medan</div>
                    </a>
                </div>
                <ul class="space-y-2 pl-0">
                    <li class="relative px-3">
                        <!-- <span class="absolute inset-y-0 left-0 w-1 bg-rose-500 rounded-tr-lg rounded-br-lg"></span> -->
                        <a href="/dashboard"
                            class="{{ request()->is('dashboard') ? 'bg-rose-500 flex items-center no-underline hover:text-gray-900 p-2 text-base font-normal text-white rounded-lg dark:text-white dark:hover:bg-gray-700' : 'flex items-center no-underline hover:text-rose-500 p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700' }}">
                            <span class="w-5 h-5 flex items-center justify-center"><i
                                    class="fa fa-chart-pie"></i></span>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    @can('isAdmin')
                        <li class="px-3">
                            <button type="button"
                                class="flex items-center hover:text-rose-500 p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700"
                                aria-controls="setting" data-collapse-toggle="setting">
                                <i class="fa fa-gear"></i>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Pengaturan</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="setting" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="/classes"
                                        class="{{ request()->is('classes') ? 'bg-rose-500 flex items-center no-underline hover:text-gray-900 p-2 pl-11 text-base font-normal text-white rounded-lg dark:text-white dark:hover:bg-gray-700' : 'flex items-center no-underline hover:text-rose-500 p-2 pl-11 text-base font-normal text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700' }}">Kelas</a>
                                </li>
                                <li>
                                    <a href="/period"
                                        class="{{ request()->is('period') ? 'bg-rose-500 flex items-center no-underline hover:text-gray-900 p-2 pl-11 text-base font-normal text-white rounded-lg dark:text-white dark:hover:bg-gray-700' : 'flex items-center no-underline hover:text-rose-500 p-2 pl-11 text-base font-normal text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700' }}">Periode</a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    <li class="px-3">
                        <a href="/student"
                            class="{{ request()->is('student') ? 'bg-rose-500 flex items-center no-underline hover:text-gray-900 p-2 text-base font-normal text-white rounded-lg dark:text-white dark:hover:bg-gray-700' : 'flex items-center no-underline hover:text-rose-500 p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700' }}">
                            <span class="w-5 h-5 flex items-center justify-center"><i class="fa fa-user"></i></span>
                            <span class="flex-1 ml-3 whitespace-nowrap">Data Siswa</span>
                        </a>
                    </li>
                    <li class="px-3">
                        <!-- <a href="/transaction" class="flex items-center no-underline hover:text-rose-500 p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"><i class="fa fa-credit-card"></i></span>
                        <span class="flex-1 ml-3 whitespace-nowrap">Transaksi</span> -->
                        </a>
                        <button type="button"
                            class="flex items-center hover:text-rose-500 p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700"
                            aria-controls="transaction" data-collapse-toggle="transaction">
                            <i class="fa fa-credit-card"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Transaksi</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="transaction" class="hidden py-2 space-y-2">
                            <li>
                                <a href="/mutation"
                                    class="{{ request()->is('mutation') ? 'bg-rose-500 flex items-center no-underline hover:text-gray-900 p-2 pl-11 text-base font-normal text-white rounded-lg dark:text-white dark:hover:bg-gray-700' : 'flex items-center no-underline hover:text-rose-500 p-2 pl-11 text-base font-normal text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700' }}">Mutasi</a>
                            </li>
                            <li>
                                <a href="/transaction"
                                    class="{{ request()->is('transaction') ? 'bg-rose-500 flex items-center no-underline hover:text-gray-900 p-2 pl-11 text-base font-normal text-white rounded-lg dark:text-white dark:hover:bg-gray-700' : 'flex items-center no-underline hover:text-rose-500 p-2 pl-11 text-base font-normal text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700' }}">Pembayaran</a>
                            </li>
                        </ul>
                    </li>
                    <li class="px-3">
                        <a href="/report"
                            class="{{ request()->is('report') ? 'bg-rose-500 flex items-center no-underline hover:text-gray-900 p-2 text-base font-normal text-white rounded-lg dark:text-white dark:hover:bg-gray-700' : 'flex items-center no-underline hover:text-rose-500 p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700' }}">
                            <span class="w-5 h-5 flex items-center justify-center"><i class="fa fa-print"></i></span>
                            <span class="flex-1 ml-3 whitespace-nowrap">Laporan</span>
                        </a>
                    </li>

                    @can('isAdmin')
                        <li class="px-3">
                            <a href="{{ route('user') }}"
                                class="{{ request()->is('user') ? 'bg-rose-500 flex items-center no-underline hover:text-gray-900 p-2 text-base font-normal text-white rounded-lg dark:text-white dark:hover:bg-gray-700' : 'flex items-center no-underline hover:text-rose-500 p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700' }}">
                                <span class="w-5 h-5 flex items-center justify-center"><i class="fa fa-users"></i></span>
                                <span class="flex-1 ml-3 whitespace-nowrap">Operator</span>
                            </a>
                        </li>
                    @endcan

                    @can('isAdmin')
                        <li class="px-3">
                            <a href="{{ route('profile') }}"
                                class="{{ request()->is('profile') ? 'bg-rose-500 flex items-center no-underline hover:text-gray-900 p-2 text-base font-normal text-white rounded-lg dark:text-white dark:hover:bg-gray-700' : 'flex items-center no-underline hover:text-rose-500 p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700' }}>
                                <span class="w-5
                                h-5 flex items-center justify-center"><i class="fa fa-school"></i></span>
                                <span class="flex-1 ml-3 whitespace-nowrap">Profile Sekolah</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </div>
        </aside>

        <!-- Page Content -->
        <div class="flex flex-col flex-1 w-full lg:ml-64 ">
            <header class="fixed z-20 bg-white md:w-10/12 w-screen">
                @include('layouts.navigation')

            </header>
            <main class="mt-24">
                <div class="main-heading mx-4 mb-4">
                    {{ $heading }}
                </div>
                <div class="main-body bg-white mx-4 mb-4 py-4 px-4 sm:px-6 lg:px-8 shadow-sm rounded-xl">

                    {{ $main }}
                </div>
                @include('sweetalert::alert')


            </main>
        </div>
    </div>
</body>

{{ $script ?? null }}

</html>
