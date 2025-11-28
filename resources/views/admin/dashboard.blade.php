@extends('layouts.admin')

@section('header')
    {{ __('Dashboard') }}
@endsection

@section('content')
    <div class="w-full mx-auto">

        <div class="mb-6 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-brand-dark">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-gray-600 mt-1">Ini adalah pusat kendali cARImobil. Dari sini Anda bisa mengelola semua data mobil
                dan pengguna.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                <div class="p-3 rounded-full bg-brand-orange bg-opacity-10 text-brand-orange">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 15 15">
                        <path fill="#000000"
                            d="M14.5 6.497h.5v-.139l-.071-.119l-.429.258Zm-14 0l-.429-.258L0 6.36v.138h.5Zm2.126-3.541l-.429-.258l.429.258Zm9.748 0l.429-.258l-.429.258ZM3.5 11.5V11H3v.5h.5Zm8 0h.5V11h-.5v.5ZM14 6.497V12.5h1V6.497h-1ZM.929 6.754l2.126-3.54l-.858-.516L.071 6.24l.858.515ZM5.198 2h4.604V1H5.198v1Zm6.747 1.213l2.126 3.541l.858-.515l-2.126-3.54l-.858.514ZM2.5 13h-1v1h1v-1Zm.5-1.5v1h1v-1H3ZM13.5 13h-1v1h1v-1Zm-1.5-.5v-1h-1v1h1Zm-.5-1.5h-8v1h8v-1ZM1 12.5V6.497H0V12.5h1Zm11.5.5a.5.5 0 0 1-.5-.5h-1a1.5 1.5 0 0 0 1.5 1.5v-1Zm-10 1A1.5 1.5 0 0 0 4 12.5H3a.5.5 0 0 1-.5.5v1Zm-1-1a.5.5 0 0 1-.5-.5H0A1.5 1.5 0 0 0 1.5 14v-1ZM9.802 2a2.5 2.5 0 0 1 2.143 1.213l.858-.515A3.5 3.5 0 0 0 9.802 1v1ZM3.055 3.213A2.5 2.5 0 0 1 5.198 2V1a3.5 3.5 0 0 0-3 1.698l.857.515ZM14 12.5a.5.5 0 0 1-.5.5v1a1.5 1.5 0 0 0 1.5-1.5h-1ZM2 10h3V9H2v1Zm11-1h-3v1h3V9ZM3 7h9V6H3v1Z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Mobil</p>
                    <p class="text-3xl font-bold text-brand-dark">{{ $totalCars }}</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                <div class="p-3 rounded-full bg-blue-500 bg-opacity-10 text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 18 18"
                        fill="#303030">
                        <g fill="#303030" fill-rule="evenodd">
                            <path
                                d="M13.689 11.132c1.155 1.222 1.953 2.879 2.183 4.748a1.007 1.007 0 0 1-1 1.12H3.007a1.005 1.005 0 0 1-1-1.12c.23-1.87 1.028-3.526 2.183-4.748c.247.228.505.442.782.633c-1.038 1.069-1.765 2.55-1.972 4.237L14.872 16c-.204-1.686-.93-3.166-1.966-4.235a7.01 7.01 0 0 0 .783-.633M8.939 1c1.9 0 3 2 4.38 2.633a2.483 2.483 0 0 1-1.88.867c-.298 0-.579-.06-.844-.157A3.726 3.726 0 0 1 7.69 5.75c-1.395 0-3.75.25-3.245-1.903C5.94 3 6.952 1 8.94 1" />
                            <path
                                d="M8.94 2c2.205 0 4 1.794 4 4s-1.795 4-4 4c-2.207 0-4-1.794-4-4s1.793-4 4-4m0 9A5 5 0 1 0 8.937.999A5 5 0 0 0 8.94 11" />
                        </g>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Pengguna (Non-Admin)</p>
                    <p class="text-3xl font-bold text-brand-dark">{{ $totalUsers }}</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                <div class="p-3 rounded-full bg-purple-500 bg-opacity-10 text-purple-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Merek Terdaftar</p>
                    <p class="text-3xl font-bold text-brand-dark">{{ $totalBrands }}</p>
                </div>
            </div>

        </div>

    </div>
@endsection
