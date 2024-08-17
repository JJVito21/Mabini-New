@extends('layouts.layout')

@section('content')
@include('navbars.admin-navbar')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/cscsss/dataTables.bootstrap5.min.">


<div class="mb-40 lg:mb-56 overflow-x-hidden">

  

 
  <section>
      <div class="flex items-center justify-center mt-20">
      
          <h2 class="uppercase font-serif text-lg md:text-3xl font-bold text-[#044D0B]">
              <span class="underlined underline-mask">Homepage</span>
          </h2>
      </div>
        
        <div class="mt-40">
          {{-- <p class="font-bold text-lg md:text-xl mx-10 mb-10 md:mb-20">The <span class="uppercase text-lime-700 ">homepage carousel slider</span> changes appear here.</p> --}}
          <div id="carouselHomepage" class="carousel slide" data-bs-ride="carousel">
            {{-- <div class="carousel-indicators"> --}}
                {{-- <button type="button" data-bs-target="#carouselHomepage" data-bs-slide-to="0" --}}
                    {{-- class="active carouselButton" aria-current="true" aria-label="Slide 1"></button> --}}
                {{-- <button type="button" data-bs-target="#carouselHomepage" data-bs-slide-to="1" --}}
                    {{-- class=" carouselButton" aria-label="Slide 2"></button> --}}
                {{-- <button type="button" data-bs-target="#carouselHomepage" data-bs-slide-to="2" --}}
                    {{-- class=" carouselButton" aria-label="Slide 3"></button> --}}
            {{-- </div> --}}

            <div class="carousel-indicators">
              @foreach ($imageData as $index => $item)
                  <button type="button" data-bs-target="#carouselHomepage" data-bs-slide-to="{{ $index }}"
                      class="{{ $index == 0? 'active' : '' }} carouselButton" aria-label="Slide {{ $index + 1 }}"></button>
              @endforeach
            </div>
            <div class="carousel-inner overflow-hidden">

                @foreach ($imageData as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" >
                        <img src="{{ asset($item->image) }}" class="d-block w-100 h-[15rem] md:h-[35rem]" alt="...">
                    </div>
                @endforeach
              </div>
              {{-- <div class="carousel-inner">
                 <div class="carousel-item active">
                     <img src="images/building.jpg" class="d-block w-100 md:h-[35rem]" alt="...">
                 </div>
                 <div class="carousel-item">
                     <img src="images/brigada.jpg" class="d-block w-100 md:h-[35rem]" alt="...">
                 </div>
                 <div class="carousel-item">
                     <img src="images/maggi.jpg" class="d-block w-100 md:h-[35rem]" alt="...">
                 </div>
             </div> --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomepage"
                data-bs-slide="prev" >
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselHomepage"
                data-bs-slide="next" >
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>

            </button>
        </div>
        </div>
        </section>

        <section class="mt-40">
      

          {{-- <p class="font-bold text-lg md:text-xl mx-10 mb-10">The <span class="uppercase text-lime-700 ">homepage carousel slider</span> can be updated in this table.</p> --}}
          {{-- <p class="font-medium font-sans text-base md:text-lg  mx-10 mb-10 md:mb-20">Older images will appear in the carousel first, and newer images will appear chronologically.</p> --}}
          <div class="my-40 lg:mb-auto mx-auto w-[90%] overflow-hidden">
            
              <div class="flex justify-end">
                  <button type="button" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100" data-bs-toggle="modal" data-bs-target="#uploadImageModal"><i class="fa-solid fa-plus"></i> Add Image
                  </button>
              </div>
              <table id="carouselTable" class="display  table table-light table-striped" style="width:100%">
                  <thead>
                      <tr>
                          <th>Image</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($imageData as $item)
                      
                      <tr>
                        <td><img class="w-20 h-8" src="{{ asset($item->image) }}" alt=""></td>
                        {{-- <td>{{ $item->image }}</td> --}}
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
          
                        <td >
                          {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#editItemModal" class="btn  bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100 me-3 ">
                          <div class="flex flex-col py-1">
                              <i class="fa-solid fa-pen"></i>
                          </div>
                          </button> --}}
                          <a href="{{ route('delete_image', $item->id) }}" 
                          class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')"><i class="fa-solid fa-trash-can"></i></a>
                           
                        </td> 
                     </tr>
                     
                      @endforeach
                  </tbody>
          
          
              </table>
          </div>
          {{-- add new procurement item modal --}}
              <div class="modal fade" id="uploadImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title ms-auto font-bold text-lime-900" id="exampleModalLabel">Add Carousel Image</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p class="modal-title ms-auto font-medium text-gray-800 text-center" id="exampleModalLabel">
                              The image must be landscape and have a <strong>1280 x 660px resolution</strong> for the best fit and quality.</p>
                              
                              <form action="{{ route('uploadImage') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="file-upload w-80 md:w-96">
                                      <div class="image-upload-wrap">
                                        <input class="file-upload-input" type='file' name="image" id="image" onchange="readURL(this);" accept=".jpg, .jpeg, .png, .webp" />
                                        <div class="drag-text">
                                          <h3>Drag and drop an image or <br>click to select</h3>
                                        </div>
                                      </div>
                                      <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                          <button type="button" onclick="removeUpload()" class="btn bg-red-600 hover:bg-red-800 text-neutral-100 hover:text-neutral-100">Remove <span class="image-title font-medium">Uploaded Image Name</span></button>
                                        </div>
                                      </div>
                                    </div>
     
                                  <div class="modal-footer">
                                      <button type="submit" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100">Upload</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                </div>
          
          {{-- update carousel image modal --}}
          {{-- <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title ms-auto font-bold text-lime-900" id="exampleModalLabel">Update Carousel Image</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p class="modal-title ms-auto font-medium text-gray-800 text-center" id="exampleModalLabel">
                      The image must be landscape and have a <strong>1280 x 660px resolution</strong> for the best fit and quality.</p>
                      
                      <form method="POST" action="{{ route('update_image', $item->id) }}" enctype="multipart/form-data">
                        @csrf
                          @method('put')

                          <div class="file-upload w-80 md:w-96">
                              <div class="image-upload-wrap">
                                <input class="file-upload-input" type='file' name="image" id="image" onchange="readURL(this);" accept=".jpg, .jpeg, .png, .webp" />
                                <div class="drag-text">
                                  <h3>Drag and drop an image or <br>click to select</h3>
                                </div>
                              </div>
                              <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                  <button type="button" onclick="removeUpload()" class="btn bg-red-600 hover:bg-red-800 text-neutral-100 hover:text-neutral-100">Remove <span class="image-title font-medium">Uploaded Image Name</span></button>
                                </div>
                              </div>
                            </div>

                          <div class="modal-footer">
                              <button type="submit" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100">Upload</button>
                          </div>
                      </form>
                  </div>
              </div>
             </div>
            </div> --}}
         
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

<style>
.carouselButton {
    width: 10px !important;
    height: 10px !important;
    border-radius: 75%;
    background-color: #D9D9D9 !important;
    opacity: 1 !important;
}

.active {
    background-color: #88B15E !important;
}

/* upload form styles */
body {
  font-family: sans-serif;
  background-color: #eeeeee;
}

.file-upload {
  background-color: #ffffff;
  margin: 0 auto;
  padding: 20px;
}



.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  transition: ease-in-out 400ms;
  border: 4px dashed #ffffff;
  
}
.image-title{
    font-weight: bold;
}
.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
  margin: auto 20px;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}
</style>


<!-- Load DataTables JS -->
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#carouselTable').DataTable({
            rowReorder: true
        });
    });

    // upload form js
    function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});

</script>
    
@include('footer.footer')
@endsection
