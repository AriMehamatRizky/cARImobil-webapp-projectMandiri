<x-app-layout>
    <div x-data="{ activeTab: null }" class="min-h-screen bg-gray-50/50 pb-20">

        <div class="relative h-72 w-full bg-brand-dark overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900 via-brand-dark to-brand-dark opacity-90"></div>
            <div
                class="absolute top-0 left-1/2 -translate-x-1/2 -mt-20 w-[800px] h-[800px] rounded-full bg-brand-orange blur-[120px] opacity-20">
            </div>

            <div
                class="relative container mx-auto px-4 h-full flex flex-col items-center justify-center text-center -mt-8">
                <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight">Profil Saya</h1>
                <p class="mt-2 text-gray-400">Kelola akun dan privasi Anda di satu tempat.</p>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 -mt-32 relative z-10">

            <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-10 text-center">

                    <div class="relative inline-block group mb-6">
                        <div
                            class="absolute -inset-1 bg-gradient-to-tr from-brand-orange to-yellow-500 rounded-full opacity-50 blur group-hover:opacity-100 transition duration-500">
                        </div>

                        @if ($user->avatar)
                            <img class="relative w-40 h-40 rounded-full object-cover border-[6px] border-white shadow-lg"
                                src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}">
                        @else
                            <div
                                class="relative w-40 h-40 rounded-full bg-brand-dark text-white flex items-center justify-center text-6xl font-bold border-[6px] border-white shadow-lg">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        @endif

                        @if ($user->is_admin)
                            <div class="absolute bottom-2 right-2 bg-blue-600 text-white p-1.5 rounded-full border-4 border-white shadow-sm"
                                title="Administrator">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <h2 class="text-3xl font-bold text-gray-900 mb-1">{{ $user->name }}</h2>
                    <p class="text-gray-500 text-lg">{{ $user->email }}</p>

                    <div class="mt-4 flex items-center justify-center gap-3">
                        <span class="px-4 py-1 bg-gray-100 text-gray-600 text-sm font-medium rounded-full">
                            Member sejak {{ $user->created_at->format('M Y') }}
                        </span>
                        @if ($user->hasVerifiedEmail())
                            <span
                                class="px-4 py-1 bg-green-50 text-green-700 text-sm font-medium rounded-full flex items-center">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> Verified
                            </span>
                        @endif
                    </div>

                    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-4 border-t border-gray-100 pt-8">

                        <button @click="activeTab = (activeTab === 'profile' ? null : 'profile')"
                            class="flex flex-col items-center justify-center p-4 rounded-2xl transition-all duration-200 group hover:bg-orange-50"
                            :class="activeTab === 'profile' ? 'bg-orange-50 ring-2 ring-brand-orange ring-offset-2' :
                                'bg-white border border-gray-200'">

                            <div class="w-12 h-12 rounded-full flex items-center justify-center mb-3 transition-colors"
                                :class="activeTab === 'profile' ? 'bg-brand-orange text-white' :
                                    'bg-gray-100 text-gray-500 group-hover:bg-brand-orange group-hover:text-white'">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <span class="font-bold text-gray-800 group-hover:text-brand-orange">Edit Profil</span>
                            <span class="text-xs text-gray-400 mt-1">Foto & Nama</span>
                        </button>

                        <button @click="activeTab = (activeTab === 'password' ? null : 'password')"
                            class="flex flex-col items-center justify-center p-4 rounded-2xl transition-all duration-200 group hover:bg-gray-100"
                            :class="activeTab === 'password' ? 'bg-gray-100 ring-2 ring-brand-dark ring-offset-2' :
                                'bg-white border border-gray-200'">

                            <div class="w-12 h-12 rounded-full flex items-center justify-center mb-3 transition-colors"
                                :class="activeTab === 'password' ? 'bg-brand-dark text-white' :
                                    'bg-gray-100 text-gray-500 group-hover:bg-brand-dark group-hover:text-white'">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <span class="font-bold text-gray-800 group-hover:text-brand-dark">Keamanan</span>
                            <span class="text-xs text-gray-400 mt-1">Ganti Password</span>
                        </button>

                        <button @click="activeTab = (activeTab === 'delete' ? null : 'delete')"
                            class="flex flex-col items-center justify-center p-4 rounded-2xl transition-all duration-200 group hover:bg-red-50"
                            :class="activeTab === 'delete' ? 'bg-red-50 ring-2 ring-red-500 ring-offset-2' :
                                'bg-white border border-gray-200'">

                            <div class="w-12 h-12 rounded-full flex items-center justify-center mb-3 transition-colors"
                                :class="activeTab === 'delete' ? 'bg-red-500 text-white' :
                                    'bg-gray-100 text-gray-500 group-hover:bg-red-500 group-hover:text-white'">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </div>
                            <span class="font-bold text-gray-800 group-hover:text-red-600">Zona Bahaya</span>
                            <span class="text-xs text-gray-400 mt-1">Hapus Akun</span>
                        </button>

                    </div>
                </div>
            </div>

            <div class="max-w-3xl mx-auto mt-8">

                <div x-show="activeTab === 'profile'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0" style="display: none;"
                    class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-brand-orange"></div>
                    <h3 class="text-xl font-bold text-brand-dark mb-6 flex items-center">
                        <span
                            class="w-8 h-8 rounded-full bg-orange-100 text-brand-orange flex items-center justify-center mr-3 text-sm">1</span>
                        Update Informasi Profil
                    </h3>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div x-show="activeTab === 'password'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0" style="display: none;"
                    class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-brand-dark"></div>
                    <h3 class="text-xl font-bold text-brand-dark mb-6 flex items-center">
                        <span
                            class="w-8 h-8 rounded-full bg-gray-200 text-gray-700 flex items-center justify-center mr-3 text-sm">2</span>
                        Update Password
                    </h3>
                    @include('profile.partials.update-password-form')
                </div>

                <div x-show="activeTab === 'delete'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0" style="display: none;"
                    class="bg-white rounded-3xl shadow-xl border border-red-100 p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-red-500"></div>
                    <h3 class="text-xl font-bold text-red-600 mb-6 flex items-center">
                        <span
                            class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center mr-3 text-sm">!</span>
                        Hapus Akun Permanen
                    </h3>
                    @include('profile.partials.delete-user-form')
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
