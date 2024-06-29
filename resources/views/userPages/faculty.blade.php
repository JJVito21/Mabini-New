@extends('layouts.layout')

@section('content')
@include('navbars.navbar')

<div class="-mt-3 md:-mt-1 mb-40 overflow-x-hidden">
    

  <section id="faculty-banner" class="h-80 md:h-[35rem] mb-32 ">
    <div class="relative w-screen">
     <div class="absolute inset-0 bg-[#044D0B] mt-[20rem] h-6 md:mt-[35rem] md:h-8 "></div>
     <div class="absolute inset-0 bg-[#044D0B] mt-[18.7rem] h-8 w-44 md:mt-[33rem] md:h-10 md:w-72 mx-auto rounded-xl">
         <h1 class="text-center text-2xl md:text-4xl font-medium uppercase text-slate-100 mt-2">the faculty</h1>
     </div>
     
    </div>
 </section>

    <section class="mb-14">
         <div class="flex flex-col items-center justify-center gap-10">
              <h1 class="capitalize font-bold  font-koho
              text-2xl md:text-3xl text-[#044D0B] py-2 px-4 text-center">Principal</h1> 
          <div class="flex flex-row">
            <div class="card" style="width: 10rem;">
                <div class="relative">
                  <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
                </div>
                <div class="card-body">
                  <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
                  <p class="card-text">Principal</p>
                </div>
              </div>
          </div>
         </div>
     </section>
         
     <section class="mb-14">
      <div class="flex flex-col items-center justify-center gap-10">
           <h1 class="capitalize font-bold  font-koho
           text-2xl md:text-3xl text-[#044D0B] py-2 px-4 text-center">teaching staff</h1> 

           {{-- gap-4 for small screen, m-5 for increased gap 
           between cards for medium screens and up --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach ($facultyData as $data)

         <div class="card md:m-5" style="width: 10rem;">
             <div class="relative">
               <img src="{{ asset($data->profileImage) }}" class="card-img-top w-40 h-40" alt="A picture of a person">
             </div>

             <div class="card-body capitalize">
               <h5 class="card-title font-bold text-[#044D0B]">{{ $data -> name }}</h5>
               <p class="card-text">{{ $data -> role }}</p>
             </div>
           </div>
           @endforeach
       </div>
       
      </div>

  </section>
</div>
    

<style>
  #faculty-banner {
      background:
          #044D0B url("images/faculty.jpg") no-repeat center / cover;
  }
</style>

@include('footer.footer')
@endsection
