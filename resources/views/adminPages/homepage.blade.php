@extends('layouts.layout')

@section('content')
@include('navbars.navbar')

<head> 
    <title>Mabini Farm School</title> 
</head> 
<div class="container">
    
    <div class="content">
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
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/brigada.jpg" class="d-block w-screen" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/building.jpg" class="d-block w-screen" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/brigada.jpg" class="d-block w-screen" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
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
