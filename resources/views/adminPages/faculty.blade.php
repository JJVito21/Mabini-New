@extends('layouts.layout')

@section('content')
@include('navbars.admin-navbar')


<div class="mt-20 mb-40 lg:mb-56">
    

    <h1 class="capitalize font-bold  font-koho
    text-2xl md:text-4xl text-[#044D0B] mb-10 text-center">The Faculty</h1> 
    
    <section class="mb-14">
         <div class="flex flex-col items-center justify-center gap-10">
          <div class="bg-[#044D0B] flex items-center justify-center">
              <h1 class="capitalize font-medium  font-koho
              text-lg md:text-xl text-neutral-50 py-2 px-4 text-center">District Superintendent</h1> 
          </div>
          <div class="flex flex-row">
            <div class="card" style="width: 10rem;">
                <div class="relative">
                  <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
                </div>
                <div class="absolute top-0 right-0">
                  <div class="dropdown m-1">
                    <button class="bg-neutral-100 transition duration-300 hover:bg-neutral-400 px-1 rounded" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis text-gray-800"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end min-w-20">
                      <li><a class="dropdown-item font-medium text-lime-600 hover:text-white hover:bg-lime-600" href="#">Edit</a></li>
                      <li><a class="dropdown-item font-medium text-red-600 hover:text-white hover:bg-red-600" href="#">Delete</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
                  <p class="card-text">District Superintendent</p>
                </div>
              </div>
          </div>
         </div>
     </section>
         
     <section class="mb-14">
        <div class="flex flex-col items-center justify-center gap-10">
         <div class="bg-[#044D0B] flex items-center justify-center">
             <h1 class="capitalize font-medium  font-koho
             text-lg md:text-xl text-neutral-50 py-2 px-4 text-center">Administrative Sector</h1> 
         </div>
         <div class="flex flex-row gap-5">
           
            <div class="card" style="width: 10rem;">
             <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
             <div class="card-body">
               <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
               <p class="card-text">Principal</p>
             </div>
           </div>


           <div class="card" style="width: 10rem;">
             <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
             <div class="card-body">
               <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
               <p class="card-text">Assistant Principal</p>
             </div>
           </div>
         </div>
        </div>

    </section>

    <section class="mb-14">
        <div class="flex flex-col items-center justify-center gap-10">
         <div class="bg-[#044D0B] flex items-center justify-center">
             <h1 class="capitalize font-medium  font-koho
             text-lg md:text-xl text-neutral-50 py-2 px-4 text-center">Academic Department Heads</h1> 
         </div>
         <div class="flex flex-row gap-5">
           <div class="card" style="width: 10rem;">
             <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
             <div class="card-body">
               <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
               <p class="card-text">Head of Subject Department</p>
             </div>
           </div>
           <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
            <div class="card-body">
              <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
              <p class="card-text">Head of Subject Department</p>
            </div>
          </div>
          <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
            <div class="card-body">
              <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
              <p class="card-text">Head of Subject Department</p>
            </div>
          </div>
         </div>
        </div>
    </section>


    <section class="mb-14">
        <div class="flex flex-col items-center justify-center gap-10">
         <div class="bg-[#044D0B] flex items-center justify-center">
             <h1 class="capitalize font-medium  font-koho
             text-lg md:text-xl text-neutral-50 py-2 px-4 text-center">Teaching Staff</h1> 
         </div>
         <div class="flex flex-row gap-5">
           <div class="card" style="width: 10rem;">
             <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
             <div class="card-body">
               <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
               <p class="card-text">Head of Subject Department</p>
             </div>
           </div>
           <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
            <div class="card-body">
              <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
              <p class="card-text">Head of Subject Department</p>
            </div>
          </div>
          <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
            <div class="card-body">
              <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
              <p class="card-text">Head of Subject Department</p>
            </div>
          </div>
         </div>
        </div>
    </section>

    <section class="mb-14">
        <div class="flex flex-col items-center justify-center gap-10">
         <div class="bg-[#044D0B] flex items-center justify-center">
             <h1 class="capitalize font-medium  font-koho
             text-lg md:text-xl text-neutral-50 py-2 px-4 text-center">Support Staff</h1> 
         </div>
         <div class="flex flex-row gap-5">
           <div class="card" style="width: 10rem;">
             <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
             <div class="card-body">
               <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
               <p class="card-text">Head of Subject Department</p>
             </div>
           </div>
           <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
            <div class="card-body">
              <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
              <p class="card-text">Head of Subject Department</p>
            </div>
          </div>
          <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
            <div class="card-body">
              <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
              <p class="card-text">Head of Subject Department</p>
            </div>
          </div>
         </div>
        </div>
    </section>

    <section class="mb-14">
        <div class="flex flex-col items-center justify-center gap-10">
         <div class="bg-[#044D0B] flex items-center justify-center">
             <h1 class="capitalize font-medium  font-koho
             text-lg md:text-xl text-neutral-50 py-2 px-4 text-center">Support Staff</h1> 
         </div>
         <div class="flex flex-row gap-5">
           <div class="card" style="width: 10rem;">
             <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
             <div class="card-body">
               <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
               <p class="card-text">Head of Subject Department</p>
             </div>
           </div>
           <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
            <div class="card-body">
              <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
              <p class="card-text">Head of Subject Department</p>
            </div>
          </div>
          <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top w-40 h-40" alt="A picture of a person">
            <div class="card-body">
              <h5 class="card-title font-bold text-[#044D0B]">John Doe</h5>
              <p class="card-text">Head of Subject Department</p>
            </div>
          </div>
         </div>
        </div>
    </section>
</div>
    
    
    <style>

    </style>
@include('footer.footer')
@endsection
