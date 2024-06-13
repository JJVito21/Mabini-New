@extends('layouts.layout')

@section('content')
@include('navbars.navbar')

<div class="mb-40 lg:-mb-56">
    
<div class="flex flex-col md:flex-row items-center justify-center mt-20 lg:mt-56 gap-x-20 gap-y-5">
    <div class="flex flex-col">
        <img class="w-40 lg:w-80" src="images/mascot.png" alt="sad baby cow with electrical plug tail sitting down">
    </div>
    <div class="flex flex-col gap-y-2">
        <h1 class="font-koho font-bold text-4xl lg:text-[4rem] text-gray-800">
            404 <span class="font-sans font-medium">Error</span>
        </h1>
        <h1 class="capitalize font-sans font-medium text-lg lg:text-2xl text-gray-800">
            page not found
        </h1>
    </div>

</div>

</div>


@include('footer.footer')

@endsection
