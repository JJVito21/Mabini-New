@extends('layouts.layout')

@section('content')
@include('navbars.admin-navbar')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="-mt-3 md:-mt-1 mb-40 overflow-x-hidden">
    

  <section id="faculty-banner" class="h-80 md:h-[35rem] mb-32 ">
    <div class="relative w-screen">
     <div class="absolute inset-0 bg-[#044D0B] mt-[20rem] h-6 md:mt-[35rem] md:h-8 "></div>
     <div class="absolute inset-0 bg-[#044D0B] mt-[18.7rem] h-8 w-44 md:mt-[33rem] md:h-10 md:w-72 mx-auto rounded-xl">
         <h1 class="text-center text-2xl md:text-4xl font-medium uppercase text-slate-100 mt-2">the faculty</h1>
     </div>
     
    </div>
 </section>
    {{-- precoded principal card data --}}
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
      {{-- dynamically display data of teaching staff --}}
     <section class="mb-14">
      <div class="flex flex-col items-center justify-center gap-10">
           <h1 class="capitalize font-bold font-koho
           text-2xl md:text-3xl text-[#044D0B] py-2 px-4 text-center">teaching staff</h1> 
           {{-- gap-4 for small screen, m-5 for increased gap 
           between cards for medium screens and up --}}
           <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

        @foreach ($facultyData as $data)

         <div class="card md:m-5" style="width: 10rem;">
             <div class="relative">
               <img src="{{ asset($data->profileImage) }}" class="card-img-top w-40 h-40" alt="A picture of a person">
             </div>
             <div class="absolute top-0 right-0">
               <div class="dropdown m-1">
                 <button  class="bg-neutral-100 transition duration-300 hover:bg-neutral-400 px-1 rounded" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <i class="fa-solid fa-ellipsis text-gray-800"></i>
                 </button>
                 <ul class="dropdown-menu dropdown-menu-end min-w-20">
                   <li><a class="dropdown-item font-medium text-lime-600 hover:text-white hover:bg-lime-600" href="{{ route('editStaff',  $data->id) }}">Edit</a></li>
                   <li><a class="dropdown-item font-medium text-red-600 hover:text-white hover:bg-red-600" href="{{ route('delete_Staff', $data->id) }}" onclick="return confirm('Are you sure you want to delete this Staff?')">Delete</a></li>
                 </ul>
               </div>
             </div>
             <div class="card-body capitalize">
               <h5 class="card-title font-bold text-[#044D0B]">{{ $data -> name }}</h5>
               <p class="card-text">{{ $data -> role }}</p>
             </div>
            </div>
            @endforeach
            {{-- add faculty button --}}
            <div class="card bg-neutral-300 h-[250px] w-[10rem] md:m-5">
            <div class="m-auto">
              <button data-bs-target="#addNewStaff" type="button" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100" data-bs-toggle="modal" data-bs-target="#uploadItemModal"><i class="fa-solid fa-plus"></i>
              </button>
            </div>
          </div>
          
       </div>
      </div>

      {{-- add new teaching staff --}}
      <div class="modal fade" id="addNewStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto font-medium text-lime-800" id="exampleModalLabel">Add Teaching Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('addStaff') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 flex flex-col justify-center items-center">          
                      <img id="showPhoto" class="rounded-lg w-40 mb-5 " src="{{ asset('images/profile-placeholder.png') }}" alt="photo"  />
                      <input type="file" name="photo" id="photo" class="" onchange="previewImage(this);" accept=".jpg, .png, .jpeg"  >
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label font-sans font-medium capitalize">Name</label>
                        <input type="text" class="form-control border-0 bg-gray-300 rounded" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label font-sans font-medium capitalize">Role</label>
                        <input type="text" class="form-control border-0 bg-gray-300 rounded" name="role" id="role" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100">Submit</button>
                    </div>
                </form>
                
                </div>
            </div>
        </div>
      </div>
  </section>

  
</div>
    
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
<script>
  // JavaScript function to preview the selected image
  function previewImage(input) {
      var file = input.files[0];
      if (file) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#showPhoto').attr('src', e.target.result);
          }
          reader.readAsDataURL(file);
      }
  }
</script>

<style>
  #faculty-banner {
      background:
          #044D0B url("images/faculty.jpg") no-repeat center / cover;
  }

</style>
@include('footer.footer')
@endsection
