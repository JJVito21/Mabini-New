@extends('layouts.layout')

@section('content')
    @include('navbars.navbar')

<div class="my-40">



    <section>
      <h1 class="capitalize font-bold  font-koho
      text-2xl md:text-4xl text-[#044D0B] mb-10 text-center">The Faculty</h1> 

      <div class="flex flex-col items-center justify-center gap-10">
        <div class="flex flex-row">
          <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-bold">The Jian Vito</h5>
              <p class="card-text">Principal</p>
            </div>
          </div>
        </div>
        <div class="flex flex-row gap-10">
          <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-bold">Jian Vito 2</h5>
              <p class="card-text">Teacher 2</p>
            </div>
          </div>
          <div class="card" style="width: 10rem;">
            <img src="/images/jian.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-bold">Jian Vito</h5>
              <p class="card-text">Teacher 1</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    
@include('footer.footer')
@endsection
