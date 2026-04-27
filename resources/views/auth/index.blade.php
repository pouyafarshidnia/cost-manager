@extends('layouts.auth')
@section('content')
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden">

        <!-- BG --->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500">
            <div class="absolute inset-0 opacity-30"
                style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,0.15) 35px, rgba(255,255,255,0.15) 70px), repeating-linear-gradient(-45deg, transparent, transparent 35px, rgba(255,255,255,0.1) 35px, rgba(255,255,255,0.1) 70px);">
            </div>
            <div class="absolute inset-0 animate-pulse bg-gradient-to-t from-black/20 to-transparent"></div>
        </div>

        <!-- Box --->
        <div class="relative z-10 w-full max-w-md px-6">
            <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/20">

                <!-- Title --->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-white/20 mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                    <p class="text-white">Sign in to continue to your account</p>
                </div>


                <!-- Button --->
                <a href="{{ route('auth.google.redirect') }}"
                    class="w-full flex items-center justify-center gap-3 bg-white hover:bg-gray-50 text-gray-700 font-medium py-3.5 px-6 rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-[1.02] active:scale-[0.98]">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="#4285F4"
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                        <path fill="#34A853"
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                        <path fill="#FBBC05"
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                        <path fill="#EA4335"
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                    </svg>
                    Sign in with Google
                </a>

                <!-- Terms --->
                <div class="mt-6 text-center">
                    <p class="text-white/80 text-sm">By signing in, you agree to our Terms of Service</p>
                </div>


            </div>
        </div>
    </div>
@endsection
