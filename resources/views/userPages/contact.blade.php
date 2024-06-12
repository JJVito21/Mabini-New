@extends('layouts.layout')

@section('content')
@include('navbars.navbar')

<div class="mb-40 lg:-mb-56">

<section id="contact-banner" class="h-80 md:h-[30rem] mb-20">
  <div class="flex flex-row justify-center items-center h-full gap-10 md:gap-20">
    <div class="flex flex-col">
      <img src="images/logo2.png" alt="" class="w-24 md:w-40">
    </div>
    <div class="flex flex-row items-center gap-2">
      <h1 class="font-koho text-neutral-100 text-4xl md:text-[4rem]">Contact Us</h1>
    </div>
  </div>
</section>
<section class="mb-40 lg:mb-auto">
  {{-- typing class parameters are in app.css --}}
<div class="flex items-center justify-center">
<p class="typing mt-10 text-lg md:text-2xl uppercase text-center font-sans font-medium">Let's Start a Conversation</p>

</div>

<div class="flex flex-col md:flex-row justify-center items-center h-full gap-20 md:gap-40 mt-20">
  
  {{-- messages are sent to the admin in this form --}}
  <div class="flex flex-col w-80 text-gray-900">

    <form method="POST" action="{{ route('send') }}" enctype="multipart/form-data">
      @csrf
      @method('post')

    <div class="mb-3">
      <label for="name" class="form-label font-sans font-medium capitalize">Name</label>
      <input type="text" class="form-control border-0 bg-gray-300 rounded" name="name" id="name" placeholder="John Doe" required onkeydown="return /[a-z ]/i.test(event.key)">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label font-sans font-medium capitalize">Email address</label>
      <input type="email" class="form-control border-0 bg-gray-300 rounded" name="email" id="email" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
      <label for="message" class="form-label font-sans font-medium capitalize">Message</label>
      <textarea class="form-control bg-gray-300" name="message" id="message" rows="3" required placeholder="Try writing something here ..."></textarea>
    </div>
    <div class="flex justify-end">
      <button type="submit" id="sent" class="btn bg-lime-600 hover:bg-lime-700 text-white">Send</button>
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

</div>
@include('footer.footer')

<style>
  #contact-banner {
      background:
      linear-gradient(rgba(23, 77, 4, 0.7), rgba(136, 177, 94,0.9)),
      url("images/building.jpg") no-repeat center / cover;
  }

</style>

@if(session('success'))
    <style>
        /* Add CSS styles for the success message */
        #success-message {
            opacity: 1;
            transition: opacity 0.5s ease-in-out; /* Adjust the duration and easing as needed */
        }
    </style>
    
    <div id="success-message" class="alert bg-[#6e914b] text-neutral-200 position-fixed bottom-0 mt-5 ms-4">
        {{ session('success') }}
    </div>
    
    <script>
        // Function to close the success message
        function closeSuccessMessage() {
            var successMessage = document.getElementById('success-message');
            successMessage.style.opacity = '0';

            // Wait for the transition to complete before hiding or removing the message
            setTimeout(function () {
                successMessage.style.display = 'none'; // or remove the success message from the DOM
            }, 500); // Duration of the transition, should match the CSS transition duration
        }

        // Close the success message after 3000 milliseconds even if the modal is not closed
        setTimeout(closeSuccessMessage, 3000); // 3000 milliseconds = 3 seconds, adjust as needed
    </script>
@endif

@endsection
