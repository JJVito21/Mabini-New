@extends('layouts.layout')

@section('content')
@include('navbars.navbar')
<section id="contact-banner" class="h-80 md:h-[30rem] mb-20">
  <div class="flex flex-row justify-center items-center h-full gap-10 md:gap-20">
    <div class="flex flex-col">
      <img src="images/logo2.png" alt="" class="w-24 md:w-40">
    </div>
    <div class="flex flex-row items-center gap-2 md:gap-10">
      <h1 class="font-koho text-neutral-100 text-2xl md:text-[4rem]">Contact Us</h1>
      <div class="bg-neutral-100 w-0.5 h-12  md:w-1 md:h-24"></div>
    </div>
  </div>
</section>
<section class="mb-40 lg:mb-auto">
<p class="mt-10 text-lg md:text-2xl uppercase text-center font-sans font-medium">Lets Start a Conversation</p>

<div class="flex flex-col md:flex-row justify-center items-center h-full gap-20 md:gap-40 mt-20">
  
  {{-- messages are sent to the admin in this form --}}
  <div class="flex flex-col w-80 text-gray-900">
    <form action="">
    <div class="mb-3">
      <label for="name" class="form-label font-sans font-medium capitalize">Name</label>
      <input type="text" class="form-control border-0 bg-gray-300" id="name" placeholder="John Doe">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label font-sans font-medium capitalize">Email address</label>
      <input type="email" class="form-control border-0 bg-gray-300" id="email" placeholder="name@example.com">
    </div>
    <div class="mb-3">
      <label for="message" class="form-label font-sans font-medium capitalize">Message</label>
      <textarea class="form-control bg-gray-300" id="message" rows="3"></textarea>
    </div>
    <div class="flex justify-end">
      <a href="#" class="btn bg-lime-600 hover:bg-lime-700 text-white">Send</a>
    </div>
  </form>
  </div>
  <div class="flex flex-col justify-items-center w-80 capitalize text-gray-900 gap-2 ">
    <h4 class="font-bold underline mb-1">direct contact</h4>
    <h5 class="font-medium">address</h5>
    <p class="text-base">Insert Lorem Ipsum here</p>
    <h5 class="font-medium">email address</h5>
    <p class="text-base">example@email.com</p>
    <h5 class="font-medium">mobile number</h5>
    <p class="text-base">+63 999 999 9999</p>
    <h5 class="font-medium">telephone number</h5>
    <p class="text-base">+63 999 999 9999</p>
    <h5 class="font-medium">socials</h5>
    <p class="text-base">facebook.com/mabininhscadiz</p>
  </div>
</div>
</section>

@include('footer.footer')

<style>
  #contact-banner {
      background:
      linear-gradient(rgba(23, 77, 4, 0.7), rgba(136, 177, 94, 0.7)),
      url("images/building.jpg") no-repeat center / cover;
  }

</style>
@endsection
