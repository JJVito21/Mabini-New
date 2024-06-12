@extends('layouts.layout')

@section('content')
    @include('navbars.navbar')

<div class="mb-40 lg:-mb-56">

    <section id="about-banner" class="h-80 md:h-[30rem] mb-20 ">
       <div class="relative w-screen">
        <div class="absolute inset-0 bg-[#044D0B] mt-[20rem] h-6 md:mt-[30rem] md:h-8 "></div>
        <div class="absolute inset-0 bg-[#044D0B] mt-[18.7rem] h-8 w-44 md:mt-[28rem] md:h-10 md:w-72 mx-auto rounded-xl">
            <h1 class="text-center text-2xl md:text-4xl font-medium uppercase text-slate-100 mt-1 md:mt-2">about us</h1>
        </div>
        
       </div>
    </section>

    <section>
      <h1 class="capitalize font-bold  font-kaushan
      text-2xl md:text-4xl text-[#044D0B] mb-10 text-center">Basta Mabinian, Baskugan!</h1> 
      <div class=" container gap-10 mt-20 mb-20 md:mt-auto flex flex-col flex-wrap 
      md:flex-row md:flex-no-wrap justify-center text-center font-koho items-center lg:items-start px-10 md:px-20">
     
      <h2 class="uppercase font-bold text-lg md:text-2xl text-neutral-800 mb-10">History</h2>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
        <h2 class="uppercase font-bold text-lg md:text-2xl text-neutral-800 mb-10">Mission</h2>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
        <h2 class="uppercase font-bold text-lg md:text-2xl text-neutral-800 mb-10">Vision</h2>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
      </div>
    </section>
  </div>

    
    @include('footer.footer')

    <style>
        #about-banner {
            background:
                #044D0B url("images/about-banner.png") no-repeat center / cover;
        }

    </style>
@endsection
