@extends('layouts.layout')

@section('content')
@include('navbars.admin-navbar')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="mt-3 md:-mt-1 mb-40 overflow-x-hidden">

  <section class="mb-14">
      <div class="flex flex-col items-center justify-center gap-10 mb-20">
           <h1 class="capitalize font-bold  font-koho
           text-2xl md:text-3xl text-[#044D0B] py-2 px-4 text-center">Event details</h1>
      </div>


        <div class="container card p-10 w-[30rem]">

                <form action="{{ route('update_event', $eventData->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label font-sans font-medium capitalize">Name</label>
                    <input type="text" class="form-control border-0 bg-gray-300 rounded" name="eventName" id="eventName"  value="{{ $eventData -> eventName }}" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label font-sans font-medium capitalize">Role</label>
                    <input type="text" class="form-control border-0 bg-gray-300 rounded" name="eventDate" id="eventDate"  value="{{ $eventData -> eventDate }}" required>
                </div>

                <div class="mb-3 flex flex-col justify-center items-center">
                    <img id="showPhoto" class="rounded-lg w-40 mb-4" src="{{ asset($eventData->eventImage) }}" alt="photo"/>
                    <input type="file" name="photo" id="photo" class="" onchange="previewImage(this);" accept=".jpg, .png, .jpeg">
                </div>
                <div class="gap-4 modal-footer">
                    <a href="programs_management" type="button" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn bg-lime-600 hover:bg-lime-700 text-neutral-100 hover:text-neutral-100">Save</button>
                </div>
            </form>

        </div>
     </section>


</div>


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
@include('footer.footer')
@endsection
