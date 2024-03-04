@extends('layouts.layout')

@section('content')
@include('navbars.navbar')

<div class="container">
    <img src="{{ URL('images/logo2.png') }}" alt="logo" class="logo" style="z-index: 2">
    {{-- <h1 class="inquire">Inquire Now</h1> --}}
</div>

<div class="background-container">
    <img src="{{ URL('images/building.jpg') }}" alt="logo" class="building">
    <div class="grn-filter"></div>
</div>


<div class="container">
    
    <div class="content">
        <h1>this is a homepage</h1>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</div>

@include('footer.footer')

<style>

    .inquire{
        position: absolute;
        z-index: 2;
    }

    .background-container {
        position: relative;
        width: 100%;
        height: 100vh;
    }

    .logo{
        position: absolute;
        width: 20rem;
        margin-top: 50px;
        margin-left: 50px;
    }

    .building {
        width: 100%;
        height: 100%;
    }

    .grn-filter {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 80%;
        background-image: linear-gradient(180deg, #0C7016, #88B15E);
        mix-blend-mode: multiply; /* Blend the background color with the image */
    }



</style>
@endsection
